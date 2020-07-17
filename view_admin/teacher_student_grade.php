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
        .table thead th {
            background-color: #c0ccd8;
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
                                <div class="card-header">เกรดนิสิต</div>
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
                                                                <div class="widget-heading "><b class="pr-5">&nbsp;&nbsp;</b><b id="" class="text-success">ชื่อ ภาษาไทย</b></div>
                                                                <div class="widget-heading "><b class="pr-2">Date of Birth:</b><b id="" class="text-success"></b></div>
                                                                <div class="widget-heading "><b class="pr-2">Place of Birth:</b><b id="" class="text-success"></b></div>
                                                            </div>
                                                            <div class="widget-content-left mr-5">
                                                                <div class="widget-heading"><b class="pr-2">Faculty of:</b><b class="text-success">Irrigation College</b></div>
                                                                <div class="widget-heading"><b class="pr-2">Field of Study:</b><b class="text-success">Civil Engineering-Irrigation</b></div>
                                                                <div class="widget-heading"><b class="pr-2">Date of Birth:</b><b class="text-success"></b></div>
                                                                <div class="widget-heading"><b class="pr-2">Place of Birth:</b><b class="text-success"></b></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="row" id="row-table-grade">

                                    </div>
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

    <!-- modal-new subject -->

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>
    <script src="../node_modules/jquery.json-viewer/json-viewer/jquery.json-viewer.js"></script>

    <script>
        var std_id = '<?php echo $_POST['std_id_show_grade']; ?>'
        show_result_grade(std_id)

        var obj_table = {
            "gpa": "",
            "cum_gpa": "",
            "year": "",
            "term": "",
            "arr_grade": [],
            "table_grade": function() {
                var strColor = ""
                var grade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'P'];


                var strGrade = ""
                this.arr_grade.forEach((elementGrade, keyGrade) => {

                    if (grade.includes(elementGrade['grade_text'])) {
                        strColor = ""
                    } else {
                        strColor = "text-danger"
                    }

                    strGrade += "<tr class=\"" + strColor + "\">   \
                            <td>" + (keyGrade + 1) +
                        "</td><td>" + elementGrade['subject_id'] +
                        "</td> <td>" + elementGrade['subject_name_en'] + "</td>   \
                        <td> " + elementGrade['grade_text'] + "</td>  \
                            <td>" + elementGrade['subject_credit'] + "</td>   \
                    </tr>";
                });

                var strTerm = ""
                var strYear = ""
                if (this.term == '3') {
                    strTerm = "ภาคฤดูร้อน"
                    strYear = parseInt(this.year) + 1
                } else {
                    strTerm = this.term
                    strYear = this.year
                }

                var strTable = "<div class=\"col-10\">                                  \
                                    <div class=\"card-header mb-2 col-12 \"> ปี " + strYear + " เทอม " + strTerm + " </div>       \
                                    <table class=\"mb-0 table table-bordered\">         \
                                        <thead>                                         \
                                            <tr>                                        \
                                                <th class=\"text-center\">ลำดับ</th>                               \
                                                <th class=\"text-center\">รหัสวิชา</th>                         \
                                                <th class=\"text-center\">ชื่อวิชา</th>                          \
                                                <th class=\"text-center\">ระดับคะแนน</th>                          \
                                                <th class=\"text-center\">หน่วยกิต</th>                      \
                                            </tr>                                       \
                                        </thead>                                        \
                                        <tbody>                                         \
                                            " + strGrade + "                                       \
                                        </tbody>                                         \
                                        <tfoot>                                            \
                                            <tr>                                             \
                                                <td colspan=\"5\" class=\"text-center\"><b>sem. G.P.A. = " + this.gpa + " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; cum. G.P.A. = " + this.cum_gpa + " </b></td>                     \
                                            </tr>                                           \
                                        </tfoot>                                            \
                                    </table>                                                \
                                </div>                                                      \
                                "


                return strTable
            }

        }

        function show_result_grade(std_id) {
            $.ajax({
                type: "POST",
                url: "../query/student_result_grade.php",
                data: {
                    "std_id": std_id
                },
                dataType: "JSON",
                success: function(response) {
                    $("#id-name").html(response.data.std_title_name + response.data.std_fname + " " + response.data.std_lname)
                    $("#id-std_id").html(response.data.std_id)
                    $("#id-level").html(response.data.level)
                    $("#id-gpa").html(response.gpa_all_term)


                    if (response.grade != null && response.grade.length > 0) {
                        response.grade.forEach((element, key) => {

                            if (element['grade'] != null && element['grade'].length > 0) {
                                var objTable = Object.create(obj_table)
                                objTable.gpa = element['gpa']
                                objTable.cum_gpa = element['cum_gpa']
                                objTable.year = element['year']
                                objTable.term = element['term']
                                objTable.arr_grade = element['grade']

                                $("#row-table-grade").append(objTable.table_grade());
                            }

                        });
                        // console.log("test")
                        // $('#json-renderer').jsonViewer(response);

                    }

                }
            });
        }
    </script>

</body>

</html>