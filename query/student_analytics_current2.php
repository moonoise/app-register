<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\Grade;
use App\SetSubject;

$sqlConn = new SqlConn;
$grade = new Grade;
$setSubject = new SetSubject;
$data = array();

$currentYear = $grade->config('current_year');
$currentTerm = $grade->config('current_term');

$std = $grade->callStudent($_POST['std_id']);

$listSubject = $setSubject->set_subject_guide($std['level'], $currentYear, $currentTerm);

foreach ($listSubject as $keySubject => $valueSubject) {
    $arrSubjectId[] = $valueSubject['subject_id'];
}
$strSubjectId = "'" . implode("','", $arrSubjectId) . "'";

try {
    $sql = "SELECT student_subject.*,
                    subject.subject_name_en,
                    subject.subject_credit
                 FROM student_subject
            LEFT JOIN subject 
                ON subject.subject_id = student_subject.subject_id
            WHERE student_subject.std_id = :std_id 
                AND student_subject.yt_year = :yt_year 
                AND student_subject.yt_term = :yt_term 
                AND  student_subject.subject_id NOT IN (" . $strSubjectId . ")";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':std_id', $_POST['std_id']);
    $stm->bindParam(':yt_year', $currentYear);
    $stm->bindParam(':yt_term', $currentTerm);
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data = $result;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}


echo json_encode($data);
