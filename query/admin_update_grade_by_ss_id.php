<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();
$select_update_grade = ($_POST['select_update_grade'] != "" ? $_POST['select_update_grade'] : null);
try {
    $sql = "UPDATE student_subject SET grade_text = :grade_text WHERE ss_id = :ss_id";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":grade_text", $select_update_grade);
    $stm->bindParam(":ss_id", $_POST['update_grade_ss_id']);
    $stm->execute();
    $data['success'] = true;
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
