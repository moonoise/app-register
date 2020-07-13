<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\StudentClass;

$sqlConn = new SqlConn;
$studentClass = new StudentClass;
$data = array();

$ch  = $studentClass->check_student($_POST['std_id_add']);

if ($ch) {
    $data['success'] = false;
    $data['error'] = "มีรหัสนี้อยุ่แล้ว";
} else {
    try {
        $sql = "INSERT INTO student 
                (std_id,std_id_card,std_year,std_title_name,std_fname,std_lname,std_title_name_th,std_fname_th,std_lname_th,admission_type,admission_detail) 
                VALUES (
                    :std_id,:std_id_card,:std_year,:std_title_name,:std_fname,:std_lname,:std_title_name_th,:std_fname_th,:std_lname_th,:admission_type,:admission_detail
                ) ";

        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(':std_id', $_POST['std_id_add']);
        $stm->bindParam(':std_id_card', $_POST['std_id_card_add']);
        $stm->bindParam(':std_year', $_POST['std_year_add']);
        $stm->bindParam(':std_title_name', $_POST['std_title_name_add']);
        $stm->bindParam(':std_fname', $_POST['std_fname_add']);
        $stm->bindParam(':std_lname', $_POST['std_lname_add']);
        $stm->bindParam(':std_title_name_th', $_POST['std_title_name_th_add']);
        $stm->bindParam(':std_fname_th', $_POST['std_fname_th_add']);
        $stm->bindParam(':std_lname_th', $_POST['std_lname_th_add']);

        $stm->bindParam(':admission_type', $_POST['admission_type_add']);

        if ($stm->execute()) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
    } catch (\Exception $e) {
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }
}



echo json_encode($data);
