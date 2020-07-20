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
$subject_id = $_POST['new_subject_id'];
$new_year = $_POST['new_year'];
$new_term = $_POST['new_term'];
$teacher_id = (isset($_POST['new_teacher_id']) && $_POST['new_teacher_id'] != "" ? $_POST['new_teacher_id'] : NULL);
$teacher_id2 = (isset($_POST['new_teacher_id2']) && $_POST['new_teacher_id2'] != "" ? $_POST['new_teacher_id2'] : NULL);
$teacher_id3 = (isset($_POST['new_teacher_id3']) && $_POST['new_teacher_id3'] != "" ? $_POST['new_teacher_id3'] : NULL);


$success = array();
$data = array();
$d = array();
$data['subject_id'] = $subject_id;
$data['teacher_id'] = $teacher_id;
$data['teacher_id2'] = $teacher_id2;
$data['teacher_id3'] = $teacher_id3;

$data['yt_year'] = $new_year;
$data['yt_term'] = $new_term;
$d[] = $data;

if ($teacherSubject->check_techer_subject($teacher_id, $subject_id, $new_year, $new_term) > 0) {
    $success['success'] = false;
} else {
    $success = $tableQuery->pdoMultiInsert('teacher_subject', $d);
}

echo json_encode($success);
