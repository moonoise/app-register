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
        .bg-premium-dark {
            background-image: linear-gradient(to right, #660000 0, #000 100%) !important;
            padding: .10rem 5rem;
            height: 100px;
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
    </style>
</head>

<body class="d-flex flex-column h-100 bg-premium-dark">
    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mt-3">
        <div class="container">
            <div class="card col-12">
                <div class="card-body">

                    <div class="">
                        <img src="../assets/images/logo_alumni.png" alt="" srcset="" class="card-img-top">
                    </div>
                    <h5 class="text text-info">ยินดีตอนรับ สมาคมศิษย์เก่าวิศวกรรมชลประทาน
                        ในพระบรมราชูปถัมภ์</h5>
                    <span><span class="text text-success"> ปรับปรุงข้อมูลศิษย์เก่า </span>
                        เพื่อจัดทำฐานข้อมูลและสำรวจผู้เข้าร่วมงานวันชูชาติ 4 มกราคม 2563</span>

                    <div class="mt-2 col-md-12">

                        <button class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-primary" id="btn_call_modal_search" type="button"><i class="pe-7s-search btn-icon-wrapper"> </i>
                            ค้นหา ชื่อตัวเอง</button>
                    </div>
                    <div class="divider"></div>
                    <div id="div-form">
                        <form class="" name="form_alumni" id="form_alumni">
                            <div class="form-row">
                                <input type="hidden" name="ku_id_auto" id="ku_id_auto">
                                <input type="hidden" name="id2" id="id2">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name" class=""><span class="text-danger">*</span> <small class="text-primary">คำนำหน้าชื่อ</small>
                                            : </label>
                                        <select name="std_title_name_th" id="std_title_name_th" class="mb-2 form-control">
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group"><label for="std_fname_th" class=""><span class="text-danger">*</span> ชื่อ</label><input name="std_fname_th" id="std_fname_th" placeholder="" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group"><label for="std_lname_th" class=""><span class="text-danger">*</span> สกุล</label><input name="std_lname_th" id="std_lname_th" placeholder="" type="text" class="form-control"></div>
                                </div>

                                <div class="col-md-12" id="div_name_old">
                                    <a href="javascript:void(0);" id="btn_edit_name_old" class="text-warning stretched-link">
                                        <span id="id_name_old" class="text text-info"></span>
                                        <i class="lnr-magic-wand btn-icon-wrapper"></i>ชื่อ-สกุลเดิม</a>
                                </div>
                                <div class="col-md-12 mb-3" id="div_name_old_form">
                                    <div class="form-inline">
                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                            <label for="std_fname_th_old" class="mr-sm-2">ชื่อ-สกุล(เก่า)</label>
                                            <input name="std_fname_th_old" id="std_fname_th_old" placeholder="ชื่อเก่า" type="text" class="form-control form-control-sm">
                                        </div>
                                        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                            <label for="std_lname_th_old" class="mr-sm-2"> </label>
                                            <input name="std_lname_th_old" id="std_lname_th_old" placeholder="นามสกุล" type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="std_nickname" class="">
                                            <span class="text-danger">*</span> ชื่อเล่น
                                        </label>
                                        <input name="std_nickname" id="std_nickname" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="std_id2" class="">รุ่น : <span class="text text-info" id="id_batch"></span></label>

                                </div>
                                <div class="col-md-3">
                                    <label for="std_year" class="">ปีการศึกษา : <span class="text text-info" id="id_std_year"></span></label>

                                </div>
                                <div class="col-md-3">
                                    <label for="id_class_name" class="">ห้องสังกัด : </label>
                                    <input name="class_name" id="id_class_name" placeholder="" type="text" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="std_email" class=""><span class="text-danger">*</span>E-Mail</label>
                                        <input name="std_email" id="std_email" placeholder="" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="student_mobile" class="">
                                            <span class="text-danger">*</span>เบอร์มือถือ:</label>
                                        <input name="student_mobile" id="student_mobile" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="std_line" class="">
                                            <i class="line_logo"></i> ไลน์ไอดี:</label><input name="std_line" id="std_line" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label for="std_home_town" class=""><span class="text-danger">*</span>สังกัดจังหวัด ขณะที่เรียน:</label>
                                        <select name="std_home_town" id="std_home_town" class="custom-select">
                                            <option value=""></option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label for="std_address" class="">
                                            <span class="text-danger">*</span>ที่อยู่ปัจจุบัน:
                                            <button id="btn_edit_address" type="button" class="btn-sm mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-warning">
                                                <i class="lnr-magic-wand btn-icon-wrapper"></i>แก้ไข</button>
                                        </label>
                                        <textarea name="std_address" id="std_address" rows="4" cols="50" placeholder="" type="text" class="form-control" readonly></textarea>
                                        <input type="hidden" name="alumni_address" id="alumni_address">
                                        <input type="hidden" name="alumni_district" id="alumni_district">
                                        <input type="hidden" name="alumni_amphoe" id="alumni_amphoe">
                                        <input type="hidden" name="alumni_province" id="alumni_province">
                                        <input type="hidden" name="alumni_zipcode" id="alumni_zipcode">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="std_position" class="">ตำแหน่ง: </label>
                                        <input name="std_position" id="std_position" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="std_workplace" class="">ที่ทำงาน/สังกัด:</label>
                                        <textarea name="std_workplace" id="std_workplace" rows="4" cols="50" placeholder="" type="text" class="form-control"></textarea>
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
                                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">บันทึก
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="float-left flex2">
                    <button type="button" class="mb-2 mr-2 mt-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-primary" onclick="window.location.href='../view_public/form_guest.php'">
                        <i class="pe-7s-left-arrow btn-icon-wrapper"> </i> สำหรับบุคคลทั่วไป
                    </button>
                </div>
                <div class="float-right flex2">
                    <button type="button" class="mb-2 mr-2 mt-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-warning" onclick="window.location.href='../view_public/form_alumni_new.php'">
                        เพิ่มศิษย์เก่าที่ไม่มีรายชื่อ <i class="pe-7s-right-arrow btn-icon-wrapper"> </i>
                    </button>
                </div>
            </div> -->
        </div>
    </main>


    <footer class="footer mt-auto py-3 bg-premium-dark">
        <div class="container">
            <span class="text-muted text-color-white">สงวนลิขสิทธิ์ : สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์
                สำนักงาน : กรมชลประทาน ถ.ตวานนท์ ต.บางตลาด อ.ปากเกร็ด จ.นนทบุรี 11120
                โทรศัพท์ 0-2583-6050-69 ต่อ 341</span>
        </div>
    </footer>

    <div id="modal_search" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ค้นหารายชื่อ ศิษย์เก่า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" id="form_search" name="form_search">
                                <span class="text text-info">ค้นหาโดย ใส่ ชื่อ - สกุล ,เบอร์โทร,หรือ อีเมล
                                    โดยสามารถใส่อย่างใดอย่างหนึ่งก็ได้</span>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <input name="search_fname" id="search_fname" placeholder="ชื่อ" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <input name="search_lname" id="search_lname" placeholder="สกุล" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-5">
                                        <div class="position-relative form-group">
                                            <input name="search_mobile" id="search_mobile" placeholder="เบอร์โทร" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="position-relative form-group">
                                            <input name="search_email" id="search_email" placeholder="อีเมล" type="text" class="form-control">
                                        </div>
                                    </div> -->
                                    <button class="mt-1 btn-sm mb-2 mr-2 btn-icon btn-pill btn btn-outline-primary" id="btn_select_address" type="submit"><i class="pe-7s-search btn-icon-wrapper"> </i>
                                        ค้นหา</button>
                                </div>
                            </form>
                        </div>
                        <div class="divider"></div>
                        <div class="col-md-12">
                            <table style="width: 100%;" id="table_search" class="table table-hover table-striped table-bordered for-this-table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" class="text-center">รุ่น</th>
                                        <th scope="col" class="text-center">ชื่อ - สกุล <span class="text text-danger">(ชื่อเก่า)</span></th>
                                        <th scope="col" class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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


    <div id="modal_select_address" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            <form class="" id="form_address" name="form_address">
                                <h6 class="text text-info">โดยระบุที่อยู่ปัจจุบัน</h6>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="address" class="">ที่อยู่:</label>
                                            <textarea name="address" id="address" rows="2" cols="50" placeholder="" type="text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="district" class="">
                                                <span class="text-danger">*</span> ตำบล/แขวง :</label>
                                            <input name="district" id="district" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="amphoe" class="">
                                                <span class="text-danger">*</span> อำเภอ/เขต :</label>
                                            <input name="amphoe" id="amphoe" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="province" class="">
                                                <span class="text-danger">*</span> จังหวัด :</label>
                                            <input name="province" id="province" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="zipcode" class="">
                                                <span class="text-danger">*</span> รหัสไปรษณีย์ :</label>
                                            <input name="zipcode" id="zipcode" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <button class="mt-4 btn-icon btn-shadow btn-outline-2x btn btn-outline-info btn-sm" id="" type="submit"><i class="pe-7s-search btn-icon-wrapper"> </i>เลือก</button>
                                        </div>

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
            $("#div-form").hide();
            $("#div_name_old_form").hide();
            $('#std_title_name_th').select2();
            province_list();
            nickname_list();
        });

        $("#btn_call_modal_search").on("click", function() {
            $("#modal_search").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })

            $("#form_search")[0].reset();
            table.clear().draw();
        });

        var objDataTables = {
            "ku_id_auto": "",
            "std_title_name_th": "",
            "std_fname_th": "",
            "std_lname_th": "",
            "std_fname_th_old": "",
            "std_fname_th_old": "",
            "student_mobile": "",
            "std_email": "",
            "alumni_reg_id": "",
            std_fullname: function() {
                var strName = this.std_title_name_th + this.std_fname_th + " " + this.std_lname_th;

                if (!Object.is(this.std_fname_th_old, null) || !Object.is(this.std_lname_th_old,
                        null)) {
                    strName += "<p class=\"text text-danger\">(" + this.std_fname_th_old + " " + this
                        .std_lname_th_old + ")</p>"
                }
                return strName;
            },
            mobile_email: function() {
                var str = "";

                if (!Object.is(this.student_mobile, null)) {
                    str += "<p class=\"text text-info\">" + this.student_mobile + "</p>"
                }
                if (!Object.is(this.std_email, null)) {
                    str += "<p class=\"text text-info\">" + this.std_email + "</p>"
                }
                return str;
            },
            button: function() {
                var strBtn = "";
                if (Object.is(this.alumni_reg_id, null)) {
                    strBtn = "<button class=\"btn-sm btn-icon btn btn-info\" onclick=\"std_select(" + this.ku_id_auto +
                        ")\">เลือก</button> "
                } else {
                    strBtn = "<button class=\"btn-sm btn-icon btn btn-success\" >ปรับปรุงข้อมูลแล้ว</button> "
                }
                return strBtn;
            }
        }

        $("#form_search").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query_alumni/alumni_search.php",
                data: $(this).serialize(),
                dataType: "JSON",
                success: function(response) {
                    var table1 = []

                    if (Object.keys(response.data).length > 0) {
                        response.data.forEach((element, key) => {
                            var objTable = Object.create(objDataTables);

                            var dataTables = [];
                            dataTables['batch'] = element['batch'];

                            objTable.ku_id_auto = element['ku_id_auto'];
                            objTable.std_title_name_th = element['std_title_name_th'];
                            objTable.std_fname_th = element['std_fname_th'];
                            objTable.std_lname_th = element['std_lname_th'];
                            objTable.std_fname_th_old = element['std_fname_th_old'];
                            objTable.std_lname_th_old = element['std_lname_th_old'];
                            objTable.alumni_reg_id = element['alumni_reg_id'];

                            // objTable.student_mobile = element['student_mobile']
                            // objTable.std_email = element['std_email']
                            dataTables['std_fullname'] = objTable.std_fullname();
                            // dataTables['mobile_email'] = objTable.mobile_email();
                            dataTables['button_select'] = objTable.button();

                            table1.push(dataTables)
                        });
                    }
                    table.clear().rows.add(table1).draw();
                    $.unblockUI();
                },
                beforeSend: function() {
                    $.blockUI({
                        message: $('.body-block-example-1')
                    });
                }
            });
        });

        var dataTables = [{
            "batch": "",
            "std_fullname": "",
            "button_select": ""
        }];

        var table = $('#table_search').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "batch"
                },
                {
                    "data": "std_fullname"
                },
                {
                    "data": "button_select"
                }
            ],
            "columnDefs": [{
                    "targets": ["batch"],
                    "searchable": true
                },
                {
                    "targets": ["std_fullname"],
                    "searchable": true
                },
                {
                    "targets": ["button_select"],
                    "searchable": false
                }
            ],
            'pageLength': 25,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });

        function std_select(id) {
            $("#modal_search").modal("hide")
            $.ajax({
                type: "POST",
                url: "../query_alumni/alumni_select_by_id.php",
                data: {
                    "ku_id_auto": id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#form_alumni")[0].reset();
                    $("#ku_id_auto").val(response.data.ku_id_auto);
                    $("#id2").val(response.data.id2);
                    $("#div-form").show();
                    $("#std_title_name_th").val(response.data.std_title_name_th);
                    $("#std_fname_th").val(response.data.std_fname_th);
                    $("#std_lname_th").val(response.data.std_lname_th);
                    $("#std_nickname").val(response.data.std_nickname);
                    $("#std_email").val(response.data.std_email);
                    $("#student_mobile").val(response.data.student_mobile);
                    $("#std_line").val(response.data.std_line);
                    $("#std_address").val(response.data.std_address);
                    $("#std_position").val(response.data.std_position);
                    $("#std_workplace").val(response.data.std_workplace);

                    $("#id_batch").html(response.data.batch);
                    $("#id_std_year").html(response.data.std_year);
                    $("#id_class_name").val(response.data.class_name);

                    if (!Object.is(response.data.std_fname_th_old, null) || !Object.is(response.data.std_lname_th_old, null)) {
                        $("#div_name_old_form").show();
                        $("#id_name_old").html(response.data.std_fname_th_old + " " + response.data.std_lname_th_old)
                        $("#std_fname_th_old").val(response.data.std_fname_th_old);
                        $("#std_lname_th_old").val(response.data.std_lname_th_old)
                    } else {
                        $("#div_name_old_form").hide();
                    }
                    if (!Object.is(response.data.std_home_town, null)) {
                        $('#std_home_town').val(response.data.std_home_town).trigger('change');
                    }

                }
            });
        }

        $("#btn_edit_name_old").click(function() {
            $("#div_name_old_form").toggle("slow", function() {
                // Animation complete.
            });
        });

        $("#btn_edit_address").on("click", function() {
            $("#modal_select_address").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
        });

        $.Thailand.setup({
            database: '../jquery.Thailand.js/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database
        });
        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });

        $("#form_address").submit(function(e) {
            e.preventDefault();
            $("#alumni_address").val($("#address").val())
            $("#alumni_district").val($("#district").val())
            $("#alumni_amphoe").val($("#amphoe").val())
            $("#alumni_province").val($("#province").val())
            $("#alumni_zipcode").val($("#zipcode").val())

            var strAddress = $("#alumni_address").val() + "\n" +
                "[ตำบล/แขวง] " + $("#district").val() + "\n" +
                "[อำเภอ/เขต] " + $("#amphoe").val() + "\n" +
                $("#province").val() + "\n" +
                $("#zipcode").val();
            $("#std_address").val(strAddress);
            $("#modal_select_address").modal("hide");
        });

        function province_list() {
            $.ajax({
                type: "POST",
                url: "../query_alumni/province_list.php",
                dataType: "JSON",
                success: function(response) {
                    response.forEach((element, key) => {
                        $("#std_home_town").append("<option value=\"" + element['province_name'] + "\">" + element['province_name'] + "</option>");
                    });
                }
            });
            $('#std_home_town').select2({
                width: '100%'
            });
        }

        function nickname_list() {
            $.ajax({
                type: "POST",
                url: "../query_alumni/nickname_list.php",
                dataType: "JSON",
                success: function(response) {

                    $("#std_nickname").autocomplete({
                        source: response
                    });
                }
            });

        }

        $("#form_alumni").validate({
            rules: {
                std_title_name_th: "required",
                std_fname_th: "required",
                std_lname_th: "required",
                std_nickname: "required",
                id_class_name: "required",
                std_email: {
                    required: true,
                    email: true
                },
                student_mobile: {
                    required: true,
                    number: true
                },
                std_home_town: "required",
                std_address: "required"
            },
            messages: {
                std_title_name_th: "โปรดกรอกข้อมูล",
                std_fname_th: "โปรดกรอกข้อมูล",
                std_lname_th: "โปรดกรอกข้อมูล",
                std_nickname: "โปรดกรอกข้อมูล  ชื่อฉายา ขณะที่เรียน โดยไม่ต้องในรุ่น",
                id_class_name: "โปรดกรอกข้อมูล",
                std_email: "โปรดกรอกข้อมูล email เพื่อใช้ส่งข่าวสารให้ครับศิษย์เก่า",
                student_mobile: "โปรดกรอกข้อมูล เฉพาะตัวเลขไม่เกิน 10 ตัว",
                std_home_town: "โปรดกรอกข้อมูล สังกัดจังหวัดขณะที่เรียน",
                std_address: "โปรดกรอกข้อมูล ที่อยู่ปัจจุบัน",
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
                    url: "../query_alumni/alumni_update.php",
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
                                title: '<h3>ท่านปรับปรุงข้อมูลสำเร็จแล้ว</h3>',
                                html: '<p>เลขชลกร ของท่านคือ <br><b class=\"text text-primary\">' + response.id2 + '</b><p>',
                                type: 'success',
                                confirmButtonText: 'รับทราบ'
                            });

                            $('#form_alumni')[0].reset();
                            $("#div-form").hide();
                            $("#div_name_old_form").hide();

                        } else {
                            Swal.fire({
                                title: 'ปรับปรุงข้อมูล ไม่สำเร็จ',
                                text: 'ไม่สำเร็จ' + response.error,
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