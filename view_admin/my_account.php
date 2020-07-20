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
        .table-subject-red {
            background-color: #f7242424;
        }

        .table-subject-red td,
        .table-subject-red th {
            border: 1px solid #d41a3d;
        }

        .table-subject-yellow {
            background-color: #eaaf0a54;
        }

        .table-subject-yellow td,
        .table-subject-yellow th {
            border: 1px solid #d4921a;
        }

        .table-subject-green {
            background-color: #5bf14959;
        }

        .table-subject-green td,
        .table-subject-green th {
            border: 1px solid #21bb05;
        }

        .table-subject-blue {
            background-color: #49d2f159;
        }

        .table-subject-blue td,
        .table-subject-blue th {
            border: 1px solid #059abb;
        }

        .table-subject-white {
            background-color: #fbf9f354;
        }

        .table-subject-white td,
        .table-subject-white th {
            border: 1px solid #adaba963;
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
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
                                                                <div class="widget-heading "><b class="pr-2">Type : </b><b id="id-type" class="text-success"></b> </div>


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

                                        <div class="col-12">
                                            <button class="mr-2 btn btn-info btn-sm">Settings</button><button class="btn-icon btn-icon-only btn btn-warning btn-sm"><i class="pe-7s-config btn-icon-wrapper"> </i></button>
                                        </div>

                                    </div>
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
        var username = '<?php echo $_SESSION[__USERNAME__]; ?>'
        show_profile(username)

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
    </script>

</body>

</html>