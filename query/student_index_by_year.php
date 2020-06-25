<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

if ($_POST['std_year']!="") {
    $stdYear = $_POST['std_year'];
    $strSql = " WHERE std_year = :std_year ";
}else {
    $stdYear = "";
    $strSql = "";
}

try {
    $sql = "SELECT * FROM student ";
    if ($stdYear != "") {
        $sql .= $strSql;
    }
    $stm = $sqlConn->conn->prepare($sql);
    if ($stdYear != "") {

        $stm->bindParam(':std_year',$stdYear);
    }

    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
     $data['data'] = $r;
} catch (\Exception $e) {
   $data['error'] = $e->getMessage();
}

echo json_encode($data);
