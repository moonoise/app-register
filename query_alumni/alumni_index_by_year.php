<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT alumni.* ,alumni_reg_63.alumni_reg_id,alumni_reg_63.reward_status,alumni_reg_63.reward_remark  
        FROM alumni LEFT JOIN alumni_reg_63 ON alumni_reg_63.ku_id_auto = alumni.ku_id_auto ";


if ($_POST['batch'] != "") {
    $stdBatch = $_POST['batch'];
    $sql .= " WHERE batch = :batch ";
} else {
    $stdBatch = "";
}

try {

    $stm = $sqlConn->conn->prepare($sql);
    if ($stdBatch != "") {
        $stm->bindParam(':batch', $stdBatch);
    }
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
