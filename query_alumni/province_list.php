<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT province_name,province_id FROM thaipost GROUP BY province_id ORDER BY province_name ASC";

try {

    $stm = $sqlConn->conn->prepare($sql);

    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
