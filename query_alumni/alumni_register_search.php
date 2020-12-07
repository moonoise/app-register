<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$success = array(
    'register' => null,
    'error' => null,
    'data' => null
);

try {
    $sql = "SELECT * FROM alumni WHERE std_fname_th = :std_fname_th AND std_lname_th = :std_lname_th";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":std_fname_th", $_POST['search_fname']);
    $stm->bindParam(":std_lname_th", $_POST['search_lname']);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $success['data'] = $result[0];
    if (count($result) == 1) {

        $sqlCheck = "SELECT * FROM alumni_reg_63 WHERE ku_id_auto = :ku_id_auto ";
        $stmCheck = $sqlConn->conn->prepare($sqlCheck);
        $stmCheck->bindParam(":ku_id_auto", $result[0]['ku_id_auto']);
        $stmCheck->execute();

        $resultCheck = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultCheck) == 1) {
            $success['register'] = true;
        } else {
            $success['register'] = false;
        }
    }
} catch (\Exception $e) {
    $success['error'] = $e->getMessage();
}

echo json_encode($success);
