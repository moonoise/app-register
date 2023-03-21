<?php
session_start();
require_once '../vendor/autoload.php';
$antiCSRF = new App\securityService();