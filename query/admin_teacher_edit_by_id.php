<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array();

$teacher_id_auto = $_POST['teacher_id_auto_edit'];

try {
    $sql = "SELECT * FROM teacher WHERE teacher_id_auto = :teacher_id_auto";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":teacher_id_auto", $teacher_id_auto);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $result[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
