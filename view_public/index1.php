<?php require_once 'add-csrf.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ระบบลงทะเบียนออนไลน์</title>
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
            background-image: linear-gradient(to right, #0f486c 0, #0c517d 100%) !important;
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

        .divider {
            height: 10px;
            background: #ccdbea;
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
                    <div class="divider"></div>
                    <h5 class="text text-info text-center">ระบบลงทะเบียน
                        โครงการฝึกอบรมเชิงปฏิบัติการหลักสูตรส่งเสริมความรู้ด้านการงบประมาณสำหรับหน่วยงานภายนอก
                        ประจำปีงบประมาณ พ.ศ. 2566 แบบออนไลน์</h5>
                    <p class="text text-info text-center">ในวันที่ 2-3 พฤษภาคม 2566 เวลา 09.00 น. - 16.00 น. ณ
                        โรงแรมเอเชีย กรุงเทพ เขตราชเทวี กรุงเทพมหานคร</p>
                    <div class="alert alert-success fade show text-center" role="alert">
                        <h5>การลงทะเบียน ส่วนราชการ
                            <a href="javascript:void(0);" class="alert-link">
                            </a>
                        </h5>
                    </div>
                    <div id="register-show">
                        <p class="text text-info">
                            รายชื่อผู้ลงทะเบียน
                        </p>
                        <ul>
                        </ul>
                    </div>

                    <div id="div-form">
                        <form class="" name="form_alumni" id="form_alumni">
                            <?php $antiCSRF->insertHiddenToken(); ?>
                            <!-- ########################## สังกัด ##################################### -->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="org_id_root"
                                            class="">ส่วนราชการ:
                                        </label>
                                        <select name="org_id_root" id="org_id_root" class="mb-2 form-control">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- ########################## สังกัด ##################################### -->
                            <div class="divider"></div>
                            <!-- ########################## ผู้ติดตามคนที่ 1 ##################################### -->
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="checkbox_person1" class="">
                                            คนที่ 1
                                            : </label>
                                        <!-- <input name="checkbox_person1" id="checkbox_person1" placeholder=""
                                            type="checkbox" class="form-control" checked> -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person1" class=""><span
                                                class="text-danger">*</span>
                                            คำนำหน้าชื่อ
                                            : </label>
                                        <input name="title_name_th_person1" id="title_name_th_person1" placeholder=""
                                            type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="fname_th_person1"
                                            class=""><span class="text-danger">*</span> ชื่อ</label><input
                                            name="fname_th_person1" id="fname_th_person1" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="lname_th_person1"
                                            class=""><span class="text-danger">*</span> สกุล</label><input
                                            name="lname_th_person1" id="lname_th_person1" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="position_person1"
                                            class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                        <input name="position_person1" id="position_person1" placeholder=""
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="email_person1" class="">
                                            <span class="text-danger">*</span>อีเมล:</label>
                                        <input name="email_person1" id="email_person1" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="mobile_person1" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="mobile_person1" id="mobile_person1" placeholder=""
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="food_person1" class="">
                                            <span class="text-danger">*</span>อาหาร:</label>
                                        <input name="food_person1" id="food_person1"
                                            placeholder="(มังสวิรัติ / อิสลาม)" type="text" class="form-control"
                                            value="ทั่วไป">
                                    </div>
                                </div>

                            </div>
                            <!-- ########################## ผู้ติดตามคนที่ 1 end ##################################### -->

                            <div class="divider"></div>
                            <!-- ########################## ผู้ติดตามคนที่ 2 ##################################### -->
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="checkbox_person2" class="">
                                            คนที่ 2
                                            : </label>
                                        <input name="checkbox_person2" id="checkbox_person2" placeholder=""
                                            type="checkbox" class="form-control" checked>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person2" class=""><span
                                                class="text-danger">*</span>
                                            คำนำหน้าชื่อ
                                            : </label>

                                        <input name="title_name_th_person2" id="title_name_th_person2" placeholder=""
                                            type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="fname_th_person2"
                                            class=""><span class="text-danger">*</span> ชื่อ</label><input
                                            name="fname_th_person2" id="fname_th_person2" placeholder=""
                                            type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="lname_th_person2"
                                            class=""><span class="text-danger">*</span> สกุล</label><input
                                            name="lname_th_person2" id="lname_th_person2" placeholder=""
                                            type="text" class="form-control"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="position_person2"
                                            class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                        <input name="position_person2" id="position_person2" placeholder=""
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="email_person2" class="">
                                            <span class="text-danger">*</span>อีเมล:</label>
                                        <input name="email_person2" id="email_person2" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="mobile_person2" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="mobile_person2" id="mobile_person2" placeholder=""
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="food_person2" class="">
                                            <span class="text-danger">*</span>อาหาร:</label>
                                        <input name="food_person2" id="food_person2"
                                            placeholder="(มังสวิรัติ / อิสลาม)" type="text" class="form-control"
                                            value="ทั่วไป">
                                    </div>
                                </div>

                            </div>
                            <!-- ########################## ผู้ติดตามคนที่ 2 end ##################################### -->
                            <div class="divider"></div>

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
            <h6 class="text-color-white">ระบบลงทะเบียนอบรม ออนไลน์
                สำนักงบประมาณ พัฒนาโดย ศุนย์เทคโนโลยีสารสนเทศ
            </h6>
            <h6 class="text-color-white">
                สามารถโทรติดต่อสอบถามได้ที่ <br>
                คุณฐานะพัฒน์ เพียรดี : thahnaphat.pe@bb.go.th, thahnaphat.fti@gmail.com โทร. 09 9191 6526, <br>
                คุณวิวรรธนี วรศาสตร์ : wiwanthanee.w@bb.go.th โทร. 08 1578 1995, <br>
                คุณพฤศชัย พรหมประสิทธิ์ : phan_shieldout@hotmail.com โทร. 08 9175 5597</h6>





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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts-init/toastr.js"></script>
    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/js/scripts-init/sweet-alerts.js"></script>

    <!--TABLES -->
    <!--DataTables-->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js"
        crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous">
        -- >
    </script>
    <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous">
        -- >
    </script>
    <!--Bootstrap Tables-->
    <!-- <script src="../assets/js/vendors/tables.js"></script> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--Tables Init-->
    <!-- <script src="../assets/js/scripts-init/tables.js"></script> -->
    <script src="../json/title_name.js"></script>
    <script>
        $(document).ready(function() {
            $("#register-show").hide();
            $('#org_id_root').select2();
            org_root_select()

            if ($("#checkbox_person2").is(':checked')) {
                $("#checkbox_person2").click()
            } else {
                $("#checkbox_person2").click()
                $("#checkbox_person2").click()
            }
        });

        var person2 = {
            title_name_th_person2: "required",
            fname_th_person2: "required",
            lname_th_person2: "required",
            position_person2: "required",
            mobile_person2: "required",
            email_person2: "required",
            food_person2: "required"
        };

        $("#checkbox_person2").change(function() {
            if (this.checked) {
                $("#title_name_th_person2").prop("disabled", false);
                $("#fname_th_person2").prop("disabled", false);
                $("#lname_th_person2").prop("disabled", false);
                $("#position_person2").prop("disabled", false);
                $("#mobile_person2").prop("disabled", false);
                $("#email_person2").prop("disabled", false);
                $("#food_person2").prop("disabled", false);

                addRules(person2);
            } else {
                $("#title_name_th_person2").prop("disabled", true);
                $("#fname_th_person2").prop("disabled", true);
                $("#lname_th_person2").prop("disabled", true);
                $("#position_person2").prop("disabled", true);
                $("#mobile_person2").prop("disabled", true);
                $("#email_person2").prop("disabled", true);
                $("#food_person2").prop("disabled", true);

                removeRules(person2);
            }
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

        $("#org_id_root").on('select2:select', function(e) {
            var data = e.params.data;
            $.ajax({
                type: "POST",
                url: "../query/org_register_check2.php",
                data: {
                    "org_id_root": data.id
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success == false) {
                        Swal.fire({
                            title: 'ไม่สามารถลงทะเบียนได้',
                            html: '<p>สังกัดที่ท่านเลือก มีการทะเบียนไว้แล้ว <br> ด้วยอีเมล ' +
                                response.email +
                                ' <br> กรุณาติดต่อเจ้าหน้าที่ </br> คุณฐานะพัฒน์  เพียรดี <br> thahnaphat.pe@bb.go.th <br> โทร.  09  9191  6526 <br> หากต้องการปรับเปลี่ยนข้อมูล</p>',
                            type: 'error',
                            confirmButtonText: 'รับทราบ'
                        });
                        $("#org_id_root").val("").trigger('change');
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

        function addRules(rulesObj) {
            for (var item in rulesObj) {
                $('#' + item).rules('add', rulesObj[item]);
            }
        }

        function removeRules(rulesObj) {
            for (var item in rulesObj) {
                $('#' + item).rules('remove');
            }
        }

        $("#form_alumni").validate({
            rules: {
                org_id_root: "required",
                title_name_th_person1: "required",
                fname_th_person1: "required",
                lname_th_person1: "required",
                position_person1: "required",
                mobile_person1: "required",
                email_person1: "required",
                food_person1: "required"
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
                    url: "../query/register_update2.php",
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
                            toastr["success"]("สำเร็จ", "ลงทะเบียนสำเร็จ");
                            Swal.fire({
                                title: '<h3>ลงทะเบียนสำเร็จ</h3>',
                                html: '<p><br><b class=\"text text-primary\"></b><p>',
                                type: 'success',
                                confirmButtonText: 'รับทราบ'
                            });
                            $('#form_alumni')[0].reset();
                            $("#div-form").hide();
                            $("#register-show").show();

                            response.data.forEach(element => {
                                $("#register-show ul").append("<li>" + element[
                                        'title_name_th'] + element['fname_th'] +
                                    " " + element['lname_th'] + "(" + element[
                                        'position'] + ")" + "</li>")

                            });


                        } else {
                            Swal.fire({
                                title: 'ลงทะเบียน ไม่สำเร็จ',
                                text: 'ไม่สำเร็จ' + response.error,
                                type: 'error',
                                confirmButtonText: 'รับทราบ กรุณาติดต่อเจ้าหน้าที่ คุณพฤศชัย เบอร์โทร 0-2265-1753'
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

        $("#title_name_th_person1").autocomplete({
            source: availableTags
        });
        $("#title_name_th_person2").autocomplete({
            source: availableTags
        });

        $("#food_person1").autocomplete({
            source: ['ไม่ระบุ', 'ทั่วไป', 'มังสวิรัติ', 'อิสลาม']
        });
        $("#food_person2").autocomplete({
            source: ['ไม่ระบุ', 'ทั่วไป', 'มังสวิรัติ', 'อิสลาม']
        });

        onoff();

        function onoff() {
            $.ajax({
                type: "POST",
                url: "../query/onoff.php",
                dataType: "json",
                success: function(response) {
                    if (response.onoff == false) {
                        Swal.fire({
                            title: 'ขณะนี้ ปิดการลงทะเบียนแล้ว',
                            icon: 'warning',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false
                        })
                        console.log('off')
                    } else {
                        console.log('on')
                    }

                }
            });
        }
    </script>
</body>

</html>
