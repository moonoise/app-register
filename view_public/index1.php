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
        background-image: linear-gradient(to right, #328bc3 0, #74a5c5 100%) !important;
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
                        การประชุมสัมมนาการเตรียมการจัดทำงบประมาณรายจ่ายประจำปี พ.ศ.2566</h5>
                    <div class="alert alert-success fade show text-center" role="alert">
                        <h5>การลงทะเบียน สำหรับคณะรัฐมนตรี และผู้ติดตาม
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
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="minister_id"
                                            class="">รัฐมนตรี:
                                        </label>
                                        <select name="minister_id" id="minister_id" class="mb-2 form-control">

                                        </select>
                                    </div>
                                    <hr>
                                </div>

                                <!-- ########################## ผู้แทน ##################################### -->


                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="checkbox_person0" class="text-danger"><span
                                                class="text-danger">*</span>
                                            ผู้แทน หากมี
                                            : </label>

                                        <input name="checkbox_person0" id="checkbox_person0" placeholder=""
                                            type="checkbox" class="form-control" checked>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person0" class=""><span class="text-danger">*</span>
                                            คำนำหน้าชื่อ
                                            : </label>

                                        <input name="title_name_th_person0" id="title_name_th_person0" placeholder=""
                                            type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="fname_th_person0"
                                            class=""><span class="text-danger">*</span> ชื่อ</label><input
                                            name="fname_th_person0" id="fname_th_person0" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="lname_th_person0"
                                            class=""><span class="text-danger">*</span> สกุล</label><input
                                            name="lname_th_person0" id="lname_th_person0" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="position_person0"
                                            class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                        <input name="position_person0" id="position_person0" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="phone" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="phone_person0" id="phone_person0" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 ml-3">
                                    <div>
                                        <p class="text">เป็นผู้ได้รับการฉีดวัคซีนป้องกันไวรัส covid-2019 แล้ว</p>
                                        <div class="custom-radio  custom-control-inline">
                                            <input type="radio" id="covid1_person0" name="covid_person0"
                                                class="custom-control-input covid_person0" value="1">
                                            <label class="custom-control-label" for="covid1_person0">จำนวน 1
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid2_person0" name="covid_person0"
                                                class="custom-control-input covid_person0" value="2">
                                            <label class="custom-control-label" for="covid2_person0">จำนวน 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid3_person0" name="covid_person0"
                                                class="custom-control-input covid_person0" value="3">
                                            <label class="custom-control-label" for="covid3_person0">มากกว่า 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid0_person0" name="covid_person0"
                                                class="custom-control-input covid_person0" value="0">
                                            <label class="custom-control-label"
                                                for="covid0_person0">ยังไม่ได้รับ</label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- ########################## ผู้แทน ##################################### -->
                            <div class="divider"></div>
                            <!-- ########################## ผู้ติดตามคนที่ 1 ##################################### -->

                            <div class="form-row">

                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="checkbox_person1" class="">
                                            ผู้ติดตามคนที่ 1
                                            : </label>
                                        <input name="checkbox_person1" id="checkbox_person1" placeholder=""
                                            type="checkbox" class="form-control" checked>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person1" class=""><span class="text-danger">*</span>
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
                                        <input name="position_person1" id="position_person1" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="phone_person1" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="phone_person1" id="phone_person1" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 ml-3">
                                    <div>
                                        <p class="text">เป็นผู้ได้รับการฉีดวัคซีนป้องกันไวรัส covid-2019 แล้ว</p>
                                        <div class="custom-radio  custom-control-inline">
                                            <input type="radio" id="covid1_person1" name="covid_person1"
                                                class="custom-control-input covid_person1" value="1">
                                            <label class="custom-control-label" for="covid1_person1">จำนวน 1
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid2_person1" name="covid_person1"
                                                class="custom-control-input covid_person1" value="2">
                                            <label class="custom-control-label" for="covid2_person1">จำนวน 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid3_person1" name="covid_person1"
                                                class="custom-control-input covid_person1" value="3">
                                            <label class="custom-control-label" for="covid3_person1">มากกว่า 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid0_person1" name="covid_person1"
                                                class="custom-control-input covid_person1" value="0">
                                            <label class="custom-control-label"
                                                for="covid0_person1">ยังไม่ได้รับ</label>
                                        </div>

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
                                            ผู้ติดตามคนที่ 2
                                            : </label>
                                        <input name="checkbox_person2" id="checkbox_person2" placeholder=""
                                            type="checkbox" class="form-control" checked>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person2" class=""><span class="text-danger">*</span>
                                            คำนำหน้าชื่อ
                                            : </label>

                                        <input name="title_name_th_person2" id="title_name_th_person2" placeholder=""
                                            type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="fname_th_person2"
                                            class=""><span class="text-danger">*</span> ชื่อ</label><input
                                            name="fname_th_person2" id="fname_th_person2" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="lname_th_person2"
                                            class=""><span class="text-danger">*</span> สกุล</label><input
                                            name="lname_th_person2" id="lname_th_person2" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="position_person2"
                                            class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                        <input name="position_person2" id="position_person2" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="phone_person2" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="phone_person2" id="phone_person2" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 ml-3">
                                    <div>
                                        <p class="text">เป็นผู้ได้รับการฉีดวัคซีนป้องกันไวรัส covid-2019 แล้ว</p>
                                        <div class="custom-radio  custom-control-inline">
                                            <input type="radio" id="covid1_person2" name="covid_person2"
                                                class="custom-control-input covid_person2" value="1">
                                            <label class="custom-control-label" for="covid1_person2">จำนวน 1
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid2_person2" name="covid_person2"
                                                class="custom-control-input covid_person2" value="2">
                                            <label class="custom-control-label" for="covid2_person2">จำนวน 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid3_person2" name="covid_person2"
                                                class="custom-control-input covid_person2" value="3">
                                            <label class="custom-control-label" for="covid3_person2">มากกว่า 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid0_person2" name="covid_person2"
                                                class="custom-control-input covid_person2" value="0">
                                            <label class="custom-control-label"
                                                for="covid0_person2">ยังไม่ได้รับ</label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- ########################## ผู้ติดตามคนที่ 2 end ##################################### -->



                            <div class="divider"></div>
                            <!-- ########################## ผู้ติดตามคนที่ 3 ##################################### -->
                            <div class="form-row">

                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="checkbox_person3" class="">
                                            ผู้ติดตามคนที่ 3
                                            : </label>
                                        <input name="checkbox_person3" id="checkbox_person3" placeholder=""
                                            type="checkbox" class="form-control" checked>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="title_name_th_person3" class=""><span class="text-danger">*</span>
                                            คำนำหน้าชื่อ
                                            : </label>

                                        <input name="title_name_th_person3" id="title_name_th_person3" placeholder=""
                                            type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="fname_th_person3"
                                            class=""><span class="text-danger">*</span> ชื่อ</label><input
                                            name="fname_th_person3" id="fname_th_person3" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="lname_th_person3"
                                            class=""><span class="text-danger">*</span> สกุล</label><input
                                            name="lname_th_person3" id="lname_th_person3" placeholder="" type="text"
                                            class="form-control"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="position_person3"
                                            class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                        <input name="position_person3" id="position_person3" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="phone_person3" class="">
                                            <span class="text-danger">*</span>โทรศัพท์:</label>
                                        <input name="phone_person3" id="phone_person3" placeholder="" type="text"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12 ml-3">
                                    <div>
                                        <p class="text">เป็นผู้ได้รับการฉีดวัคซีนป้องกันไวรัส covid-2019 แล้ว</p>
                                        <div class="custom-radio  custom-control-inline">
                                            <input type="radio" id="covid1_person3" name="covid_person3"
                                                class="custom-control-input covid_person3" value="1">
                                            <label class="custom-control-label" for="covid1_person3">จำนวน 1
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid2_person3" name="covid_person3"
                                                class="custom-control-input covid_person3" value="2">
                                            <label class="custom-control-label" for="covid2_person3">จำนวน 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid3_person3" name="covid_person3"
                                                class="custom-control-input covid_person3" value="3">
                                            <label class="custom-control-label" for="covid3_person3">มากกว่า 2
                                                เข็ม</label>
                                        </div>
                                        <div class="custom-radio  custom-control custom-control-inline">
                                            <input type="radio" id="covid0_person3" name="covid_person3"
                                                class="custom-control-input covid_person3" value="0">
                                            <label class="custom-control-label"
                                                for="covid0_person3">ยังไม่ได้รับ</label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- ########################## ผู้ติดตามคนที่ 3 end ##################################### -->


                            <div class="divider"></div>
                            <!-- ########################## ผู้ติดตามคนที่ 4 ##################################### -->
                            <!-- <div class="form-row">

                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="checkbox_person4" class="">
                                                <small class="text-primary">ผู้ติดตามคนที่ 4</small>
                                                : </label>
                                            <input name="checkbox_person4" id="checkbox_person4" placeholder=""
                                                type="checkbox" class="form-control" checked>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="position-relative form-group">
                                            <label for="title_name_th_person4" class=""><span
                                                    class="text-danger">*</span>
                                                <small class="text-primary">คำนำหน้าชื่อ</small>
                                                : </label>

                                            <input name="title_name_th_person4" id="title_name_th_person4"
                                                placeholder="" type="text" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="fname_th_person4"
                                                class=""><span class="text-danger">*</span> ชื่อ</label><input
                                                name="fname_th_person4" id="fname_th_person4" placeholder="" type="text"
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="lname_th_person4"
                                                class=""><span class="text-danger">*</span> สกุล</label><input
                                                name="lname_th_person4" id="lname_th_person4" placeholder="" type="text"
                                                class="form-control"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="position_person4"
                                                class=""><span class="text-danger">*</span>ตำแหน่ง: </label>
                                            <input name="position_person4" id="position_person4" placeholder=""
                                                type="text" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="phone_person3" class="">
                                                <span class="text-danger">*</span>โทรศัพท์:</label>
                                            <input name="phone_person4" id="phone_person4" placeholder="" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div> -->
                            <!-- ########################## ผู้ติดตามคนที่ 4 end ##################################### -->

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
        $("#register-show").hide();
        $("#minister_id").select2();
        // $('#title_name_th').select2();
        org_sub_select();
        $("#checkbox_person0").trigger("click");
        $("#checkbox_person1").trigger("click");
        $("#checkbox_person2").trigger("click");
        $("#checkbox_person3").trigger("click");
        $("#checkbox_person4").trigger("click");

    });

    $("#checkbox_person0").change(function() {
        if (this.checked) {
            $("#title_name_th_person0").prop("disabled", false);
            $("#fname_th_person0").prop("disabled", false);
            $("#lname_th_person0").prop("disabled", false);
            $("#position_person0").prop("disabled", false);
            $("#phone_person0").prop("disabled", false);
            $(".covid_person0").prop("disabled", false);

            addRules(person0);
        } else {

            $("#title_name_th_person0").prop("disabled", true);
            $("#fname_th_person0").prop("disabled", true);
            $("#lname_th_person0").prop("disabled", true);
            $("#position_person0").prop("disabled", true);
            $("#phone_person0").prop("disabled", true);
            $(".covid_person0").prop("disabled", true);
            removeRules(person0);
        }
    });

    $("#checkbox_person1").change(function() {
        if (this.checked) {
            $("#title_name_th_person1").prop("disabled", false);
            $("#fname_th_person1").prop("disabled", false);
            $("#lname_th_person1").prop("disabled", false);
            $("#position_person1").prop("disabled", false);
            $("#phone_person1").prop("disabled", false);
            $(".covid_person1").prop("disabled", false);
            addRules(person1);
        } else {
            $("#title_name_th_person1").prop("disabled", true);
            $("#fname_th_person1").prop("disabled", true);
            $("#lname_th_person1").prop("disabled", true);
            $("#position_person1").prop("disabled", true);
            $("#phone_person1").prop("disabled", true);
            $(".covid_person1").prop("disabled", true);

            removeRules(person1);
        }
    });

    $("#checkbox_person2").change(function() {
        if (this.checked) {
            $("#title_name_th_person2").prop("disabled", false);
            $("#fname_th_person2").prop("disabled", false);
            $("#lname_th_person2").prop("disabled", false);
            $("#position_person2").prop("disabled", false);
            $("#phone_person2").prop("disabled", false);
            $(".covid_person2").prop("disabled", false);
            addRules(person2);
        } else {
            $("#title_name_th_person2").prop("disabled", true);
            $("#fname_th_person2").prop("disabled", true);
            $("#lname_th_person2").prop("disabled", true);
            $("#position_person2").prop("disabled", true);
            $("#phone_person2").prop("disabled", true);
            $(".covid_person2").prop("disabled", true);
            removeRules(person2);
        }
    });

    $("#checkbox_person3").change(function() {
        if (this.checked) {
            $("#title_name_th_person3").prop("disabled", false);
            $("#fname_th_person3").prop("disabled", false);
            $("#lname_th_person3").prop("disabled", false);
            $("#position_person3").prop("disabled", false);
            $("#phone_person3").prop("disabled", false);
            $(".covid_person3").prop("disabled", false);
            addRules(person3);

        } else {


            $("#title_name_th_person3").prop("disabled", true);
            $("#fname_th_person3").prop("disabled", true);
            $("#lname_th_person3").prop("disabled", true);
            $("#position_person3").prop("disabled", true);
            $("#phone_person3").prop("disabled", true);
            $(".covid_person3").prop("disabled", true);
            removeRules(person3);
        }
    });

    // $("#checkbox_person4").change(function() {
    //     if (this.checked) {
    //         $("#title_name_th_person4").prop("disabled", false);
    //         $("#fname_th_person4").prop("disabled", false);
    //         $("#lname_th_person4").prop("disabled", false);
    //         $("#position_person4").prop("disabled", false);
    //         $("#phone_person4").prop("disabled", false);
    //         addRules(person4);

    //     } else {


    //         $("#title_name_th_person4").prop("disabled", true);
    //         $("#fname_th_person4").prop("disabled", true);
    //         $("#lname_th_person4").prop("disabled", true);
    //         $("#position_person4").prop("disabled", true);
    //         $("#phone_person4").prop("disabled", true);
    //         removeRules(person4);
    //     }
    // });



    function org_sub_select() {
        $("#minister_id").html("")
        $("#minister_id").append("<option value=\"\"></option>");
        $.ajax({
            type: "POST",
            url: "../query/org_sub2.php",
            dataType: "JSON",
            success: function(response) {


                response.data.forEach((element, key) => {
                    $("#minister_id").append("<option value=\"" + element['minister_id'] + "\"> " +
                        element['minister_position'] +
                        " (" + element['minister_name'] + ")</option>");
                });

            }
        });
    }

    $("#minister_id").on('select2:select', function(e) {
        var data = e.params.data;
        console.log(data.id);
        $.ajax({
            type: "POST",
            url: "../query/org_register_check2.php",
            data: {
                "minister_id": data.id
            },
            dataType: "JSON",
            success: function(response) {
                if (response.success == false) {
                    Swal.fire({
                        title: 'ไม่สามารถลงทะเบียนได้',
                        text: 'รัฐมนตรีที่ท่านเลือก มีการทะเบียนไว้แล้ว กรุณาติดต่อเจ้าหน้าที่  เบอร์โทร 0-2265-2202 คุณณัฏฐพล, เบอร์โทร 0-2265-1759 คุณปัณฑิต์ยา, เบอร์โทร 0-2265-1756 คุณดวงนภา',
                        type: 'error',
                        confirmButtonText: 'รับทราบ'
                    });
                    $("#minister_id").val("").trigger('change');
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

    // $("#form_alumni").submit(function(e) {
    //     e.preventDefault();

    //     $.ajax({
    //         type: "POST",
    //         url: "../query/register_update2.php",
    //         data: $(this).serialize(),
    //         dataType: "JSON",
    //         success: function(response) {
    //             if (response.success == true) {
    //                 toastr.options = {
    //                     "closeButton": true,
    //                     "debug": false,
    //                     "newestOnTop": true,
    //                     "progressBar": true,
    //                     "positionClass": "toast-bottom-center",
    //                     "preventDuplicates": false,
    //                     "onclick": null,
    //                     "showDuration": "300",
    //                     "hideDuration": "1000",
    //                     "timeOut": "5000",
    //                     "extendedTimeOut": "1000",
    //                     "showEasing": "swing",
    //                     "hideEasing": "linear",
    //                     "showMethod": "fadeIn",
    //                     "hideMethod": "fadeOut"
    //                 };
    //                 toastr["success"]("สำเร็จ", "ลงทะเบียนสำเร็จ");
    //                 Swal.fire({
    //                     title: '<h3>ลงทะเบียนสำเร็จ</h3>',
    //                     html: '<p><br><b class=\"text text-primary\"></b><p>',
    //                     type: 'success',
    //                     confirmButtonText: 'รับทราบ'
    //                 });
    //                 $('#form_alumni')[0].reset();
    //                 $("#div-form").hide();

    //             } else {
    //                 Swal.fire({
    //                     title: 'ลงทะเบียน ไม่สำเร็จ',
    //                     text: 'ไม่สำเร็จ' + response.error,
    //                     type: 'error',
    //                     confirmButtonText: 'รับทราบ กรุณาติดต่อเจ้าหน้าที่'
    //                 });
    //             }
    //             $.unblockUI();
    //         },
    //         beforeSend: function() {
    //             $.blockUI({
    //                 message: $('.body-block-example-1')
    //             });
    //         }
    //     });

    // });

    var person0 = {
        title_name_th_person0: "required",
        fname_th_person0: "required",
        lname_th_person0: "required",
        position_person0: "required",
        phone_person0: "required",
        covid_person0: "required",
        minister_id: "required"
    };

    var person1 = {
        title_name_th_person1: "required",
        fname_th_person1: "required",
        lname_th_person1: "required",
        position_person1: "required",
        phone_person1: "required",
        covid_person1: "required",
        minister_id: "required"
    };

    var person2 = {
        title_name_th_person2: "required",
        fname_th_person2: "required",
        lname_th_person2: "required",
        position_person2: "required",
        phone_person2: "required",
        covid_person2: "required",
        minister_id: "required"
    };

    var person3 = {
        title_name_th_person3: "required",
        fname_th_person3: "required",
        lname_th_person3: "required",
        position_person3: "required",
        phone_person3: "required",
        covid_person3: "required",
        minister_id: "required"
    };

    // var person4 = {
    //     title_name_th_person4: "required",
    //     fname_th_person4: "required",
    //     lname_th_person4: "required",
    //     position_person4: "required",
    //     phone_person4: "required",
    //     minister_id: "required"
    // };

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
                            if (element['fname_th'] == 'รัฐมนตรี') {
                                $("#register-show ul").append("<li>" + element[
                                    'minister_name'] + "(" + element[
                                    'minister_position'] + ")" + "</li>")
                            } else {
                                $("#register-show ul").append("<li>" + element[
                                        'title_name_th'] + element['fname_th'] +
                                    " " + element['lname_th'] + "(" + element[
                                        'position'] + ")" + "</li>")
                            }

                        });


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



    $("#title_name_th_person0").autocomplete({
        source: availableTags
    });
    $("#title_name_th_person1").autocomplete({
        source: availableTags
    });
    $("#title_name_th_person2").autocomplete({
        source: availableTags
    });
    $("#title_name_th_person3").autocomplete({
        source: availableTags
    });
    $("#title_name_th_person4").autocomplete({
        source: availableTags
    });
    </script>
</body>

</html>