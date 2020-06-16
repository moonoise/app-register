<?php
require __DIR__ . '/vendor/autoload.php';
include_once "config/conf.php";

use App\SqlConn;
// use App\DateCover;

// $dateCover = new DateCover;

$sqlConn = new SqlConn;

// echo $dateCover->fullDateEngToThai('1987-01-16');