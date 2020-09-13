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
$arrTerm = [1, 2, 3];
$arrGrade = array();
$condition = array();
$sr = array();
$y = intval($std['std_year']);
$level = 1;

$sumGrade = 0;
$sumCredit = 0;
while ($y <= intval($std['current_year'])) {
    // $y = intval($std['current_year']);
    // $level = intval($std['level']);

    foreach ($arrTerm as $key => $valueTerm) {
        if ($y < intval($std['current_year']) || ($y == intval($std['current_year']) &&  $valueTerm < $std['current_term'])) {
            $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $y, $valueTerm);
            if (count($arrGrade['grade']) > 0) {

                $sum = $grade->grade_result($arrGrade['grade']);

                $arrGrade['gpa'] = round($sum['gpa'], 2);
                $arrGrade['sumGrade'] = $sum['sumGrade'];
                $sumGrade += $sum['sumGrade'];
                $sumCredit += $sum['sumCredit'];
                $arrGrade['sumCredit'] = $sum['sumCredit'];

                $allSumCredit += $sum['sumCredit'];
                $AllSumGrade += $sum['sumGrade'];
                $arrGrade['all_sum_grade'] = $AllSumGrade;
                $arrGrade['all_sum_credit'] = $allSumCredit;

                $arrGrade['cum_gpa'] = number_format(($AllSumGrade / $allSumCredit), 2, '.', '');

                $countTerm++;
            }

            foreach ($arrGrade['grade'] as $keySubject => $valueSubject) {
                $arrSubjectId[] = $valueSubject['subject_id'];
            }

            $arrNotRegister = $setSubject->set_subject_not_register($level, $y, $valueTerm, $arrSubjectId);
            if (count($arrNotRegister) > 0) {
                foreach ($arrNotRegister as $key => $value) {
                    $haveGrade =  $grade->checkGradeBySubjectId($_POST['std_id'], $value['subject_id']);
                    if ($haveGrade != null) {
                        $arrNotRegister[$key]['have_grade'] = $haveGrade['grade_text'];
                        $arrNotRegister[$key]['have_term'] = $haveGrade['yt_term'];
                        $arrNotRegister[$key]['have_year'] = $haveGrade['yt_year'];
                    } else {
                        $arrNotRegister[$key]['have_grade'] = null;
                        $arrNotRegister[$key]['have_term'] = null;
                        $arrNotRegister[$key]['have_year'] = null;
                    }
                }
            }

            $arrGrade['subject_not_register'] = $arrNotRegister;

            $arrGrade['year'] = $y;
            $arrGrade['term'] = $valueTerm;

            $arrResult[] = $arrGrade;
        }
    }
    $y++;
    $level++;
}

echo json_encode($arrResult);

// echo json_encode($arrResult);
