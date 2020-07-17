<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\Grade;

$sqlConn = new SqlConn;
$grade = new Grade;
$data = array();

try {
    $sql = "SELECT student_subject.*,
                    student.*
                 FROM student_subject 
            LEFT JOIN student 
                ON student.std_id = student_subject.std_id
            WHERE student_subject.ts_id = :ts_id";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ts_id', $_POST['ts_id']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);

    // $data['data'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

foreach ($r as $key => $valueStd) {
    $r = array();
    $r =  $grade->std_current_year($valueStd);
    $r = $grade->std_level($r);
    $arr[] = $r;
}
$data['data'] = $arr;

echo json_encode($data);
