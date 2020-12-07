<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;
$data = array('error' => null);

try {

    $sql = "SELECT * FROM alumni WHERE  ku_id_auto = :ku_id_auto";

    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if ($stm->rowCount()) {
        $sqlRegisterInsert = "INSERT INTO alumni_reg_63 ( ku_id_auto , id2,ku_id,alumni_type, created_at )  VALUES 
                                (:ku_id_auto , :id2 , :ku_id,'1', current_timestamp )";

        $stmRegisterInsert = $sqlConn->conn->prepare($sqlRegisterInsert);
        $stmRegisterInsert->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
        $stmRegisterInsert->bindParam(':id2', $result[0]['id2']);
        $stmRegisterInsert->bindParam(':ku_id', $result[0]['ku_id']);
        $stmRegisterInsert->execute();
    } else {
        $data['success'] = false;
    }
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

if ($data['error'] == null) {
    $data['success'] = true;
}

echo json_encode($data);
