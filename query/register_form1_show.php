<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT register_form1.*,
    org.org_name as org_name_root
    FROM register_form1  
    LEFT JOIN  org  ON org.org_id = register_form1.org_id_root";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
