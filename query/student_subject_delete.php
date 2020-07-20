<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;


$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "DELETE FROM student_subject WHERE student_subject.ss_id = :ss_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":ss_id", $_POST['ss_id']);
    $stm->execute();
    if ($stm->rowCount()) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
        $data['error'] = $stm->rowCount();
    }
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
