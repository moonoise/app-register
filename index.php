<?php
require_once 'vendor/autoload.php';
include_once "app/config.php";
session_start();


if ($_SESSION[__PER_TYPE__] == 'admin') {
    header("location:view_admin");
} else {
    header("location:view_public");
}
