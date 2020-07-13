<?php
$data = array();

$count = readline("Command: ");
$count = intval($count);


for ($i = 0; $i < $count; $i++) {

    $arrData = array();

    $name = readline("Name : ");
    $score1 = readline("Score1 : ");
    $score2 = readline("Score2 : ");

    $result = (($score1 / 100) * 70) + (($score2 / 100) * 30);

    $approved  = ($result >= 70 ? "approved" : "not approved");

    $arrData = array(
        "name" => $name,
        "approved" => $approved
    );

    $data[] = $arrData;
}

var_dump($data);
