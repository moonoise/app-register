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
                                                                <div class="widget-heading"><b>ชื่อ-สกุล:</b>&nbsp;&nbsp;<span id="id-name"></div>
                                                                <div class="widget-subheading opacity-10"><span class="pr-2"><b>รหัสนิสิต:</b> </span><span><b class="text-success" id="id-std_id"></b></span></div>
                                                            </div>
                                                            <div class="widget-content-left mr-5">
                                                                <div class="widget-heading"><b>นิสิตชั้นปีที่:</b>&nbsp;&nbsp;<span id="id-level" class="text-success"></div>
                                                                <div class="widget-subheading opacity-10"><span class="pr-2"><b></b>&nbsp;&nbsp; </span><span id="id-gpa" class="text-success"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
                console.log('calling');
                const result = await student_analytics_current(std_id);
                const result2 = await student_analytics_current2(std_id);
                const result3 = await student_analytics(std_id);
                console.log(result);
                console.log(result2);
                console.log(result3);
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
                    regis = "<i class=\"fa fa-fw icon-gradient bg-malibu-beach\" aria-hidden=\"true\" title=\" ลงทะเบียนแล้ว \">  </i> "
                }

                var str = "<table class=\"col-3 mr-3 table " + strColor + "\"> \
                            <tbody>                                         \
                                <tr>                                        \
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
                url: "../query/student_show2.php",
                data: {
                    "std_id": std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-name").html(response.std_title_name + response.std_fname + " " + response.std_lname)
                    $("#id-std_id").html(response.std_id)
                    $("#id-level").html(response.level)
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
                var grade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'P'];
                if (grade.includes(this.grade_text)) {
                    strColor = " table-subject-blue "
                } else {
                    strColor = " table-subject-red "
                }

                var str = "<table class=\"col-3 mr-3 table " + strColor + "\"> \
                            <tbody>                                         \
                                <tr>                                        \
                                    <td>" + this.subject_credit + "</td>                                 \
                                    <td>" + this.subject_id + "</td>                               \
                                    <td>" + this.grade_text + "</td>                                  \
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

        function student_analytics_current(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_analytics_current.php",
                data: {
                    'std_id': std_id
                },
                dataType: "JSON",
                success: function(response) {


                    $("#id-subject-current").append("<div class=\"card-header mb-2 col-12 \">แผนการเรียนปัจจุบัน</div>");
                    response.forEach((element, key) => {
                        var tableSubject = Object.create(objSubject);
                        // console.log(element['subject_id'])
                        tableSubject.subject_id = element['subject_id']
                        tableSubject.subject_name_en = element['subject_name_en']
                        tableSubject.subject_credit = element['subject_credit']
                        tableSubject.grade_text = ""
                        tableSubject.registered = element['registered']
                        tableSubject.permissible = element['permissible']
                        tableSubject.permissible_comment = element['permissible_comment']

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
                    var tableSubject = Object.create(objSubjectOld);
                    response.forEach((element, key) => {
                        // console.log(element['grade'])
                        if (element['grade'].length > 0) {
                            var strTerm = ""
                            if (element['term'] == '3') {
                                strTerm = "ภาคฤดูร้อน"
                            } else {
                                strTerm = element['term']
                            }
                            $("#id-subject-old").append("<div class=\"card-header mb-2 col-12 \">ปี " + element['year'] + " เทอม " + strTerm + "</div>");
                        }

                        element['grade'].forEach(element => {

                            tableSubject.subject_id = element['subject_id']
                            tableSubject.subject_name_en = element['subject_name_en']
                            tableSubject.subject_credit = element['subject_credit']
                            tableSubject.grade_text = element['grade_text']
                            tableSubject.registered = element['registered']

                            $("#id-subject-old").append(tableSubject.table_subject());

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


                }
            });

            return new Promise(resolve => {
                setTimeout(() => {
                    resolve('resolved');
                }, 2000);
            });
        }

        function modal_remark(params) {
            $(".bd-remark-modal-lg").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            })
            $("#subject-remark").html("");
            $("#subject-remark").html(params);
        }
    </script>

</body>

</html>