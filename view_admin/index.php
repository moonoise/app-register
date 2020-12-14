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
    <title>ลงทะเบียนออนไลน์</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

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
                                <div class="card-header">ร่วมประชุมสัมมนาการเตรียมการจัดทำงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. ๒๕๖๕</div>
                                <div class="card-body">
                                    <table id="table_register" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="col-4">#</th>
                                                <th class="col-4">ชื่อ - สกุล</th>
                                                <th class="col-1">กระทรวง</th>
                                                <th class="col-1">กรม</th>
                                                <th class="col-1">โทรศัพท์ สำนักงาน</th>
                                                <th class="col-1">โทรศัพท์มือถือ</th>
                                                <th class="col-1">อีเมลล์</th>
                                                <th class="col-1">#</th>
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
    <?php include_once "../layouts/5-drawer-start.php";
    ?>
    <?php include_once "../layouts/6-script-include.php"; ?>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#mm-main").addClass("mm-active");
            register_show();
        });

        function register_show() {
            $.ajax({
                type: "POST",
                url: "../query/register_list.php",
                dataType: "JSON",
                success: function(response) {
                    var table1 = []
                    response.data.forEach((element, key) => {
                        var data = []
                        data['number_sort'] = key + 1;
                        data['form_id'] = element['form_id'];
                        data['training_name'] = element['training_name'];
                        data['full_name'] = element['title_name_th'] + element['fname_th'] + " " + element['lname_th'];
                        data['title_name_th'] = element['title_name_th'];
                        data['fname_th'] = element['fname_th'];
                        data['lname_th'] = element['lname_th'];
                        data['position'] = element['position'];
                        data['level'] = element['level'];
                        data['org_name_root'] = element['org_name_root'];
                        data['org_name_sub'] = element['org_name_sub'];
                        data['phone'] = element['phone'];
                        data['mobile'] = element['mobile'];
                        data['email'] = element['email'];
                        data['created_at'] = element['created_at'];
                        data['updated_at'] = element['updated_at'];
                        data['status'] = element['status'];


                        table1.push(data);
                    });
                    table.clear().rows.add(table1).draw();
                }
            });
        }

        var dataTables = [{
            "number_sort": "",
            "form_id": "",
            "training_name": "",
            "full_name": "",
            "title_name_th": "",
            "fname_th": "",
            "lname_th": "",
            "position": "",
            "level": "",
            "org_name_root": "",
            "org_name_sub": "",
            "phone": "",
            "mobile": "",
            "email": "",
            "created_at": "",
            "updated_at": "",
            "status": "",

        }]

        var d = new Date();
        var dateTime = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

        var table = $('#table_register').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "number_sort",
                    "width": "5%"
                },
                {
                    "data": "full_name",
                    "width": "25%"
                },
                {
                    "data": "org_name_root",
                    "width": "20%"
                },
                {
                    "data": "org_name_sub",
                    "width": "20%"
                },
                {
                    "data": "phone",
                    "width": "10%"
                },
                {
                    "data": "mobile",
                    "width": "10%"
                },
                {
                    "data": "email",
                    "width": "10%"
                },
                {
                    "data": "form_id",
                    visible: false
                },
                {
                    "data": "training_name",
                    visible: false
                },
                {
                    "data": "title_name_th",
                    visible: false

                },
                {
                    "data": "fname_th",
                    visible: false

                },
                {
                    "data": "lname_th",
                    visible: false

                },
                {
                    "data": "position",
                    visible: false
                },
                {
                    "data": "level",
                    visible: false
                },
                {
                    "data": "status",
                    visible: false

                },
                {
                    "data": "created_at",
                    visible: false
                },
                {
                    "data": "updated_at",
                    visible: false
                }

            ],
            "columnDefs": [{
                    "targets": "form_id",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "training_name",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "full_name",
                    "searchable": true
                },
                {
                    "targets": "title_name_th",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "fname_th",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "lname_th",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "org_name_root",
                    "searchable": true
                },
                {
                    "targets": "org_name_sub",
                    "searchable": true
                },
                {
                    "targets": "phone",
                    "searchable": true
                },
                {
                    "targets": "mobile",
                    "searchable": true
                },
                {
                    "targets": "email",
                    "searchable": true
                },
                {
                    "targets": "created_at",
                    "searchable": false,
                    "visible": false
                },
                {
                    "targets": "updated_at",
                    "searchable": false,
                    "visible": false
                }
            ],
            dom: 'Bfrtip',
            'pageLength': 50,
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'รายชื่อผู้ลงทะเบียน' + '_' + dateTime

                },
                {
                    extend: 'csvHtml5',
                    title: 'รายชื่อผู้ลงทะเบียน' + '_' + dateTime
                },
                'pageLength'
            ],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });
    </script>
</body>

</html>