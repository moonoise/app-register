<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\GradeSimulator;

$sqlConn = new SqlConn;
$grade = new GradeSimulator;

$data = array();

// 
try {
    $sql = "SELECT * FROM subject WHERE subject_id_auto = :subject_id_auto ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":subject_id_auto", $_POST['subject_id_auto']);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

if (count($result) > 0) {
    $checkPermissible = $grade->check_permission_register($_POST['register_more_std_id'], $result[0]['subject_id'], $_POST['register_more_year'], $_POST['register_more_term']);
    if ($checkPermissible['permissible'] == true and  $checkPermissible['registered'] == false) {
        try {
            $sqlInsertSubject = "INSERT INTO student_simulator (
                                std_id,
                                subject_id,
                                yt_term,
                                yt_year
                                ) 
                                VALUES (
                                :std_id,
                                :subject_id,
                                :yt_term,
                                :yt_year
                                )";
            $stmInsert = $sqlConn->conn->prepare($sqlInsertSubject);

            $stmInsert->bindParam(":std_id", $_POST['register_more_std_id']);
            $stmInsert->bindParam(":subject_id", $result[0]['subject_id']);
            $stmInsert->bindParam(":yt_term", $_POST['register_more_term']);
            $stmInsert->bindParam(":yt_year", $_POST['register_more_year']);
            $stmInsert->execute();

            $ss_id = $sqlConn->conn->lastInsertId();
            $data['ss_id'] = $ss_id;
            $data['success'] = true;
        } catch (\Exception $e) {
            $data['success'] = false;
            $data['error'] = $e->getMessage();
        }
    } else {
        $data['success'] = false;
        $data['permissible_comment'] = $checkPermissible['permissible_comment'];
        $data['error'] = ($checkPermissible['registered'] == true ? "ลงทะเบียนแล้ว" : "");
    }
}

echo json_encode($data);
