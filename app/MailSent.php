<?php
namespace App;
use \Datetime;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailSent {

    public $mail;
    public $mailHost,$mailUser,$mailPass,$mailFrom,$mailPort;
    public function  __construct() {
        $up_dir = realpath(__DIR__ . '/');
        if (file_exists('confDb.php')) {
            require 'confDb.php';
        } else {
            require $up_dir.'/confDb.php';
        }
        
        $this->mailFrom = $mailFrom;

        $this->mail = new PHPMailer(true);

        try {
            //Server settings
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $mailHost;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $mailUser;                     //SMTP username
        $this->mail->Password   = $mailPass;
        $this->mail->CharSet     = "utf-8";
        $this->mail->ContentType  = "text/html";                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = $mailPort;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        } catch (\Exception $e) {
            return $this->mail->ErrorInfo;
           
        }
    }

    function sent_register($email,$fullName,$org_name,$meetingDate,$meetingTime,$links) {
  
        try {
            //Recipients
            $this->mail->setFrom($this->mailFrom, 'สำนักงบประมาณ');
            $this->mail->addAddress($email, $fullName);     //Add a recipient
        
            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'โครงการฝึกอบรมหลักสูตรเสริมสร้างความเข้าใจและเตรียมความพร้อมให้กับองค์กรปกครองส่วนท้องถิ่นเพื่อเป็นหน่วยรับงบประมาณตรง';
            $this->mail->Body    ='

            <p>เรียน เจ้าหน้าที่ส่วนราชการ ('.$org_name.')</p>
            <p></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณ'.$fullName.' จากหน่วยงาน '.$org_name.' ได้ลงทะเบียน </p>
            <p>"โครงการฝึกอบรมหลักสูตรเสริมสร้างความเข้าใจและเตรียมความพร้อมให้กับองค์กรปกครองส่วนท้องถิ่นเพื่อเป็นหน่วยรับงบประมาณตรง 
            <br>กลุ่มเป้าหมายคือเทศบาลตำบล จำนวน 2,247 หน่วยงาน"</p>
            <p><b><u>กำหนดการฝึกอบรม ผ่านระบบออนไลน์</u></b> :
            <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$meetingDate.'
            <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$meetingTime.' 
            <p>-----------------------------</p>
            <p>คลิกเพื่อเข้าไปดูรายละเอียดลิ้งอบรมออนไลน์  <a href="'.$links.'" target="_blank">'.$links.'</a></p>
            <p><b>ในวันประชุม ขอความร่วมมือให้กำหนดชื่อในห้องประชุมออนไลน์ ดังนี้</b></p>
            <p>เทศบาลตำบล ____ อำเภอ____ จังหวัด_____</p>
            <p><u>ตัวอย่างเช่น</u> เทศบาลตำบลท่าเรือ อำเภอท่าเรือ จังหวัดพระนครศรีอยุธยา</p>
            <p></p>
                    ';
            $this->mail->AltBody = '.....';

            $this->mail->send();
            return true;

        } catch (\Exception $e) {
           return $this->mail->ErrorInfo;
      
        }
        
    }
}