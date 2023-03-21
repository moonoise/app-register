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
    <style>
    .swal2-popup .swal2-styled.swal2-cancel {
        background-color: #a81717;
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
                                <div class="card-header">เปิด / ปิด</div>
                                <div class="card-body">
                                    <form method="post" name="onoffupdate" id="onoffupdate">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="onoff" id="onoff_on" value="on">
                                            <label class="form-check-label" for="onoff_on">
                                                เปิด
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="onoff" id="onoff_off" value="off">
                                            <label class="form-check-label" for="onoff_on">
                                                ปิด
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="btn_onoff">Change</button>
                                    </form>
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
        $("#mm-main").removeClass("mm-active");
        $("#mm-page2").removeClass("mm-active");
        $("#mm-onoff").addClass("mm-active");

    });

    onoff();

    $("#btn_onoff").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../query/onoffupdate.php",
            data: $("#onoffupdate").serialize(),
            dataType: "JSON",
            success: function () {
                onoff();
            }
        });
    });


    function onoff () {
        $.ajax({
            type: "POST",
            url: "../query/onoff.php",
            dataType: "json",
            success: function (response) {
                if (response.onoff == false) {
                    $("#onoff_off").attr("checked", true);
                    console.log('off')
                }else {
                    $("#onoff_on").attr("checked", true);
                    console.log('on')
                }
                
            }
        });
    }

    </script>
</body>

</html>