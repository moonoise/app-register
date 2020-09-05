<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\Grade;
use App\SqlConn;
use App\SetSubject;

$sqlConn = new SqlConn;
$grade = new Grade;
$setSubject = new SetSubject;

$data = array();

try {
    $sql = "SELECT teacher_subject.*,
                subject.*,
                t1.teacher_title_name as teacher_title_name1 ,
                t1.teacher_fname as teacher_fname1 ,
                t1.teacher_lname as teacher_lname1 ,
                t2.teacher_title_name as teacher_title_name2 ,
                t2.teacher_fname as teacher_fname2 ,
                t2.teacher_lname as teacher_lname2 ,
                t3.teacher_title_name as teacher_title_name3 ,
                t3.teacher_fname as teacher_fname3 ,
                t3.teacher_lname as teacher_lname3 
                 FROM teacher_subject 
            LEFT JOIN subject ON subject.subject_id = teacher_subject.subject_id 
            LEFT JOIN teacher t1 ON t1.teacher_id = teacher_subject.teacher_id
            LEFT JOIN teacher t2 ON t2.teacher_id = teacher_subject.teacher_id2
            LEFT JOIN teacher t3 ON t3.teacher_id = teacher_subject.teacher_id3
            WHERE teacher_subject.subject_id = :subject_id AND teacher_subject.yt_year = :yt_year AND teacher_subject.yt_term = :yt_term ";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":subject_id", $_POST['subject_id']);
    $stm->bindParam(":yt_year", $_POST['yt_year']);
    $stm->bindParam(":yt_term", $_POST['yt_term']);

    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

if (count($result) > 0) {
    $data['data'] = $result;
} else {
    try {
        $sql = "INSERT INTO teacher_subject (subject_id,yt_year,yt_term) 
                        VALUES (:subject_id, :yt_year, :yt_term)";

        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(":subject_id", $_POST['subject_id']);
        $stm->bindParam(":yt_year", $_POST['yt_year']);
        $stm->bindParam(":yt_term", $_POST['yt_term']);

        $stm->execute();

        $ts_id = $sqlConn->conn->lastInsertId();
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }

    try {
        $sql = "SELECT teacher_subject.*,
                        subject.* 
         FROM teacher_subject 
            LEFT JOIN subject ON subject.subject_id = teacher_subject.subject_id 
            WHERE teacher_subject.ts_id = :ts_id ";

        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(":ts_id", $ts_id);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $data['data'] = $result;
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
}


echo json_encode($data);
