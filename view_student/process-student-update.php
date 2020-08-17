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
    try {
        $sqlInsert = "INSERT INTO student (std_id,
                                            std_title_name,
                                            std_fname,
                                            std_lname,
                                            admission_type,
                                            class_of,
                                            faculty,
                                            field_of_study,
                                            degree_conferred,
                                            std_year,
                                            teacher_id,
                                            teacher_id2,
                                            std_status,
                                            username,
                                            password
                                            ) VALUES (
                                            :std_id,
                                            :std_title_name,
                                            :std_fname,
                                            :std_lname,
                                            :admission_type,
                                            :class_of,
                                            :faculty,
                                            :field_of_study,
                                            :degree_conferred,
                                            :std_year,
                                            :teacher_id,
                                            :teacher_id2,
                                            :std_status,
                                            :username,
                                            :password)";
        // $sqlUpdate = "UPDATE student 
        //                 SET std_id = :std_id ,
        //                     std_title_name = :std_title_name ,
        //                     std_fname = :std_fname,
        //                     std_lname = :std_lname ,
        //                     admission_type = :admission_type , 
        //                     class_of = :class_of , 
        //                     faculty = :faculty ,
        //                     field_of_study = :field_of_study ,
        //                     degree_conferred = :degree_conferred ,
        //                     std_year = :std_year,
        //                     teacher_id = :teacher_id ,
        //                     teacher_id2 = :teacher_id2 , 
        //                     std_status = :std_status ,
        //                     username = :username,
        //                     password = :password  ";

        $stm = $sqlConn->conn->prepare($sqlInsert);
        $stm->bindParam(':std_id', $value['std_id']);
        $stm->bindParam(':std_title_name', $value['std_title_name']);
        $stm->bindParam(':std_fname', $value['std_fname']);
        $stm->bindParam(':std_lname', $value['std_lname']);
        $stm->bindParam(':admission_type', $value['admission_type']);
        $stm->bindParam(':class_of', $value['class_of']);
        $stm->bindParam(':faculty', $value['faculty']);
        $stm->bindParam(':field_of_study', $value['field_of_study']);
        $stm->bindParam(':degree_conferred', $value['degree_conferred']);
        $stm->bindParam(':std_year', $value['std_year']);
        $stm->bindParam(':teacher_id', $value['teacher_id']);
        $stm->bindParam(':teacher_id2', $value['teacher_id2']);
        $stm->bindParam(':std_status', $value['std_status']);
        $stm->bindParam(':username', $value['username']);
        $stm->bindParam(':password', $value['password']);

        $stm->execute();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}





// $success['data'] =  $pass_hash->verify_password_hash('159753moo','$2y$10$7jXLkYvzCufrV6eRTs.GXuNJ9R7u8y6dZpMWlspsS3509IQfrrJNy');
// // $success['data1'] = $pass_hash->create_password_hash('159753moo');
// echo json_encode($success);