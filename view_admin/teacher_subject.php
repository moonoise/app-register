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
                    <form class="" name="form_update_subject" id="form_update_subject">
                        <input type="hidden" name="update_ts_id" id="update_ts_id">
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="update_subject_id" class="">รหัสราชวิชา</label><input name="update_subject_id" id="update_subject_id" placeholder="รหัสรายวิชา" type="text" class="form-control" readonly></div>
                            </div>
                            <div class="col-md-8">
                                <div class="position-relative form-group"><label for="update_subject" class="">รายวิชา</label>
                                    <select class="mb-2 form-control" name="update_subject" id="update_subject">
                                        <option>เลือก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="update_year" class="">ปีการศึกษา</label>
                                    <select class="mb-2 form-control" name="update_year" id="update_year">
                                        <option>เลือก</option>
                                        <option value='2018'>2018</option>
                                        <option value='2019'>2019</option>
                                        <option value='2020'>2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="update_term" class="">รายวิชา</label>
                                    <select class="mb-2 form-control" name="update_term" id="update_term">
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
                    <button type="submit" class="btn btn-primary">update</button>
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

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "../query/subject_list.php",
            dataType: "JSON",
            success: function (response) {
                response.data.forEach((element,key) => {
                    $("#new_subject").append("<option value='"+element['subject_id']+"' > "+"["+ element['subject_id']+"] "+ element['subject_name_en']+" </option>");
                });
            }
        });


        $("#new_subject").on("change", function () {
            // console.log('test')
                $("#new_subject_id").val(
                    $("#new_subject option:selected").val()
                )
            });

        }); 

    $("#form_new_subject").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../query/teacher_subject_add.php",
            data: $("#form_new_subject").serialize(),
            dataType: "JSON",
            success: function (response) {
                // console.log(response)

                if (response.success == true) {
                    Swal.fire({
                        title: 'เพ่ิมรายวิชาที่สอน',
                        text: 'สำเร็จ',
                        type: 'success',
                        confirmButtonText: 'OK'
                    });
                    teacher_subject_show()
                    $('.bd-new-modal-lg').modal('hide')
                }else{
                    Swal.fire({
                        title: 'เพ่ิมรายวิชาที่สอน',
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
            "edit": function() {

                return " <button type='button' class='btn btn-sm btn-primary ' onclick='add_student(" + this.ts_id + ")'> เพิ่มนักศึกษา </button> \
                        <button type='button' class='btn btn-sm btn-info ' onclick='student_grade(" + this.ts_id + ")' > กรอกเกรด </button>  \
                        <button type='button' class='btn btn-sm btn-success ' value='" + this.ts_id + "'> Edit </button>";
            }
        }

        function teacher_subject_show() {

            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_index.php",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var dd = Object.create(dt);
                    var table1 = []
                    response.data.forEach((element, key) => {
                        var dataTable = []
                        dd.ts_id = element['ts_id']
                        dataTable['subject_id'] = element['subject_id']
                        dataTable['year_term'] = element['yt_year'] + " " + element['yt_term']
                        dataTable['subject'] = element['subject_name_en']
                        dataTable['edit'] = dd.edit()

                        table1.push(dataTable)
                    });
                    console.log(table1)
                    table.clear().rows.add(table1).draw();

                }
            });
        }

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


        function add_student(ts_id) {
            $("#ts_id").val(ts_id)
            $("#form_student_subject").submit()
        }

        function student_grade(ts_id) {
            $("#teacher_grade_ts_id").val(ts_id)
            $("#form_teacher_grade").submit()
        }

        function teacher_subject_edit(ts_id) {

            $.ajax({
                type: "POST",
                url: "../query/subject_list.php",
                dataType: "JSON",
                success: function (response) {
                    response.data.forEach((element,key) => {
                        $("#update_subject").append("<option value='"+element['subject_id']+"' > "+"["+ element['subject_id']+"] "+ element['subject_name_en']+" </option>");
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_show.php",
                data: {'ts_id':ts_id},
                dataType: "JSON",
                success: function (response) {
                    // console.log(response.data)
                    $("#update_ts_id").val(response.data.ts_id)
                    $("#update_subject_id").val(response.data.subject_id);
                    $("#update_subject").val(response.data.subject_id)
                    $("#update_year").val(response.data.yt_year)
                    $("#update_term").val(response.data.yt_term)
                }
            });

            $('.bd-update-modal-lg').modal('show')

        }

    $("#form_update_subject").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../query/teacher_subject_update.php",
            data: $("#form_update_subject").serialize(),
            dataType: "JSON",
            success: function (response) {
                if (response.success == true) {
                    Swal.fire({
                        title: 'อัพเดทรายวิชาที่สอน',
                        text: 'สำเร็จ',
                        type: 'success',
                        confirmButtonText: 'OK'
                    });
                    teacher_subject_show()
                    $('.bd-new-modal-lg').modal('hide')
                }else{
                    Swal.fire({
                        title: 'อัพเดทรายวิชาที่สอน',
                        text: 'ไม่สำเร็จ ข้อมูลที่กรอก อาจมีอยู่แล้ว',
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