<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array(
    'success' => null,
    'error' => null);

    try {
        $sql = "SELECT *  FROM  app_config WHERE configname = 'onoff' limit 1";
        $stm = $sqlConn->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        // echo var_dump($result[0]['configvalue'])  ;
        if ($result[0]['configvalue'] == 'on') {
            $data['onoff'] = true;
        }elseif ($result[0]['configvalue'] == 'off') {
            $data['onoff'] = false;
        }
    } catch (\Exception $e) {
  
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }


echo json_encode($data);