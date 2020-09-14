<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();


try {
    $sqlCheck = "SELECT subject_id FROM subject WHERE subject_id = :subject_id ";
    $stmCheck = $sqlConn->conn->prepare($sqlCheck);
    $stmCheck->bindParam(":subject_id", $_POST['subject_id_add']);
    $stmCheck->execute();

    $ch = $stmCheck->rowCount();
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}


if ($ch) {
    $data['success'] = false;
    $data['error'] = "มีรหัสนี้อยุ่แล้ว";
} else {
    try {

        $s_credit = ($_POST['subject_credit_add'] != ""  ? $_POST['subject_credit_add'] : NULL);
        $s_level = ($_POST['subject_level_guide_add'] != ""  ? $_POST['subject_level_guide_add'] : NULL);
        $s_term = ($_POST['subject_term_guide_add'] != ""  ? $_POST['subject_term_guide_add'] : NULL);
        $s1 = ($_POST['required_subject1_add'] != ""  ? $_POST['required_subject1_add'] : NULL);
        $s2 = ($_POST['required_subject2_add'] != ""  ? $_POST['required_subject2_add'] : NULL);
        $s3 = ($_POST['required_subject3_add'] != ""  ? $_POST['required_subject3_add'] : NULL);

        $sqlInsert = "INSERT INTO subject (subject_id,subject_name_en,subject_credit,subject_level_guide,subject_term_guide,required_subject1,required_subject2,required_subject3 ) 
                        VALUES (:subject_id,:subject_name_en,:subject_credit,:subject_level_guide,:subject_term_guide,:required_subject1,:required_subject2,:required_subject3)";
        $stmInsert = $sqlConn->conn->prepare($sqlInsert);
        $stmInsert->bindParam(":subject_id", $_POST['subject_id_add']);
        $stmInsert->bindParam(":subject_name_en", $_POST['subject_name_en_add']);
        $stmInsert->bindParam(":subject_credit", $s_credit);
        $stmInsert->bindParam(":subject_level_guide", $s_level);
        $stmInsert->bindParam(":subject_term_guide", $s_term);
        $stmInsert->bindParam(":required_subject1", $s1);
        $stmInsert->bindParam(":required_subject2", $s2);
        $stmInsert->bindParam(":required_subject3", $s3);

        if ($stmInsert->execute()) {
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
