<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";
include_once "authentication.php";

use App\SqlConn;

$sqlConn = new SqlConn;

$data = array();
try {
    $sql = "SELECT id,fname,lname,per_type,teacher_id,username FROM members WHERE username = :username ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":username", $_POST['username']);
    $stm->execute();
    $r = $stm->fetchAll(PDO::FETCH_ASSOC);
    $data['data'] = $r[0];
} catch (\Exception $e) {
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
