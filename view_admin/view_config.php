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
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-new-modal-lg"><i class="pe-7s-news-paper btn-icon-wrapper"></i> New</button>
                                    <br>
                                    <table id="table_teacher_subject" class="table table-hover table-striped table-bordered table-responsive-sm col-6">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ปีการศึกษา</th>
                                                <th>ตั้งค่า</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="id-year-term">
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






    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $(document).ready(function() {
            $("#menu4").addClass("mm-active");
            $("#sub4-menu4").addClass("mm-active");
            year_term_show()
        });


        function year_term_show() {
            $.ajax({
                type: "POST",
                url: "../query/config_index.php",
                dataType: "JSON",
                success: function(response) {
                    $("#id-year-term").html("")
                    response.data.forEach((element, key) => {
                        var strDefault
                        var colorBtn
                        if (element['yt_default'] != null) {
                            strDefault = '<span class=\"text text-success\"><i class=\"pe-7s-check text-success\"> </i> ปัจจุบัน </span>'
                            colorBtn = "info"
                        } else {
                            strDefault = ""
                            colorBtn = "light"
                        }
                        $("#id-year-term").append("<tr> \
                        <td> " + key + "</td> \
                        <td>" + element['yt_name_sort'] + "</td>  \
                        <td>" + strDefault + "</td> \
                        <td><button type=\"button\" value=\"" + element['yt_id'] + "\" class=\"swa-confirm mb-2 mr-2 btn-icon btn-icon-only btn-square btn btn-" + colorBtn + "\" ><i class=\"pe-7s-check btn-icon-wrapper\"> </i></button></td> \
                    </tr>")
                    });
                }
            });
        }


        $(document).on("click", ".swa-confirm", function() {
            swal.fire({
                title: "กำหนดปีการศึกษา",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Cool",
                html: false
            }).then((result) => {
                if (result.value) {
                    // console.log($(this).val())
                    $.ajax({
                        type: "POST",
                        url: "../query/year_term_update_default.php",
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
    </script>


</body>

</html>