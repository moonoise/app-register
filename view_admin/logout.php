<?php
session_start();
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\UserOnline;

$userOnline = new userOnline();

$userOnline->logout();

header('Location: ' . 'login.php');
die();
