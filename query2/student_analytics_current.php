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


$arrResult = array();
$arrResult2 = array();

$std = $grade->std($_POST['std_id']); // 6180100195
// $std = $grade->std('6180100195'); // 
$std = $grade->std_current_year($std);
$std = $grade->std_level($std);

$currentYear = $grade->config('current_year');
$currentTerm = $grade->config('current_term');

$grade1 = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
$grade2 = array('F');
$grade3 = array('W');
$arrTerm = [1, 2, 3];

$condition = array();
$sr = array();

$currentSubject = $setSubject->set_subject_guide($std['level'], $currentYear, $currentTerm);

foreach ($currentSubject as $keySubject => $valueSubject) {
    $arrGrade = array();
    $check['registered'] = $grade->check_registered($std['std_id'], $valueSubject['subject_id'], $currentYear, $currentTerm);
    $check['check_level'] = $grade->check_level_subject($std['std_id'], $valueSubject['subject_id']);

    $required_subject = $grade->required_subject($valueSubject['subject_id']);

    if ($required_subject['count'] > 0) {


        foreach ($required_subject['data'] as $keyRequired => $valueRequired) {
            $chPer = 0;
            $c = array();
            $c = $grade->check_grade($std['std_id'], $valueRequired['subject_id'], $grade1); // หา 'A','B+','B','C+','C','D+','D'
            if ($c['count'] > 0) {
                $chPer = 1;
                $sr['permissible_comment'] = "เกรดรายวิชาต่อเนื่องครบ";
            } else {
                $c = $grade->check_grade($std['std_id'], $valueRequired['subject_id'], $grade2);  // หา F
                if ($c['count'] > 0) {
                    $chPer = 0;
                    $sr['permissible_comment'] = "ติด F รายวิชาต่อเนื่อง";
                    $checkRegister = $grade->check_registered($std['std_id'], $valueRequired['subject_id'], $currentYear, $currentTerm);
                    if ($checkRegister) {
                        $chPer = 1;
                        $sr['permissible_comment'] = "ติด F รายวิชาต่อเนื่อง แต่ได้ลงทะเบียนเรียนในภาคเรียนปัจจุบันแล้ว";
                    }
                } else {
                    $c = $grade->check_grade($std['std_id'], $valueRequired['subject_id'], $grade3);  // หา W
                    if ($c['count'] > 0) {
                        $chPer = 0;
                        $sr['permissible_comment'] = "DROP รายวิชาต่อเนื่อง ไม่สามารถลงทะเบียนได้";
                    } else {
                        $chPer = 0;
                        $sr['permissible_comment'] = "ไม่พบการลงทะเบียน รายวิชาต่อเนื่อง";
                    }
                }
            }
            $arrGrade['subject_required']['data'] = $c['data'];

            if ($chPer == 1) {
                $sr['permissible'] = true;  //
            } else {
                $sr['permissible'] = false;  //
            }
        }
    } else {
        $sr['permissible'] = true;
        $sr['permissible_comment'] = "ไม่ใช่รายวิชาต่อเนื่อง";
    }
    $check['subject_required']['count'] = $required_subject['count'];
    $arrResult[] = array_merge_recursive($valueSubject, $check, $sr, $arrGrade);
}
echo json_encode($arrResult);

// echo json_encode($arrResult);
