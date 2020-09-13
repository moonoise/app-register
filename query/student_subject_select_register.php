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
$arr = array();
$data = array(
    'yt_year' => null,
    'yt_term' => null,
    'data' => null,
    'error' => null,
    'success' => null
);

$grade1 = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
$grade2 = array('F');
$grade3 = array('W');

$currentYear = $grade->config('current_year');
$currentTerm = $grade->config('current_term');



try {
    $sql = "SELECT teacher_subject.*,
                        subject.subject_name_en 
                 FROM `teacher_subject` 
                LEFT JOIN subject ON subject.subject_id = teacher_subject.subject_id 
                WHERE 
                 teacher_subject.yt_term = :yt_term
                "; //AND teacher_subject.yt_year = :yt_year 
    $stm = $sqlConn->conn->prepare($sql);
    // $stm->bindParam(":yt_year", $currentYear);
    $stm->bindParam(":yt_term", $currentTerm);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
    $data['success'] = false;
}

foreach ($result as $key => $value) {
    $checkGrade = $grade->check_grade($_POST['std_id'], $value['subject_id'], $grade1);

    if ($checkGrade['count'] > 0) {
        $data['msg'] = "มีเกรดอยู่แล้ว";
        $data['success'] = false;
    } else {
        $checkPermissible = $grade->check_permission_register($_POST['std_id'], $value['subject_id'], $currentYear, $currentTerm);
        // $arr[] = $checkPermissible;
        if ($checkPermissible['permissible'] == true and  $checkPermissible['registered'] == false) {
            $arr[] = $result[$key];
        }
    }
}
$data['data'] = $arr;
$data['yt_year'] = $currentYear;
$data['yt_term'] = $currentTerm;
$data['success'] = true;
echo json_encode($data);
