<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\Grade;
use App\SetSubject;

$grade = new Grade;
$setSubject = new SetSubject;

$check = array();
$year = $grade->config('current_year');
$term = $grade->config('current_term');
$result = $grade->callStudent('6180100187');
$stdId = '6180100187';
$currentSubject = $setSubject->set_subject_guide($result['level'],$year,$term);

foreach ($currentSubject as $key => $value) {
   $check[$key]['check'] =  $grade->check_registered($stdId,$value['subject_id'],$year,$term);  
   $check[$key]['subject_id'] = $value['subject_id'];
}


$subjectID = '01203222';
// $arrGrade = array('A','B+','B','C+','C','D+','D');
$arrGrade = array('F');


echo "<pre>";
print_r($check);
echo "</pre>";

// echo json_encode($currentSubject);
