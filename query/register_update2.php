<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;


$sqlConn = new SqlConn;

$data = array(
    'success' => null,
    'reg_id' => null,
    'error' => null,
    'data' => null);

$arrId = array();

try {
    $sqlSelect = "SELECT * FROM register_form1 WHERE org_id_sub = :org_id_sub ";
    $stmSelect = $sqlConn->conn->prepare($sqlSelect);
    $stmSelect->bindParam(":org_id_sub" , $_POST['org_id_sub']);
    $stmSelect->execute();
   $result =  $stmSelect->fetchAll(PDO::FETCH_ASSOC);

   if (count($result) > 0) {
    $data['error'] = "มีการลงทะเบียนไปแล้ว โปรดติดต่อเเจ้าหน้าที่";
   }
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

if ($data['error'] == NULL) {
    $data['success'] = true;


    if (!empty($_POST['training_name']) && !empty($_POST['org_id_sub'])) {
    try {
        $sqlConn->conn->beginTransaction();
        $sql = "INSERT INTO register_form1 (
                            training_name,
                            title_name_th,
                            fname_th,
                            lname_th,
                            position,
                            org_id_sub,
                            phone,
                            created_at
                            ) VALUES (
                            :training_name,
                            :title_name_th,
                            :fname_th,
                            :lname_th,
                            :position,
                            :org_id_sub,
                            :phone,
                            CURRENT_TIMESTAMP
                            ) ";
    $stm = $sqlConn->conn->prepare($sql);

    if (isset($_POST['checkbox_person0'])) {
       $p = $_POST['position_person0']." (ผู้แทน)";
        $stm->bindParam(':training_name',$_POST['training_name']);
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person0']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person0']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person0']); 
        $stm->bindParam(':position',$p);  
        $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person0']);
        $stm->execute();
        $arrId[] =  $sqlConn->conn->lastInsertId();
    }else {
        $stm->bindParam(':training_name',$_POST['training_name']);
        $stm->bindValue(':title_name_th',NULL);
        $stm->bindValue(':fname_th',"รัฐมนตรี");
        $stm->bindValue(':lname_th',NULL); 
        $stm->bindValue(':position',NULL);  
        $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
        $stm->bindValue(':phone',NULL);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    if (isset($_POST['checkbox_person1'])) {

         $stm->bindParam(':training_name',$_POST['training_name']);
         $stm->bindParam(':title_name_th',$_POST['title_name_th_person1']);
         $stm->bindParam(':fname_th',$_POST['fname_th_person1']);
         $stm->bindParam(':lname_th',$_POST['lname_th_person1']); 
         $stm->bindParam(':position',$_POST['position_person1']);  
         $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
         $stm->bindParam(':phone',$_POST['phone_person1']);
         $stm->execute();

         $arrId[] =  $sqlConn->conn->lastInsertId();
         
     }

     if (isset($_POST['checkbox_person2'])) {

        $stm->bindParam(':training_name',$_POST['training_name']);
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person2']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person2']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person2']); 
        $stm->bindParam(':position',$_POST['position_person2']);  
        $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person2']);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    if (isset($_POST['checkbox_person3'])) {

        $stm->bindParam(':training_name',$_POST['training_name']);
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person3']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person3']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person3']); 
        $stm->bindParam(':position',$_POST['position_person3']);  
        $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person3']);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    if (isset($_POST['checkbox_person4'])) {

        $stm->bindParam(':training_name',$_POST['training_name']);
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person4']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person4']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person4']); 
        $stm->bindParam(':position',$_POST['position_person4']);  
        $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person4']);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

   
    $sqlConn->conn->commit();
    
    } catch (\Exception $e) {
        $sqlConn->conn->rollBack();
        $data['error'] = $e->getMessage();
    }

    if ($data['error'] == NULL) {
        $data['success'] = true;
    }else {
        $data['success'] = false;
    }
} else {
    $data['success'] = false;
    $data['error'] = "ข้อมูลไม่ครบ";
}

if ($data['success'] = true) {
    $id = "'" . implode("','", $arrId) . "'";
    try {
        $sql = "SELECT register_form1.*,
        org.org_name AS org_name_sub
                         FROM register_form1  
        LEFT JOIN  org 
            ON org.org_id = register_form1.org_id_sub 
        WHERE register_form1.form_id IN (" . $id . ")";
        $stm = $sqlConn->conn->prepare($sql);
        $stm->execute();
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }
    if ($data['error'] == NULL) {
        $data['success'] = true;
    }else {
        $data['success'] = false;
    }
}


}else {
    $data['success'] = false;
}




echo json_encode($data);