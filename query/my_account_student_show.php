<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "SELECT * FROM student WHERE std_id = :std_id";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':std_id', $_POST['std_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
