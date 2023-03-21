<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\UserOnline;

$userOnline = new userOnline;

//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
if (!isset($_SESSION[__USERNAME__])) {
    header("location:login.php");
} else {

    $_SESSION[__USERONLINE__] = $userOnline->usersOnline($_SESSION[__USERNAME__]);
    $userOnline->activeTime($login_timeout, $_SESSION[__SESSION_TIME_LIFE__]);
}
