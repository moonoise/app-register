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
                t1.teacher_title_name,
                t1.teacher_fname,
                t1.teacher_lname,
                t2.teacher_title_name as teacher_title_name2,
                t2.teacher_fname AS teacher_fname2,
                t2.teacher_lname AS teacher_lname2,
                t3.teacher_title_name as teacher_title_name3,
                t3.teacher_fname AS teacher_fname3,
                t3.teacher_lname AS teacher_lname3,
                subject.subject_name_en
            FROM teacher_subject 
                LEFT JOIN teacher t1
                ON t1.teacher_id = teacher_subject.teacher_id
                LEFT JOIN teacher t2
                ON t2.teacher_id = teacher_subject.teacher_id2
                    LEFT JOIN teacher t3
                ON t3.teacher_id = teacher_subject.teacher_id3
                LEFT JOIN subject 
                ON subject.subject_id = teacher_subject.subject_id
                 ";
    if ($_POST['yt_year'] != "") {
        $sql .= " WHERE teacher_subject.yt_year = :yt_year  AND teacher_subject.yt_term = :yt_term";
    }
    // WHERE teacher.teacher_id = :teacher_id
    $stm = $sqlConn->conn->prepare($sql);
    // $stm->bindParam(':teacher_id', $_SESSION[__TEACHER_ID__]);
    if ($_POST['yt_year'] != "") {
        $stm->bindParam(':yt_year', $_POST['yt_year']);
        $stm->bindParam(':yt_term', $_POST['yt_term']);
    }
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
