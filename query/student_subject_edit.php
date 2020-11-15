<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sqlSubject = "SELECT teacher_subject.*,
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
    $stmSubject = $sqlConn->conn->prepare($sqlSubject);
    $stmSubject->bindParam(':ts_id', $_POST['ts_id']);
    $stmSubject->execute();
    $r = $stmSubject->fetchAll(PDO::FETCH_ASSOC);
    $data['detail_subject'] = $r[0];
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

try {
    $sql = "SELECT student_subject.*,
                    student.std_fname,
                    student.std_lname
                 FROM student_subject 
            LEFT JOIN student 
                ON student.std_id = student_subject.std_id
            WHERE student_subject.ts_id = :ts_id  ";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id', $_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data1'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

try {
    $sql = "SELECT student_subject.*,
                    student.std_fname,
                    student.std_lname
                 FROM student_subject 
            LEFT JOIN student 
                ON student.std_id = student_subject.std_id
            WHERE student_subject.ts_id = :ts_id AND grade_text = 'W' ";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id', $_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data2'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

try {
    $sql = "SELECT student_subject.*,
                    student.std_fname,
                    student.std_lname
                 FROM student_subject 
            LEFT JOIN student 
                ON student.std_id = student_subject.std_id
            WHERE student_subject.ts_id = :ts_id AND grade_text IN ('A','B+','B','C+','C','D+','D','F+','F')";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id', $_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data3'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
