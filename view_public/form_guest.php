<!doctype html>
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

    <link rel="stylesheet" href="../jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" href="../assets/css/base.min.css">
    <style>
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

        body {
            /* background-color: #f5d0d0; */
            background-image: linear-gradient(to right, #660000 0, #000 100%) !important;
            padding: .10rem 5rem;
            height: 100px;
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
                    <h5 class="text text-info">ลงทะเบียนผู้ร่วมงานทั่วไป</h5>
                    <span><span class="text text-success">แบบฟอร์มลงทะเบียนเข้าร่วมงาน</span></span>
                    <div id="div-form">
                        <form class="" name="form_guest" id="form_guest">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="guest_title_name_th" class=""><span class="text-danger">*</span> <small class="text-primary">คำนำหน้าชื่อ</small>
                                            : </label>
                                        <select name="guest_title_name_th" id="guest_title_name_th" class="mb-2 form-control">
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group">
                                        <label for="guest_fname_th" class="">
                                            <span class="text-danger">*</span> ชื่อ</label>
                                        <input name="guest_fname_th" id="guest_fname_th" placeholder="" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group">
                                        <label for="guest_lname_th" class="">
                                            <span class="text-danger">*</span> สกุล</label>
                                        <input name="guest_lname_th" id="guest_lname_th" placeholder="" type="text" class="form-control"></div>
                                </div>



                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="guest_email" class=""><span class="text-danger">*</span>E-Mail</label>
                                        <input name="guest_email" id="guest_email" placeholder="" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="guest_mobile" class="">
                                            <span class="text-danger">*</span>เบอร์มือถือ:</label>
                                        <input name="guest_mobile" id="guest_mobile" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="guest_workplace" class="">ที่ทำงาน/สังกัด:</label>
                                        <textarea name="guest_workplace" id="guest_workplace" rows="4" cols="50" placeholder="" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-3 position-relative form-check"><input name="check" id="exampleCheck"
                                    type="checkbox" class="form-check-input"><label for="exampleCheck"
                                    class="form-check-label">Accept our <a href="javascript:void(0);">Terms
                                        and Conditions</a>.</label></div> -->
                            <div class="mt-4 d-flex align-items-center">
                                <!-- <h5 class="mb-0">Already have an account? <a href="javascript:void(0);"
                                        class="text-primary">Sign in</a></h5> -->
                                <div class="ml-auto">
                                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">ลงทะเบียน
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="text text-secondary">

                        สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์ เปิดระบบจัดทำฐานข้อมูลและระบบสืบค้นข้อมูลศิษย์เก่าเพื่อการสร้างเครือข่าย แจ้งข่าวสาร และสิทธิประโยชน์ต่างๆ ซึ่งข้อมูลของท่านจะนำไปใช้เพื่อวัตถุประสงค์ของงานสมาคมฯ และกิจกรรมของแต่ละรุ่นเท่านั้น นอกจากนั้นแล้ว การลงทะเบียนในครั้งนี้ ถือเป็นการสำรวจการมาร่วมงาน 4 มกราคม 2564 เบื้องต้น เพื่อจัดเตรียมการบริการต่างๆ ให้เพียงพอ และผู้ลงทะเบียนออนไลน์ทุกท่านลุ้นรับของรางวัลใหญ่ในงาน
                    </p>
                </div>

            </div>
            <div class="col-md-12">
                <div class="float-left flex2">
                    <button type="button" class="mb-2 mr-2 mt-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-success btn-lg" onclick="window.location.href='../view_public/index1.php'">
                        <i class="pe-7s-left-arrow btn-icon-wrapper"> </i> ลงทะเบียน สำหรับศิษย์เก่า
                    </button>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-premium-dark">
        <div class="container">
            <span class="text-muted text-color-white">สงวนลิขสิทธิ์ : สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์
                สำนักงาน : กรมชลประทาน ถ.ตวานนท์ ต.บางตลาด อ.ปากเกร็ด จ.นนทบุรี 11120
                โทรศัพท์ 0-2583-6050-69 ต่อ 341</span>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script src="../assets/js/scripts-init/app.js"></script>
    <script src="../assets/js/scripts-init/demo.js"></script>

    <!--CHARTS-->

    <!--Apex Charts-->
    <!-- <script src="../assets/js/vendors/charts/apex-charts.js"></script> -->

    <!-- <script src="../assets/js/scripts-init/charts/apex-charts.js"></script> -->
    <!-- <script src="../assets/js/scripts-init/charts/apex-series.js"></script> -->

    <!--Sparklines-->
    <!-- <script src="../assets/js/vendors/charts/charts-sparklines.js"></script> -->
    <!-- <script src="../assets/js/scripts-init/charts/charts-sparklines.js"></script> -->

    <!--Chart.js-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
    <!-- <script src="../assets/js/scripts-init/charts/chartsjs-utils.js"></script> -->

    <!--FORMS-->

    <!--Clipboard-->
    <!-- <script src="../assets/js/vendors/form-components/clipboard.js"></script> -->
    <!-- <script src="../assets/js/scripts-init/form-components/clipboard.js"></script> -->

    <!--Datepickers-->
    <!-- <script src="../assets/js/vendors/form-components/datepicker.js"></script>
    <script src="../assets/js/vendors/form-components/daterangepicker.js"></script>
    <script src="../assets/js/vendors/form-components/moment.js"></script>
    <script src="../assets/js/scripts-init/form-components/datepicker.js"></script> -->

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

    <!--Input Mask-->
    <!-- <script src="../assets/js/vendors/form-components/input-mask.js"></script>
    <script src="../assets/js/scripts-init/form-components/input-mask.js"></script> -->

    <!--RangeSlider-->
    <!-- <script src="../assets/js/vendors/form-components/wnumb.js"></script>
    <script src="../assets/js/vendors/form-components/range-slider.js"></script>
    <script src="../assets/js/scripts-init/form-components/range-slider.js"></script> -->

    <!--Textarea Autosize-->
    <!-- <script src="../assets/js/vendors/form-components/textarea-autosize.js"></script>
    <script src="../assets/js/scripts-init/form-components/textarea-autosize.js"></script> -->

    <!--Toggle Switch -->
    <!-- <script src="../assets/js/vendors/form-components/toggle-switch.js"></script> -->


    <!--COMPONENTS-->

    <!--BlockUI -->
    <script src="../assets/js/vendors/blockui.js"></script>
    <script src="../assets/js/scripts-init/blockui.js"></script>

    <!--Calendar -->
    <!-- <script src="../assets/js/vendors/calendar.js"></script>
    <script src="../assets/js/scripts-init/calendar.js"></script> -->

    <!--Slick Carousel -->
    <!-- <script src="../assets/js/vendors/carousel-slider.js"></script>
    <script src="../assets/js/scripts-init/carousel-slider.js"></script> -->

    <!--Circle Progress -->
    <!-- <script src="../assets/js/vendors/circle-progress.js"></script>
    <script src="../assets/js/scripts-init/circle-progress.js"></script> -->

    <!-- CountUp -->
    <!-- <script src="../assets/js/vendors/count-up.js"></script>
    <script src="../assets/js/scripts-init/count-up.js"></script> -->

    <!--Cropper -->
    <!-- <script src="../assets/js/vendors/cropper.js"></script>
    <script src="../assets/js/vendors/jquery-cropper.js"></script>
    <script src="../assets/js/scripts-init/image-crop.js"></script> -->

    <!--Maps -->
    <!-- <script src="../assets/js/vendors/gmaps.js"></script>
    <script src="../assets/js/vendors/jvectormap.js"></script>
    <script src="../assets/js/scripts-init/maps-word-map.js"></script>
    <script src="../assets/js/scripts-init/maps.js"></script> -->

    <!--Guided Tours -->
    <!-- <script src="../assets/js/vendors/guided-tours.js"></script>
    <script src="../assets/js/scripts-init/guided-tours.js"></script> -->

    <!--Ladda Loading Buttons -->
    <!-- <script src="../assets/js/vendors/ladda-loading.js"></script>
    <script src="../assets/js/vendors/spin.js"></script>
    <script src="../assets/js/scripts-init/ladda-loading.js"></script> -->

    <!--Rating -->
    <!-- <script src="../assets/js/vendors/rating.js"></script>
    <script src="../assets/js/scripts-init/rating.js"></script> -->

    <!--Perfect Scrollbar -->
    <!-- <script src="../assets/js/vendors/scrollbar.js"></script>
    <script src="../assets/js/scripts-init/scrollbar.js"></script> -->

    <!--Toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/scripts-init/toastr.js"></script>

    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/js/scripts-init/sweet-alerts.js"></script>

    <!--Tree View -->
    <!-- <script src="../assets/js/vendors/treeview.js"></script>
    <script src="../assets/js/scripts-init/treeview.js"></script> -->


    <!--TABLES -->
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous">
    </script>

    <!--Bootstrap Tables-->
    <script src="../assets/js/vendors/tables.js"></script>

    <script type="text/javascript" src="../jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="../jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="../jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--Tables Init-->
    <script src="../assets/js/scripts-init/tables.js"></script>

    <script>
        $(document).ready(function() {
            $('#guest_title_name_th').select2();
        });

        $("#form_guest").validate({
            rules: {
                guest_title_name_th: "required",
                guest_fname_th: "required",
                guest_lname_th: "required",
                guest_mobile: {
                    required: true,
                    number: true
                },
                guest_email: {
                    required: true,
                    email: true
                },
                guest_workplace: "required",
            },
            messages: {
                guest_title_name_th: "โปรดกรอกข้อมูล",
                guest_fname_th: "โปรดกรอกข้อมูล",
                guest_lname_th: "โปรดกรอกข้อมูล",
                guest_mobile: "โปรดกรอกข้อมูล เฉพาะตัวเลขไม่เกิน 10 ตัว",
                guest_email: "โปรดกรอกข้อมูล email",
                guest_workplace: "โปรดกรอกข้อมูล"
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
                    url: "../query_alumni/guest_update.php",
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
                                title: '<h3>ท่านลงทะเบียนเข้างาน<b class=\"text text-success\">สำเร็จ</b>แล้ว</h3>',
                                html: '<p><b class=\"text text-primary\"></b><p>',
                                type: 'success',
                                confirmButtonText: 'รับทราบ'
                            });

                            $('#form_guest')[0].reset();

                        } else {
                            Swal.fire({
                                title: '<h3>ลงทะเบียน <b class=\"text text-danger\">ไม่สำเร็จ</b></h3>',
                                html: '<b class=\"text text-danger\">' + response.msg + "</b>",
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