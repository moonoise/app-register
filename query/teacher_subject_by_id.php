<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();


try {
    $sql = "SELECT subject.*,
	                teacher_subject.* 
        FROM teacher_subject 
        LEFT JOIN subject ON subject.subject_id = teacher_subject.subject_id
        WHERE teacher_subject.teacher_id = :teacher_id 
                OR teacher_subject.teacher_id2 = :teacher_id 
                OR teacher_subject.teacher_id3 = :teacher_id ";

    if ($_POST['yt_year'] != "") {
        $sql .= " AND teacher_subject.yt_year = :yt_year  AND teacher_subject.yt_term = :yt_term";
    }
    // WHERE teacher.teacher_id = :teacher_id
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':teacher_id', $_POST['teacher_id']);

    if ($_POST['yt_year'] != "") {
        $stm->bindParam(':yt_year', $_POST['yt_year']);
        $stm->bindParam(':yt_term', $_POST['yt_term']);
    }
    $stm->execute();
    $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
