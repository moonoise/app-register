<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "SELECT * FROM subject ";

    $stm = $sqlConn->conn->prepare($sql);
    
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);

} catch (\Exception $e) {
   $data['error'] = $e->getMessage();
}

echo json_encode($data);
