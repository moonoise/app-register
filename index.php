<?php  
require_once 'vendor/autoload.php';
include_once "app/config.php";
session_start();


if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
    header("location:view_admin");
    
}elseif($_SESSION[__PER_TYPE__] == 'student') {
    header("location:view_student");
}else {
    header("location:view_student");
}