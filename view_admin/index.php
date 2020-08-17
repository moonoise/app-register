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

                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left"><img width="52" class="rounded-circle" src="../assets/images/avatars/avatar-1-256.png" alt=""></div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><b class="pr-2">ID No:</b><b class="text-success" id="id-teacher_id"></b> </div>
                                                        <div class="widget-heading "><b class="pr-2">Name:</b><b id="id-name" class="text-success"></b></div>

                                                        <!-- <div class="widget-heading "><b class="pr-2">Type of Admission:</b><b id="type_of_admission" class="text-success"></b></div> -->

                                                    </div>
                                                    <!-- <div class="widget-content-left mr-5">
                                                <div class="widget-heading"><b class="pr-2">Faculty of:</b><b class="text-success">Irrigation College</b></div>
                                                <div class="widget-heading"><b class="pr-2">Field of Study:</b><b class="text-success">Civil Engineering-Irrigation</b></div>
                                                <div class="widget-heading"><b class="pr-2">Degree Conferred:</b><b id="degree_conferred" class="text-success"></b></div>

                                                <div class="widget-heading"><b class="pr-2">Date of Admission:</b><b id="date_of_admission" class="text-success"></b></div>

                                            </div> -->

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">รายวิชาสอน</div>
                                <div class="card-body">
                                    <table id="table_subject" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="col-md-2">รหัสวิชา</th>
                                                <th class="col-4">ชื่อวิชา (หน่วยกิต)</th>
                                                <th class="col-1">ปีการศึกษา</th>
                                                <th class="col-1">เทอม</th>
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
    <?php include_once "../layouts/5-drawer-start.php";
    ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {
            $("#mm-main").addClass("mm-active");

            var username = '<?php echo $_SESSION[__USERNAME__]; ?>'
            show_profile(username)
            subject_index(username)
        });

        function show_profile(username) {
            $.ajax({
                type: "POST",
                url: "../query/my_account_teacher_show.php",
                data: {
                    "username": username
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-teacher_id").html(response.data.teacher_id);
                    $("#id-name").html(response.data.fname + " " + response.data.lname)
                    $("#id-type").html(response.data.per_type)
                }
            });
        }

        function subject_index(username) {
            $.ajax({
                type: "POST",
                url: "../query/teacher_subject_by_id.php",
                "data": {
                    "teacher_id": username
                },
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

                        dataTables['yt_year'] = element['yt_year']
                        dataTables['yt_term'] = element['yt_term']

                        dataTables['subject_name_credit'] = objTable.subject_name_credit();

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
            subject_name_credit: function() {

                return this.subject_name_en + "<span class=\"text-info\">(" + this.subject_credit + ")</span>";
            },
            button: function() {
                var strButtonEdit = "<button type =\"button\" class=\"btn btn-info btn-sm btn-edit-subject\" value=\"" + this.subject_id_auto + "\">Edit</button>"
                return strButtonEdit;
            }

        }

        var dataTables = [{
            "subject_id": "",
            "subject_name_credit": "",
            "yt_year": "",
            "yt_term": ""

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
                    "width": "70%"
                },
                {
                    "data": "yt_year",
                    "width": "10%"
                },
                {
                    "data": "yt_term",
                    "width": "10%"
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
                    "targets": ["yt_year"],
                    "searchable": true
                },
                {
                    "targets": ["yt_term"],
                    "searchable": true
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