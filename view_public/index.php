<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ระบบลงทะเบียนอบรม ออนไลน์</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../assets/css/base.min.css">
    <style>
    .bg-premium-dark {
        background-image: linear-gradient(to right, #328bc3 0, #000 100%) !important;
        /* padding: .10rem 5rem;
            height: 100px; */
    }

    .logo-irrigation {}

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

    .text-color-white {
        color: aliceblue;
    }

    .container {
        max-width: 800px;
    }
    </style>
</head>

<body class="d-flex flex-column h-100 bg-premium-dark">
    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mt-3">
        <div class="container">
            <div class="card col-12">
                <div class="card-body">
                    <div class="">
                        <img src="../assets/images/logo.svg" alt="" srcset="" class="card-img-top">
                    </div>
                    <h5 class="text text-info">ระบบลงทะเบียน ออนไลน์</h5>
                    <div class="alert alert-danger fade show text-center" role="alert">
                        <h6>การลงทะเบียน สามารถลงได้หน่วยงานละ
                            <a href="javascript:void(0);" class="alert-link">1 คน
                            </a>เท่านั้น
                        </h6>
                    </div>

                    <div class="alert alert-success fade show text-center" role="alert">
                        <h5>สำหรับรัฐมนตรี และผู้ติดตาม
                            <a href="index2.php" class="alert-link"> คลิกที่นี่
                            </a>
                        </h5>
                    </div>
                    <span>
                        <!-- <span class="text text-success"> ปรับปรุงข้อมูลศิษย์เก่า </span>
                        เพื่อจัดทำฐานข้อมูลและสำรวจผู้เข้าร่วมงานวันชูชาติ 4 มกราคม 2563</span> -->

                        <div class="divider"></div>
                        <div id="div-form">
                            <form class="" name="form_alumni" id="form_alumni">
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="training_name"
                                                class=""><span class="text-danger">*</span> ชื่อหลักสูตร</label><input
                                                name="training_name" id="training_name" placeholder="" type="text"
                                                class="form-control"
                                                value="การเตรียมการจัดทำงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. ๒๕๖๕"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="title_name_th" class=""><span class="text-danger">*</span>
                                                <small class="text-primary">คำนำหน้าชื่อ</small>
                                                : </label>

                                            <input name="title_name_th" id="title_name_th" placeholder="" type="text"
                                                class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="position-relative form-group"><label for="fname_th" class=""><span
                                                    class="text-danger">*</span> ชื่อ</label><input name="fname_th"
                                                id="fname_th" placeholder="" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="position-relative form-group"><label for="lname_th" class=""><span
                                                    class="text-danger">*</span> สกุล</label><input name="lname_th"
                                                id="lname_th" placeholder="" type="text" class="form-control"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="position"
                                                class="">ตำแหน่ง: </label>
                                            <input name="position" id="position" placeholder="" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="level" class="">ระดับ:
                                            </label>
                                            <input name="level" id="level" placeholder="" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="org_id_root"
                                                class="">กระทรวง:
                                            </label>
                                            <select name="org_id_root" id="org_id_root" class="mb-2 form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="org_id_sub" class="">กรม:
                                            </label>
                                            <select name="org_id_sub" id="org_id_sub" class="mb-2 form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="phone" class="">
                                                <span class="text-danger">*</span>โทรศัพท์:</label>
                                            <input name="phone" id="phone" placeholder="" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="mobile" class="">
                                                <span class="text-danger">*</span>เบอร์มือถือ:</label>
                                            <input name="mobile" id="mobile" placeholder="" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="email" class=""><span class="text-danger">*</span>E-Mail</label>
                                            <input name="email" id="email" placeholder="" type="email"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex align-items-center">

                                    <div class="ml-auto">
                                        <button id="btn-register"
                                            class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">ลงทะเบียน
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-3 bg-premium-dark">
        <div class="container">
            <h6 class="text-color-white">ระบบลงทะเบียนอบรม ออนไลน์ สำนักงบประมาณ
                สำนักงบประมาณ พัฒนาโดย ศุนย์เทคโนโลยีสารสนเทศ
            </h6>
            <h6 class="text-color-white">โทรติดต่อสอบถามได้ที่ เบอร์โทร 0-2265-2202 คุณณัฏฐพล, เบอร์โทร 0-2265-1759
                คุณปัณฑิิต์ยา, เบอร์โทร 0-2265-1756 คุณดวงนภา </h6>

        </div>
    </footer>



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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script src="../assets/js/scripts-init/app.js"></script>
    <script src="../assets/js/scripts-init/demo.js"></script>

    <!-- Multiselect-->
    <script src="../assets/js/vendors/form-components/bootstrap-multiselect.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="../assets/js/scripts-init/form-components/input-select.js"></script>
    <!--Form Validation-->
    <script src="../assets/js/vendors/form-components/form-validation.js"></script>
    <script src="../assets/js/scripts-init/form-components/form-validation.js"></script>
    <!--Form Wizard-->
    <script src="../assets/js/vendors/form-components/form-wizard.js"></script>
    <script src="../assets/js/scripts-init/form-components/form-wizard.js"></script>

    <!--BlockUI -->
    <script src="../assets/js/vendors/blockui.js"></script>
    <script src="../assets/js/scripts-init/blockui.js"></script>

    <!--Toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/scripts-init/toastr.js"></script>
    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/js/scripts-init/sweet-alerts.js"></script>

    <!--TABLES -->
    <!--DataTables-->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js"
    crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous"> -->
    </script>
    <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous"> -->
    </script>
    <!--Bootstrap Tables-->
    <!-- <script src="../assets/js/vendors/tables.js"></script> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--Tables Init-->
    <!-- <script src="../assets/js/scripts-init/tables.js"></script> -->
    <script src="../json/title_name.js"></script>
    <script>
    $(document).ready(function() {
        $("#org_id_root").select2();
        $("#org_id_sub").select2();
        // $('#title_name_th').select2();
        org_root_select();

    });

    function org_root_select() {
        $("#org_id_root").html("")
        $("#org_id_root").append("<option value=\"\"></option>");
        $.ajax({
            type: "POST",
            url: "../query/org_root.php",
            dataType: "JSON",
            success: function(response) {


                response.data.forEach((element, key) => {
                    $("#org_id_root").append("<option value=\"" + element['org_id'] + "\">" +
                        element['org_name'] + "</option>");
                });

            }
        });
    }

    $('#org_id_root').on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data.id);
        $("#org_id_sub").html("")
        $("#org_id_sub").append("<option value=\"\"></option>");
        $.ajax({
            type: "POST",
            url: "../query/org_sub.php",
            data: {
                "ref_id": data.id
            },
            dataType: "JSON",
            success: function(response) {

                response.data.forEach((element, key) => {
                    $("#org_id_sub").append("<option value=\"" + element['org_id'] + "\">" +
                        element['org_name'] + "</option>");
                });
                $.unblockUI();
            },
            beforeSend: function() {
                $.blockUI({
                    message: $('.body-block-example-1')
                });
            }
        });
    });

    $("#org_id_sub").on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data.id);
        $.ajax({
            type: "POST",
            url: "../query/org_register_check.php",
            data: {
                "org_id_sub": data.id
            },
            dataType: "JSON",
            success: function(response) {
                if (response.success == false) {
                    Swal.fire({
                        title: 'ไม่สามารถลงทะเบียนได้',
                        text: 'สังกัดที่ท่านเลือก มีการทะเบียนไว้แล้ว กรุณาติดต่อเจ้าหน้าที่  เบอร์โทร 0-2265-2202 คุณณัฏฐพล, เบอร์โทร 0-2265-1759 คุณปัณฑิต์ยา, เบอร์โทร 0-2265-1756 คุณดวงนภา',
                        type: 'error',
                        confirmButtonText: 'รับทราบ'
                    });
                    $("#org_id_sub").val("").trigger('change');
                    $("#btn-register").prop('disabled', true);
                } else {
                    $("#btn-register").prop('disabled', false);
                }
                $.unblockUI();
            },
            beforeSend: function() {
                $.blockUI({
                    message: $('.body-block-example-1')
                });
            }
        });
    });


    $("#form_alumni").validate({
        rules: {
            title_name_th: "required",
            fname_th: "required",
            lname_th: "required",
            position: "required",
            level: "required",
            org_id_root: "required",
            org_id_sub: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true
            },
            phone: {
                required: true,
                number: true
            },

        },
        messages: {
            title_name_th: "โปรดกรอกข้อมูล",
            fname_th: "โปรดกรอกข้อมูล",
            lname_th: "โปรดกรอกข้อมูล",

            email: "โปรดกรอกข้อมูล email ",
            mobile: "โปรดกรอกข้อมูล เฉพาะตัวเลขไม่เกิน 10 ตัว",
            phone: "โปรดกรอกข้อมูล เฉพาะตัวเลข โทรศัพท์ที่ทำงาน",
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
                url: "../query/register_update.php",
                data: $(form).serialize(),
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-bottom-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        // toastr["success"]("สำเร็จ", "บันทึกสำเร็จ");
                        Swal.fire({
                            title: '<h3>ลงทะเบียนสำเร็จ</h3>',
                            html: '<p><br><b class=\"text text-primary\"></b><p>',
                            type: 'success',
                            confirmButtonText: 'รับทราบ'
                        });
                        $('#form_alumni')[0].reset();
                        $("#div-form").hide();
                        $("#div_name_old_form").hide();
                    } else {
                        Swal.fire({
                            title: 'ลงทะเบียน ไม่สำเร็จ',
                            text: 'ไม่สำเร็จ' + response.error,
                            type: 'error',
                            confirmButtonText: 'รับทราบ กรุณาติดต่อเจ้าหน้าที่'
                        });
                    }
                    $.unblockUI();
                },
                beforeSend: function() {
                    $.blockUI({
                        message: $('.body-block-example-1')
                    });
                }
            });
        }
    });



    $("#title_name_th").autocomplete({
        source: availableTags
    });
    </script>
</body>

</html>