<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT * FROM org WHERE ref_id = :ref_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":ref_id", $_POST['ref_id']);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);