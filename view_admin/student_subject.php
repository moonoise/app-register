<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";
session_start();

include_once "login-head.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ระบบโปรแกรมตรวจสอบความถูกต้องของลำดับรายวิชาในการลงทะเบียนเรียน</title>
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
                                <div class="card-header">รายวิชาสอน</div>
                                <div class="card-body">

                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-new-modal-lg">New</button>
                                    <br>


                                    <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>รหัสวิชา</th>
                                                <th>รายวิชา</th>
                                                <th>ปีการศึกษา-เทอม</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>00000</td>
                                                <td></td>
                                                <td>2020 - 1</td>
                                                <td>#</td>

                                            </tr>

                                            </tfoot>
                                    </table>

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
        var dataTables = [{
            "subject_id": "",
            "subject": "",
            "year_term": "",
            "edit": ""
        }]

        var table = $('#table_teacher_subject').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "subject_id"
                },
                {
                    "data": "subject"
                },
                {
                    "data": "year_term"
                },
                {
                    "data": "edit"
                }
            ],
            "columnDefs": [{
                    "targets": ["subject_id"],
                    "searchable": true
                },
                {
                    "targets": ["subject"],
                    "searchable": true
                },
                {
                    "targets": ["year_term"],
                    "searchable": true
                },
                {
                    "targets": ["edit"],
                    "searchable": false
                }
            ],
            'pageLength': 25,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });
    </script>

</body>

</html>