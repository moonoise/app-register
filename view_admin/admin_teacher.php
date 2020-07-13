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
                                    <table style="width: 100%;" id="table_teacher" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>รหัสอาจารย์</th>
                                                <th>ชื่อ - สกุล</th>
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
                    <h5 class="modal-title" id="student-admin-title">แก้ไขข้อมูลอาจารย์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_teacher_edit" id="form_teacher_edit">
                        <input type="hidden" name="teacher_id_auto_edit" id="teacher_id_auto_edit">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="teacher_id_edit" class="">รหัสอาจารย์</label><input name="teacher_id_edit" id="teacher_id_edit" placeholder="รหัสอาจารย์" type="text" class="form-control"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="teacher_title_name_edit" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="teacher_title_name_edit" id="teacher_title_name_edit">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="teacher_fname_edit" class="">ชื่อ</label><input name="teacher_fname_edit" id="teacher_fname_edit" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="teacher_lname_edit" class="">สกุล</label><input name="teacher_lname_edit" id="teacher_lname_edit" placeholder="ภาษาไทย" type="text" class="form-control"></div>
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

    <!-- modal-edit subject -->

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
                                <div class="position-relative form-group"><label for="teacher_id_add" class="">รหัสอาจารย์</label><input name="teacher_id_add" id="teacher_id_add" placeholder="รหัสอาจารย์" type="text" class="form-control"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="teacher_title_name_add" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="teacher_title_name_add" id="teacher_title_name_add">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="teacher_fname_add" class="">ชื่อ</label><input name="teacher_fname_add" id="teacher_fname_add" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="teacher_lname_add" class="">สกุล</label><input name="teacher_lname_add" id="teacher_lname_add" placeholder="ภาษาไทย" type="text" class="form-control"></div>
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
        teacher_index()

        var objTables = {
            "teacher_title_name": "",
            "teacher_fname": "",
            "teacher_lname": "",
            "teacher_id_auto": "",
            fullname: function() {
                return this.teacher_title_name + this.teacher_fname + " " + this.teacher_lname
            },
            button: function() {
                var strButtonEdit = "<button type =\"button\" class=\"btn btn-info btn-sm btn-edit-teacher\" value=\"" + this.teacher_id_auto + "\">Edit</button>"
                return strButtonEdit
            }
        }

        function teacher_index() {
            $.ajax({
                type: "POST",
                url: "../query/admin_teacher_index.php",
                dataType: "JSON",
                success: function(response) {
                    var table1 = []

                    response.data.forEach((element, key) => {
                        var objTable = Object.create(objTables)
                        var dataTables = []
                        dataTables['teacher_id'] = element['teacher_id']
                        objTable.teacher_title_name = element['teacher_title_name']
                        objTable.teacher_fname = element['teacher_fname']
                        objTable.teacher_lname = element['teacher_lname']
                        objTable.teacher_id_auto = element['teacher_id_auto']
                        dataTables['name'] = objTable.fullname();
                        dataTables['edit'] = objTable.button()

                        table1.push(dataTables)

                    });
                    table.clear().rows.add(table1).draw();
                }
            });
        }

        var dataTables = [{
            "teacher_id": "",
            "name": "",
            "edit": ""
        }]

        var table = $('#table_teacher').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "teacher_id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "edit"
                }
            ],
            "columnDefs": [{
                    "targets": ["teacher_id"],
                    "searchable": true
                },
                {
                    "targets": ["name"],
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

        $("#form_teacher_add").validate({
            rules: {
                teacher_id_add: "required",
                teacher_title_name_add: "required",
                teacher_fname_add: "required",
                teacher_lname_add: "required"
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
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "../query/admin_teacher_add.php",
                    data: $(form).serialize(),
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
                            toastr["success"]("สำเร็จ", "การเพิ่มอาจารย์");
                            student_show()
                            $('#form_teacher_add')[0].reset();
                            $(".bd-new-modal-lg").modal('hide')

                        } else {
                            Swal.fire({
                                title: 'การเพิ่มอาจารย์',
                                text: 'ไม่สำเร็จ' + response.error,
                                type: 'error',
                                confirmButtonText: 'รับทราบ'
                            });
                        }
                    }
                });
            }
        });

        $(document).on("click", ".btn-edit-teacher", function() {
            $.ajax({
                type: "POST",
                url: "../query/admin_teacher_edit_by_id.php",
                data: {
                    "teacher_id_auto_edit": $(this).val()
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response)

                    $("#form_teacher_edit")[0].reset();
                    if (response.data != null) {
                        $("#teacher_id_auto_edit").val(response.data.teacher_id_auto)
                        $("#teacher_id_edit").prop("readonly", true);
                        $("#teacher_id_edit").val(response.data.teacher_id)
                        $("#teacher_title_name_edit").val(response.data.teacher_title_name);
                        $("#teacher_fname_edit").val(response.data.teacher_fname);
                        $("#teacher_lname_edit").val(response.data.teacher_lname);

                        $(".bd-edit-modal-lg").modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        });
                    }

                }
            });
        });

        $("#form_teacher_edit").validate({
            rules: {
                teacher_title_name_edit: "required",
                teacher_fname_edit: "required",
                teacher_lname_edit: "required"
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
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "../query/admin_teacher_update.php",
                    data: $("#form_teacher_edit").serialize(),
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
                            toastr["success"]("สำเร็จ", "อัพเดทข้อมูลอาจารย์");
                            teacher_index()
                            $('#form_teacher_edit')[0].reset();
                            $(".bd-edit-modal-lg").modal('hide')

                        } else {
                            Swal.fire({
                                title: 'การอัพเดทข้อมูลอาจารย์',
                                text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                type: 'error',
                                confirmButtonText: 'รับทราบ'
                            });
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>