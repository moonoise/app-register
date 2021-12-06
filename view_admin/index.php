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
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

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
                                <div class="card-header">ร่วมประชุมสัมมนาการเตรียมการจัดทำงบประมาณรายจ่ายประจำปีงบประมาณ
                                    พ.ศ. ๒๕๖๖</div>
                                <div class="card-body">
                                    <table id="table_register" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>ตำแหน่ง</th>
                                                <th>โทรศัพท์ สำนักงาน</th>
                                                <th>คำนำหน้าชื่อ</th>
                                                <th>ชื่อ</th>
                                                <th>สกุล</th>

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
        $("#mm-page2").removeClass("mm-active");
        register_show();
    });

    function register_show() {
        $.ajax({
            type: "POST",
            url: "../query/registed_form1.php",
            dataType: "JSON",
            success: function(response) {
                var table1 = []
                response.data.forEach((element, key) => {
                    var data = []
                    if (element['fname_th'] == 'รัฐมนตรี') {
                        data['full_name'] = element['minister_name'] 
                        data['position'] = element['minister_position']
                    }else {
                        data['full_name'] = element['title_name_th'] + element['fname_th'] + " " + element['lname_th']
                        data['position'] = element['position'] + "<br>" + element['minister_position'];
                    }

                    data['title_name_th'] = element['title_name_th'];
                    data['fname_th'] = element['fname_th'];
                    data['lname_th'] = element['lname_th'];
                    data['minister_name'] = element['minister_name'];
                    data['minister_position'] = element['minister_position'];
                    data['phone'] = element['phone'];
    
                    

                    table1.push(data);
                });
                table.clear().rows.add(table1).draw();
            }
        });
    }

    var dataTables = [{
        "form_id" : "",
        "full_name": "",
        "title_name_th": "",
        "fname_th": "",
        "lname_th": "",
        "position": "",
        "level": "",
        "phone": ""
       

    }]

    var d = new Date();
    var dateTime = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

    var table = $('#table_register').DataTable({
        "data": dataTables,
        "deferRender": true,
        "autoWidth": false,
        "columns": [{
                "data": "form_id",
                render: function(data, type, row, meta) {
                    return meta.row  + 1;
                }
            },
            {
                "data": "full_name",
          
            },
            {
                "data": "position",
                
            },
            {
                "data": "phone",
               
            },
            {
                "data": "title_name_th",
                "visible": false
            },
            {
                "data": "fname_th",
                "visible": false
            },
            {
                "data": "lname_th",
                "visible": false
            }

        ],
        "columnDefs": [
            {
                "targets": "form_id",
                "searchable": true
            },
            {
                "targets": "full_name",
                "searchable": true
            },
            {
                "data": "position",
                visible: true
            },
            {
                "data": "level",
                visible: false
            },
            {
                "targets": "phone",
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
            }
        ],
        dom: 'Bfrtip',
        'pageLength': 50,
        buttons: [{
                extend: 'excelHtml5',
                title: 'รายชื่อผู้ลงทะเบียน' + '_' + dateTime,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }

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