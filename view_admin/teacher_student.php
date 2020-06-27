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
                                <div class="card-header">รายชื่อนักศึกษา</div>
                                <div class="card-body">

                                    <table style="width: 100%;" id="table_student" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>นิสิตปีการศึกษา</th>
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

    <form action="teacher_student_analytics.php" method="post" target="show_grade" id="form_student_grade" name="form_student_grade">
        <input type="hidden" name="std_id" id="std_id">
    </form>

    <form action="teacher_student_grade.php" method="post" target="form_grade" id="form_grade" name="form_grade">
        <input type="hidden" name="std_id_show_grade" id="std_id_show_grade">
    </form>

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {
            student_show()
        });


        function show_analytics(std_id) {
            // console.log('test1')
            $("#std_id").val(std_id)
            $("#form_student_grade").submit()
        }

        function show_grade(std_id) {
            // console.log('test2')
            $("#std_id_show_grade").val(std_id)
            $("#form_grade").submit()
        }

        var objStd = {
            "std_id_auto": "",
            "std_id": "",
            "std_name": "",
            "std_year": "",
            "button": function() {
                return "<button class=\"mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-info\"         \
                            onclick=\"show_analytics(`" + this.std_id + "`)\"  >       \
                        <i class=\"                                                         \
                        pe-7s-tools pe-7s-look \" > </i>                                \
                        </button> <button class = \"mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-success\"  \
                        onclick = \"show_grade(`" + this.std_id + "`)\" >       \
                        <i class=\"                                                         \
                        pe-7s-tools pe-7s-notebook \" > </i>                                \
                        </button>"
            }
        }

        function student_show() {
            $.ajax({
                type: "POST",
                url: "../query/student_index.php",
                dataType: "JSON",
                success: function(response) {
                    var tableStd = Object.create(objStd)
                    var table1 = []
                    response.data.forEach((element, key) => {
                        var dataTable = []
                        tableStd.std_id = element['std_id']
                        dataTable['std_id'] = element['std_id']
                        dataTable['std_name'] = element['std_fname'] + " " + element['std_lname']
                        dataTable['std_year'] = element['std_year']
                        dataTable['button'] = tableStd.button()

                        table1.push(dataTable)
                    });
                    // console.log(table1)
                    table.clear().rows.add(table1).draw();
                }
            });
        }

        var dataTables = [{
            "std_id": "",
            "std_name": "",
            "std_year": "",
            "button": ""
        }]

        var table = $('#table_student').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "std_id"
                },
                {
                    "data": "std_name"
                },
                {
                    "data": "std_year"
                },
                {
                    "data": "button"
                }
            ],
            "columnDefs": [{
                    "targets": ["std_id"],
                    "searchable": true
                },
                {
                    "targets": ["std_name"],
                    "searchable": true
                },
                {
                    "targets": ["std_year"],
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