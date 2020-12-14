<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT register_form1.*,
    org_root.org_name AS org_name_root,
    org_sub.org_name AS org_name_sub
                     FROM register_form1  
    LEFT JOIN  org org_root
        ON org_root.org_id = register_form1.org_id_root
    LEFT JOIN  org org_sub
        ON org_sub.org_id = register_form1.org_id_sub";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
