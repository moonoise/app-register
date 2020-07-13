<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";
session_start();

include_once "login-head.php";

if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
    # code...
} else {
    header("location:../view_student");
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
                                <div class="card-header">รายวิชาสอน</div>
                                <div class="card-body">
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-new-modal-lg"><i class="pe-7s-news-paper btn-icon-wrapper"></i> New</button>
                                    <br>
                                    <table id="table_subject" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="col-md-2">รหัสวิชา</th>
                                                <th class="col-4">ชื่อวิชา (หน่วยกิต)</th>
                                                <th class="col-2">รายวิชาบังคับ</th>
                                                <th class="col-1">สำหรับชั้นปี</th>
                                                <th class="col-1">เทอม</th>
                                                <th class="col-2">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

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
                    <h5 class="modal-title" id="student-admin-title">เพิ่มอาจารย์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_teacher_add" id="form_teacher_add">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="subject_id_add" class="">รหัสวิชา</label><input name="subject_id_add" id="subject_id_add" placeholder="รหัสวิชา" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-9">
                                <div class="position-relative form-group"><label for="subject_subject_name_en_add" class="">​Subject :</label><input name="subject_subject_name_en_add" id="subject_subject_name_en_add" placeholder="​Subject" type="text" class="form-control"></div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="subject_credit_add" class="">Credit</label>
                                    <select class="mb-2 form-control" name="subject_credit_add" id="subject_credit_add">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="position-relative form-group"><label for="subject_level_guide_add" class="">สำหรับ นิสิตชั้นปี (ตามหลักสูตร หรือไม่ระบุก็ได้)</label>
                                    <select class="mb-2 form-control" name="subject_level_guide_add" id="subject_level_guide_add">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="position-relative form-group"><label for="subject_term_guide_add" class="">สำหรับเทอม(ตามหลักสูตร หรือไม่ระบุก็ได้)</label>
                                    <select class="mb-2 form-control" name="subject_term_guide_add" id="subject_term_guide_add">
                                        <option value="1">ภาคต้น</option>
                                        <option value="2">ปลายภาค</option>
                                        <option value="3">ภาคฤดูร้อน</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="required_subject1_add" class="">รายวิชาบังคับ ที่ 1</label>
                                    <select class="mb-2 form-control" name="required_subject1_add" id="required_subject1_add">
                                        <option value="">ไม่ระบุ..</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="required_subject2_add" class="">รายวิชาบังคับ ที่ 2</label>
                                    <select class="mb-2 form-control" name="required_subject2_add" id="required_subject2_add">
                                        <option value="">ไม่ระบุ..</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="required_subject3_add" class="">รายวิชาบังคับ ที่ 3</label>
                                    <select class="mb-2 form-control" name="required_subject3_add" id="required_subject3_add">
                                        <option value="">ไม่ระบุ..</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        subject_list()
        subject_index()

        function subject_list() {
            $.ajax({
                type: "POST",
                url: "../query/subject_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#required_subject1_add").append("<option value='" + element['subject_id'] + "' > " + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " </option>");
                        $("#required_subject2_add").append("<option value='" + element['subject_id'] + "' > " + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " </option>");
                        $("#required_subject3_add").append("<option value='" + element['subject_id'] + "' > " + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " </option>");
                    });
                }
            });
        }

        function subject_index() {
            $.ajax({
                type: "POST",
                url: "../query/admin_subject_index.php",
                dataType: "JSON",
                success: function(response) {
                    var table1 = []

                    response.data.forEach((element, key) => {
                        var objTable = Object.create(objTables)
                        var dataTables = []
                        dataTables['subject_id'] = element['subject_id']
                        objTable.subject_id_auto = element['subject_id_auto']
                        objTable.subject_name_en = element['subject_name_en']
                        objTable.subject_credit = element['subject_credit']

                        dataTables['subject_level_guide'] = element['subject_level_guide']
                        dataTables['subject_term_guide'] = element['subject_term_guide']

                        objTable.required_subject1 = element['required_subject1']
                        objTable.required_subject2 = element['required_subject2']
                        objTable.required_subject3 = element['required_subject3']

                        dataTables['subject_name_credit'] = objTable.subject_name_credit();
                        dataTables['required_subject'] = objTable.required_subject()
                        dataTables['button'] = objTable.button()

                        table1.push(dataTables)

                    });
                    table.clear().rows.add(table1).draw();
                }
            });
        }


        var objTables = {
            "subject_id_auto": "",
            "subject_name_en": "",
            "subject_credit": "",
            "required_subject1": "",
            "required_subject2": "",
            "required_subject3": "",
            subject_name_credit: function() {

                return this.subject_name_en + "<span class=\"text-info\">(" + this.subject_credit + ")</span>";
            },
            required_subject: function() {
                var strSubject = ""
                if (this.required_subject1 != "" && this.required_subject1 != null) {
                    strSubject += "<p>" + this.required_subject1 + "</p>"
                }

                if (this.required_subject2 != "" && this.required_subject2 != null) {
                    strSubject += "<p>" + this.required_subject2 + "</p>"
                }

                if (this.required_subject3 != "" && this.required_subject3 != null) {
                    strSubject += "<p>" + this.required_subject3 + "</p>"
                }
                return strSubject;
            },
            button: function() {
                var strButtonEdit = "<button type =\"button\" class=\"btn btn-info btn-sm btn-edit-subject\" value=\"" + this.subject_id_auto + "\">Edit</button>"
                return strButtonEdit;
            }

        }

        var dataTables = [{
            "subject_id": "",
            "subject_name_credit": "",
            "required_subject": "",
            "subject_level_guide": "",
            "subject_term_guide": "",
            "button": ""

        }]

        var table = $('#table_subject').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "subject_id",
                    "width": "10%"
                },
                {
                    "data": "subject_name_credit",
                    "width": "40%"
                },
                {
                    "data": "required_subject",
                    "width": "10%"
                },
                {
                    "data": "subject_level_guide",
                    "width": "10%"
                },
                {
                    "data": "subject_term_guide",
                    "width": "10%"
                },
                {
                    "data": "button",
                    "width": "20%"
                }
            ],
            "columnDefs": [{
                    "targets": ["subject_id"],
                    "searchable": true
                },
                {
                    "targets": ["subject_name_credit"],
                    "searchable": true
                },
                {
                    "targets": ["required_subject"],
                    "searchable": true
                },
                {
                    "targets": ["subject_level_guide"],
                    "searchable": true
                },
                {
                    "targets": ["subject_term_guide"],
                    "searchable": true
                },
                {
                    "targets": ["button"],
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