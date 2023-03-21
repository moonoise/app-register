<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";
include_once "authentication.php";
use App\SqlConn;


$sqlConn = new SqlConn;

$data = array(
    'success' => null,
    'error' => null);
    
    try {
        $sql = "UPDATE app_config SET configvalue = :onoff WHERE configname = 'onoff' ";
        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(":onoff" , $_POST['onoff']);
        $stm->execute();
        
        $data['success'] = true;
    } catch (\Exception $e) {
  
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }


echo json_encode($data);