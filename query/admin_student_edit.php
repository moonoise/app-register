<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array();

$std_id_auto = $_POST['std_id_auto'];

try {
    $sql = "SELECT * FROM student WHERE std_id_auto = :std_id_auto";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":std_id_auto",$std_id_auto);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $result[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
