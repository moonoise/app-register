<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT yt_year FROM `year_term` group BY yt_year";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
