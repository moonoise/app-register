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
            padding: .2rem;
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
                                    <h3 class="card-title" id='title-subject'></h3>

                                    <button type="button" class="btn mr-2 mb-2 btn-primary" id="button-search-student"><i class="fa fa-search-plus"></i> ค้นหารายชื่อ</button>

                                    <table style="width: 100%;" id="table_student_subject" class="table table-hover table-striped table-bordered for-this-table">
                                        <thead>
                                            <tr>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>ชั้นปี</th>
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

    <div class="modal fade " id="modal-search-student" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มนิสิต ในรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" name="form_search_student" id="form_search_student">
                        <div class="form-row">
                            <!-- <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_id_search" class="">รหัสนักศึกษา</label><input name="std_id_search" id="std_id_search" placeholder="รหัสนักศึกษา" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_fname_search" class="">Name: </label><input name="std_fname_search" id="std_fname_search" placeholder="" type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group"><label for="std_lname_search" class="">Surname:</label><input name="std_lname_search" id="std_lname_search" placeholder="" type="text" class="form-control"></div>

                            </div> -->
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="std_year_search" class="">เลือก รุ่นนักศึกษา</label>
                                    <select class="mb-2 form-control" name="std_year_search" id="std_year_search">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="position-relative form-group">
                                    <label for="btn-search" class="">&nbsp;.</label>
                                    <button type="submit" class="btn btn-info btn-sm form-control" id="btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <br>
                    <table style="width: 100%;" id="table_student_search" class="table table-hover table-striped table-bordered for-this-table">
                        <thead>
                            <tr>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ - สกุล</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
            var ts_id = '<?php echo $_POST['ts_id']; ?>';
            student_index(ts_id)
            teacher_subject_show(ts_id)
            show_std_year()
        });

        $("#form_search_student").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/student-search.php",
                data: $("#form_search_student").serialize(),
                dataType: "JSON",
                success: function(response) {
                    var table1 = []
                    // console.log(response.data)

                    response.data.forEach((element, key) => {
                        var dataTable = []

                        dataTable['std_id'] = element['std_id']
                        dataTable['student_name'] = element['std_fname'] + " " + element['std_lname']
                        dataTable['edit'] = "<button type=\"button\" class=\"btn btn-outline-info btn-sm btn-delete-student-subject\" value=\"" + element['ss_id'] + "\"> <i class=\"pe-7s-study\"> </i> </button>"

                        table1.push(dataTable)
                    })
                    tableSearch.clear().rows.add(table1).draw();
                    $.unblockUI();
                },
                beforeSend: function() {
                    $.blockUI({
                        message: $('.body-block-example-1')
                    });
                }
            });
        });

        function show_std_year() {
            $.ajax({
                type: "POST",
                url: "../query/year_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.data.forEach((element, key) => {
                        $("#std_year_search").append("<option value=\"" + element['yt_year'] + "\" > " + element['yt_year'] + " </option>")
                    });
                }
            });
        }

        $(document).on("click", ".btn-delete-student-subject", function() {
            // console.log($(this).val())
            var ss_id = $(this).val()

            swal.fire({
                title: "ลบรายชื่อนี้ออกจากรายวิชา",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "yes",
                html: false
            }).then((result) => {
                if (result.value) {
                    // console.log($(this).val())
                    $.ajax({
                        type: "POST",
                        url: "../query/.php",
                        data: {
                            "yt_id": $(this).val()
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire(
                                    'ตั้งค่าปีการศึกษา!',
                                    'สำเร็จ.',
                                    'success'
                                )
                                year_term_show()
                            } else {
                                Swal.fire(
                                    'ตั้งค่าปีการศึกษา',
                                    'เกิดข้อผิดพลาด :)',
                                    'error'
                                )
                            }
                        }
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log("cancel")

                }
            });

        });

        function teacher_subject_show(ts_id) {
            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_show.php",
                data: {
                    'ts_id': ts_id
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    if (typeof response.data != 'undefined') {
                        $("#ts_id").val(response.data.ts_id);
                        $("#subject_id").val(response.data.subject_id);
                        $("#yt_year").val(response.data.yt_year);
                        $("#yt_term").val(response.data.yt_term);
                        $("#title-subject").text('[' + response.data.subject_id + '] ' + response.data.subject_name_en);

                    }
                }
            });
        }

        function student_index(ts_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_subject_index.php",
                data: {
                    'ts_id': ts_id
                },
                dataType: "JSON",
                success: function(response) {
                    var table1 = []
                    // console.log(response.data)

                    response.data.forEach((element, key) => {
                        var dataTable = []

                        dataTable['std_id'] = element['std_id']
                        dataTable['student_name'] = element['std_fname'] + " " + element['std_lname']
                        dataTable['level'] = element['level'] + " <span class=\"text text-info\">(" + element['std_year'] + ")</span>"
                        dataTable['edit'] = "<button type=\"button\" class=\"btn btn-outline-warning btn-sm btn-delete-student-subject\" value=\"" + element['ss_id'] + "\"> <i class=\"pe-7s-trash\"> </i> </button>"

                        table1.push(dataTable)
                    })
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
            "std_id": "",
            "student_name": "",
            "level": "",
            "edit": ""
        }];

        var table = $('#table_student_subject').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "student_name"
                },
                {
                    "data": "level"
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
                    "targets": ["student_name"],
                    "searchable": true
                },
                {
                    "targets": ["level"],
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

        $("#button-search-student").on("click", function() {
            $("#modal-search-student").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
        });


        var dataTablesSearch = [{
            "std_id": "",
            "student_name": "",
            "edit": ""
        }];

        var tableSearch = $('#table_student_search').DataTable({
            "data": dataTablesSearch,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "student_name"
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
                    "targets": ["student_name"],
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

        $("#button-search-student").on("click", function() {
            $("#modal-search-student").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
        });
    </script>

</body>

</html>