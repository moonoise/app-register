<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT * FROM teacher WHERE teacher_status = 1";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
