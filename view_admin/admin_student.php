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
                                    <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>ปีการศึกษา(รุ่น)</th>
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



      <!-- modal-edit subject -->
      <div class="modal fade bd-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="student-edit-title">แก้ไขข้อมูลนักศึกษา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_student_edit" id="form_student_edit">
                        <input type="hidden" name="std_id_auto_update" id="std_id_auto_update">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_id_edit" class="">รหัสนักศึกษา</label><input name="std_id_edit" id="std_id_edit" placeholder="รหัสนักศึกษา" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_id_card_edit" class="">บัตรประชาชน</label><input name="std_id_card_edit" id="std_id_card_edit" placeholder="บัตรประชาชน" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_year_edit" class="">ปีการศึกษาที่เข้าเรียน</label>
                                    <select class="mb-2 form-control" name="std_year_edit" id="std_year_edit">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="std_title_name_edit" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="std_title_name_edit" id="std_title_name_edit">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Miss.">Miss.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_fname_edit" class="">ชื่อ</label><input name="std_fname_edit" id="std_fname_edit" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_edit" class="">นามสกุล</label><input name="std_lname_edit" id="std_lname_edit" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
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

    <!-- modal-edit subject -->

    <!-- modal-new subject -->
    <div class="modal fade bd-new-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="student-admin-title">เพิ่มนักศึกษา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_student_add" id="form_student_add">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_id_add" class="">รหัสนักศึกษา</label><input name="std_id_add" id="std_id_add" placeholder="รหัสนักศึกษา" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_id_card_add" class="">บัตรประชาชน</label><input name="std_id_card_add" id="std_id_card_add" placeholder="บัตรประชาชน" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_year_add" class="">ปีการศึกษาที่เข้าเรียน</label>
                                    <select class="mb-2 form-control" name="std_year_add" id="std_year_add">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="std_title_name_add" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="std_title_name_add" id="std_title_name_add">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_fname_add" class="">ชื่อ</label><input name="std_fname_add" id="std_fname_add" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_add" class="">นามสกุล</label><input name="std_lname_add" id="std_lname_add" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
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

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        student_show()

        function student_edit(std_id_auto) {
            $.ajax({
                type: "POST",
                url: "../query/admin_student_edit.php",
                data: {
                    "std_id_auto": std_id_auto
                },
                dataType: "JSON",
                success: function(response) {
                    $("#form_student_edit")[0].reset();
                    if (response.data != null) {
                        $("#std_id_auto_update").val(response.data.std_id_auto)
                        $("#std_id_edit").val(response.data.std_id)
                        $("#std_id_card_edit").val(response.data.std_id_card)
                        $("#std_year_edit").val(response.data.std_year)
                        $("#std_title_name_edit").val(response.data.std_title_name)
                        $("#std_fname_edit").val(response.data.std_fname)
                        $("#std_lname_edit").val(response.data.std_lname)

                        $(".bd-edit-modal-lg").modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                    }

                }
            });
        }


        var objDataTables = {
            "std_id_auto": "",
            "std_fullname": "",
            "std_year": "",
            edit: function() {
                return "<button class=\"mb-2 mr-2 btn-icon btn btn-warning\" onclick=\"student_edit(" + this.std_id_auto + ")\"><i class=\"pe-7s-edit btn-icon-wrapper\"> </i>Edit</button>"
            }
        }

        function student_show(std_year) {

            $.ajax({
                type: "POST",
                url: "../query/student_index_by_year.php",
                data: {
                    'std_year': std_year
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var table1 = []
                    var objTable = Object.create(objDataTables)
                    response.data.forEach((element, key) => {
                        var dataTables = []

                        dataTables['std_id'] = element['std_id']
                        dataTables['std_fullname'] = element['std_fname'] + " " + element['std_lname']
                        dataTables['std_year'] = element['std_year']
                        objTable.std_id_auto = element['std_id_auto']
                        dataTables['edit'] = objTable.edit()

                        table1.push(dataTables)
                    });
                    table.clear().rows.add(table1).draw();
                }
            });
        }

        var dataTables = [{
            "std_id": "",
            "std_fullname": "",
            "std_year": "",
            "edit": ""
        }]

        var table = $('#table_teacher_subject').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "std_fullname"
                },
                {
                    "data": "std_year"
                },
                {
                    "data": "edit"
                }
            ],
            "columnDefs": [{
                    "targets": ["std_id"],
                    "searchable": true
                },
                {
                    "targets": ["std_fullname"],
                    "searchable": true
                },
                {
                    "targets": ["std_year"],
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

        $("#form_student_edit").submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/admin_student_update.php",
                data: $("#form_student_edit").serialize(),
                dataType: "JSON",
                success: function (response) {
                    console.log(response)
                }
            });
        });

        $("#form_student_add").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/admin_student_add.php",
                data: $("#form_student_add").serialize(),
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-bottom-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr["success"]("สำเร็จ", "การเพิ่มนักศึกษา");
                        student_show()
                        $('#form_student_add')[0].reset();
                        $(".bd-new-modal-lg").modal('hide')

                    } else {
                        Swal.fire({
                            title: 'เพิ่มนักศึกษา',
                            text: 'ไม่สำเร็จ' + response.error,
                            type: 'error',
                            confirmButtonText: 'รับทราบ'
                        });
                    }
                }
            });
        });

        $("#form_student_add").validate({
            rules: {
                std_id_add: "required",
                std_id_card_add: "required",
                std_year_add: "required",
                std_title_name_add: "required",
                std_fname_add: "required",
                std_lname_add: "required"
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    </script>

</body>

</html>


