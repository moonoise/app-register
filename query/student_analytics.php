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

$grade1 = array('A','B+','B','C+','C','D+','D');
$grade2 = array('F');
$grade3 = array('W');
$arrTerm = [3,2,1];
$arrGrade = array();
$condition = array();
$sr = array();

while ( intval($std['std_year']) < intval($std['current_year']) ) {
    $y = intval($std['current_year']--);
    

    foreach ($arrTerm as $key => $valueTerm) {
        $arrGrade['grade'] = $grade->std_grade_by_year_term($_POST['std_id'],$y-1,$valueTerm);
        $arrGrade['year'] = $y-1;
        $arrGrade['term'] = $valueTerm;
        
        $arrResult[] = $arrGrade;

    }
    
}

echo json_encode($arrResult);

// echo json_encode($arrResult);
