<?php
session_start();
require_once '../vendor/autoload.php';
include_once '../app/config.php';

use App\SqlConn;
$antiCSRF = new App\securityService();
$csrfResponse = $antiCSRF->validate();
if (empty($csrfResponse)) {
    $data['error'] = 'csrf Fail.';
    $data['success'] = false;
} else {
    $sqlConn = new SqlConn();

    $data = [
        'success' => null,
        'reg_id' => null,
        'error' => null,
        'data' => null,
    ];

    $arrId = [];

    try {
        $sqlSelect = 'SELECT * FROM register_form1 WHERE org_id_root = :org_id ';
        $stmSelect = $sqlConn->conn->prepare($sqlSelect);
        $stmSelect->bindParam(':org_id', $_POST['org_id_root']);
        $stmSelect->execute();
        $result = $stmSelect->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
    }

    if (count($result) == 0) {
        $data['success'] = true;
        try {
            $sqlConn->conn->beginTransaction();
            $sql = "INSERT INTO register_form1 (
                            org_id_root,
                            title_name_th,
                            fname_th,
                            lname_th,
                            position,
                            email,
                            mobile,
                            food,
                            created_at
                            ) VALUES (
                            :org_id_root,
                            :title_name_th,
                            :fname_th,
                            :lname_th,
                            :position,
                            :email,
                            :mobile,
                            :food,
                            CURRENT_TIMESTAMP
                            ) ";
            $stm = $sqlConn->conn->prepare($sql);

            $p = $_POST['position_person1'];
            $stm->bindParam(':org_id_root', $_POST['org_id_root'], PDO::PARAM_INT);
            $stm->bindParam(':title_name_th', $_POST['title_name_th_person1']);
            $stm->bindParam(':fname_th', $_POST['fname_th_person1']);
            $stm->bindParam(':lname_th', $_POST['lname_th_person1']);
            $stm->bindParam(':position', $p);
            $stm->bindParam(':email', $_POST['email_person1']);
            $stm->bindParam(':mobile', $_POST['mobile_person1']);
            $stm->bindParam(':food', $_POST['food_person1']);
            $stm->execute();

            $arrId[] = $sqlConn->conn->lastInsertId();

            if (isset($_POST['checkbox_person2'])) {
                $p = $_POST['position_person2'];
                $stm->bindParam(':org_id_root', $_POST['org_id_root'], PDO::PARAM_INT);
                $stm->bindParam(':title_name_th', $_POST['title_name_th_person2']);
                $stm->bindParam(':fname_th', $_POST['fname_th_person2']);
                $stm->bindParam(':lname_th', $_POST['lname_th_person2']);
                $stm->bindParam(':position', $p);
                $stm->bindParam(':email', $_POST['email_person2']);
                $stm->bindParam(':mobile', $_POST['mobile_person2']);
                $stm->bindParam(':food', $_POST['food_person2']);
                $stm->execute();

                $arrId[] = $sqlConn->conn->lastInsertId();
            }

            $sqlConn->conn->commit();
        } catch (\Exception $e) {
            $sqlConn->conn->rollBack();
            $data['error'] = $e->getMessage();
        }

        if ($data['error'] == null) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        if ($data['success'] = true) {
            try {
                $sql = "SELECT register_form1.*,
        org.* FROM register_form1
        LEFT JOIN  org
            ON org.org_id = register_form1.org_id_root
        WHERE register_form1.org_id_root  = :org_id ";
                $stm = $sqlConn->conn->prepare($sql);
                $stm->bindParam(':org_id', $_POST['org_id_root']);
                $stm->execute();
                $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (\Exception $e) {
                $data['error'] = $e->getMessage();
            }
            if ($data['error'] == null) {
                $data['success'] = true;
            } else {
                $data['success'] = false;
            }
        }
    } else {
        $data['error'] = 'มีการลงทะเบียนไปแล้ว โปรดติดต่อเจ้าหน้าที่';
        $data['success'] = false;
    }
}

echo json_encode($data);
