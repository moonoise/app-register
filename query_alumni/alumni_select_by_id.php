<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT * FROM alumni WHERE ku_id_auto = :ku_id_auto ";

try {

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
