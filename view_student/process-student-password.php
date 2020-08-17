<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;
use App\PasswordHash;

$sqlConn = new SqlConn;
$pass_hash = new PasswordHash;

$success = array();

try {
    $sql = "SELECT * FROM student_copy";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    echo $e->getMessage();
}

foreach ($result as $key => $value) {

    $pass = $pass_hash->create_password_hash($value['std_id']);
    // echo "<br>".$value['std_id'];
    try {
        $sqlPass = "UPDATE student_copy SET username = :username ,`password` = :pwd  WHERE std_id = :std_id ";
        $stmPass = $sqlConn->conn->prepare($sqlPass);
        $stmPass->bindParam(':username', $value['std_id']);
        $stmPass->bindParam(':pwd', $pass);
        $stmPass->bindParam(':std_id', $value['std_id']);
        $stmPass->execute();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}



// $success['data'] =  $pass_hash->verify_password_hash('159753moo','$2y$10$7jXLkYvzCufrV6eRTs.GXuNJ9R7u8y6dZpMWlspsS3509IQfrrJNy');
// // $success['data1'] = $pass_hash->create_password_hash('159753moo');
// echo json_encode($success);