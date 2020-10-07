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
    <title>โปรแกรมตรวจสอบความถูกต้องของลำดับรายวิชาในการลงทะเบียนเรียน</title>
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
                            <div class="main-card mb-12 card">
                                <div class="card-body">
                                    <div class="row">
                                        <form class="" name="change_password" id="change_password">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="std_id" class="">รหัสนักศึกษา</label><input name="std_id" id="std_id" value="<?php echo $_SESSION[__STD_ID__]; ?>" placeholder="รหัสนักศึกษา" type="text" class="form-control" readonly></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="password" class="">Password</label><input name="password" id="password" placeholder="password" type="password" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="password2" class="">Confrim Password</label><input name="confirm_password" id="confirm_password" placeholder="password" type="password" class="form-control"></div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Save changes</button>

                                        </form>

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
        var username = '<?php echo $_SESSION[__STD_ID__]; ?>'
        show_profile(username)

        function show_profile(username) {
            $.ajax({
                type: "POST",
                url: "../query/my_account_student_show.php",
                data: {
                    "username": username
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response)
                }
            });
        }

        $("#change_password").validate({
            rules: {
                std_id: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                }
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "../query/my_account_student_change_password.php",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function(response) {
                        if (response.data == 1) {

                            Swal.fire({
                                title: 'อัพเดทรหัสผ่าน',
                                text: 'สำเร็จ',
                                type: 'success',
                                confirmButtonText: 'รับทราบ'
                            });

                            // $(form)[0].reset();
                            $("#password").val("")
                            $("#confirm_password").val("")


                        } else {
                            Swal.fire({
                                title: 'อัพเดทรหัสผ่าน',
                                text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                type: 'error',
                                confirmButtonText: 'รับทราบ'
                            });
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>