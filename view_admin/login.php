<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>วิทยาลัยการชลประทาน สำนักงบประมาณ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">

    <style>
        .logo-irrigation {
            height: auto;
            width: auto;
        }
    </style>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="">
                                        <img src="../assets/images/irrigation-college.png" alt="Responsive image" srcset="" class="logo-irrigation img-fluid">
                                    </div>

                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>สำหรับอาจารย์ และเจ้าหน้าที่</div>
                                            <span></span>
                                        </h4>
                                    </div>
                                    <form id="form-signin" name="form_signin">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="username" id="username" placeholder="กรอกชื่อผู้ใช้" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword" placeholder="รหัสผ่าน ..." type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check">
                                            <!-- <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                            <label for="exampleCheck" class="form-check-label">Keep me logged in</label></div> -->

                                            <div class="divider"></div>
                                            <!-- <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6> -->
                                        </div>
                                        <div class="modal-footer clearfix">
                                            <div class="float-left flex2">
                                                <button type="button" class="mb-2 mr-2 mt-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" onclick="window.location.href='../view_student'">
                                                    <i class="pe-7s-left-arrow btn-icon-wrapper"> </i> ระบบของนิสิต
                                                </button>
                                            </div>
                                            <div class="float-right">
                                                <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © วิทยาลัยการชลประทาน สำนักงบประมาณ 2020</div>
                        </div>
                        <br>
                        <div id="message">

                        </div>
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
        <script src="../assets/js/scripts-init/app.js"></script>
        <script src="../assets/js/scripts-init/demo.js"></script>

        <!--CHARTS-->

        <!--Apex Charts-->
        <script src="../assets/js/vendors/charts/apex-charts.js"></script>

        <script src="../assets/js/scripts-init/charts/apex-charts.js"></script>
        <script src="../assets/js/scripts-init/charts/apex-series.js"></script>

        <!--Sparklines-->
        <script src="../assets/js/vendors/charts/charts-sparklines.js"></script>
        <script src="../assets/js/scripts-init/charts/charts-sparklines.js"></script>

        <!--Chart.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../assets/js/scripts-init/charts/chartsjs-utils.js"></script>

        <!--FORMS-->

        <!--Clipboard-->
        <script src="../assets/js/vendors/form-components/clipboard.js"></script>
        <script src="../assets/js/scripts-init/form-components/clipboard.js"></script>

        <!--Datepickers-->
        <script src="../assets/js/vendors/form-components/datepicker.js"></script>
        <script src="../assets/js/vendors/form-components/daterangepicker.js"></script>
        <script src="../assets/js/vendors/form-components/moment.js"></script>
        <script src="../assets/js/scripts-init/form-components/datepicker.js"></script>

        <!--Multiselect-->
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
        <script src="../assets/js/vendors/form-components/input-mask.js"></script>
        <script src="../assets/js/scripts-init/form-components/input-mask.js"></script>

        <!--RangeSlider-->
        <script src="../assets/js/vendors/form-components/wnumb.js"></script>
        <script src="../assets/js/vendors/form-components/range-slider.js"></script>
        <script src="../assets/js/scripts-init/form-components/range-slider.js"></script>

        <!--Textarea Autosize-->
        <script src="../assets/js/vendors/form-components/textarea-autosize.js"></script>
        <script src="../assets/js/scripts-init/form-components/textarea-autosize.js"></script>

        <!--Toggle Switch -->
        <script src="../assets/js/vendors/form-components/toggle-switch.js"></script>


        <!--COMPONENTS-->

        <!--BlockUI -->
        <script src="../assets/js/vendors/blockui.js"></script>
        <script src="../assets/js/scripts-init/blockui.js"></script>

        <!--Calendar -->
        <script src="../assets/js/vendors/calendar.js"></script>
        <script src="../assets/js/scripts-init/calendar.js"></script>

        <!--Slick Carousel -->
        <script src="../assets/js/vendors/carousel-slider.js"></script>
        <script src="../assets/js/scripts-init/carousel-slider.js"></script>

        <!--Circle Progress -->
        <script src="../assets/js/vendors/circle-progress.js"></script>
        <script src="../assets/js/scripts-init/circle-progress.js"></script>

        <!--CountUp -->
        <script src="../assets/js/vendors/count-up.js"></script>
        <script src="../assets/js/scripts-init/count-up.js"></script>

        <!--Cropper -->
        <script src="../assets/js/vendors/cropper.js"></script>
        <script src="../assets/js/vendors/jquery-cropper.js"></script>
        <script src="../assets/js/scripts-init/image-crop.js"></script>

        <!--Maps -->
        <script src="../assets/js/vendors/gmaps.js"></script>
        <script src="../assets/js/vendors/jvectormap.js"></script>
        <script src="../assets/js/scripts-init/maps-word-map.js"></script>
        <script src="../assets/js/scripts-init/maps.js"></script>

        <!--Guided Tours -->
        <script src="../assets/js/vendors/guided-tours.js"></script>
        <script src="../assets/js/scripts-init/guided-tours.js"></script>

        <!--Ladda Loading Buttons -->
        <script src="../assets/js/vendors/ladda-loading.js"></script>
        <script src="../assets/js/vendors/spin.js"></script>
        <script src="../assets/js/scripts-init/ladda-loading.js"></script>

        <!--Rating -->
        <script src="../assets/js/vendors/rating.js"></script>
        <script src="../assets/js/scripts-init/rating.js"></script>

        <!--Perfect Scrollbar -->
        <script src="../assets/js/vendors/scrollbar.js"></script>
        <script src="../assets/js/scripts-init/scrollbar.js"></script>

        <!--Toastr-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts-init/toastr.js"></script>

        <!--SweetAlert2-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="../assets/js/scripts-init/sweet-alerts.js"></script>

        <!--Tree View -->
        <script src="../assets/js/vendors/treeview.js"></script>
        <script src="../assets/js/scripts-init/treeview.js"></script>


        <!--TABLES -->
        <!--DataTables-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous"></script>

        <!--Bootstrap Tables-->
        <script src="../assets/js/vendors/tables.js"></script>

        <!--Tables Init-->
        <script src="../assets/js/scripts-init/tables.js"></script>

        <!--BlockUI -->
        <script src="../assets/js/vendors/blockui.js"></script>
        <script src="../assets/js/scripts-init/blockui.js"></script>

        <script>
            $("#form-signin").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "login-check.php",
                    data: $("#form-signin").serialize(),
                    dataType: "JSON",
                    success: function(response) {

                        if (response.success) {
                            location.assign("index.php");
                            // console.log(response)
                        } else {
                            // $("#msg-alert").removeClass("down").addClass("show")
                            $("#message").html('<div class="alert alert-danger fade show" role="alert">' + response.msgError + '</div>');
                        }
                        $.unblockUI();

                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                    beforeSend: function() {
                        $.blockUI({
                            message: $('.body-block-example-1')
                        });
                    }
                });
            });


            $('#form-signin').keydown(function(e) {

                var key = e.which;
                // console.log(key)
                if (key == 13) {
                    // As ASCII code for ENTER key is "13"
                    $('#submit').trigger("click"); // Submit form code
                }
            });
        </script>

</body>

</html>
