<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array(
    'success' => null,
    'reg_id' => null,
    'error' => null);

if (!empty($_POST['training_name']) &&
    !empty($_POST['title_name_th']) &&
    !empty($_POST['fname_th']) &&
    !empty($_POST['lname_th']) &&
    !empty($_POST['position']) &&
    !empty($_POST['level']) &&
    !empty($_POST['org_id_root']) &&
    !empty($_POST['org_id_sub']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['mobile']) &&
    !empty($_POST['email'])
) {
    try {
        $sqlConn->conn->beginTransaction();
        $sql = "INSERT INTO register_form1 (
                            training_name,
                            title_name_th,
                            fname_th,
                            lname_th,
                            position,
                            level,
                            org_id_root,
                            org_id_sub,
                            phone,
                            mobile,
                            email,
                            created_at
                            ) VALUES (
                            :training_name,
                            :title_name_th,
                            :fname_th,
                            :lname_th,
                            :position,
                            :level,
                            :org_id_root,
                            :org_id_sub,
                            :phone,
                            :mobile,
                            :email,
                            CURRENT_TIMESTAMP
                            ) ";



    $stm = $sqlConn->conn->prepare($sql);   
    $stm->bindParam(':training_name',$_POST['training_name']);
    $stm->bindParam(':title_name_th',$_POST['title_name_th']);  
    $stm->bindParam(':fname_th',$_POST['fname_th']);  
    $stm->bindParam(':lname_th',$_POST['lname_th']);  
    $stm->bindParam(':position',$_POST['position']);  
    $stm->bindParam(':level',$_POST['level']);  
    $stm->bindParam(':org_id_root',$_POST['org_id_root'],PDO::PARAM_INT);  
    $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
    $stm->bindParam(':phone',$_POST['phone']);
    $stm->bindParam(':mobile',$_POST['mobile']);         
    $stm->bindParam(':email',$_POST['email']);         

    
    $stm->execute();

    $sqlConn->conn->commit();
    $data['reg_id'] = $sqlConn->conn->lastInsertId();
    $data['success'] = true;
    } catch (\Exception $e) {
        $sqlConn->conn->rollBack();
        $data['success'] = false;
        $data['error'] = $e->getMessage();
    }
} else {
    $data['success'] = false;
    $data['error'] = "ข้อมูลไม่ครบ";
}

echo json_encode($data);