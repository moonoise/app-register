<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();


try {
    $sqlUpdate = "UPDATE  teacher  SET teacher_id = :teacher_id ,
                                    teacher_title_name = :teacher_title_name,
                                    teacher_fname = :teacher_fname, 
                                    teacher_lname = :teacher_lname 
                                    
                WHERE teacher_id_auto = :teacher_id_auto ";
    $stmUpdate = $sqlConn->conn->prepare($sqlUpdate);
    $stmUpdate->bindParam(":teacher_id", $_POST['teacher_id_edit']);
    $stmUpdate->bindParam(":teacher_title_name", $_POST['teacher_title_name_edit']);
    $stmUpdate->bindParam(":teacher_fname", $_POST['teacher_fname_edit']);
    $stmUpdate->bindParam(":teacher_lname", $_POST['teacher_lname_edit']);

    $stmUpdate->bindParam(":teacher_id_auto", $_POST['teacher_id_auto_edit']);

    if ($stmUpdate->execute()) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
    }
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage();
}

echo json_encode($data);
