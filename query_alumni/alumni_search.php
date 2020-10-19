<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;

$data = array(
    "success" => null,
    "data" => null
);

$conditions = [];
$parameters = [];

$std_fname_th = (empty($_POST['search_fname']) ? $_POST['search_fname'] : null);
$std_lname_th = (empty($_POST['search_lname']) ? $_POST['search_lname'] : null);
$student_mobile = (empty($_POST['search_mobile']) ? $_POST['search_mobile'] : null);
$std_email = (empty($_POST['search_email']) ? $_POST['search_email'] : null);

if (
    !empty($_POST['search_fname']) ||
    !empty($_POST['search_lname']) ||
    !empty($_POST['search_mobile']) ||
    !empty($_POST['search_email'])
) {
    if (!empty($_POST['search_fname'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'std_fname_th LIKE ?';
        $parameters[] = '%' . $_POST['search_fname'] . "%";
    }

    if (!empty($_POST['search_lname'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'std_lname_th LIKE ?';
        $parameters[] = '%' . $_POST['search_lname'] . "%";
    }

    if (!empty($_POST['search_fname'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'std_fname_th_old LIKE ?';
        $parameters[] = '%' . $_POST['search_fname'] . "%";
    }

    if (!empty($_POST['search_lname'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'std_lname_th_old LIKE ?';
        $parameters[] = '%' . $_POST['search_lname'] . "%";
    }

    if (!empty($_POST['search_mobile'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'student_mobile LIKE ?';
        $parameters[] = '%' . $_POST['search_mobile'] . "%";
    }

    if (!empty($_POST['search_email'])) {
        // here we are using LIKE with wildcard search
        // use it ONLY if really need it
        $conditions[] = 'std_email LIKE ?';
        $parameters[] = '%' . $_POST['search_email'] . "%";
    }

    try {
        $sql = "SELECT alumni.*,
                    alumni_reg_63.alumni_reg_id
                 FROM alumni  LEFT JOIN alumni_reg_63 
        ON alumni_reg_63.ku_id_auto = alumni.ku_id_auto ";

        if ($conditions) {
            $sql .= " WHERE " . implode(" OR ", $conditions);
        }

        $stm = $sqlConn->conn->prepare($sql);
        $stm->execute($parameters);
        $data['data'] = $stm->fetchAll(PDO::FETCH_ASSOC);
        $data['success'] = true;
    } catch (\Exception $e) {
        $data['success'] = false;
        $data['error']  = $e->getMessage();
    }

    echo json_encode($data);
}
