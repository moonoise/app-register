<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;
use App\PasswordHash;

$sqlConn = new SqlConn;
$pass_hash = new PasswordHash;

$success = array(
    'success' => null,
    'msgError' => null
);

// Define $myusername and $mypassword
$username = $_POST['username'];
$password = $_POST['password'];

// To protect MySQL injection
$username = stripslashes($username);


try {
    $sql = "SELECT * FROM student WHERE username = :username ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":username", $username);
    $stm->execute();

    $resultCheck = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    $success['success'] = false;
    $success['msgError'] = $e->getMessage();
}

if (count($resultCheck) == 1) {

    if ($pass_hash->verify_password_hash($password, $resultCheck[0]['password'])) {
        session_start();
        $datetimeNow = date("Y-m-d H:i:s");

        $_SESSION[__USERNAME__] = $resultCheck[0]['username'];
        $_SESSION[__FULLNAME__] = $resultCheck[0]['std_fname'] . " " . $resultCheck[0]['std_lname'];
        $_SESSION[__NAME__] = $resultCheck[0]['std_fname'];
        $_SESSION[__SURNAME__] = $resultCheck[0]['std_lname'];

        $_SESSION[__PER_TYPE__] = 'student';
        $_SESSION[__SESSION_TIME_LIFE__] = $datetimeNow;

        $_SESSION[__STD_ID__] = $resultCheck[0]['std_id'];

        $success['success'] = true;
    } else {
        $success['success'] = false;
        $success['msgError'] = 'user หรือ password ไม่ถูกต้อง';
    }
} elseif (count($resultCheck) == 0) {

    $success['success'] = false;
    $success['msgError'] = 'ไม่พบรายชื่อ';
}

echo json_encode($success);
