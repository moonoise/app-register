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

$std = $grade->std($_POST['std_id']);
$std = $grade->std_current_year($std);
$std = $grade->std_level($std);

$currentYear = $grade->config('current_year');
$currentTerm = $grade->config('current_term');

$grade1 = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
$grade2 = array('F');
$grade3 = array('W');
$arrTerm = [3, 2, 1];
$arrGrade = array();
$condition = array();
$sr = array();
$current_year = intval($std['current_year']);
$std_year = intval($std['std_year']);
$level = intval($std['level']);
$l = 4;
$yl = $std_year + 3;
while ($yl >= $std_year) {

    // if ($yl >= $std_year && $yl != $current_year && $yl < $current_year) {
    //     foreach ($arrTerm as $key => $valueTerm) {

    //         $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $yl, $valueTerm);
    //         foreach ($arrGrade['grade'] as $keySubject => $valueSubject) {
    //             $arrSubjectId[] = $valueSubject['subject_id'];
    //         }
    //         $arrGrade['subject_not_register'] = $setSubject->set_subject_not_register($l, $yl, $valueTerm, $arrSubjectId);

    //         $arrGrade['year'] = $yl;
    //         $arrGrade['term'] = $valueTerm;
    //         $arrGrade['level'] = $l;

    //         $arrResult[] = $arrGrade;
    //     }
    // }


    foreach ($arrTerm as $key => $valueTerm) {
        if ($yl >= $std_year && $yl != $current_year   && $yl > $current_year) {

            $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $yl, $valueTerm);
            foreach ($arrGrade['grade'] as $keySubject => $valueSubject) {
                $arrSubjectId[] = $valueSubject['subject_id'];
            }
            $arrGrade['subject_not_register'] = $setSubject->set_subject_not_register($l, $yl, $valueTerm, $arrSubjectId);

            $arrGrade['year'] = $yl;
            $arrGrade['term'] = $valueTerm;
            $arrGrade['level'] = $l;

            $arrResult[] = $arrGrade;
        }

        if ($yl == $current_year  && $currentTerm != $valueTerm) {
            $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $yl, $valueTerm);
            foreach ($arrGrade['grade'] as $keySubject => $valueSubject) {
                $arrSubjectId[] = $valueSubject['subject_id'];
            }
            $arrGrade['subject_not_register'] = $setSubject->set_subject_not_register($l, $yl, $valueTerm, $arrSubjectId);

            $arrGrade['year'] = $yl;
            $arrGrade['term'] = $valueTerm;
            $arrGrade['level'] = $l;

            $arrResult[] = $arrGrade;
        }
    }

    // $y--;
    // $level--;
    $l--;
    $yl--;
}

echo json_encode($arrResult);

// echo json_encode($arrResult);
