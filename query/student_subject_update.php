<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

include_once "../view_admin/login-head.php";

use App\SqlConn;
use App\TableQuery;


$sqlConn = new SqlConn;
$tableQuery = new TableQuery;

$teacher_id = $_SESSION[__TEACHER_ID__];





echo json_encode($_POST);