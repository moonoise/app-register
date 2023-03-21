<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array(
    'success' => null,
    'error' => null);

if (!empty($_POST['form_id'])) {
    try {
        $sql = "DELETE FROM  register_form1 WHERE form_id = :form_id ";
        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(":form_id" , $_POST['form_id']);
        $stm->execute();
        
        if ($stm->rowCount()) {
            $data['success'] = true;
        }else {
            $data['success'] = false;
            $data['error'] = "rowCount missing.";
        }
    } catch (\Exception $e) {
  
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }
} else {
    $data['success'] = false;
    $data['error'] = "ไม่พบ ID";
}

echo json_encode($data);