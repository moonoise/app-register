<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data  = array('success'=>null,
                'data' => null,
                'error' => null);

$data = array();
try {
    $sql = "SELECT * FROM register_form1 WHERE minister_id = :minister_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":minister_id", $_POST['minister_id']);
    $stm->execute();

    if ($stm->rowCount()) {
        $data['success'] = false;
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $data['success'] = true;
    }
   
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);