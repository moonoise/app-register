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
    $sqlSelect = "SELECT * FROM register_form1 WHERE minister_id = :minister_id ";
    $stmSelect = $sqlConn->conn->prepare($sqlSelect);
    $stmSelect->bindParam(":minister_id" , $_POST['minister_id']);
    $stmSelect->execute();
   $result =  $stmSelect->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $data['error'] = $e->getMessage();
}

if (count($result) == 0) {
    $data['success'] = true;

    if (!empty($_POST['minister_id'])) {
    try {
        $sqlConn->conn->beginTransaction();
        $sql = "INSERT INTO register_form1 (
                            title_name_th,
                            fname_th,
                            lname_th,
                            position,
                            minister_id,
                            phone,
                            created_at
                            ) VALUES (
                            :title_name_th,
                            :fname_th,
                            :lname_th,
                            :position,
                            :minister_id,
                            :phone,
                            CURRENT_TIMESTAMP
                            ) ";
    $stm = $sqlConn->conn->prepare($sql);

    if (isset($_POST['checkbox_person0'])) {
       $p = $_POST['position_person0']." (ผู้แทน)";
        
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person0']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person0']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person0']); 
        $stm->bindParam(':position',$p);
        $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person0']);
        $stm->execute();
        $arrId[] =  $sqlConn->conn->lastInsertId();
    }else {
        
        $stm->bindValue(':title_name_th',NULL);
        $stm->bindValue(':fname_th',"รัฐมนตรี");
        $stm->bindValue(':lname_th',NULL); 
        $stm->bindValue(':position',NULL);  
        $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
        $stm->bindValue(':phone',NULL);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    if (isset($_POST['checkbox_person1'])) {

        $p = $_POST['position_person1']." (ผู้ติดตามคนที่ 1)";
         $stm->bindParam(':title_name_th',$_POST['title_name_th_person1']);
         $stm->bindParam(':fname_th',$_POST['fname_th_person1']);
         $stm->bindParam(':lname_th',$_POST['lname_th_person1']); 
         $stm->bindParam(':position',$p);  
         $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
         $stm->bindParam(':phone',$_POST['phone_person1']);
         $stm->execute();

         $arrId[] =  $sqlConn->conn->lastInsertId();
         
     }

     if (isset($_POST['checkbox_person2'])) {

        $p = $_POST['position_person1']." (ผู้ติดตามคนที่ 2)";
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person2']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person2']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person2']); 
        $stm->bindParam(':position',$p);  
        $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person2']);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    if (isset($_POST['checkbox_person3'])) {

        $p = $_POST['position_person1']." (ผู้ติดตามคนที่ 3)";
        $stm->bindParam(':title_name_th',$_POST['title_name_th_person3']);
        $stm->bindParam(':fname_th',$_POST['fname_th_person3']);
        $stm->bindParam(':lname_th',$_POST['lname_th_person3']); 
        $stm->bindParam(':position',$p);  
        $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
        $stm->bindParam(':phone',$_POST['phone_person3']);
        $stm->execute();

        $arrId[] =  $sqlConn->conn->lastInsertId();
    }

    // if (isset($_POST['checkbox_person4'])) {
    //     $p = $_POST['position_person1']." (ผู้ติดตามคนที่ 4)";
        
    //     $stm->bindParam(':title_name_th',$_POST['title_name_th_person4']);
    //     $stm->bindParam(':fname_th',$_POST['fname_th_person4']);
    //     $stm->bindParam(':lname_th',$_POST['lname_th_person4']); 
    //     $stm->bindParam(':position',$p);  
    //     $stm->bindParam(':minister_id',$_POST['minister_id'],PDO::PARAM_INT);  
    //     $stm->bindParam(':phone',$_POST['phone_person4']);
    //     $stm->execute();

    //     $arrId[] =  $sqlConn->conn->lastInsertId();
    // }

   
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
    
    try {
        $sql = "SELECT register_form1.*,
        minister.* 
                         FROM register_form1  
        LEFT JOIN  minister 
            ON minister.minister_id = register_form1.minister_id 
        WHERE register_form1.minister_id  = :minister_id ";
        $stm = $sqlConn->conn->prepare($sql);
        $stm->bindParam(':minister_id',$_POST['minister_id']);
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
    $data['error'] = "มีการลงทะเบียนไปแล้ว โปรดติดต่อเจ้าหน้าที่";
    $data['success'] = false;
}




echo json_encode($data);