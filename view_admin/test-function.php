<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\Grade;

$grade = new Grade;

$result = $grade->callStudent('6180100187');
$subjectID = '02207422';
$subject = $grade->required_subject($subjectID);
// $g = $grade->std_grade($result);
// $stdLevel = $grade->std_level('2020',$result);
// $stdCurrentYear = $grade->std_current_year($result);
// // echo json_encode($result);
echo "<pre>";
print_r($subject);
echo "</pre>";