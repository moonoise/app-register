<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\StudentClass;

$sqlConn = new SqlConn;

$data = array();


try {
    $sqlCheck = "SELECT teacher_id FROM teacher WHERE teacher_id = :teacher_id ";
    $stmCheck = $sqlConn->conn->prepare($sqlCheck);
    $stmCheck->bindParam(":teacher_id", $_POST['teacher_id_add']);
    $stmCheck->execute();

    $ch = $stmCheck->rowCount();
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}


if ($ch) {
    $data['success'] = false;
    $data['error'] = "มีรหัสนี้อยุ่แล้ว";
} else {
    try {
        $sqlInsert = "INSERT INTO teacher (teacher_id,teacher_title_name,teacher_fname,teacher_lname ) 
                        VALUES (:teacher_id,:teacher_title_name,:teacher_fname,:teacher_lname)";
        $stmInsert = $sqlConn->conn->prepare($sqlInsert);
        $stmInsert->bindParam(":teacher_id", $_POST['teacher_id_add']);
        $stmInsert->bindParam(":teacher_title_name", $_POST['teacher_title_name_add']);
        $stmInsert->bindParam(":teacher_fname", $_POST['teacher_fname_th_add']);
        $stmInsert->bindParam(":teacher_lname", $_POST['teacher_lname_th_add']);

        if ($stmInsert->execute()) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
    } catch (\Exception $e) {
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }
}

echo json_encode($data);
