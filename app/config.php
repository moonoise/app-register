<?php

//set Active time out
$login_timeout = 4*3600;    // จำนวนเวลาที่ให้อยู่ในระบบ  ถ้ายัง Active อยู่ก็จะเริ่มนับใหม่ 

//SESSION 
$session_prefix = 'student_';  //ถ้ามีโปรแกรมอยู่ใน โดเมนเดียวกัน ควรเปลี่ยน
define("__USERNAME__", $session_prefix."userName");

define("__ID_CARD__", $session_prefix."idCard");
define("__FULLNAME__",$session_prefix."fullName");
define("__NAME__",$session_prefix."fName");
define("__SURNAME__",$session_prefix."lName");
define("__PER_TYPE__",$session_prefix."per_type"); // บุคลากร & นักศึกษา
define("__PER_PICTURE__",$session_prefix."pictureProfile");
define("__GROUP_ID__", $session_prefix."group_id");


define("__SESSION_TIME_LIFE__",$session_prefix."session_time_life");
define("__USERONLINE__",$session_prefix."useronline"); //จำนวนผู้เข้าระบบ