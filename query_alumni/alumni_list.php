<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";


use App\SqlConn;

$sqlConn = new SqlConn;
$data = array();

if (!empty($_POST['batch'])) {
    // here we are using LIKE with wildcard search
    // use it ONLY if really need it
    $conditions[] = 'batch LIKE ?';
    $parameters[] = '%' . $_POST['batch'] . "%";
}
if (!empty($_POST['search_std_nickname'])) {
    // here we are using LIKE with wildcard search
    // use it ONLY if really need it
    $conditions[] = 'std_nickname LIKE ?';
    $parameters[] = '%' . $_POST['search_std_nickname'] . "%";
}
if (!empty($_POST['search_class_name'])) {
    // here we are using LIKE with wildcard search
    // use it ONLY if really need it
    $conditions[] = 'class_name LIKE ?';
    $parameters[] = '%' . $_POST['search_class_name'] . "%";
}
if (!empty($_POST['search_std_home_town'])) {
    // here we are using LIKE with wildcard search
    // use it ONLY if really need it
    $conditions[] = 'std_home_town LIKE ?';
    $parameters[] = '%' . $_POST['search_std_home_town'] . "%";
}

if (
    empty($_POST['batch']) and
    empty($_POST['search_std_nickname']) and
    empty($_POST['search_class_name']) and
    empty($_POST['search_std_home_town'])
) {
    $conditions[] = 'batch = ?';
    $parameters[] = '1';
}

try {
    $sql = "SELECT alumni.* FROM alumni ";

    if ($conditions) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
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
