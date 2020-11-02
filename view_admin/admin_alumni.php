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
    <title>โปรแกรมตรวจสอบความถูกต้องของลำดับรายวิชาในการลงทะเบียนเรียน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">


    <style>
        .for-this-table td,
        .for-this-table th {
            padding: .1rem;
        }

        td.details-control {
            /* background: url('../resources/details_open.png') no-repeat center center; */
            cursor: pointer;
        }

        tr.shown td.details-control {
            /* background: url('../resources/details_close.png') no-repeat center center; */
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
                                <div class="card-header">รายชื่อศิษย์เก่า กรมชบประทาน</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <!-- <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-new-modal-lg"><i class="pe-7s-news-paper btn-icon-wrapper"></i> New</button> -->
                                        </div>
                                        <div class="col-9">
                                            <div class="form-row">
                                                <form action="" class="form-inline" name="form_select_std" id="form_select_std">
                                                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                        <label for="select_yt_year" class="mr-sm-2">เลือกรุ่นนิสิต(Batch)</label>
                                                        <input type="text" class="form-control" name="batch" id="batch">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">เลือก</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered for-this-table">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col" class="text-center fa">#</th>
                                                        <th scope="col" class="text-center">ปีการศึกษา(รุ่น)</th>
                                                        <th scope="col" class="text-center">ชื่อ - สกุล <span class="text text-danger">(ชื่อเก่า)</span></th>
                                                        <th scope="col" class="text-center">เบอร์โทร</th>
                                                        <th scope="col" class="text-center">สถานะ</th>
                                                        <th scope="col" class="text-center">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                <div class="position-relative form-group"><label for="std_id_edit" class="">รหัสนักศึกษา</label>
                                    <input name="std_id_edit" id="std_id_edit" placeholder="รหัสนักศึกษา" type="text" class="form-control" readonly>
                                </div>
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
                                <div class="position-relative form-group"><label for="std_fname_edit" class="">Name</label><input name="std_fname_edit" id="std_fname_edit" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_edit" class="">Surname</label><input name="std_lname_edit" id="std_lname_edit" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="std_title_name_edit" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="std_title_name_th_edit" id="std_title_name_th_edit">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_fname_th_edit" class="">ชื่อ</label><input name="std_fname_th_edit" id="std_fname_th_edit" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_th_edit" class="">สกุล</label><input name="std_lname_th_edit" id="std_lname_th_edit" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="admission_type_edit" class="">มาจากโครงการ...</label>
                                    <select class="mb-2 form-control" name="admission_type_edit" id="admission_type_edit">
                                        <option value="" selected>โปรดระบุ...</option>

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
                                <div class="position-relative form-group"><label for="std_fname_add" class="">Name</label><input name="std_fname_add" id="std_fname_add" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_add" class="">Surname</label><input name="std_lname_add" id="std_lname_add" placeholder="ภาษาอังกฤษ" type="text" class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="std_title_name_add" class="">คำนำหน้า</label>
                                    <select class="mb-2 form-control" name="std_title_name_th_add" id="std_title_name_th_add">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_fname_th_add" class="">ชื่อ</label><input name="std_fname_th_add" id="std_fname_th_add" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="std_lname_th_add" class="">สกุล</label><input name="std_lname_th_add" id="std_lname_th_add" placeholder="ภาษาไทย" type="text" class="form-control"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="admission_type_add" class="">มาจากโครงการ...</label>
                                    <select class="mb-2 form-control" name="admission_type_add" id="admission_type_add">
                                        <option value="" selected>โปรดระบุ...</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal-new subject -->

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

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {
            $("#menu5").addClass("mm-active");
            $("#sub1-menu5").addClass("mm-active");
            student_show()
            admission_list()
        });


        function admission_list() {
            $.ajax({
                type: "POST",
                url: "../query/admission_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#admission_type_add").append("<option value=\"" + element[
                                'admission_type_code'] + "\"> " + element['admission_type_detail'] +
                            " </option>")
                        $("#admission_type_edit").append("<option value=\"" + element[
                                'admission_type_code'] + "\"> " + element['admission_type_detail'] +
                            " </option>")

                    });

                }
            });
        }

        function alumni_edit(ku_id_auto) {
            $.ajax({
                type: "POST",
                url: "../query_alumni/admin_alumni_edit.php",
                data: {
                    "ku_id_auto": ku_id_auto
                },
                dataType: "JSON",
                success: function(response) {
                    $("#form_student_edit")[0].reset();
                    if (response.data != null) {


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
            "ku_id_auto": "",
            edit: function() {
                return "<button class=\"btn-sm btn-icon btn btn-info\" onclick=\"alumni_show(" + this.ku_id_auto + ")\"><i class=\"pe-7s-study btn-icon-wrapper\"> </i></button> \
                <button class=\"btn-sm btn-icon btn btn-warning\" onclick=\"alumni_edit(" + this.ku_id_auto +
                    ")\"><i class=\"pe-7s-edit btn-icon-wrapper\"> </i>Edit</button>";
            }
        }

        $("#form_select_std").submit(function(e) {
            e.preventDefault();
            student_show($("#batch").val())
        });

        function student_show(batch) {

            $.ajax({
                type: "POST",
                url: "../query_alumni/alumni_index_by_year.php",
                data: {
                    'batch': batch
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var table1 = []
                    var objTable = Object.create(objDataTables)
                    response.data.forEach((element, key) => {
                        var dataTables = []
                        var strNameOld = ""
                        dataTables['year_batch'] = (parseInt(element['std_year']) + 543) +
                            " <span class=\"text text-info\">(รุ่น " + element['batch'] + ")</span>"
                        if (!Object.is(element['std_fname_th_old'], null) || !Object.is(element[
                                'std_lname_th_old'], null)) {
                            strNameOld += " <span class=\"text text-danger\"> ( " + element[
                                    'std_fname_th_old'] + " " + element['std_lname_th_old'] +
                                " ) </span>"
                        }
                        dataTables['btn_explain'] = "<i class=\"fa fa-plus-circle\"> </i>"
                        dataTables['std_fullname'] = element['std_fname_th'] + " " + element[
                            'std_lname_th'] + strNameOld
                        dataTables['std_mobile'] = element['student_mobile']

                        if (!Object.is(element['alumni_reg_id'], null)) {
                            dataTables['reg_status'] = "<span class=\"text text-success\">ลงทะเบียนแล้ว</span>";
                        } else {
                            dataTables['reg_status'] = "<span class=\"text text-danger\">ยังไม่ลงทะเบียน</span>";
                        }

                        dataTables['id2'] = element['id2']
                        dataTables['std_nickname'] = element['std_nickname']
                        dataTables['std_email'] = element['std_email']
                        dataTables['std_line'] = element['std_line']
                        dataTables['std_position'] = element['std_position']
                        dataTables['std_workplace'] = element['std_workplace']
                        objTable.ku_id_auto = element['ku_id_auto']
                        dataTables['edit'] = objTable.edit()

                        table1.push(dataTables)
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
            "btn_explain": "",
            "year_batch": "",
            "std_fullname": "",
            "std_mobile": "",
            "reg_status": "",
            "edit": "",
            "id2": "",
            "std_nickname": "",
            "std_email": "",
            "std_line": "",
            "std_position": "",
            "std_workplace": ""

        }];

        var table = $('#table_teacher_subject').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "className": 'details-control text-center',
                    "orderable": false,
                    "data": 'btn_explain',
                    "defaultContent": ''

                },
                {
                    "data": "year_batch"
                },
                {
                    "data": "std_fullname"
                },
                {
                    "data": "std_mobile"
                },
                {
                    "data": "reg_status"
                },
                {
                    "data": "edit"
                },
                {
                    "data": "id2",
                    visible: false
                },
                {
                    "data": "std_nickname",
                    visible: false
                },
                {
                    "data": "std_email",
                    visible: false
                },
                {
                    "data": "std_line",
                    visible: false
                },
                {
                    "data": "std_position",
                    visible: false
                },
                {
                    "data": "std_workplace",
                    visible: false
                }
            ],
            "columnDefs": [{
                    "targets": ["year_batch"],
                    "searchable": true
                },
                {
                    "targets": ["std_fullname"],
                    "searchable": true
                },
                {
                    "targets": ["std_mobile"],
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

        function format(d) {
            // `d` is the original data object for the row
            var strNickName = "&nbsp;&nbsp;&nbsp;"
            var strId2 = "&nbsp;&nbsp;&nbsp;"
            var strEmail = "&nbsp;&nbsp;&nbsp;"
            var strLine = "&nbsp;&nbsp;&nbsp;"
            var stdPosition = "&nbsp;&nbsp;&nbsp;"
            var stdWorkplace = "&nbsp;&nbsp;&nbsp;"
            if (!Object.is(d.std_nickname, null)) {
                strNickName = d.std_nickname
            }
            if (!Object.is(d.id2, null)) {
                strId2 = d.id2
            }
            if (!Object.is(d.std_email, null)) {
                strEmail = d.std_email
            }
            if (!Object.is(d.std_line, null)) {
                strLine = d.std_line
            }
            if (!Object.is(d.std_position, null)) {
                stdPosition = d.std_position
            }
            if (!Object.is(d.std_workplace, null)) {
                stdWorkplace = d.std_workplace
            }
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>ชื่อเล่น:</td>' +
                '<td>' + strNickName + '</td>' +
                '<td>&nbsp;&nbsp;&nbsp; </td>' +
                '<td>เลขชลกร:</td>' +
                '<td>' + d.id2 + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>อีเมล:</td>' +
                '<td>' + strEmail + '</td>' +
                '<td> &nbsp;&nbsp;&nbsp;</td>' +
                '<td>ID LINE:</td>' +
                '<td>' + strLine + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>ตำแหน่ง:</td>' +
                '<td>' + stdPosition + '</td>' +
                '<td> &nbsp;&nbsp;&nbsp;</td>' +
                '<td>สถานที่ทำงาน :</td>' +
                '<td>' + stdWorkplace + '</td>' +
                '</tr>' +
                '</table>';
        }

        $('#table_teacher_subject tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            // console.log($(this).children().removeClass("font-icon-plus"))
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                $(this).children().addClass("fa-plus-circle")
                $(this).children().removeClass("fa-minus-circle")

            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');

                $(this).children().removeClass("fa-plus-circle")
                $(this).children().addClass("fa-minus-circle")
            }
        });

        $("#form_student_add").validate({
            rules: {
                std_id_add: "required",
                std_id_card_add: "required",
                std_year_add: "required",
                std_title_name_add: "required",
                std_fname_add: "required",
                std_lname_add: "required",
                std_title_name_th_add: "required",
                std_fname_th_add: "required",
                std_lname_th_add: "required"
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
                    url: "../query/admin_student_add.php",
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
            }
        });

        $("#form_student_edit").validate({
            rules: {
                std_id_edit: "required",
                std_id_card_edit: "required",
                std_year_edit: "required",
                std_title_name_edit: "required",
                std_fname_edit: "required",
                std_lname_edit: "required",
                std_title_name_th_edit: "required",
                std_fname_th_edit: "required",
                std_lname_th_edit: "required"
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
                    url: "../query/admin_student_update.php",
                    data: $("#form_student_edit").serialize(),
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
                            toastr["success"]("สำเร็จ", "อัพเดทนักศึกษา");
                            student_show()
                            $('#form_student_edit')[0].reset();
                            $(".bd-edit-modal-lg").modal('hide')

                        } else {
                            Swal.fire({
                                title: 'อัพเดทนักศึกษา',
                                text: 'ไม่สำเร็จ' + response.error + " <br> " + response
                                    .success,
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