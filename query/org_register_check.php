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
    $sql = "SELECT * FROM register_form2 WHERE org_id_root = :org_id_root ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":org_id_root", $_POST['org_id_root']);
    $stm->execute();

    if ($stm->rowCount()) {
        $data['success'] = false;
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
        $data['email'] = "";
        foreach ($data['data'] as $key => $value) {
            $data['email'] .= " : ".$value['email'];
        }
    }else{
        $data['success'] = true;
    }
   
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);