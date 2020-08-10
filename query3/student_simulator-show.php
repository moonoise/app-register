<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\GradeSimulator;
use App\SqlConn;
use App\SetSubject;

$sqlConn = new SqlConn;
$grade = new GradeSimulator;
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
$arrTerm = [1, 2, 3];
$arrGrade = array();
$condition = array();
$data = array();
$sr = array();
$current_year = intval($std['current_year']);
$std_year = intval($std['std_year']);
$level = intval($std['level']);
$l = 1;
$yl = $std_year;

$sumGrade = 0;
$sumCredit = 0;

// while ($yl < $std_year + 3) {
//     $arrSubjectNotRegisterStatus = array();
//     $SubjectNotRegisterStatus = array();

//     foreach ($arrTerm as $key => $valueTerm) {

//         $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $yl, $valueTerm);

//         if (count($arrGrade['grade']) > 0) {

//             $sum = $grade->grade_result($arrGrade['grade']);

//             $arrGrade['gpa'] = round($sum['gpa'], 2);
//             $arrGrade['sumGrade'] = $sum['sumGrade'];
//             $sumGrade += $sum['sumGrade'];
//             $sumCredit += $sum['sumCredit'];
//             $arrGrade['sumCredit'] = $sum['sumCredit'];

//             $allSumCredit += $sum['sumCredit'];
//             $AllSumGrade += $sum['sumGrade'];
//             $arrGrade['all_sum_grade'] = $AllSumGrade;
//             $arrGrade['all_sum_credit'] = $allSumCredit;

//             $arrGrade['cum_gpa'] = number_format(($AllSumGrade / $allSumCredit), 2, '.', '');

//             $countTerm++;
//         }
//         foreach ($arrGrade['grade'] as $keySubject => $valueSubject) {
//             $arrSubjectId[] = $valueSubject['subject_id'];
//         }
//         $arrGrade['std'] = $std;
//         // $arrResult['gpa_all_term'] = number_format(($sumGrade / $sumCredit), 2, '.', '');
//         $subject_not_register = $setSubject->set_subject_not_register($l, $yl, $valueTerm, $arrSubjectId);

//         $r = array();
//         foreach ($subject_not_register as $key => $valueNotRegister) {
//             $arrSubjectNotRegisterStatus =  $grade->check_permission_register($_POST['std_id'], $valueNotRegister['subject_id'], $yl, $valueTerm);
//             $SubjectNotRegisterStatus['status'] = $arrSubjectNotRegisterStatus;
//             $r[] = array_merge_recursive($valueNotRegister, $SubjectNotRegisterStatus);
//         }

//         $arrGrade['subject_not_register'] = $r;
//         $arrGrade['year'] = $yl;
//         $arrGrade['term'] = $valueTerm;
//         $arrGrade['level'] = $l;

//         $arrResult[] = $arrGrade;
//     }
//     // $y--;
//     // $level--;
//     $l++;
//     $yl++;
// }


echo json_encode($arrResult);

// echo json_encode($arrResult);
