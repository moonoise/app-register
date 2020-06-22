<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\TableQuery;


$sqlConn = new SqlConn;
$tableQuery = new TableQuery;

$teacher_id = $_SESSION[__TEACHER_ID__];
$subject_id = $_POST['new_subject_id'];
$new_year = $_POST['new_year'];
$new_term = $_POST['new_term'];

$success = array();
$data = array();
$d = array();
$data['subject_id'] = $subject_id ;
$data['teacher_id'] = $teacher_id;
$data['yt_year'] = $new_year;
$data['yt_term'] = $new_term;

$d[] = $data;

$success = $tableQuery->pdoMultiInsert('teacher_subject',$d);

echo json_encode($success);
