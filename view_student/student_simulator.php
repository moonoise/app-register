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
    <title>ระบบข้อมูลนักเรียน นักศึกษา</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../node_modules/jquery.json-viewer/json-viewer/jquery.json-viewer.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/base.min.css">

    <style>
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
                                <div class="card-header">วิเคราะห์ผลการเรียน</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left"><img width="52" class="rounded-circle" src="../assets/images/avatars/avatar-1-256.png" alt=""></div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><b class="pr-2">Student No:</b><b class="text-success" id="id-std_id"></b> </div>
                                                                <div class="widget-heading "><b class="pr-2">Name:</b><b id="id-name" class="text-success"></b></div>
                                                                <div class="widget-heading "><b class="pr-5">&nbsp;&nbsp;</b><b id="name_th" class="text-success">ชื่อ ภาษาไทย</b></div>
                                                                <div class="widget-heading "><b class="pr-2">Type of Admission:</b><b id="type_of_admission" class="text-success"></b></div>

                                                            </div>
                                                            <div class="widget-content-left mr-5">
                                                                <div class="widget-heading"><b class="pr-2">Faculty of:</b><b class="text-success">Irrigation College</b></div>
                                                                <div class="widget-heading"><b class="pr-2">Field of Study:</b><b class="text-success">Civil Engineering-Irrigation</b></div>
                                                                <div class="widget-heading"><b class="pr-2">Degree Conferred:</b><b id="degree_conferred" class="text-success"></b></div>

                                                                <div class="widget-heading"><b class="pr-2">Date of Admission:</b><b id="date_of_admission" class="text-success"></b></div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-12 mx-3 ">
                                        <div class="row" id="id-subject-future">
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
                <?php include_once "../layouts/4-1-app-wrapper-footer.php"; ?>
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
                    <p id="subject-remark"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Small modal register more -->
    <div class="modal fade bd-register-more-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <form action="" class="form-inline" name="form_register_more" id="form_register_more">
                            <input type="hidden" name="register_more_year" id="register_more_year">
                            <input type="hidden" name="register_more_term" id="register_more_term">
                            <input type="hidden" name="register_more_std_id" id="register_more_std_id">
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                <label for="select_subject" class="mr-sm-2">เลือกรายวิชา</label>
                                <select class="mb-2 mt-2 form-control " name="subject_id_auto" id="subject_id_auto" aria-invalid="false">

                                </select>
                            </div>
                            <button class="btn-form_register_more btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-info" type="button">Register</button>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Small modal register edit -->
    <div class="modal fade bd-register-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="register-edit">
                    </div>
                    <form name="register_delete" id="register_delete">
                        <input type="hidden" name="edit_ss_id" id="edit_ss_id">
                        <button class="btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-danger" id="btn-register-delete" type="button">
                            Delete Register</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Small modal register subject -->
    <div class="modal fade bd-register-subject-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">หมายเหตุ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="id-permissible"></div>
                    <form name="form_register_new" id="form_register_new">
                        <input type="hidden" name="register_new_std_id" id="register_new_std_id">
                        <input type="hidden" name="register_new_set_subject_id" id="register_new_set_subject_id">
                        <button class="btn-form_register_new btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-info" type="button">
                            Register</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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

    <script src="../node_modules/jquery.json-viewer/json-viewer/jquery.json-viewer.js"></script>

    <script>
        $(document).ready(function() {
            var std_id = '<?php echo $_SESSION[__STD_ID__]; ?>';

            call_student(std_id)

            function resolveAfter2Seconds() {
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve('resolved');
                    }, 100);
                });
            }

            async function asyncCall() {
                console.log('calling');
                const result4 = await student_analytics(std_id);
                // console.log(result4);

                // expected output: 'resolved'
            }

            asyncCall();

        });

        var objSubject = {
            'subject_id': '',
            'subject_name_en': '',
            'subject_credit': '',
            'grade_text': '',
            'registered': '',
            'permissible': '',
            'permissible_comment': '',
            'subject_required': '',
            table_subject: function() {
                var strColor = ""
                if (this.permissible == true) {
                    strColor = " table-subject-green "
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
                                    <td>" + this.subject_id + "</td>                               \
                                    <td>" + this.grade_text + regis + "</td>                                  \
                                </tr>                                       \
                                <tr>                                        \
                                    <td colspan=\"3\">" + this.subject_name_en +
                    "<button type=\"button\" data-title=\"รายละเอียด\"  \
                                        class=\"mb-2 mr-2 btn btn-link active\" onclick=\"modal_remark('" + this.permissible_comment + this.subject_required + "')\">Info \
                                                </button>" +
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
                url: "../query2/student_show2.php",
                data: {
                    "std_id": std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-name").html(response.std_title_name + response.std_fname + " " + response.std_lname)
                    $("#id-std_id").html(response.std_id)
                    $("#id-level").html(response.level)
                    $("#type_of_admission").html(response.admission_type_detail)
                    $("#degree_conferred").html(response.degree_conferred)
                    $("#date_of_admission").html(response.date_of_admission)
                }
            });
        }

        var objSubjectOld = {
            'subject_id': '',
            'subject_name_en': '',
            'subject_credit': '',
            'grade_text': '',
            'registered': '',
            'ss_id': '',
            table_subject: function() {
                var strColor = ""
                var strGrade = ""
                var grade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'P'];
                if (grade.includes(this.grade_text)) {
                    strColor = " table-subject-blue "
                    strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-info\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                } else if (this.grade_text == 'W') {
                    strColor = " table-subject-white "
                    strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-warning\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                } else if (this.grade_text == 'F') {
                    strColor = " table-subject-red "
                    strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-danger\" onclick=\"update_grade(`" + this.ss_id + "`,`" + this.grade_text + "`)\"> " + this.grade_text + "</button>"
                } else if (this.grade_text === null) {
                    strColor = " table-subject-blue "
                    strGrade = "<button type=\"button\" class=\"btn-check-grade btn-icon btn-shadow btn-dashed btn btn-outline-warning\" onclick=\"update_grade(`" + this.ss_id + "`,``)\"> <i class=\"lnr-magic-wand btn-icon-wrapper\" ></i></button>"
                }
                // console.log(this.grade_text)
                var str = "<table class=\"col-3 mr-3 table " + strColor + "\"> \
                            <tbody>                                         \
                                <tr class=\"text-center\">                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" +
                    "<button class=\"btn-check-info btn-icon btn-shadow btn-dashed btn btn-outline-info\" \
                    type=\"button\" onclick=\"register_edit(`" + this.ss_id + "`,`" + this.subject_id + "`,`" + this.subject_name_en + "`,`" + this.grade_text + "`,`" + this.registered + "`)\">    \
                     <i class=\"pe-7s-look\"> </i> " + this.subject_id + "</button>  " +
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
            'set_subject_id': '',
            'permissible': '',
            'permissible_comment': '',
            'std_id': '',
            table_subject: function() {
                var str = "<table class=\"col-3 mr-3 table table-subject-white \"> \
                            <tbody>                                         \
                                <tr class=\"text-center\">                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" +
                    "<button class=\"btn-check-info btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-light\" \
                    type=\"button\" onclick=\"register_subject(`" + this.set_subject_id + "`,`" + this.permissible + "`,`" + this.permissible_comment + "`,`" + this.std_id + "`,`" + this.subject_id + "`)\"> \
                    <i class=\"pe-7s-look\" > </i> " + this.subject_id + "</button>  \
                                    </td>                               \
                                    <td></td>                                  \
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



        function student_analytics(std_id) {
            console.log(std_id)
            if (typeof std_id !== 'undefined') {
                var std_id = std_id
            } else {
                var std_id = '<?php echo $_SESSION[__STD_ID__]; ?>'
            }
            $.ajax({
                type: "POST",
                url: "../query3/student_simulator-show.php",
                data: {
                    'std_id': std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-subject-old").html("")
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
                            $("#id-subject-old").append("<div class=\"card-header mb-2 col-12 \">ปี " + strYear + " เทอม " + strTerm + " (sem. G.P.A. = " + element['gpa'] + " ,  cum. G.P.A. = " + element['cum_gpa'] + ") &nbsp;&nbsp;&nbsp; " +
                                "<button class = \"btn-check-info btn-sm btn-icon btn-shadow btn-dashed btn btn-outline-info\"  \
                                id=\"btn-add-student_subject\" type=\"button\" onclick=\"register_more(" + std_id + "," + element['year'] + "," + element['term'] + ") \"> เพิ่มติม..</button>" +
                                "</div>");
                        }

                        element['grade'].forEach(element => {
                            var tableSubject = Object.create(objSubjectOld);

                            tableSubject.subject_id = element['subject_id']
                            tableSubject.subject_name_en = element['subject_name_en']
                            tableSubject.subject_credit = element['subject_credit']
                            tableSubject.grade_text = element['grade_text']
                            tableSubject.registered = true
                            tableSubject.ss_id = element['ss_id']

                            $("#id-subject-old").append(tableSubject.table_subject());

                        });

                        element['subject_not_register'].forEach((element2, key2) => {
                            var tableSubjectNotRegister = Object.create(objSubjectOldNotRegister);
                            tableSubjectNotRegister.std_id = std_id
                            tableSubjectNotRegister.subject_id = element2['subject_id']
                            tableSubjectNotRegister.subject_name_en = element2['subject_name_en']
                            tableSubjectNotRegister.subject_credit = element2['subject_credit']
                            tableSubjectNotRegister.set_subject_id = element2['set_subject_id']
                            tableSubjectNotRegister.permissible = element2['status']['permissible']
                            tableSubjectNotRegister.permissible_comment = element2['status']['permissible_comment']
                            $("#id-subject-old").append(tableSubjectNotRegister.table_subject());
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

        $(document).on("click", ".btn-check-info", function() {

        });

        function modal_remark(params) {
            $(".bd-remark-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#subject-remark").html("");
            $("#subject-remark").html(params);
        }

        function register_more(std_id, year, term) {
            $(".bd-register-more-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#register_more_year").val(year)
            $("#register_more_term").val(term);
            $("#register_more_std_id").val(std_id);


            $.ajax({
                type: "POST",
                url: "../query3/student_simulator-subject_list.php",
                data: {
                    "std_id": std_id,
                    "year": year,
                    "term": term
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response)
                    $("#subject_id_auto").html("")
                    if (response.success) {
                        response.data.forEach((element, key) => {
                            $("#subject_id_auto").append("<option value=\"" + element['subject_id_auto'] + "\">" + "[" + element['subject_id'] + "] " + element['subject_name_en'] + " (" + element['subject_credit'] + ") " + "</option>")
                        });
                    }

                }
            });


        }

        function register_edit(ss_id, subject_id, subject_name_en, grade_text, registered) {
            $(".bd-register-edit-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#register-edit").html("")
            $("#register_delete")[0].reset()
            // console.log(registered)
            if (registered == `true`) {
                $("#register-edit").append("<div class=\"font-icon-wrapper text-success\">  \
                                               <i class=\"fa fa-fw\" aria-hidden=\"true\" title=\"Copy to use check-circle\"></i>   \
                                                <p class=\"text-success\">" + subject_id + "<br>" + subject_name_en + "</p>  \
                                            </div>")

                $("#edit_ss_id").val(ss_id)

            }

        }

        function register_subject(set_subject_id, permissible, permissible_comment, std_id, subject_id) {
            $("#id-permissible").html("")
            $("#register_new_set_subject_id").val("")
            $("#register_new_std_id").val("")
            $(".btn-form_register_new").prop('disabled', true)
            $(".bd-register-subject-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            if (permissible == `true`) {
                console.log('true')
                $("#register_new_set_subject_id").val(set_subject_id)
                $("#register_new_std_id").val(std_id)
                $(".btn-form_register_new").prop('disabled', false)
                $("#id-permissible").append("<div class=\"font-icon-wrapper text-success\">  \
                                                <i class=\"lnr-smile\"></i>   \
                                                <p class=\"text-success\">" + subject_id + "<br>" + permissible_comment + " สามารถลงทะเบียนได้ </p>  \
                                            </div>")


            } else if (permissible == `false`) {
                console.log('false')
                $("#id-permissible").append("<div class=\"font-icon-wrapper text-danger\">  \
                                                <i class=\"lnr-sad\"></i>   \
                                                <p class=\"text-danger\">" + subject_id + "<br>" + permissible_comment + " สามารถลงทะเบียนได้ </p>  \
                                            </div>")
            }

        }

        function update_grade(ss_id, grade_text) {
            $(".bd-update-grade-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })

            $("#select_update_grade").val(grade_text);
            $("#update_grade_ss_id").val(ss_id)
        }


        $(".btn-form_register_new").on("click", function() {
            swal.fire({
                title: "ลงทะเบียนรายวิชานี้",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                cancelButtonColor: "#d92550",
                html: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "../query3/student_simulator-register.php",
                        data: $("#form_register_new").serialize(),
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
                                student_analytics()
                                $(".bd-register-subject-modal-lg").modal('hide')
                            } else {
                                Swal.fire({
                                    title: 'การลงทะเบียน',
                                    text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                    type: 'error',
                                    confirmButtonText: 'รับทราบ'
                                });
                            }
                        }
                    });
                } else {

                }
            })
        });

        $(".btn-form_register_more").on("click", function() {
            swal.fire({
                title: "ลงทะเบียนรายวิชานี้",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                cancelButtonColor: "#d92550",
                html: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "../query3/student_simulator-register-more.php",
                        data: $("#form_register_more").serialize(),
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
                                student_analytics()
                                $(".bd-register-more-modal-lg").modal('hide')
                            } else {
                                Swal.fire({
                                    title: 'การลงทะเบียน',
                                    text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                    type: 'error',
                                    confirmButtonText: 'รับทราบ'
                                });
                            }
                        }
                    });
                } else {

                }
            })
        });

        $(document).on("click", "#btn-register-delete", function() {
            console.log("test")
            swal.fire({
                title: "<span class=\"text text-danger\">ลบลงทะเบียนรายวิชานี้</span>",
                text: "คุณแน่ใจหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                cancelButtonColor: "#d92550",
                html: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "../query3/student_simulator_register_delete.php",
                        data: $("#register_delete").serialize(),
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
                                toastr["warning"]("สำเร็จ", "ลบลงทะเบียนสำเร็จ");
                                student_analytics()
                                $(".bd-register-edit-modal-lg").modal('hide')
                            } else {
                                Swal.fire({
                                    title: 'การลงทะเบียน',
                                    text: 'ไม่สำเร็จ' + response.error + " <br> " + response.success,
                                    type: 'error',
                                    confirmButtonText: 'รับทราบ'
                                });
                            }
                        }
                    });
                }
            })



        });

        $(".btn-form_update_grade").on("click", function() {
            $.ajax({
                type: "POST",
                url: "../query3/student_simulator-update_grade.php",
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
                        student_analytics()
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
        });
    </script>

</body>

</html>