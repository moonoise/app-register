<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

if (
    !empty($_POST['std_title_name_th']) &&
    !empty($_POST['std_fname_th']) &&
    !empty($_POST['std_lname_th']) &&
    !empty($_POST['std_nickname']) &&
    !empty($_POST['std_email']) &&
    !empty($_POST['student_mobile']) &&
    !empty($_POST['std_home_town']) &&
    !empty($_POST['std_address'])
) {

    $std_fname_th_old = (empty($_POST['std_fname_th_old']) ? null : $_POST['std_fname_th_old']);
    $std_lname_th_old = (empty($_POST['std_lname_th_old']) ? null : $_POST['std_lname_th_old']);
    $class_name = (empty($_POST['class_name']) ? null : $_POST['class_name']);
    $std_line = (empty($_POST['std_line']) ? null : $_POST['std_line']);
    $std_position = (empty($_POST['std_position']) ? null : $_POST['std_position']);
    $std_workplace = (empty($_POST['std_workplace']) ? null : $_POST['std_workplace']);

    $id2 = (empty($_POST['id2']) ? null : $_POST['id2']);

    try {

        $sqlConn->conn->beginTransaction();

        $sql = "UPDATE alumni SET std_title_name_th = :std_title_name_th ,
                                std_fname_th = :std_fname_th ,
                                std_lname_th = :std_lname_th ,
                                std_fname_th_old = :std_fname_th_old ,
                                std_lname_th_old = :std_lname_th_old ,
                                std_nickname = :std_nickname ,
                                class_name = :class_name ,
                                std_email = :std_email ,
                                student_mobile = :student_mobile,
                                std_line = :std_line,
                                std_home_town = :std_home_town,
                                std_address = :std_address ,
                                std_position = :std_position , 
                                std_workplace = :std_workplace,
                                updated_at = current_timestamp
            WHERE ku_id_auto = :ku_id_auto ";

        $stm = $sqlConn->conn->prepare($sql);

        $stm->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
        $stm->bindParam(':std_title_name_th', $_POST['std_title_name_th']);
        $stm->bindParam(':std_fname_th', $_POST['std_fname_th']);
        $stm->bindParam(':std_lname_th', $_POST['std_lname_th']);
        $stm->bindParam(':std_fname_th_old', $std_fname_th_old);
        $stm->bindParam(':std_lname_th_old', $std_lname_th_old);
        $stm->bindParam(':std_nickname', $_POST['std_nickname']);
        $stm->bindParam(':class_name', $class_name);
        $stm->bindParam(':std_email', $_POST['std_email']);
        $stm->bindParam(':student_mobile', $_POST['student_mobile']);
        $stm->bindParam(':std_line', $std_line);
        $stm->bindParam(':std_home_town', $_POST['std_home_town']);
        $stm->bindParam(':std_address', $_POST['std_address']);
        $stm->bindParam(':std_position', $std_position);
        $stm->bindParam(':std_workplace', $std_workplace);
        $stm->execute();

        if (
            !empty($_POST['alumni_address']) &&
            !empty($_POST['alumni_district']) &&
            !empty($_POST['alumni_amphoe']) &&
            !empty($_POST['alumni_province'])
        ) {

            $sqlCheck = "SELECT * FROM alumni_address WHERE  ku_id_auto = :ku_id_auto";
            $stmCheck = $sqlConn->conn->prepare($sqlCheck);
            $stmCheck->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
            $stmCheck->execute();

            if ($stmCheck->rowCount()) {
                $sqlUpdateAddress = "UPDATE alumni_address SET address = :address ,
                                                       district = :district ,
                                                       amphoe = :amphoe ,
                                                       province = :province,
                                                       updated_at = current_timestamp
                            WHERE  ku_id_auto = :ku_id_auto ";
                $stmUpdateAddress = $sqlConn->conn->prepare($sqlUpdateAddress);
                $stmUpdateAddress->bindParam(':address', $_POST['alumni_address']);
                $stmUpdateAddress->bindParam(':district', $_POST['alumni_district']);
                $stmUpdateAddress->bindParam(':amphoe', $_POST['alumni_amphoe']);
                $stmUpdateAddress->bindParam(':province', $_POST['alumni_province']);
                $stmUpdateAddress->bindParam(':ku_id_auto', $_POST['ku_id_auto']);

                $stmUpdateAddress->execute();
                $data['check_address'] = 'update';
            } else {
                $sqlInsertAddress = "INSERT INTO alumni_address (address,
                                                                district,
                                                                amphoe,
                                                                province,
                                                                zipcode,
                                                                id2,
                                                                ku_id_auto,
                                                                created_at
                                                                ) VALUES (
                                                                :address,
                                                                :district,
                                                                :amphoe,
                                                                :province,
                                                                :zipcode,
                                                                :id2,
                                                                :ku_id_auto,
                                                                current_timestamp
                                                                )";
                $stmInsertAddress = $sqlConn->conn->prepare($sqlInsertAddress);
                $stmInsertAddress->bindParam(':address', $_POST['alumni_address']);
                $stmInsertAddress->bindParam(':district', $_POST['alumni_district']);
                $stmInsertAddress->bindParam(':amphoe', $_POST['alumni_amphoe']);
                $stmInsertAddress->bindParam(':province', $_POST['alumni_province']);
                $stmInsertAddress->bindParam(':zipcode', $_POST['alumni_zipcode']);
                $stmInsertAddress->bindParam(':id2', $_POST['id2']);
                $stmInsertAddress->bindParam(':ku_id_auto', $_POST['ku_id_auto']);

                $stmInsertAddress->execute();
                $data['check_address'] = 'insert';
            }
        }

        $sqlRegisterCheck = "SELECT * FROM alumni_reg_63 WHERE  ku_id_auto = :ku_id_auto";

        $stmRegisterCheck = $sqlConn->conn->prepare($sqlRegisterCheck);
        $stmRegisterCheck->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
        $stmRegisterCheck->execute();

        if ($stmRegisterCheck->rowCount()) {
            $sqlRegisterUpdate = "UPDATE alumni_reg_63 SET updated_at = current_timestamp 
                                    WHERE ku_id_auto = :ku_id_auto";

            $stmRegisterUpdate = $sqlConn->conn->prepare($sqlRegisterUpdate);
            $stmRegisterUpdate->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
            $stmRegisterUpdate->execute();

            $data['check_register'] = 'update';
        } else {
            $sqlRegisterInsert = "INSERT INTO alumni_reg_63 ( ku_id_auto , id2, created_at )  VALUES 
                                (:ku_id_auto , :id2 , current_timestamp )";

            $stmRegisterInsert = $sqlConn->conn->prepare($sqlRegisterInsert);
            $stmRegisterInsert->bindParam(':ku_id_auto', $_POST['ku_id_auto']);
            $stmRegisterInsert->bindParam(':id2', $id2);
            $stmRegisterInsert->execute();
            $data['check_register'] = 'insert';
        }
        $sqlConn->conn->commit();
        $data['id2'] = $_POST['id2'];
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['msg'] = $e->getMessage();
    }
} else {
    $data['success'] = false;
    $data['msg'] = "ข้อมูลสำคัญไม่ครบ";
}

echo json_encode($data);
