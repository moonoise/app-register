<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;
use App\PasswordHash;

$sqlConn = new SqlConn;
$pass_hash = new PasswordHash;

$data = array();
$pass = $pass_hash->create_password_hash($_POST['password']);
try {
    $sql = "UPDATE members SET `password` = :pwd WHERE username = :username";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":pwd", $pass);
    $stm->bindParam(":username", $_POST['username']);
    $stm->execute();
    $r = $stm->rowCount();
    $data['data'] = $r;
} catch (\Exception $e) {
    $data['error']  = $e->getMessage();
}

echo json_encode($data);
