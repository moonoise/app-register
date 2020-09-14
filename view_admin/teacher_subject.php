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
    <title>ระบบข้อมูลนักเรียน นักศึกษา</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">

    <style>
        .for-this-table td,
        .for-this-table th {
            padding: .1rem;
        }
    </style>

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
                                    <div class="row">
                                        <div class="col-2">
                                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-new-modal-lg">New</button>
                                        </div>
                                        <div class="col-8">
                                            <form action="" class="form-inline" name="form_select_std_year" id="form_select_std_year">
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="select_yt_year" class="mr-sm-2">เลือกปีการศึกษา</label>
                                                    <select class="mb-2 mt-2 form-control " name="select_yt_year" id="select_yt_year" aria-invalid="false">
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                    <label for="select_yt_term" class="mr-sm-2">ภาค</label>
                                                    <select class="mb-2 mt-2 form-control " name="select_yt_term" id="select_yt_term" aria-invalid="false">
                                                        <option value="1">ภาคต้น</option>
                                                        <option value="2">ภาคปลาย</option>
                                                        <option value="3">ภาคฤดูร้อน</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary" type="submit">เลือก</button>
                                            </form>
                                        </div>
                                    </div>

                                    <br>

                                    <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered  for-this-table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>รหัสวิชา</th>
                                                <th>รายวิชา</th>
                                                <th><small>ปีการศึกษา-เทอม</small></th>
                                                <th>ผู้สอน</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายวิชา</h5>
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
                                <div class="position-relative form-group"><label for="new_term" class="">เทอม</label>
                                    <select class="mb-2 form-control" name="new_term" id="new_term">
                                        <option>เลือก</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="new_teacher_id" class="">อาจารย์ผู้สอน คนที่ 1</label>
                                    <select class="mb-2 form-control" name="new_teacher_id" id="new_teacher_id">
                                        <option value="">เลือก</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="new_teacher_id2" class="">อาจารย์ผู้สอน คนที่ 2</label>
                                    <select class="mb-2 form-control" name="new_teacher_id2" id="new_teacher_id2">
                                        <option value="">เลือก</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="new_teacher_id3" class="">อาจารย์ผู้สอน คนที่ 3</label>
                                    <select class="mb-2 form-control" name="new_teacher_id3" id="new_teacher_id3">
                                        <option value="">เลือก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form_update_subject -->
                    <form class="" name="form_update_subject" id="form_update_subject">
                        <input type="hidden" name="ts_id" id="update_ts_id">
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group">
                                    <label for="update_subject_id" class="">รหัสราชวิชา</label>
                                    <input name="update_subject_id" id="update_subject_id" placeholder="รหัสรายวิชา" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="position-relative form-group"><label for="update_subject" class="">รายวิชา</label>
                                    <select class="mb-2 form-control" name="update_subject" id="update_subject" disabled>
                                        <option>เลือก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="new_year" class="">ปีการศึกษา</label>
                                    <select class="mb-2 form-control" name="update_year" id="update_year" disabled>
                                        <option>เลือก</option>
                                        <option value='2018'>2018</option>
                                        <option value='2019'>2019</option>
                                        <option value='2020'>2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="update_term" class="">เทอม</label>
                                    <select class="mb-2 form-control" name="update_term" id="update_term" disabled>
                                        <option>เลือก</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="update_teacher_id" class="">อาจารย์ผู้สอน คนที่ 1</label>
                                    <select class="mb-2 form-control" name="update_teacher_id" id="update_teacher_id">
                                        <option value="">เลือก</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="update_teacher_id2" class="">อาจารย์ผู้สอน คนที่ 2</label>
                                    <select class="mb-2 form-control" name="update_teacher_id2" id="update_teacher_id2">
                                        <option value="">เลือก</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="update_teacher_id3" class="">อาจารย์ผู้สอน คนที่ 3</label>
                                    <select class="mb-2 form-control" name="update_teacher_id3" id="update_teacher_id3">
                                        <option value="">เลือก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="student_subject_add.php" method="post" target="add_grade" id="form_student_subject" name="form_student_subject">
        <input type="hidden" name="ts_id" id="ts_id">
    </form>
    <form action="teacher_grade_show.php" method="post" target="add_grade" id="form_teacher_grade" name="form_teacher_grade">
        <input type="hidden" name="teacher_grade_ts_id" id="teacher_grade_ts_id">
    </form>


    <div class="body-block-example-1 d-none">
        <div class="loader bg-transparent no-shadow p-0">
            <div class="ball-grid-pulse">
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
                <div class="bg-white"></div>
            </div>
        </div>
    </div>

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {

            $("#menu3").addClass("mm-active");
            $("#sub1-menu3").addClass("mm-active");


            $.ajax({
                type: "POST",
                url: "../query/subject_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#new_subject").append("<option value='" + element['subject_id'] + "' > " + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " </option>");
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../query/teacher_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#new_teacher_id").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                        $("#new_teacher_id2").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                        $("#new_teacher_id3").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                    });
                }
            });


            $("#form_select_std_year").submit(function(e) {
                e.preventDefault();

                teacher_subject_show($("#select_yt_year").val(), $("#select_yt_term").val())
            });

            $("#new_subject").on("change", function() {
                // console.log('test')
                $("#new_subject_id").val(
                    $("#new_subject option:selected").val()
                )
            });

        });

        $("#form_new_subject").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_add.php",
                data: $("#form_new_subject").serialize(),
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)

                    if (response.success == true) {
                        Swal.fire({
                            title: 'เพิ่มรายวิชาที่สอน',
                            text: 'สำเร็จ',
                            type: 'success',
                            confirmButtonText: 'OK'
                        });
                        teacher_subject_show()
                        $('.bd-new-modal-lg').modal('hide')
                        $("#form_new_subject")[0].reset()
                    } else {
                        Swal.fire({
                            title: 'เพิ่มรายวิชาที่สอน',
                            text: 'ไม่สำเร็จ ข้อมูลที่กรอก อาจมีอยู่แล้ว',
                            type: 'error',
                            confirmButtonText: 'รับทราบ'
                        });
                    }


                }
            });
        });

        teacher_subject_show()
        var dt = {
            "ts_id": "",
            "subject_id": "",
            "subject": "",
            "year_term": "",
            "teacher_title_name": "",
            "teacher_fname": "",
            "teacher_lname": "",
            "teacher_title_name2": "",
            "teacher_fname2": "",
            "teacher_lname2": "",
            "teacher_title_name3": "",
            "teacher_fname3": "",
            "teacher_lname3": "",
            "teacher": function() {
                var strName = ""
                if (this.teacher_fname != null) {
                    strName += "<p class\"text text-info\"> " + this.teacher_title_name + this.teacher_fname + " " + this.teacher_lname + "</p>"
                }
                if (this.teacher_fname2 != null) {
                    strName += "<p class\"text text-info\"> " + this.teacher_title_name2 + this.teacher_fname2 + " " + this.teacher_lname2 + "</p>"
                }
                if (this.teacher_fname3 != null) {
                    strName += "<p class\"text text-info\"> " + this.teacher_title_name3 + this.teacher_fname3 + " " + this.teacher_lname3 + "</p>"
                }
                return strName
            },
            "edit": function() {

                return " <button type='button' class='btn btn-sm btn-primary ' onclick='add_student(`" + this.ts_id + "`)'> เพิ่มนักศึกษา </button> \
                        <button type='button' class='btn btn-sm btn-info ' onclick='student_grade(" + this.ts_id + ")' > กรอกเกรด </button>  \
                        <button type='button' class='btn btn-sm btn-success ' onclick='teacher_subject_edit(" + this.ts_id + ")'> Edit </button>";
            }
        }

        function teacher_subject_show(yt_year, yt_term) {
            // console.log(std_year)
            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_index.php",
                data: {
                    "yt_year": yt_year,
                    "yt_term": yt_term
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)

                    var table1 = []
                    response.data.forEach((element, key) => {
                        var dd = Object.create(dt);
                        var dataTable = []
                        dd.ts_id = element['ts_id']
                        dd.teacher_title_name = element['teacher_title_name']
                        dd.teacher_fname = element['teacher_fname']
                        dd.teacher_lname = element['teacher_lname']
                        dd.teacher_title_name2 = element['teacher_title_name2']
                        dd.teacher_fname2 = element['teacher_fname2']
                        dd.teacher_lname2 = element['teacher_lname2']
                        dd.teacher_title_name3 = element['teacher_title_name3']
                        dd.teacher_fname3 = element['teacher_fname3']
                        dd.teacher_lname3 = element['teacher_lname3']

                        dataTable['subject_id'] = element['subject_id']
                        dataTable['year_term'] = element['yt_year'] + " " + element['yt_term']
                        dataTable['subject'] = element['subject_name_en']

                        dataTable['teacher'] = dd.teacher()
                        dataTable['edit'] = dd.edit()
                        // if (element['ts_id'] == '108') {
                        // console.log(dd.teacher())
                        // console.log(element['teacher_fname3'])
                        // }
                        table1.push(dataTable)
                    });

                    table.clear().rows.add(table1).draw();
                    $.unblockUI();
                },
                beforeSend: function() {
                    $.blockUI({
                        message: $('.body-block-example-1')
                    });
                }
            });
        }

        var dataTables = [{
            "subject_id": "",
            "subject": "",
            "year_term": "",
            "teacher": "",
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
                    "data": "teacher"
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
                    "searchable": true,
                },
                {
                    "targets": ["teacher"],
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


        function add_student(ts_id) {
            $("#ts_id").val(ts_id)
            $("#form_student_subject").submit()
        }

        function student_grade(ts_id) {
            $("#teacher_grade_ts_id").val(ts_id)
            $("#form_teacher_grade").submit()
        }

        function teacher_subject_edit(ts_id) {
            $(".bd-update-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });

            $.ajax({
                type: "POST",
                url: "../query/teacher_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#update_teacher_id").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                        $("#update_teacher_id2").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                        $("#update_teacher_id3").append("<option value=\"" + element['teacher_id'] + "\"> " + element['teacher_title_name'] + element['teacher_fname'] + " " + element['teacher_lname'] + " </option>")
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../query/subject_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#update_subject").append("<option value='" + element['subject_id'] + "' > " + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " </option>");
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_show.php",
                data: {
                    'ts_id': ts_id
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response.data)
                    $("#update_ts_id").val(response.data.ts_id)
                    $("#update_subject_id").val(response.data.subject_id);
                    $("#update_subject").val(response.data.subject_id)
                    $("#update_year").val(response.data.yt_year)
                    $("#update_term").val(response.data.yt_term)

                    $("#update_teacher_id").val(response.data.teacher_id)
                    $("#update_teacher_id2").val(response.data.teacher_id2)
                    $("#update_teacher_id3").val(response.data.teacher_id3)
                }
            });
        }

        $("#form_update_subject").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_update.php",
                data: $("#form_update_subject").serialize(),
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        Swal.fire({
                            title: 'อัพเดทรายวิชาที่สอน',
                            text: 'สำเร็จ',
                            type: 'success',
                            confirmButtonText: 'OK'
                        });
                        teacher_subject_show()
                        $('.bd-update-modal-lg').modal('hide')
                        $("#form_update_subject")[0].reset();
                    } else {
                        Swal.fire({
                            title: 'อัพเดทรายวิชาที่สอน',
                            text: 'ไม่สำเร็จ' + response.error,
                            type: 'error',
                            confirmButtonText: 'รับทราบ'
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>