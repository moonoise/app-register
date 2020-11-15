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
                    year_term.yt_name_sort,
                    year_term.yt_name,
                    subject.subject_name_en,
                    subject.subject_credit
                     FROM teacher_subject 
                LEFT JOIN teacher 
                    ON teacher.teacher_id = teacher_subject.teacher_id
                LEFT JOIN subject 
                    ON subject.subject_id = teacher_subject.subject_id
               LEFT JOIN year_term 
                    ON year_term.yt_year = teacher_subject.yt_year AND year_term.yt_term = teacher_subject.yt_term
                WHERE teacher_subject.ts_id = :ts_id ";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id', $_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
