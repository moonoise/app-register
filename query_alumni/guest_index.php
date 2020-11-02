<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT * FROM alumni_guest_63  ";

try {

    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
