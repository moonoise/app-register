<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

$sql = "SELECT alumni_reg_63.ku_id_auto ,
                    alumni_reg_63.alumni_reg_id,
                    alumni_reg_63.reward_status,
                    alumni_reg_63.reward_remark ,
                    alumni_reg_63.alumni_type ,
                     alumni.std_title_name_th,
                     alumni.std_fname_th,
                     alumni.std_lname_th,
                     alumni.batch,
                     alumni.id2,
                     CONCAT(alumni.std_title_name_th,alumni.std_fname_th,' ',alumni.std_lname_th) AS name
        FROM alumni_reg_63 LEFT JOIN alumni ON alumni.ku_id_auto = alumni_reg_63.ku_id_auto  WHERE alumni_reg_63.reward_status IS NULL  ";

$sqlGuest = "SELECT 
                *,
            CONCAT(alumni_guest_63.guest_title_name_th,alumni_guest_63.guest_fname_th,' ',alumni_guest_63.guest_lname_th) AS name
                 FROM alumni_guest_63 WHERE alumni_guest_63.reward_status IS NULL ";

try {

    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $r1 = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm2 = $sqlConn->conn->prepare($sqlGuest);
    $stm2->execute();
    $r2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

$data['data'] = array_merge_recursive($r1, $r2);

echo json_encode($data);
