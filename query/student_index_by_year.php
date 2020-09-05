<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();
$sql = "SELECT * FROM student ";

if ($_POST['teacher_id'] != "" || $_POST['std_year'] != "") {
    $sql .= " WHERE std_status = 1 ";

    if ($_POST['std_year'] != "") {
        $stdYear = $_POST['std_year'];
        $sql .= " AND std_year = :std_year ";
    } else {
        $stdYear = "";
    }

    if ($_POST['teacher_id'] != "") {
        $teacher_id = $_POST['teacher_id'];
        $sql .= " AND ( teacher_id = :teacher_id OR teacher_id2 = :teacher_id) ";
    } else {
        $teacher_id = "";
    }
}

try {

    $stm = $sqlConn->conn->prepare($sql);
    if ($stdYear != "") {

        $stm->bindParam(':std_year', $stdYear);
    }

    if ($teacher_id != "") {
        $stm->bindParam(':teacher_id', $teacher_id);
    }

    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r;
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
