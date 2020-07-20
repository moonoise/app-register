<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();
try {
    $sql = "select std_id FROM student_subject
            WHERE   student_subject.ts_id = :ts_id";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":ts_id", $_POST['search_ts_id']);
    $stm->execute();
    $arrStdId = $stm->fetchAll(PDO::FETCH_COLUMN);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

if (count($arrStdId) > 0) {
    $strStdId = "'" . implode("','", $arrStdId) . "'";
    try {
        $sqlStdId = "SELECT * FROM student WHERE std_id NOT IN (" . $strStdId . ") AND std_year = :std_year ";
        $stm = $sqlConn->conn->prepare($sqlStdId);
        $stm->bindParam(":std_year", $_POST['std_year_search']);
        $stm->execute();
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
} else {

    try {
        $sqlStdId = "SELECT * FROM student WHERE  std_year = :std_year ";
        $stm = $sqlConn->conn->prepare($sqlStdId);
        $stm->bindParam(":std_year", $_POST['std_year_search']);
        $stm->execute();
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
}
echo json_encode($data);
