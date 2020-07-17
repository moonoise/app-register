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


$arrTerm = [3, 1, 2];
$arrGrade = array();
$condition = array();
$sr = array();
$sumGrade = 0;
$sumCredit = 0;
$data = array();


// while (intval($std['std_year']) < intval($std['current_year'])) {
//     $y = intval($std['current_year']--);
// foreach ($arrTerm as $key => $valueTerm) {
//     $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $y-1, $valueTerm);  // $y - 1

//     if (count($arrGrade['grade']) > 0) {
//         $arrGrade['year'] = $y -1; // $y - 1
//         $arrGrade['term'] = $valueTerm;

//         $sum = $grade->grade_result($arrGrade['grade']);
//         $arrGrade['gpa'] = $sum['gpa'];
//         $arrGrade['sumGrade'] = $sum['sumGrade'];
//         $sumGrade += $sum['sumGrade'];
//         $sumCredit += $sum['sumCredit'];
//         $arrGrade['sumCredit'] = $sum['sumCredit'];

//         $arrResult[] = $arrGrade;
//     }
// }

// }
$AllSumCredit = 0;
$AllSumGrade = 0;
while (intval($std['std_year']) < intval($std['current_year'])) {
    $y = intval($std['std_year']++);
    $cumGPA = 0;
    $countTerm = 1;

    foreach ($arrTerm as $key => $valueTerm) {
        $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'], $y, $valueTerm);  // $y - 1

        if (count($arrGrade['grade']) > 0) {
            $arrGrade['year'] = $y; // $y - 1
            $arrGrade['term'] = $valueTerm;

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

            $arrResult[] = $arrGrade;

            $countTerm++;
        }
    }
}

$data['data'] = $std;
$data['grade'] = $arrResult;
$data['gpa_all_term'] = number_format(($sumGrade / $sumCredit), 2, '.', '');
echo json_encode($data);

// echo json_encode($arrResult);
