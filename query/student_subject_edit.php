<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

try {
    $sql = "SELECT student_subject.*,
                    student.std_fname,
                    student.std_lname
                 FROM student_subject 
            LEFT JOIN student 
                ON student.std_id = student_subject.std_id
            WHERE student_subject.ts_id = :ts_id AND grade_text != 'W' ";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id',$_POST['ts_id']);
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
    $stm->bindParam(':ts_id',$_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
     $data['data2'] = $r;
} catch (\Exception $e) {
   $data['error'] = $e->getMessage();
}

echo json_encode($data);
