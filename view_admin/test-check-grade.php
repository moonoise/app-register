<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\Grade;

$grade = new Grade;


$result = $grade->callStudent('6180100187');
$subjectID = '01403114';
// $arrGrade = array('A','B+','B','C+','C','D+','D');
$arrGrade = array('F');
$year = $grade->config('current_year');
$term = $grade->config('current_term');

$checkRegisterd = $grade->std_grade_check('6180100187',$subjectID,$arrGrade);

// $stdLevel = $grade->std_level('2020',$result);
// $stdCurrentYear = $grade->std_current_year($result);
// // echo json_encode($result);
// echo "<pre>";
// print_r($checkRegisterd);
// echo "</pre>";

// if ($checkRegisterd === true ) {
//     echo 'true';
// }elseif ($checkRegisterd === false) {
//    echo 'false';
// }else {
//     echo var_dump($checkRegisterd);
// }


// echo $checkRegisterd;