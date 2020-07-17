<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\TableQuery;

$data  = array();

$sqlConn = new SqlConn;
$tableQuery = new TableQuery;

$teacher_id = $_SESSION[__TEACHER_ID__];

try {
    $sqlConn->conn->beginTransaction();
    $sql = "UPDATE student_subject SET grade_text = ?  WHERE ss_id = ? ";
    $stm = $sqlConn->conn->prepare($sql);
    foreach ($_POST['ss_id'] as $key => $value) {
        $stm->execute(array($value, $key));
        if ($stm->rowCount()) {
            $data['update'][] = $key;
        }
    }

    $sqlConn->conn->commit();

    $data['success'] = true;
} catch (\Exception $e) {
    $data['success'] = false;
    $data['error'] = $e->getMessage() . "<br>" . $key . "<br>" . $value;
}

echo json_encode($data);
