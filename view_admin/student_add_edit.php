<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";
session_start();

include_once "login-head.php";

if ($_SESSION[__PER_TYPE__] == 'teacher' || $_SESSION[__PER_TYPE__] == 'admin') {
    // header("location:../index.php");
} else {
    header("location:../index.php");
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ระบบข้อมูลนักเรียน นักศึกษา</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">

        <?php include_once "../layouts/2-head-start.php"; ?>
        <?php //include_once "../layouts/3-theme-options-start.php"; 
        ?>
        <div class="app-main">
            <?php include_once "../layouts/4-app-sidebar.php"; ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">รายชื่อนิสิต</div>
                                <div class="card-body">

                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label for="std_id" class="">รหัสนักศึกษา</label><input name="std_id" id="std_id" placeholder="รหัสนักศึกษา" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label for="std_id_card" class="">บัตรประชาชน</label><input name="std_id_card" id="std_id_card" placeholder="บัตรประชาชน" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label for="std_id_card" class="">ปีการศึกษาที่เข้าเรียน</label>
                                                    <select class="mb-2 form-control">
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                        <option>2020</option>
                                                        <option>2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="position-relative form-group"><label for="std_title_name" class="">คำนำหน้า</label>
                                                    <select class="mb-2 form-control">
                                                        <option>Mr.</option>
                                                        <option>Miss</option>
                                                        <option>Mrs.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="std_fname" class="">ชื่อ</label><input name="std_fname" id="std_fname" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="std_lname" class="">นามสกุล</label><input name="std_lname" id="std_lname" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="position-relative form-group"><label for="email" class="">อีเมล</label><input name="email" id="email" placeholder="อีเมล" type="email" class="form-control"></div>
                                            </div>
                                        </div>


                                        <button class="mt-2 btn btn-primary">Sign in</button>
                                    </form>

                                </div>
                                <div class="d-block text-right card-footer">
                                    <!-- <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                                    <button class="btn btn-success btn-lg">Save</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "../layouts/4-1-app-wrapper-footer.php"; ?>
            </div>

        </div>

    </div>
    <!-- modal-new subject -->
    <div class="modal fade bd-new-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพ่ิมรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_new_subject" id="form_new_subject">
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="new_subject_id" class="">รหัสราชวิชา</label><input name="new_subject_id" id="new_subject_id" placeholder="รหัสรายวิชา" type="text" class="form-control" readonly></div>
                            </div>
                            <div class="col-md-8">
                                <div class="position-relative form-group"><label for="new_subject" class="">รายวิชา</label>
                                    <select class="mb-2 form-control" name="new_subject" id="new_subject">
                                        <option>เลือก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="new_year" class="">ปีการศึกษา</label>
                                    <select class="mb-2 form-control" name="new_year" id="new_year">
                                        <option>เลือก</option>
                                        <option value='2018'>2018</option>
                                        <option value='2019'>2019</option>
                                        <option value='2020'>2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="new_term" class="">รายวิชา</label>
                                    <select class="mb-2 form-control" name="new_term" id="new_term">
                                        <option>เลือก</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>

    </script>

</body>

</html>