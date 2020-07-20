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
$count = $ss->StudentSubject($_POST['std_id'], $_POST['ts_id']);

if ($count['c'] == 0) {
  try {
    $sql = "SELECT yt_term , yt_year,ts_id,subject_id FROM teacher_subject WHERE ts_id = :ts_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":ts_id", $_POST['ts_id']);
    $stm->execute();

    $tsResult = $stm->fetchAll(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    $data['error'] = $e->getMessage();
  }

  if (count($tsResult) > 0) {
    $data = array(
      'std_id' => $_POST['std_id'],
      'ts_id' => $tsResult[0]['ts_id'],
      'subject_id' => $tsResult[0]['subject_id'],
      'yt_term' => $tsResult[0]['yt_term'],
      'yt_year' => $tsResult[0]['yt_year']
    );

    $d[] = $data;
    $result =   $tableQuery->pdoMultiInsert('student_subject', $d);
    $data = $result;
  }
} else {
  $data['success'] = false;
  $data['error'] = "มีรายชื่อนี้อยู่แล้ว";
}

echo json_encode($data);
