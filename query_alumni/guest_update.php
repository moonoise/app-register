<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

if (
    !empty($_POST['guest_title_name_th']) &&
    !empty($_POST['guest_fname_th']) &&
    !empty($_POST['guest_lname_th']) &&
    !empty($_POST['guest_email']) &&
    !empty($_POST['guest_mobile']) &&
    !empty($_POST['guest_workplace'])

) {
    $guest_workplace = (empty($_POST['guest_workplace']) ? null : $_POST['guest_workplace']);

    try {

        $sqlConn->conn->beginTransaction();

        $sqlCheck = "SELECT * FROM alumni_guest_63 
                    WHERE  ( guest_fname_th = :guest_fname_th AND guest_lname_th = :guest_lname_th ) 
                            OR guest_mobile = :guest_mobile ";
        $stmCheck = $sqlConn->conn->prepare($sqlCheck);
        $stmCheck->bindParam(':guest_fname_th', $_POST['guest_fname_th']);
        $stmCheck->bindParam(':guest_lname_th', $_POST['guest_lname_th']);
        $stmCheck->bindParam(':guest_mobile', $_POST['guest_mobile']);
        $stmCheck->execute();
        if (!$stmCheck->rowCount()) {
            $sql = "INSERT INTO alumni_guest_63 
                        (
                            guest_title_name_th,
                            guest_fname_th,
                            guest_lname_th,
                            guest_mobile,
                            guest_email,
                            guest_workplace,
                            created_at
                        )  VALUES 
                        (
                            :guest_title_name_th ,
                            :guest_fname_th ,
                            :guest_lname_th ,
                            :guest_mobile ,
                            :guest_email,
                            :guest_workplace,
                            current_timestamp
                        )";

            $stm = $sqlConn->conn->prepare($sql);

            $stm->bindParam(':guest_title_name_th', $_POST['guest_title_name_th']);
            $stm->bindParam(':guest_fname_th', $_POST['guest_fname_th']);
            $stm->bindParam(':guest_lname_th', $_POST['guest_lname_th']);
            $stm->bindParam(':guest_mobile', $_POST['guest_mobile']);
            $stm->bindParam(':guest_email', $_POST['guest_email']);
            $stm->bindParam(':guest_workplace', $guest_workplace);
            $stm->execute();

            $sqlConn->conn->commit();
            $data['success'] = true;
        } else {
            $data['success'] = false;
            $data['msg'] = "มีการลงทะเบียนแล้ว !";
        }
    } catch (\Exception $e) {
        $data['msg'] = $e->getMessage();
    }
} else {
    $data['success'] = false;
    $data['msg'] = "ข้อมูลสำคัญไม่ครบ";
}

echo json_encode($data);
