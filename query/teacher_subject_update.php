<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\TableQuery;
use App\TeacherSubject;

$sqlConn = new SqlConn;
$tableQuery = new TableQuery;
$teacherSubject = new TeacherSubject;

$teacher_id = $_SESSION[__TEACHER_ID__];
$subject_id = $_POST['update_subject_id'];
$update_year = $_POST['update_year'];
$update_term = $_POST['update_term'];
$ts_id = $_POST['update_ts_id'];

$success = array();



if ($teacherSubject->check_update_techer_subject($teacher_id,$subject_id,$update_year,$update_term,$ts_id) > 0) {
    $success['success'] = false;
}else {
    $data['subject_id'] = $subject_id ;
    $data['teacher_id'] = $teacher_id;
    $data['yt_year'] = $update_year;
    $data['yt_term'] = $update_term;
  
    $success = $tableQuery->pdoUpdateByID('teacher_subject',$data,'ts_id',$ts_id);
}

echo json_encode($success);
