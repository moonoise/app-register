<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "DELETE FROM student_simulator WHERE student_simulator.ss_id = :ss_id";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":ss_id", $_POST['edit_ss_id']);
    $stm->execute();
    $data['success'] = true;
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
