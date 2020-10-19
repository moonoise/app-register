<?php

require_once '../vendor/autoload.php';

use App\SqlConn2;

$sqlConn2 = new SqlConn2;

$count = array();
// try {
//     // $sql5 = "SELECT a.* FROM register a LEFT JOIN std b ON  (a.reg_name = b.std_fname_th AND a.reg_surname = b.std_lname_th) 
//     //         WHERE b.std_fname_th IS NULL AND b.std_lname_th IS NULL ";

//     $sql = "SELECT b.* 
//                 FROM std 
//             INNER JOIN register b ON (b.reg_oname = std.std_fname_th AND b.reg_osurname = std.std_lname_th) ";

//     $stm = $sqlConn2->conn->prepare($sql);
//     $stm->execute();
//     $data = $stm->fetchAll(PDO::FETCH_ASSOC);


//     foreach ($data as $key => $value) {

//         $sqlUpdate = "UPDATE std 
//                         SET student_mobile = :reg_tel , 
//                             std_email = :reg_eml, 
//                             std_line = :reg_line, 
//                             std_nickname = :reg_nickname, 
//                             std_position = :reg_position, 
//                             std_workplace = :reg_workplace,
//                             std_address = :reg_addr, 
//                             std_fname_th_old = :std_fname_th_old,
//                             std_lname_th_old = :std_lname_th_old,
//                             std_fname_th = :reg_name,
//                             std_lname_th = :reg_surname
//                         WHERE std_fname_th = :reg_oname AND std_lname_th = :reg_osurname 
//                       ";
//         $sqlConn2->conn->beginTransaction();
//         $stmUpdate = $sqlConn2->conn->prepare($sqlUpdate);
//         $stmUpdate->bindParam(":reg_tel", $value['reg_tel']);
//         $stmUpdate->bindParam(":reg_eml", $value['reg_eml']);
//         $stmUpdate->bindParam(":reg_line", $value['reg_line']);
//         $stmUpdate->bindParam(":reg_nickname", $value['reg_nickname']);
//         $stmUpdate->bindParam(":reg_position", $value['reg_position']);
//         $stmUpdate->bindParam(":reg_workplace", $value['reg_workplace']);
//         $stmUpdate->bindParam(":reg_addr", $value['reg_addr']);

//         $stmUpdate->bindParam(":reg_name", $value['reg_name']);
//         $stmUpdate->bindParam(":reg_surname", $value['reg_surname']);


//         $stmUpdate->bindParam(":std_fname_th_old", $value['reg_oname']);
//         $stmUpdate->bindParam(":std_lname_th_old", $value['reg_osurname']);

//         $stmUpdate->bindParam(":reg_oname", $value['reg_oname']);
//         $stmUpdate->bindParam(":reg_osurname", $value['reg_osurname']);

//         $stmUpdate->execute();
//         // $count[] =  $sqlConn2->conn->lastInsertId();
//         if ($stmUpdate->rowCount()) {
//             $count[] = $stmUpdate->rowCount();
//         }


//         $sqlConn2->conn->commit();
//     }
// } catch (\Exception $e) {
//     $data  = $e->getMessage();
// }

// echo "<pre>";
// print_r($count);
// echo "</pre>";

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// echo json_encode($data);


// $sqlsss = "SELECT a.* FROM register a LEFT JOIN std b ON (a.reg_name = b.std_fname_th AND a.reg_surname = b.std_lname_th) WHERE b.std_fname_th IS NULL AND b.std_lname_th IS NULL AND (a.reg_oname = '' OR a.reg_osurname = '') ORDER BY `reg_name` DESC";

// "SELECT a.* FROM register a LEFT JOIN std b ON (a.reg_name = b.std_fname_th AND a.reg_surname = b.std_lname_th) WHERE b.std_fname_th IS NULL AND b.std_lname_th IS NULL AND (a.reg_oname = '' OR a.reg_osurname = '') ORDER BY `reg_name` DESC"