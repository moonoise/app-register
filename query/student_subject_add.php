<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\StudentSubject;
use App\TableQuery;

$sqlConn = new SqlConn;
$ss = new StudentSubject;
$tableQuery = new TableQuery;
$d = array();
$data = array(
  'std_id' => $_POST['std_id'],
  'ts_id' => $_POST['ts_id'],
  'subject_id' => $_POST['subject_id'],
  'yt_term' => $_POST['yt_term'],
  'yt_year' => $_POST['yt_year']
);

$count = $ss->StudentSubject($_POST['student_id'], $_POST['ts_id']);
$d[] = $data;
if ($count == 0) {
  $result =   $tableQuery->pdoMultiInsert('student_subject', $d);
  $data = $result;
} else {
  $data['success'] = false;
}


echo json_encode($data);
