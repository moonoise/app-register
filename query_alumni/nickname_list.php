<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT std_nickname FROM view_nickname ";

try {

    $stm = $sqlConn->conn->prepare($sql);

    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($r as $key => $value) {
        $data[] = $value['std_nickname'];
    }
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
