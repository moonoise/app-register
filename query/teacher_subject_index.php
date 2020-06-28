<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "SELECT teacher_subject.*,
                    teacher.teacher_title_name,
                    teacher.teacher_fname,
                    teacher.teacher_lname,
                    subject.subject_name_en
                     FROM teacher_subject 
                LEFT JOIN teacher 
                    ON teacher.teacher_id = teacher_subject.teacher_id
                LEFT JOIN subject 
                    ON subject.subject_id = teacher_subject.subject_id
                 ";
    // WHERE teacher.teacher_id = :teacher_id
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':teacher_id', $_SESSION[__TEACHER_ID__]);
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
