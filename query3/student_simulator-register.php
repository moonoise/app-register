<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();


// 
try {
    $sql = "SELECT * FROM set_subject WHERE set_subject_id = :set_subject_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":set_subject_id", $_POST['register_new_set_subject_id']);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

if (count($result) > 0) {
    try {
        $sqlInsertSubject = "INSERT INTO student_simulator (
                                std_id,
                                tearcher_id,
                                subject_id,
                                yt_term,
                                yt_year
                                ) 
                                VALUES (
                                :std_id,
                                :tearcher_id,
                                :subject_id,
                                :yt_term,
                                :yt_year
                                )";
        $stmInsert = $sqlConn->conn->prepare($sqlInsertSubject);

        $stmInsert->bindParam(":std_id", $_POST['register_new_std_id']);
        $stmInsert->bindParam(":tearcher_id", $result[0]['tearcher_id']);
        $stmInsert->bindParam(":subject_id", $result[0]['subject_id']);
        $stmInsert->bindParam(":yt_term", $result[0]['set_subject_term']);
        $stmInsert->bindParam(":yt_year", $result[0]['set_subject_year']);
        $stmInsert->execute();

        $ss_id = $sqlConn->conn->lastInsertId();
        $data['ss_id'] = $ss_id;
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }
}

echo json_encode($data);
