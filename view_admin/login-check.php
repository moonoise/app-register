<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";

use App\SqlConn;
use App\PasswordHash;

$sqlConn = new SqlConn;
$pass_hash = new PasswordHash;

$success = array('success' => null,
                'msgError' => null );

// Define $myusername and $mypassword
$username = $_POST['username'];
$password = $_POST['password'];

// To protect MySQL injection
$username = stripslashes($username);


try {
    $sql = "SELECT * FROM `members` WHERE username = :username ";
    $stm = $sqlConn->conn->prepare($sql);
    $stm->bindParam(":username",$username);
    $stm->execute();

    $resultCheck = $stm->fetchAll(PDO::FETCH_ASSOC);

} catch (\Exception $e) {
    $success['success'] = false;
    $success['msgError'] = $e->getMessage();
}

if(count($resultCheck) == 1){

    if ($pass_hash->verify_password_hash($password, $resultCheck[0]['password']) && $resultCheck[0]['status_user'] == 1) {
        session_start();
        $datetimeNow = date("Y-m-d H:i:s");
    
        $_SESSION[__USERNAME__] = $resultCheck[0]['username'];
        $_SESSION[__FULLNAME__] = $resultCheck[0]['fname'] . " ". $resultCheck[0]['lname'];
        $_SESSION[__NAME__] = $resultCheck[0]['fname'];
        $_SESSION[__SURNAME__] = $resultCheck[0]['lname'];

        $_SESSION[__PER_TYPE__] = $resultCheck[0]['per_type'] ;
        $_SESSION[__SESSION_TIME_LIFE__] = $datetimeNow;

        if ($resultCheck[0]['per_type'] == 'teacher') {
            $_SESSION[__TEACHER_ID__] = $resultCheck[0]['teacher_id'];
        }else {
            $_SESSION[__TEACHER_ID__] = NULL;
        }
        
  
        $success['success'] = true;
    }else {
        $success['success'] = false;
        $success['msgError'] = 'user หรือ password ไม่ถูกต้อง';
    }
          
            
}elseif (count($resultCheck) == 0) {

    $success['success'] = false;
    $success['msgError'] = 'user หรือ password ไม่ถูกต้อง';

}

echo json_encode($success);

