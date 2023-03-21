<?php

namespace App;

use \PDO;

class SqlConn2
{

    public $conn;
    public $db_host, $db_name, $db_username, $db_password;
    public function __construct()
    {
        date_default_timezone_set("Asia/bangkok");

        $db_host = "rid_Mariadb"; // Host name
        $db_username = "root"; // Mysql username
        $db_password = "root"; // Mysql password
        $db_name = "alumni"; // Database name

        try {
            // Connect to server and select database.
            $this->conn = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die('Database connection error' . $db_name);
        }
    }
}
