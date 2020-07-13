<?php

require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;

$sqlConn = new SqlConn;

try {
    $sql = "select std_id from student";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    printf("%s \n", $e->getMessage());
}

if (count($result) > 0) {
    foreach ($result as $key => $value) {
        try {
            $sqlUpdate = "UPDATE student SET 
                           std_title_name_th = (select std_title_name_th from student_update where std_id = :std_id ) ,
                           std_fname_th = (select std_fname_th from student_update where std_id = :std_id ), 
                           std_lname_th = (select std_lname_th from student_update where std_id = :std_id ),
                           admission_type = (select admission_type from student_update where std_id = :std_id ),
                           class_of = (select class_of from student_update where std_id = :std_id ) ,
                           teacher_id = (select teacher_id from student_update where std_id = :std_id ) ,
                           teacher_id2 = (select teacher_id2 from student_update where std_id = :std_id ) 
                        WHERE  std_id = :std_id";

            $stmUpdate = $sqlConn->conn->prepare($sqlUpdate);
            $stmUpdate->bindParam(":std_id", $value['std_id']);
            $stmUpdate->execute();
            $count = $stmUpdate->rowCount();
            printf("ID = %s , count %s \n", $value['std_id'], $count);
        } catch (\Exception $e) {
            printf("%s \n", $e->getMessage());
        }
    }
}
