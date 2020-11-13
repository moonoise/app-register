<?php
require_once '../vendor/autoload.php';
include_once "../app/config.php";
session_start();

include_once "../view_admin/login-head.php";

if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
    # code...
} else {
    header("location:../view_student");
}

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="../assets/css/base.min.css">
    <link rel="stylesheet" href="../assets/js/random/random.css">
    <style>
        /* Custom page CSS
-------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        .container {
            width: auto;
            max-width: 680px;
            padding: 0 15px;
        }

        .footer {
            background-color: #f5f5f5;
        }

        .line_logo {
            width: 20px;
            height: 20px;
            display: inline-block;
            background: transparent;
            color: white;
            text-decoration: none;
            padding-left: 0px;
            padding-right: 0px;
            vertical-align: middle;


        }

        .line_logo:before {
            content: '';
            background: url(../assets/images/line_logo.png);
            background-size: cover;
            position: absolute;
            width: 20px;
            height: 20px;
            margin-left: 0px;
            margin-right: .5rem;
        }

        .line_logo:after {
            /* content: ''; */
            /* display: block; */
            /* height: 40px; */
            /*height of icon */
            /* width: 40px; */
            /*width of icon */
            /* position: absolute; */
            /*where to replace the icon */
            /* top: 0px; */
            /* left: -40px; */
            /*background */
            /* background: #F8E6AE url(../assets/images/line_logo.png) no-repeat 0px 0px; */
        }

        body {
            background-color: #f5d0d0;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mt-3">
        <div class="container">
            <div class="card col-12">
                <div class="card-body">

                    <div class="">
                        <img src="../assets/images/logo_alumni.png" alt="" srcset="" class="card-img-top">
                    </div>
                    <h3 class="text text-info">สุ่มจับรางวัล</h3>
                    <span><span class="text text-success">แบบฟอร์มลงทะเบียนเข้าร่วมงาน</span></span>
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-5 text-info text-center" id="divSelected">????</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center mb-2">
                            <button class="btn btn-info btn-center" id="btn-random">Random Pick</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button class="btn btn-success btn-center" id="btn-random-accept">รับรางวัล</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button class="btn btn-warning btn-center" id="btn-random-skip">สละสิทธิ์</button>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">สงวนลิขสิทธิ์ : สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์
                สำนักงาน : กรมชลประทาน ถ.ตวานนท์ ต.บางตลาด อ.ปากเกร็ด จ.นนทบุรี 11120
                โทรศัพท์ 0-2583-6050-69 ต่อ 341</span>
        </div>
    </footer>



    <div id="modal_accept_reward" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ที่อยู่ปัจจุบัน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" id="form_accept_reward" name="form_accept_reward">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="reward_remark" class="">
                                            <span class="text-danger">*</span> หมายเหตุ รางวัล :</label>
                                        <input name="reward_remark" id="reward_remark" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <button class="mt-4 btn-icon btn-shadow btn-outline-2x btn btn-outline-info btn-sm" id="" type="submit">
                                            <i class="pe-7s-search btn-icon-wrapper"> </i>ยืนยัน</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

    <!--SCRIPTS INCLUDES-->

    <!--CORE-->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script src="../assets/js/scripts-init/app.js"></script>
    <script src="../assets/js/scripts-init/demo.js"></script> -->


    <!--COMPONENTS-->

    <!--BlockUI -->
    <!-- <script src="../assets/js/vendors/blockui.js"></script>
    <script src="../assets/js/scripts-init/blockui.js"></script> -->



    <!--Toastr-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/scripts-init/toastr.js"></script> -->

    <!--SweetAlert2-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/js/scripts-init/sweet-alerts.js"></script> -->

    <!--Tree View -->
    <!-- <script src="../assets/js/vendors/treeview.js"></script>
    <script src="../assets/js/scripts-init/treeview.js"></script> -->


    <!--TABLES -->
    <!--DataTables-->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous">
    </script> -->

    <!--Bootstrap Tables-->
    <!-- <script src="../assets/js/vendors/tables.js"></script> -->




    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <!--Tables Init-->
    <!-- <script src="../assets/js/scripts-init/tables.js"></script> -->

    <?php include_once "../layouts/6-script-include.php"; ?>
    <script src="../assets/js/random/random.js"></script>

    <script>
        $(document).ready(function() {
            $("#btn-random-accept").prop("disabled", true);
            $("#btn-random-skip").prop("disabled", true);
        });

        var colors = [
            "E7484F",
            "F68B1D",
            "FCED00",
            "009E4F",
            "00AAC3",
            "732982",
            "E7484F"
        ];

        var name_reward,
            decidedName,
            randomizer,
            i = 0,
            j = 0,
            delay = 0;

        var list = [];
        var name_reward = []

        function start(list) {
            return new Promise(resolve => {
                if (Object.keys(list).length < 1) return;

                for (const key in list) {
                    // console.log(`${key}: ${list[key]['name']}`);
                    decidedName = list[randomRange(0, Object.keys(list).length - 1)];
                    // console.log(decidedName['name'])
                }

                randomizer = setInterval(() => {
                    if (i == Object.keys(list).length) {
                        i = 0;
                    }
                    if (j == colors.length) {
                        j = 0;
                    }
                    $("#divSelected")
                        .text(list[i++]['name'])
                        .css("color", `#${colors[j++]}`);
                }, 50);

                setTimeout(() => {

                    clearInterval(randomizer);
                    $("#divSelected").text(decidedName['name']);
                    resolve(decidedName)
                }, 5000);




            });

        }

        function randomRange(myMin, myMax) {
            return Math.floor(Math.random() * (myMax - myMin + 1)) + myMin;
        }


        function resolveAfter2Seconds() {
            return new Promise(resolve => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        async function asyncCall(list) {
            console.log('calling');
            // console.log(list)
            name_reward = await start(list);
            $("#btn-random-accept").prop("disabled", false);
            $("#btn-random-skip").prop("disabled", false);
            console.log(name_reward);
        }

        function setDeceleratingTimeout(callback, factor, times, list) {
            var internalCallback = function(tick, counter) {
                return function() {
                    if (Object.keys(list).length < 1) return;

                    if (i == Object.keys(list).length) {
                        i = 0;
                    }
                    if (j == colors.length) {
                        j = 0;
                    }
                    $("#divSelected")
                        .text(list[i++]['name'])
                        .css("color", `#${colors[j++]}`);

                    if (--tick >= 0) {
                        window.setTimeout(internalCallback, ++counter * factor);
                        callback();
                        if (tick == 0) {
                            for (const key in list) {
                                decidedName = list[randomRange(0, Object.keys(list).length - 1)];
                            }

                        }
                    } else {
                        $("#divSelected").text(decidedName['name']);
                        name_reward = decidedName
                        console.log(decidedName)
                        $("#btn-random-accept").prop("disabled", false);
                        $("#btn-random-skip").prop("disabled", false);

                    }
                }
            }(times, 0);

            window.setTimeout(internalCallback, factor);


        };

        function start2(list) {
            setDeceleratingTimeout(function() {}, 1, 100, list);
        }


        $("#btn-random").on("click", function() {
            $.ajax({
                type: "POST",
                url: "../query_alumni/random_reward.php",
                dataType: "JSON",
                success: function(response) {
                    // asyncCall(response.data);
                    start2(response.data)
                }
            });
            $("#btn-random").prop("disabled", true);
        });

        $("#btn-random-accept").on("click", function() {
            $("#modal_accept_reward").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
        });

        $("#form_accept_reward").submit(function(e) {
            e.preventDefault();
            name_reward.reward_remark = $("#reward_remark").val()
            name_reward.reward_status = 1
            $.ajax({
                type: "POST",
                url: "../query_alumni/random_reward_update_reward.php",
                data: name_reward,
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        toastr["success"]("สำเร็จ", "อัพเดท");
                        $("#modal_accept_reward").modal('hide')

                    } else {
                        Swal.fire({
                            title: 'อัพเดท',
                            text: 'ไม่สำเร็จ' + response.error,
                            type: 'error',
                            confirmButtonText: 'รับทราบ'
                        });
                    }
                }
            });
            setTimeout(() => {
                location.reload();
            }, 1000);
        });


        $("#btn-random-skip").on("click", function() {
            swal.fire({
                title: "สละสิทธิ์",
                text: "ยืนยันการสละสิทธิ์ รางวัล",
                type: "warning",
                showCancelButton: true,
                cancelButtonColor: "#cb1b53",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "ยืนยันสละสิทธิ์",
                html: false
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "../query_alumni/random_reward_update_reward_skip.php",
                        data: name_reward,
                        dataType: "JSON",
                        success: function(response) {
                            if (response.success == true) {
                                toastr["warning"]("สำเร็จ", "สละสิทธิ์");

                            } else {
                                Swal.fire({
                                    title: 'อัพเดท',
                                    text: 'ไม่สำเร็จ' + response.error,
                                    type: 'error',
                                    confirmButtonText: 'รับทราบ'
                                });
                            }
                        }
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 1000);

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log("cancel")

                }
            });
        });
    </script>

</body>

</html>