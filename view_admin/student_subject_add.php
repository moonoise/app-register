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
                                    <h3 class="card-title" id='title-subject'></h3>

                                    <button type="button" class="btn mr-2 mb-2 btn-primary" id="button-search-student"><i class="fa fa-search-plus"></i> ค้นหารายชื่อ</button>

                                    <table style="width: 100%;" id="table_student_subject" class="table table-hover table-striped table-bordered">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">เพ่ิมนิสิต ในรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {
            var ts_id = '<?php echo $_POST['ts_id']; ?>';
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
        });

        $("#new_subject_id").on("change", function() {
            $.ajax({
                type: "POST",
                url: "../query/student_show.php",
                data: {
                    'student_id': $("#new_subject_id").val()
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data != null) {
                        $("#student_name").val(response.data.std_fname + " " + response.data.std_lname)
                    } else {
                        $("#student_name").val("")
                    }
                }
            });
        });

        $("#form_new_subject").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/student_subject_add.php",
                data: $("#form_new_subject").serialize(),
                dataType: "JSON",
                success: function(response) {

                    if (response.success == false) {
                        console.log('false')
                    } else {
                        console.log('false')
                    }
                }
            });
        });
        student_index()

        function student_index() {
            var ts_id = '<?php echo $_POST['ts_id']; ?>';

            $.ajax({
                type: "POST",
                url: "../query/student_subject_index.php",
                data: {
                    'ts_id': ts_id
                },
                dataType: "JSON",
                success: function(response) {
                    var table1 = []
                    console.log(response.data)

                    response.data.forEach(element => {
                        var dataTable = []

                        dataTable['std_id'] = element['std_id']
                        dataTable['student_name'] = element['std_fname'] + " " + element['std_lname']
                        dataTable['level'] = ""
                        dataTable['edit'] = ""

                        table1.push(dataTable)
                    })
                    table.clear().rows.add(table1).draw();
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
    </script>

</body>

</html>