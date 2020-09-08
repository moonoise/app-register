<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\TableQuery;
use App\TeacherSubject;

$sqlConn = new SqlConn;
$tableQuery = new TableQuery;
$teacherSubject = new TeacherSubject;

// $subject_id = $_POST['update_subject_id'];
// $update_year = $_POST['update_year'];
// $update_term = $_POST['update_term'];
$ts_id = $_POST['ts_id'];

$teacher_id = (isset($_POST['update_teacher_id']) && $_POST['update_teacher_id'] != "" ? $_POST['update_teacher_id'] : NULL);
$teacher_id2 = (isset($_POST['update_teacher_id2']) && $_POST['update_teacher_id2'] != "" ? $_POST['update_teacher_id2'] : NULL);
$teacher_id3 = (isset($_POST['update_teacher_id3']) && $_POST['update_teacher_id3'] != "" ? $_POST['update_teacher_id3'] : NULL);

$success = array();

try {
    $sql = "UPDATE teacher_subject SET teacher_id = :teacher_id ,
                                        teacher_id2 = :teacher_id2,
                                        teacher_id3 = :teacher_id3 
            WHERE  ts_id = :ts_id ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':teacher_id', $teacher_id);
    $stm->bindParam(':teacher_id2', $teacher_id2);
    $stm->bindParam(':teacher_id3', $teacher_id3);
    $stm->bindParam(':ts_id', $ts_id);
    $stm->execute();

    if ($stm->rowCount() > 0) {
        $success['success'] = true;
    } else {
        $success['success'] = false;
        $success['error'] = $stm->rowCount();
    }
} catch (\Exception $e) {
    $success['error'] = $e->getMessage();
}
echo json_encode($success);
