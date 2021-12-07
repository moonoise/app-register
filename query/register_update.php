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

    try {
        $sqlSelect = "SELECT * FROM register_form2 WHERE org_id_sub = :org_id_sub ";
        $stmSelect = $sqlConn->conn->prepare($sqlSelect);
        $stmSelect->bindParam(":org_id_sub" , $_POST['org_id_sub']);
        $stmSelect->execute();
       $result =  $stmSelect->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }

    if (count($result) == 0) { 
        if (
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
                $sql = "INSERT INTO register_form2 (
                                   
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
                                    covid,
                                    created_at
                                    ) VALUES (
                                    
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
                                    :covid,
                                    CURRENT_TIMESTAMP
                                    ) ";
        
        
        
            $stm = $sqlConn->conn->prepare($sql);   
            
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
            $stm->bindParam(':covid',$_POST['covid_person']);               
        
            
            $stm->execute();
        
            if (isset($_POST['checkbox_person1'])) {
        
                 $p = $_POST['position_person1']." (ผู้ติดตาม)";
                $stm->bindParam(':title_name_th',$_POST['title_name_th_person1']);
                $stm->bindParam(':fname_th',$_POST['fname_th_person1']);
                $stm->bindParam(':lname_th',$_POST['lname_th_person1']); 
                $stm->bindParam(':position',$p);  
                $stm->bindParam(':phone',$_POST['phone_person1']);
                $stm->bindParam(':level',$_POST['level_person1']);  
                $stm->bindParam(':org_id_root',$_POST['org_id_root'],PDO::PARAM_INT);  
                $stm->bindParam(':org_id_sub',$_POST['org_id_sub'],PDO::PARAM_INT);  
                $stm->bindParam(':mobile',$_POST['mobile_person1']);         
                $stm->bindParam(':email',$_POST['email_person1']); 
                $stm->bindParam(':covid',$_POST['covid_person1']);
                $stm->execute();
        
                $arrId[] =  $sqlConn->conn->lastInsertId();
                
            }
        
        
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
    }else {
    $data['error'] = "มีการลงทะเบียนไปแล้ว โปรดติดต่อเจ้าหน้าที่";
    $data['success'] = false;
}



echo json_encode($data);