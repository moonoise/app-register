<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT * FROM teacher where teacher_id = :teacher_id";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":teacher_id", $_POST['teacher_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r[0];
} catch (\Exception $e) {
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
