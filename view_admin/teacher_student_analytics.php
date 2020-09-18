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
    <title>ระบบโปรแกรมตรวจสอบความถูกต้องของลำดับรายวิชาในการลงทะเบียนเรียน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../node_modules/jquery.json-viewer/json-viewer/jquery.json-viewer.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/base.min.css">

    <style>
        .fixed-footer .app-footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 7;
        }

        .table-subject-red {
            background-color: #f7242424;
            box-shadow: 0 0.125rem 0.625rem rgba(217, 37, 80, .4), 0 0.0625rem 0.125rem rgba(217, 37, 80, .5);
        }

        .table-subject-red td,
        .table-subject-red th {
            border: 1px solid #d41a3d;
        }

        .table-subject-yellow {
            background-color: #eaaf0a54;
            box-shadow: 0 0.125rem 0.625rem rgba(247, 185, 36, .4), 0 0.0625rem 0.125rem rgba(247, 185, 36, .5);
        }

        .table-subject-yellow td,
        .table-subject-yellow th {
            border: 1px solid #d4921a;
        }

        .table-subject-green {
            background-color: #5bf14959;
            box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, .4), 0 0.0625rem 0.125rem rgba(58, 196, 125, .5);
        }

        .table-subject-green td,
        .table-subject-green th {
            border: 1px solid #21bb05;
        }

        .table-subject-blue {
            background-color: #49d2f159;
            box-shadow: 0 0.125rem 0.625rem rgba(22, 170, 255, .4), 0 0.0625rem 0.125rem rgba(22, 170, 255, .5);
        }

        .table-subject-blue td,
        .table-subject-blue th {
            border: 1px solid #059abb;
        }

        .table-subject-white {
            background-color: #fbf9f354;
            box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, .4), 0 0.0625rem 0.125rem rgba(238, 238, 238, .5);
        }

        .table-subject-white td,
        .table-subject-white th {
            border: 1px solid #adaba963;
        }

        .table-subject-gray {
            background-color: #cccbc954;
            ;
            box-shadow: 0 0.125rem 0.625rem rgba(238, 238, 238, .4), 0 0.0625rem 0.125rem rgba(238, 238, 238, .5);
        }

        .table-subject-gray td,
        .table-subject-gray th {
            border: 2px #e09a0e54 dotted;
        }

        .table-subject-green-dotted {
            background-color: #5bf1490d;
            box-shadow: 0 0.125rem 0.625rem rgba(58, 196, 125, .4), 0 0.0625rem 0.125rem rgba(58, 196, 125, .5);
        }

        .table-subject-green-dotted td,
        .table-subject-green-dotted th {
            border: 3px #5bf14959 dotted;
        }
    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar fixed-footer">

        <?php include_once "../layouts/2-head-start.php"; ?>
        <?php include_once "../layouts/3-1-theme-options-start.php";
        ?>
        <div class="app-main">
            <?php include_once "../layouts/4-app-sidebar.php"; ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">วิเคราะห์ผลการเรียน</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="widget-content-left d-flex justify-content-center"><img width="52" class="rounded-circle" src="../assets/images/avatars/avatar-1-256.png" alt=""></div>
                                        </div>
                                        <div class="col-5">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading"><b class="pr-2">Student No:</b><b class="text-success" id="id-std_id"></b> </div>
                                                <div class="widget-heading "><b class="pr-2">Name:</b><b id="id-name" class="text-success"></b></div>
                                                <div class="widget-heading "><b class="pr-5">&nbsp;&nbsp;</b><b id="id-name_th" class="text-success"></b></div>
                                                <div class="widget-heading "><b class="pr-2">Type of Admission:</b><b id="type_of_admission" class="text-success"></b></div>
                                                <div class="widget-heading"><b class="pr-2">Teacher advisor: </b><b id="id-teacher_advisor" class="text-success"></b></div>

                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="widget-content-left mr-5">
                                                <div class="widget-heading"><b class="pr-2">Faculty of:</b><b class="text-success">Irrigation College</b></div>
                                                <div class="widget-heading"><b class="pr-2">Field of Study:</b><b class="text-success">Civil Engineering-Irrigation</b></div>
                                                <div class="widget-heading"><b class="pr-2">Degree Conferred:</b><b id="degree_conferred" class="text-success"></b></div>
                                                <div class="widget-heading"><b class="pr-2">Date of Admission:</b><b id="date_of_admission" class="text-success"></b></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 mx-3 ">
                                        <div class="row" id="id-subject-current">
                                        </div>
                                    </div>

                                    <!-- <div class="card-header mb-2">ปีการศึกษาที่ผ่านมา</div> -->
                                    <div class="col-12 mx-3">
                                        <div class="row" id="id-subject-old"></div>
                                    </div>

                                    <pre id="json-renderer-current"></pre>
                                    <pre id="json-renderer"></pre>

                                </div>
                                <div class="d-block text-right card-footer">
                                    <!-- <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                                    <button class="btn btn-success btn-lg">Save</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "../layouts/4-2-app-wrapper-footer.php"; ?>
            </div>

        </div>

    </div>
    <!-- Small modal -->
    <div class="modal fade bd-remark-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="id-permissible"></div>
                    <p id="subject-remark"></p>
                    <p id="subject-form-register"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Small modal -->
    <div class="modal fade bd-remark-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="id-info-subject"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Small modal -->
    <div class="modal fade bd-from-add_student_subject-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ลงทะเบียนเพิ่มเติม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form_register_subject" id="form_register_subject">
                        <input name="yt_year_add" id="yt_year_add" placeholder="ปีการศึกษา" type="hidden" class="form-control" readonly>
                        <input name="yt_term_add" id="yt_term_add" placeholder="เทอม" type="hidden" class="form-control" readonly>
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="std_id_add" class="">รหัสนักศึกษา</label>
                                    <input name="std_id_add" id="std_id_add" placeholder="รหัสนักศึกษา" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="position-relative form-group">
                                    <label for="subject_ts_id_add" class="">รายวิชาที่ลงทะเบียน</label>
                                    <select class="mb-2 form-control" name="subject_ts_id_add" id="subject_ts_id_add">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-submit-register" class="btn btn-info">Register</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Small modal update grade -->
    <div class="modal fade bd-update-grade-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" id="id-grade-update">
                        <form action="" class="form-inline" name="form_update_grade" id="form_update_grade">
                            <input type="hidden" name="update_grade_ss_id" id="update_grade_ss_id">
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                <label for="select_update_grade" class="mr-sm-2">เลือกเกรด</label>
                                <select class="mb-2 mt-2 form-control " name="select_update_grade" id="select_update_grade" aria-invalid="false">
                                    <option value="">ยังไม่ระบุ</option>
                                    <option value="A">A</option>
                                    <option value="B+">B+</option>
                                    <option value="B">B</option>
                                    <option value="C+">C+</option>
                                    <option value="C">C</option>
                                    <option value="D+">D+</option>
                                    <option value="D">D</option>
                                    <option value="F">F</option>
                                    <option value="W">W</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                            <button class="btn-form_update_grade btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-info" type="button">Update</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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


    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>
    <?php include_once "../layouts/7-help.php"; ?>
    <script src="../node_modules/jquery.json-viewer/json-viewer/jquery.json-viewer.js"></script>

    <script>
        $(document).ready(function() {
            var std_id = '<?php echo $_POST['std_id']; ?>';

            // student_analytics_current(std_id)
            // student_analytics_current2(std_id)
            // student_analytics(std_id)
            call_student(std_id)

            function resolveAfter2Seconds() {
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve('resolved');
                    }, 100);
                });
            }

            async function asyncCall() {
                // console.log('calling');
                $.blockUI({
                    message: $('.body-block-example-1')
                });
                const result = await student_analytics_current(std_id);
                const result2 = await student_analytics_current2(std_id);
                const result3 = await student_analytics(std_id);
                console.log(result);
                console.log(result2);
                console.log(result3);
                // expected output: 'resolved'
                $.unblockUI();

            }




            asyncCall();

        });

        async function asyncCall2(std_id) {
            $.blockUI({
                message: $('.body-block-example-1')
            });
            const result = await student_analytics_current(std_id);
            const result2 = await student_analytics_current2(std_id);
            $.unblockUI();
        }

        var objSubject = {
            'std_id': '',
            'subject_id': '',
            'subject_name_en': '',
            'subject_credit': '',
            'grade_text': '',
            'registered': '',
            'permissible': '',
            'permissible_comment': '',
            'subject_required': '',
            'yt_year': '',
            'yt_term': '',
            'ss_id': '',
            table_subject: function() {
                var strColor = ""
                var strGrade = ""
                var grade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'P'];
                if (this.permissible == true) {
                    strColor = " table-subject-green "
                    if (this.registered == true) {
                        if (grade.includes(this.grade_text)) {
                            strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-info\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                        } else if (this.grade_text == 'W') {

                            strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-warning\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                        } else if (this.grade_text == 'F') {

                            strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-danger\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                        } else if (this.grade_text === null) {

                            strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-warning\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> <i class=\"lnr-magic-wand btn-icon-wrapper\" ></i></button>"
                        } else {
                            strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-success\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                        }

                    }
                } else {
                    strColor = " table-subject-yellow "
                }
                var regis = ""
                if (this.registered == true) {
                    // regis = "<i class=\"fa fa-fw icon-gradient bg-malibu-beach\" aria-hidden=\"true\" title=\" ลงทะเบียนแล้ว \">  </i> "
                    regis = "<div class=\"mb-2 mr-2 badge badge-pill badge-info\">UA</div>"
                } else {
                    regis = ""
                }

                var str = "<table class=\"col-3 mr-3 table " + strColor + "\"> \
                            <tbody>                                         \
                                <tr class=\"text-center\">                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" +
                    "<button class=\"btn-check-info btn-icon btn-shadow btn-dashed btn btn-outline-success\" type=\"button\" onclick=\"modal_remark('" + this.registered + "','" + this.permissible + "','" + this.permissible_comment + this.subject_required + "' , '" + this.std_id + "' , '" + this.subject_id + "' , '" + this.yt_year + "' , '" + this.yt_term + "' , '" + this.ss_id + "')\" > " + regis + this.subject_id + "</button>  " +
                    "</td>                               \
                                    <td>" + strGrade + "</td>                                  \
                                </tr>                                       \
                                <tr>                                        \
                                    <td colspan=\"3\">" + this.subject_name_en +
                    "</td>                 \
                                </tr>                                       \
                            </tbody>                                        \
                        </table>                                    \
                        ";
                return str;

            }

        }

        function call_student(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_show2.php",
                data: {
                    "std_id": std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-name").html(response.std_title_name + response.std_fname + " " + response.std_lname)
                    $("#id-name_th").html(response.std_title_name_th + response.std_fname_th + " " + response.std_lname_th)
                    $("#id-std_id").html(response.std_id)
                    $("#id-level").html(response.level)
                    $("#type_of_admission").html(response.admission_type_detail)
                    $("#degree_conferred").html(response.degree_conferred)
                    $("#date_of_admission").html(response.date_of_admission)
                    if (response.teacher_id) {
                        $("#id-teacher_advisor").append(response.teacher_title_name1 + response.teacher_fname1 + " " + response.teacher_lname1)
                    }
                    if (response.teacher_id2) {
                        $("#id-teacher_advisor").append(", " + response.teacher_title_name2 + response.teacher_fname2 + " " + response.teacher_lname2)
                    }
                }
            });
        }


        var objSubjectOld = {
            'subject_id': '',
            'subject_name_en': '',
            'subject_credit': '',
            'grade_text': '',
            'registered': '',
            table_subject: function() {
                var strColor = ""
                var strGrade = ""
                var grade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'P'];
                if (grade.includes(this.grade_text)) {
                    strColor = " table-subject-blue "
                    strGrade = "<button type=\"button\" class=\" btn-icon btn-shadow btn-dashed btn btn-outline-info\" disabled> " + this.grade_text + "</button>"
                } else if (this.grade_text == 'W') {
                    strColor = " table-subject-gray "
                    strGrade = "<button type=\"button\" class=\" btn-icon btn-shadow btn-dashed btn btn-outline-warning\" disabled> " + this.grade_text + "</button>"
                } else if (this.grade_text == 'F') {
                    strColor = " table-subject-red "
                    strGrade = "<button type=\"button\" class=\" btn-icon btn-shadow btn-dashed btn btn-outline-danger\" disabled> " + this.grade_text + "</button>"
                } else if (this.grade_text === null) {
                    strColor = " table-subject-blue "
                    strGrade = "<button type=\"button\" class=\" btn-icon btn-shadow btn-dashed btn btn-outline-warning\" disabled> <i class=\"lnr-magic-wand btn-icon-wrapper\" ></i></button>"
                }

                var str = "<table class=\"col-3 mr-3 table " + strColor + "\"> \
                            <tbody>                                         \
                                <tr class=\"text-center\">                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" +
                    "<i class=\"pe-7s-look\"> </i> " + this.subject_id +
                    "</td>   \
                                    <td>" + strGrade + "</td>                                  \
                                </tr>                                       \
                                <tr>                                        \
                                    <td colspan=\"3\">" + this.subject_name_en +
                    "</td>                 \
                                </tr>                                       \
                            </tbody>                                        \
                        </table>";
                return str;
            }

        }

        var objSubjectOldNotRegister = {
            'subject_id': '',
            'subject_name_en': '',
            'subject_credit': '',
            'have_grade': '',
            'have_term': '',
            'have_year': '',
            table_subject: function() {

                var strInfo = "";
                var color = "";
                if (this.have_grade) {
                    color = "table-subject-green-dotted"
                    strInfo += "<button type=\"button\" class=\"mb-2 mr-2 border-0 btn-transition btn btn-outline-info\" onclick = \"modal_remark_info(`" + this.subject_id + "`,`" + this.subject_name_en + "`,`" + this.have_grade + "`,`" + this.have_term + "`,`" + this.have_year + "`)\"> INFO </button>";
                } else {
                    color = " table-subject-white "
                }
                var str = "<table class=\"col-3 mr-3 table " + color + "  \"> \
                            <tbody>                                         \
                                <tr class=\"text-center\">                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" + this.subject_id + "</td>                               \
                                    <td></td>                                  \
                                </tr>                                       \
                                <tr>                                        \
                                    <td colspan=\"3\">" + this.subject_name_en + strInfo +
                    "</td>                 \
                                </tr>                                       \
                            </tbody>                                        \
                        </table>";
                return str;
            }

        }

        var objSumCredit = {
            'sumCredit': '',
            fnSumCredit: function() {
                var str = "";
                if (this.sumCredit <= 22) {
                    str += " <span class=\"text text-info\">&nbsp; " + this.sumCredit + "</span>"
                } else if (this.sumCredit > 22) {
                    str += " <span class=\"text text-danger\">&nbsp; " + this.sumCredit + " (ลงทะเบียนเกิน 22 หน่วยกิต)</span> "
                }
                return str;
            }
        }

        function student_analytics_current(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_analytics_current.php",
                data: {
                    'std_id': std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-subject-current").html("")

                    $("#id-subject-current").append("<div id=\"id-head_current\" class=\"card-header mb-2 col-12 \">แผนการเรียนปัจจุบัน &nbsp;&nbsp;&nbsp;  \
                    <span id=\"id-credit\"></span> \
                    <button class = \"btn-check-info btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-info\" id=\"btn-add-student_subject\" type=\"button\" value=\"" + std_id + "\"> เพิ่มติม..</button> </div>");

                    response.forEach((element, key) => {
                        var tableSubject = Object.create(objSubject);
                        if (element['sum_credit'] <= '22') {
                            $("#id-credit").html("<span class=\"text-info\">CREDIT = " + element['sum_credit'] + "</span> &nbsp;&nbsp;");
                        } else if (element['sum_credit'] > '22') {
                            $("#id-credit").html("<span class=\"text-danger\">CREDIT = " + element['sum_credit'] + "(ลงทะเบียนเกิน 22 หน่วยกิต)</span> &nbsp;&nbsp;");
                        }

                        // console.log(element['subject_id'])
                        tableSubject.subject_id = element['subject_id']
                        tableSubject.std_id = std_id
                        tableSubject.yt_year = element['set_subject_year']
                        tableSubject.yt_term = element['set_subject_term']

                        tableSubject.subject_name_en = element['subject_name_en']
                        tableSubject.subject_credit = element['subject_credit']


                        tableSubject.registered = element['registered']
                        tableSubject.permissible = element['permissible']
                        tableSubject.permissible_comment = element['permissible_comment']
                        if (element['student_subject']) {
                            tableSubject.ss_id = element['student_subject']['ss_id']

                            if (typeof element['student_subject']['grade_text'] != 'undefined') {
                                tableSubject.grade_text = element['student_subject']['grade_text']
                            } else {
                                tableSubject.grade_text = null
                            }

                        } else {
                            tableSubject.ss_id = null
                        }
                        // tableSubject.ss_id = element['student_subject'][key]
                        // console.log(element['student_subject']['ss_id'])

                        var strSr = ""
                        if (element['subject_required']['data'] != null && element['subject_required']['data'].length > 0) {
                            // console.log('test')
                            element['subject_required']['data'].forEach((elementSubjectRequired, keySubjectRequired) => {
                                strSr += "<br>" + "[" + elementSubjectRequired['subject_id'] + "] " + elementSubjectRequired['subject_name_en'] + " เกรด " + elementSubjectRequired['grade_text']
                            });
                            tableSubject.subject_required = strSr
                        }



                        $("#id-subject-current").append(tableSubject.table_subject());
                    });



                    // $('#json-renderer-current').jsonViewer(response);
                }
            });

            return new Promise(resolve => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        function student_analytics(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_analytics.php",
                data: {
                    'std_id': std_id
                },
                dataType: "JSON",
                success: function(response) {
                    var for_01175163 = false;
                    var for_01175143 = false;

                    response.reverse().forEach((element, key) => {
                        // console.log(element['grade'])
                        if (element['grade'].length > 0 || element['subject_not_register'].length > 0) {
                            var strTerm = ""
                            var strYear = ""
                            if (element['term'] == '3') {
                                strTerm = "ภาคฤดูร้อน"
                                strYear = parseInt(element['year']) + 1
                            } else {
                                strTerm = element['term']
                                strYear = parseInt(element['year'])
                            }
                            var strSumCredit = Object.create(objSumCredit)
                            strSumCredit.sumCredit = element['sumCredit']

                            $("#id-subject-old").append("<div class=\"card-header mb-2 col-12 \">ปี " + strYear + " เทอม " + strTerm + " (sem. G.P.A. = " + element['gpa'] + " ,  cum. G.P.A. = " + element['cum_gpa'] + " , Credit = " + strSumCredit.fnSumCredit() + ")" + "</div>");
                        }

                        element['grade'].forEach(element => {
                            var tableSubject = Object.create(objSubjectOld);

                            tableSubject.subject_id = element['subject_id']
                            tableSubject.subject_name_en = element['subject_name_en']
                            tableSubject.subject_credit = element['subject_credit']
                            tableSubject.grade_text = element['grade_text']
                            tableSubject.registered = element['registered']

                            $("#id-subject-old").append(tableSubject.table_subject());

                            if (element['subject_id'] == '01175163') {
                                for_01175163 = true;
                            }

                            if (element['subject_id'] == '01175143') {
                                for_01175143 = true;
                            }

                        });

                        element['subject_not_register'].forEach(element2 => {
                            // var tableSubjectNotRegister = Object.create(objSubjectOldNotRegister);
                            // tableSubjectNotRegister.subject_id = element2['subject_id']
                            // tableSubjectNotRegister.subject_name_en = element2['subject_name_en']
                            // tableSubjectNotRegister.subject_credit = element2['subject_credit']

                            // $("#id-subject-old").append(tableSubjectNotRegister.table_subject());
                            if (element2['subject_id'] == '01175163' && for_01175143 == true) {

                            } else if (element2['subject_id'] == '01175143' && for_01175163 == true) {

                            } else {
                                var tableSubjectNotRegister = Object.create(objSubjectOldNotRegister);
                                tableSubjectNotRegister.subject_id = element2['subject_id']
                                tableSubjectNotRegister.subject_name_en = element2['subject_name_en']
                                tableSubjectNotRegister.subject_credit = element2['subject_credit']
                                tableSubjectNotRegister.have_grade = element2['have_grade']
                                tableSubjectNotRegister.have_term = element2['have_term']
                                tableSubjectNotRegister.have_year = element2['have_year']

                                $("#id-subject-old").append(tableSubjectNotRegister.table_subject());
                            }

                        });
                    });
                    // $('#json-renderer').jsonViewer(response);
                }
            });

            return new Promise(resolve => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        function student_analytics_current2(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_analytics_current2.php",
                data: {
                    'std_id': std_id
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response)
                    if (Object.keys(response).length > 0) {
                        $("#id-subject-current").append("<div class=\"card-header mb-2 col-12 \">เพิ่มเติม..</div>");
                        response.forEach((element, key) => {
                            var tableSubject = Object.create(objSubject);

                            tableSubject.subject_id = element['subject_id']
                            tableSubject.subject_name_en = element['subject_name_en']
                            tableSubject.subject_credit = element['subject_credit']
                            tableSubject.grade_text = ""
                            tableSubject.registered = true
                            tableSubject.permissible = true
                            tableSubject.permissible_comment = "รายวิชาที่ลงเพิ่มเติม นอกแผนการเรียน"

                            if (element['ss_id']) {
                                tableSubject.ss_id = element['ss_id']

                            } else {
                                tableSubject.ss_id = null
                            }

                            if (element['grade_text']) {
                                tableSubject.grade_text = element['grade_text']
                            } else {
                                tableSubject.grade_text = null
                            }

                            // var strSr = ""
                            // if (element['subject_required']['data'] != null && element['subject_required']['data'].length > 0) {
                            //     // console.log('test')
                            //     element['subject_required']['data'].forEach((elementSubjectRequired, keySubjectRequired) => {
                            //         strSr += "<br>" + "[" + elementSubjectRequired['subject_id'] + "] " + elementSubjectRequired['subject_name_en'] + " เกรด " + elementSubjectRequired['grade_text']
                            //     });
                            //     tableSubject.subject_required = strSr
                            // }
                            if (element['subject_id'] == '01175163' || element['subject_id'] == '01175143') {
                                $("#id-head_current").after(tableSubject.table_subject());
                            } else {
                                $("#id-subject-current").append(tableSubject.table_subject());
                            }


                        });
                    }
                }
            });

            return new Promise(resolve => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        function modal_remark(registered, permissible, strParams, std_id, subject_id, yt_year, yt_term, ss_id) {
            var str = ""
            var strDisabled = ""
            $(".bd-remark-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#subject-remark").html("");
            $("#subject-form-register").html("");
            $("#subject-remark").html(strParams);
            if (registered == 'true') {
                strDisabled = "disabled"
                $("#subject-form-register").append("<button type=\"button\"  value=\"" + ss_id + "\" class=\"btn-icon btn-shadow btn-dashed btn btn-outline-warning delete-register\">Delete</button> ")
            } else if (registered == 'false') {

            }
            $("#id-permissible").html("")
            // console.log(permissible)
            if (permissible == 'true' && registered == 'false') {
                $.ajax({
                    type: "POST",
                    url: "../query/student_subject_call_room.php",
                    data: {
                        "subject_id": subject_id,
                        "yt_year": yt_year,
                        "yt_term": yt_term
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (Object.keys(response).length > 0) {
                            var str = ""
                            response.data.forEach((element, key) => {
                                var strTeacherName = ""
                                if (element['teacher_id']) {
                                    strTeacherName += "[" + element['teacher_title_name1'] + element['teacher_fname1'] + " " + element['teacher_lname1']

                                    if (element['teacher_id2']) {
                                        strTeacherName += " ," + element['teacher_title_name2'] + element['teacher_fname2'] + " " + element['teacher_lname2']
                                    }
                                    if (element['teacher_id3']) {
                                        strTeacherName += " ," + element['teacher_title_name3'] + element['teacher_fname3'] + " " + element['teacher_lname3']
                                    }
                                    strTeacherName += "]"

                                }
                                str += "<option value=\"" + element['ts_id'] + "\">" + element['subject_name_en'] + strTeacherName + "</option>"
                            });
                            str = "<form name=\"form-register-subject\" id=\"form-register-subject\" class=\"form-group \"> \
                            <input type=\"hidden\" name=\"regis_std_id\" id=\"regis_std_id\"  value=\"" + std_id + "\">   \
                            <input type=\"hidden\" name=\"regis_subject_id\" id=\"regis_subject_id\"  value=\"" + subject_id + "\">   \
                            <input type=\"hidden\" name=\"regis_yt_year\" id=\"regis_yt_year\"  value=\"" + yt_year + "\">   \
                            <input type=\"hidden\" name=\"regis_yt_term\" id=\"regis_yt_term\"  value=\"" + yt_term + "\">   \
                            <div class=\"position-relative form-group\">        \
                                <label for=\"ts_id\" class=\"\">เลือกกลุ่ม กรณีมีมากกว่า 1 กลุ่ม </label>       \
                                <select class=\"mb-2 form-control\" name=\"ts_id\">     \
                                " + str + "   \
                                </select>           \
                            </div>      \
                            <button type=\"button\" id=\"id-submit-register\" class=\"btn-icon btn-shadow btn-dashed btn btn-outline-info\" " + strDisabled + ">Register</button> \
                            </form> \
                                ";
                            $("#subject-form-register").html(str)
                        }
                    }

                });


                $("#id-permissible").append("<div class=\"font-icon-wrapper text-success\">  \
                                                <i class=\"lnr-smile\"></i>   \
                                                <p class=\"text-success\"> สามารถลงทะเบียนได้ </p>  \
                                            </div>")
            } else if (permissible == `false`) {
                $("#id-permissible").append("<div class=\"font-icon-wrapper text-danger\">  \
                                                <i class=\"lnr-sad\"></i>   \
                                                <p class=\"text-danger\"> ไม่สามารถลงทะเบียนได้ </p>  \
                                            </div>")
            }


        }

        function modal_remark_info(subject_id, subject_name_en, have_grade, have_term, have_year) {
            $(".bd-remark-info-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#id-info-subject").html("[" + subject_id + "] " + subject_name_en + " ได้เกรด " + have_grade + "( เทอม " + have_term + " ปีการศึกษา " + have_year + ")");

        }


        $(document).on("click", "#id-submit-register", function() {
            swal.fire({
                title: "ลงทะเบียนรายวิชา",
                text: "คุณต้องการลงทะเบียนรายวิชานี้ ใช่หรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                html: false
            }).then((result) => {
                if (result.value) {
                    console.log($("#form_register_subject").serialize())
                    $.ajax({
                        type: "POST",
                        url: "../query/student_subject_register_update.php",
                        data: $("#form-register-subject").serialize(),
                        dataType: "JSON",
                        success: function(response) {
                            if (response.success) {
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
                                student_analytics_current($("#regis_std_id").val());
                                $('#form-register-subject')[0].reset();
                                $(".bd-remark-modal-lg").modal('hide')
                            }

                        }
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log("cancel")

                }
            });
        });

        $(document).on("click", "#btn-add-student_subject", function() {

            $(".bd-from-add_student_subject-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#std_id_add").val($(this).val())

            $.ajax({
                type: "POST",
                url: "../query/student_subject_select_register.php",
                data: {
                    "std_id": $(this).val()
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response.data)
                    $("#yt_year_add").val(response.yt_year)
                    $("#yt_term_add").val(response.yt_term)
                    $("#subject_ts_id_add").html("")
                    response.data.forEach((element, key) => {
                        // console.log(element['ts_id'])
                        $("#subject_ts_id_add").append("<option value=\"" + element['ts_id'] + ":" + element['subject_id'] + "\"> [" + element['subject_id'] + "]" + element['subject_name_en'] + "</option> ")
                    });
                }
            });

        });

        $("#btn-submit-register").on("click", function() {
            swal.fire({
                title: "ลงทะเบียนรายวิชา",
                text: "คุณต้องการลงทะเบียนรายวิชานี้ ใช่หรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                html: false
            }).then((result) => {
                if (result.value) {
                    console.log($("#form_register_subject").serialize())
                    $.ajax({
                        type: "POST",
                        url: "../query/student_subject_register_update2.php",
                        data: $("#form_register_subject").serialize(),
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
                                toastr["success"]("สำเร็จ", "ลงทะเบียนรายวิชา");

                                // student_analytics_current($("#std_id_add").val());
                                asyncCall2($("#std_id_add").val())
                                $('#form_register_subject')[0].reset();
                                $(".bd-from-add_student_subject-modal-lg").modal('hide')

                            } else {
                                Swal.fire(
                                    'Error',
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

        $(document).on("click", ".delete-register", function() {
            // console.log($(this).val())
            swal.fire({
                title: "ยกเลิกการลงทะเบียน",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                html: false
            }).then((result) => {
                if (result.value) {
                    // console.log($(this).val())
                    $.ajax({
                        type: "POST",
                        url: "../query/admin_student_subject_delete_by_id.php",
                        data: {
                            "ss_id": $(this).val()
                        },
                        dataType: "JSON",
                        success: function(response) {
                            console.log("test : " + response)
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
                                toastr["success"]("สำเร็จ", "นำราชชื่อออกจากรายวิชา");

                                $(".bd-remark-modal-lg").modal("hide")
                                // student_analytics_current('')
                                asyncCall2('<?php echo $_POST['std_id']; ?>')

                            } else {
                                Swal.fire(
                                    'Error',
                                    'เกิดข้อผิดพลาด :)',
                                    'error'
                                )
                            }
                        }
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log("delete-register : cancel")

                }
            });

        });


        function update_grade(ss_id, grade_text) {
            $(".bd-update-grade-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })


            $("#select_update_grade").val(grade_text);
            $("#update_grade_ss_id").val(ss_id)
        }

        $(".btn-form_update_grade").on("click", function() {

            swal.fire({
                title: "ลงทะเบียนรายวิชา",
                text: "คุณต้องการลงทะเบียนรายวิชานี้ ใช่หรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                html: false
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "../query/admin_update_grade_by_ss_id.php",
                        data: $("#form_update_grade").serialize(),
                        dataType: "JSON",
                        success: function(response) {
                            if (response.success) {
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
                                toastr["success"]("สำเร็จ", "อัพเดทเกรดสำเร็จ");
                                // student_analytics_current('<?php echo $_POST['std_id']; ?>')
                                asyncCall2('<?php echo $_POST['std_id']; ?>')

                                $(".bd-update-grade-modal-lg").modal('hide')
                            } else {
                                Swal.fire({
                                    title: 'อัพเดทเกรด',
                                    text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                    type: 'error',
                                    confirmButtonText: 'รับทราบ'
                                });
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