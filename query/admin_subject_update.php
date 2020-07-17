<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();


try {
    $sqlUpdate = "UPDATE  subject  SET subject_id = :subject_id ,
                                    subject_name_en = :subject_name_en,
                                    subject_credit = :subject_credit, 
                                    subject_level_guide = :subject_level_guide ,
                                    subject_term_guide = :subject_term_guide,
                                    required_subject1 = :required_subject1,
                                    required_subject2 = :required_subject2,
                                    required_subject3 = :required_subject3
                WHERE subject_id_auto = :subject_id_auto ";
    $stmUpdate = $sqlConn->conn->prepare($sqlUpdate);
    $stmUpdate->bindParam(":subject_id", $_POST['subject_id_edit']);
    $stmUpdate->bindParam(":subject_name_en", $_POST['subject_name_en_edit']);
    $stmUpdate->bindParam(":subject_credit", $_POST['subject_credit_edit']);
    $stmUpdate->bindParam(":subject_level_guide", $_POST['subject_level_guide_edit']);
    $stmUpdate->bindParam(":subject_term_guide", $_POST['subject_term_guide_edit']);
    $stmUpdate->bindParam(":required_subject1", $_POST['required_subject1_edit']);
    $stmUpdate->bindParam(":required_subject2", $_POST['required_subject2_edit']);
    $stmUpdate->bindParam(":required_subject3", $_POST['required_subject3_edit']);
    $stmUpdate->bindParam(":subject_id_auto", $_POST['subject_id_auto_edit']);

    if ($stmUpdate->execute()) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
    }
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
