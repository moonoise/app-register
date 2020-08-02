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

$data = array(
    'ss_id' => null,
    'data' => null,
    'error' => null,
    'success' => null
);

$checkPermissible = $grade->check_permission_register($_POST['regis_std_id'], $_POST['regis_subject_id'], $_POST['regis_yt_year'], $_POST['regis_yt_term']);

if ($checkPermissible['permissible'] == true) {
    try {
        $sql = "INSERT INTO student_subject (std_id ,ts_id,subject_id,yt_year,yt_term) 
                        VALUES (:std_id,:ts_id,:subject_id, :yt_year, :yt_term)";

        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(":std_id", $_POST['regis_std_id']);
        $stm->bindParam(":ts_id", $_POST['ts_id']);
        $stm->bindParam(":subject_id", $_POST['regis_subject_id']);
        $stm->bindParam(":yt_year", $_POST['regis_yt_year']);
        $stm->bindParam(":yt_term", $_POST['regis_yt_term']);
        $stm->execute();

        $ss_id = $sqlConn->conn->lastInsertId();
        $data['ss_id'] = $ss_id;
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
        $data['success'] = false;
    }
} else {
    $data['Permissible'] = $checkPermissible;
    $data['success'] = false;
}

echo json_encode($data);
