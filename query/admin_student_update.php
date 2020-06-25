<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "UPDATE stdent SET std_id = :std_id , 
                            std_id_card = :std_id_card ,
                            std_year = :std_year ,
                            std_title_name = :std_title_name ,
                            std_fname = :std_fname,
                            std_lname = :std_lname 
            WHERE student_id_auto = :student_id_auto";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':std_id',$_POST['std_id_edit']);
    $stm->bindParam(':std_id_card',$_POST['std_id_card_edit']);
    $stm->bindParam(':std_year',$_POST['std_year_edit']);
    $stm->bindParam(':std_title_name',$_POST['std_title_name_edit']);
    $stm->bindParam(':std_fname',$_POST['std_fname_edit']);
    $stm->bindParam(':std_lname',$_POST['std_lname_edit']);
    $stm->bindParam(':student_id_auto',$_POST['std_id_auto_update']);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
