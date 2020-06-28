<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;
use App\PasswordHash;

$sqlConn = new SqlConn;
$pass_hash = new PasswordHash;

$success = array();



// $success['data'] =  $pass_hash->verify_password_hash('159753moo','$2y$10$7jXLkYvzCufrV6eRTs.GXuNJ9R7u8y6dZpMWlspsS3509IQfrrJNy');
$success['data1'] = $pass_hash->create_password_hash('irri2020');
echo json_encode($success);
