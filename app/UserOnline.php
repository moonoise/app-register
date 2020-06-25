<?php
namespace App;
use App\SqlConn;
use \PDO;
use \Datetime;
class UserOnline 
{
   private $count = 0;
   public $error =  array();
   public $conn;
   public $username;
   public $timestamp;
   public $ip;
   public $login_timeout;

    function usersOnline ($username) {
        $this->username = $username;
        
		$this->timestamp = time();
		$this->ip = $this->ipCheck();
		$this->new_user();
        $this->delete_user();
        // return $this->new_user();
		return $this->count_users();
    }

    function ipCheck() {
      /*
      This function will try to find out if user is coming behind proxy server. Why is this important?
      If you have high traffic web site, it might happen that you receive lot of traffic
      from the same proxy server (like AOL). In that case, the script would count them all as 1 user.
      This function tryes to get real IP address.
      Note that getenv() function doesn't work when PHP is running as ISAPI module
      */
          if (getenv('HTTP_CLIENT_IP')) {
              $ip = getenv('HTTP_CLIENT_IP');
          }
          elseif (getenv('HTTP_X_FORWARDED_FOR')) {
              $ip = getenv('HTTP_X_FORWARDED_FOR');
          }
          elseif (getenv('HTTP_X_FORWARDED')) {
              $ip = getenv('HTTP_X_FORWARDED');
          }
          elseif (getenv('HTTP_FORWARDED_FOR')) {
              $ip = getenv('HTTP_FORWARDED_FOR');
          }
          elseif (getenv('HTTP_FORWARDED')) {
              $ip = getenv('HTTP_FORWARDED');
          }
          else {
              $ip = $_SERVER['REMOTE_ADDR'];
          }
          return $ip;
      }


      function new_user() {
          // $insert = mysql_query ("INSERT INTO useronline(timestamp, ip) VALUES ('$this->timestamp', '$this->ip')");
          
         $dbConn = new SqlConn;
          $err = "";
          try{
            $username_ip = $this->username."-".$this->ip;
            
            $sqlCheck = "SELECT * FROM `useronline` WHERE username_ip = :username_ip "; 
            $stmCheck = $dbConn->conn->prepare($sqlCheck);
            $stmCheck->bindParam(":username_ip", $username_ip);
            $stmCheck->execute();
            $r = $stmCheck->fetchAll(PDO::FETCH_ASSOC);

            if (count($r) === 0  ) {
               $sql = "INSERT INTO useronline (`timestamp`,`username_ip`) 
                      VALUES (:user_timestamp ,
                              :username_ip)";
              $stm = $dbConn->conn->prepare($sql);
              $stm->bindParam(":user_timestamp",$this->timestamp);
              $stm->bindParam(":username_ip", $username_ip);
              $stm->execute();
            }
            return 1;
                        
          }catch(\Exception $e){
              return  $e->getMessage();
              
          }
      }
      
      function delete_user() {
         $dbConn = new SqlConn();
          $err = "";
          $timeout = $this->login_timeout;
          try{
              $sql = "DELETE FROM useronline WHERE timestamp < (:user_timestamp - :user_timeout)";
              $stm = $dbConn->conn->prepare($sql);
              $stm->bindParam(":user_timestamp",$this->timestamp);
              $stm->bindParam(":user_timeout" , $timeout);
              $stm->execute();
              
          }catch(\Exception $e){
              $err = $e->getMessage();
          }
      }
      
      function count_users() {
         $dbConn = new SqlConn();
          $err = "";
          try{
              $sql = "SELECT DISTINCT username_ip FROM useronline WHERE `username_ip` NOT LIKE '-%' ";
              $stm = $dbConn->conn->prepare($sql);
              $stm->execute();
              $this->count = $stm->rowCount();
              
          }catch(\Exception $e){
              $err = $e->getMessage();
          }
          if ($err != '') {

              $this->error[$this->i] = "count Error";
              
          }else {
              return $this->count;
          }
      }

      function delete_user_now() {
          $err = "";
          try{
              $this->username = $_SESSION[__USERNAME__];
              $this->ip = $this->ipCheck();
              $username_ip = $this->username."-".$this->ip;

              $sql = "DELETE FROM useronline WHERE username_ip = :username_ip";
              $stm = $this->conn->prepare($sql);
              $stm->bindParam(":username_ip" , $username_ip);
              $stm->execute();
              
          }catch(\Exception $e){
              $err = $e->getMessage();
          }
          if ($err != '') {
              $this->error[$this->i] = "delete Error";
              //  echo $err;
          }else {
              $this->i++;
          }
      }

    function activeTime($_timeSecond,$timeLife,$redirectURL='login.php') {
        $d = new DateTime($timeLife);
        $ssT =  $d->getTimestamp();
     
         if(isset($ssT) && time()-$ssT > $_timeSecond){
    
            $this->logout();
    
            header('Location: ' . $redirectURL);
            die();
    
         }elseif ( time()-$ssT < $_timeSecond) {
          
            $_SESSION[__SESSION_TIME_LIFE__] = date("Y-m-d H:i:s");
            
         }
    }

    function logout() {
        unset($_SESSION[__USERNAME__]);
        unset($_SESSION[__ID_CARD__]);
        unset($_SESSION[__FULLNAME__]);
        unset($_SESSION[__NAME__]);
        unset($_SESSION[__SURNAME__]);
        unset($_SESSION[__PER_TYPE__]);
        unset($_SESSION[__PER_PICTURE__]);
        unset($_SESSION[__STD_ID__]);
        unset($_SESSION[__TEACHER_ID__]);
        unset($_SESSION[__GROUP_ID__]);
        unset($_SESSION[__SESSION_TIME_LIFE__]);
        unset($_SESSION[__USERONLINE__]);
    }

    function statistics($per_cardno) {
        $dateNow =  date("Y-m")."%";
        try {

            $sql = "SELECT COUNT(*) FROM  `statistics`  WHERE `per_cardno` = :per_cardno AND statistics_date LIKE :datenow ";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(":per_cardno" , $per_cardno);
            $stm->bindParam(":datenow" , $dateNow);
            $stm->execute();
            $resultDate = $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            //throw $th;
        }


             
              
    }  


}



