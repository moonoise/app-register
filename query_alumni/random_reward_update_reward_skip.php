<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";
include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

if ($_POST['alumni_type'] == '1') {
    try {
        $sqlUpdate = "UPDATE alumni_reg_63 SET reward_status = 2 ,
                                                reward_remark = 'สละสิทธิ์' ,
                                                updated_at = current_timestamp 
                    WHERE alumni_reg_id = :alumni_reg_id ";
        $stm = $sqlConn->conn->prepare($sqlUpdate);

        $stm->bindParam(":alumni_reg_id", $_POST['alumni_reg_id']);
        $stm->execute();
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
} elseif ($_POST['alumni_type'] == '2') {
    try {
        $sqlUpdate = "UPDATE alumni_guest_63 SET reward_status = 2 ,
                                                reward_remark = 'สละสิทธิ์' ,
                                                updated_at = current_timestamp 
                    WHERE guest_id = :guest_id ";
        $stm = $sqlConn->conn->prepare($sqlUpdate);

        $stm->bindParam(":guest_id", $_POST['guest_id']);
        $stm->execute();
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
}

echo json_encode($data);
