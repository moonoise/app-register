<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "UPDATE year_term SET yt_default = null";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();

    $sqlDefault = "UPDATE year_term SET yt_default = 1  WHERE yt_id = :yt_id ";
    $stmDefault = $sqlConn->conn->prepare($sqlDefault);
    $stmDefault->bindParam(":yt_id", $_POST['yt_id']);
    $stmDefault->execute();

    if ($stmDefault->rowCount()) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
        $data['error'] = $stmDefault->rowCount();
    }
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
