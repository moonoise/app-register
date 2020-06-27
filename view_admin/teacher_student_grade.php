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
                                                                <div class="widget-heading"><b>ชื่อ-สกุล:</b>&nbsp;&nbsp;<span id="id-name"></div>
                                                                <div class="widget-subheading opacity-10"><span class="pr-2"><b>รหัสนิสิต:</b> </span><span><b class="text-success" id="id-std_id"></b></span></div>
                                                            </div>
                                                            <div class="widget-content-left mr-5">
                                                                <div class="widget-heading"><b>นิสิตชั้นปีที่:</b>&nbsp;&nbsp;<span id="id-level" class="text-success"></div>
                                                                <div class="widget-subheading opacity-10"><span class="pr-2"><b>เกรดเฉลี่ยสะสม:</b>&nbsp;&nbsp; </span><span id="id-gpa" class="text-success"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="row" id="row-table-grade">

                                    </div>

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

    <script>
        var std_id = '<?php echo $_POST['std_id_show_grade']; ?>'
        show_result_grade(std_id)

        var obj_table = {
            "gpa": "",
            "year": "",
            "term": "",
            "arr_grade": [],
            "table_grade": function() {
                var strGrade = ""
                this.arr_grade.forEach((elementGrade, keyGrade) => {
                    strGrade += "<tr>   \
                            <td>" + (keyGrade + 1) +
                        "</td><td>" + elementGrade['subject_id'] +
                        "</td> <td>" + elementGrade['subject_name_en'] + "</td>   \
                        <td> " + elementGrade['subject_credit'] + "</td>  \
                            <td>" + elementGrade['grade_text'] + "</td>   \
                    </tr>";
                });

                var strTable = "<div class=\"col-10\">                                  \
                                    <div class=\"card-header mb-2 col-12 \"> ปี " + this.year + " เทอม " + this.term + " </div>       \
                                    <table class=\"mb-0 table table-bordered\">         \
                                        <thead>                                         \
                                            <tr>                                        \
                                                <th class=\"text-center\">ลำดับ</th>                               \
                                                <th class=\"text-center\">รหัสวิชา</th>                         \
                                                <th class=\"text-center\">ชื่อวิชา</th>                          \
                                                <th class=\"text-center\">หน่วยกิต</th>                          \
                                                <th class=\"text-center\">ระดับคะแนน</th>                      \
                                            </tr>                                       \
                                        </thead>                                        \
                                        <tbody>                                         \
                                            " + strGrade + "                                       \
                                        </tbody>                                         \
                                        <tfoot>                                            \
                                            <tr>                                             \
                                                <td colspan=\"4\" class=\"text-right\">GPA.</td>                     \
                                                <td>" + this.gpa + "</td>                                   \
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
                                objTable.year = element['year']
                                objTable.term = element['term']
                                objTable.arr_grade = element['grade']

                                $("#row-table-grade").append(objTable.table_grade());
                            }

                        });
                        // console.log("test")

                    }

                }
            });
        }
    </script>

</body>

</html>