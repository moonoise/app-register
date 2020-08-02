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

$data = array(
    'ss_id' => null,
    'data' => null,
    'error' => null,
    'success' => null
);

$grade1 = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
$grade2 = array('F');
$grade3 = array('W');

$ex = explode(":", $_POST['subject_ts_id_add']);
$ts_id = $ex[0];
$subject_id = $ex[1];

$checkGrade = $grade->check_grade($_POST['std_id_add'], $subject_id, $grade1);

if ($checkGrade['count'] > 0) {
    $data['msg'] = "มีเกรดอยู่แล้ว";
    $data['success'] = false;
} else {

    $checkPermissible = $grade->check_permission_register($_POST['std_id_add'], $subject_id, $_POST['yt_year_add'], $_POST['yt_term_add']);
    if ($checkPermissible['permissible'] == true and $checkPermissible['registered'] == false) {
        try {
            $sql = "INSERT INTO student_subject (std_id ,ts_id,subject_id,yt_year,yt_term) 
                    VALUES (:std_id,:ts_id,:subject_id, :yt_year, :yt_term)";

            $stm = $sqlConn->conn->prepare($sql);
            $stm->bindParam(":std_id", $_POST['std_id_add']);
            $stm->bindParam(":ts_id", $ts_id);
            $stm->bindParam(":subject_id", $subject_id);
            $stm->bindParam(":yt_year", $_POST['yt_year_add']);
            $stm->bindParam(":yt_term", $_POST['yt_term_add']);
            $stm->execute();

            $ss_id = $sqlConn->conn->lastInsertId();
            $data['ss_id'] = $ss_id;
            $data['success'] = true;
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
            $data['success'] = false;
        }
    } else {
        $data = $checkPermissible;
        $data['success'] = false;
    }
}


echo json_encode($data);
