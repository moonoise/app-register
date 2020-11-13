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
                                <div class="card-header">รายชื่อบุคคลทั่วไปที่เข้าร่วมงาน กรมชบประทาน</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-9">
                                            <div class="form-row">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <table style="width: 100%;" id="table_alumni_guest" class="table table-hover table-striped table-bordered for-this-table">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col" class="text-center">ชื่อ - สกุล <span class="text text-danger">(ชื่อเก่า)</span></th>
                                                        <th scope="col" class="text-center">เบอร์โทร</th>
                                                        <th scope="col" class="text-center">อีเมล</th>
                                                        <th scope="col" class="text-center">ที่ทำงานสังกัด</th>
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
            $("#sub2-menu5").addClass("mm-active");
            guest_show()

        });

        var objDataTables = {
            "guest_id": "",
            edit: function() {
                return "<button class=\"btn-sm btn-icon btn btn-info\" onclick=\"alumni_show(" + this.guest_id + ")\"><i class=\"pe-7s-study btn-icon-wrapper\"> </i></button> \
                <button class=\"btn-sm btn-icon btn btn-warning\" onclick=\"alumni_edit(" + this.guest_id +
                    ")\"><i class=\"pe-7s-edit btn-icon-wrapper\"> </i>Edit</button>";
            }
        }

        function guest_show() {
            $.ajax({
                type: "POST",
                url: "../query_alumni/guest_index.php",
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    var table1 = []
                    var objTable = Object.create(objDataTables)
                    response.data.forEach((element, key) => {
                        var dataTables = []

                        dataTables['guest_fullname'] = element['guest_title_name_th'] + element['guest_fname_th'] + " " + element['guest_lname_th']
                        dataTables['guest_mobile'] = element['guest_mobile']
                        dataTables['guest_email'] = element['guest_email']
                        dataTables['guest_workplace'] = element['guest_workplace']
                        if (!Object.is(element['reward_status'], null)) {
                            if (element['reward_status'] == '1') {
                                dataTables['reward_status'] = "<p class=\"text text-success\">ได้รางวัล</p>       \
                                                                <p class=\"text text-info\">" + element['reward_remark'] + "</p>"
                            } else if (element['reward_status'] == '2') {
                                dataTables['reward_status'] = "<p class=\"text text-warning\">สละสิทธิ์</p>"
                            }

                        } else {
                            dataTables['reward_status'] = "<span class=\"text text-info\">--</span>"
                        }

                        objTable.guest_id = element['guest_id']
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
            "guest_fullname": "",
            "guest_mobile": "",
            "guest_email": "",
            "guest_workplace": "",
            "reward_status": "",
            "edit": ""
        }];

        var table = $('#table_alumni_guest').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "guest_fullname"
                },
                {
                    "data": "guest_mobile"
                },
                {
                    "data": "guest_email"
                },
                {
                    "data": "guest_workplace"
                },
                {
                    "className": 'text-center',
                    "data": "reward_status"
                },
                {
                    "className": 'text-center',
                    "data": "edit"
                }
            ],
            "columnDefs": [{
                    "targets": ["guest_fullname"],
                    "searchable": true
                },
                {
                    "targets": ["guest_mobile"],
                    "searchable": true
                },
                {
                    "targets": ["guest_email"],
                    "searchable": true
                },
                {
                    "targets": ["guest_workplace"],
                    "searchable": true
                },
                {
                    "targets": ["reward_status"],
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
    </script>

</body>

</html>