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
    <title>โปรแกรมตรวจสอบความถูกต้องของลำดับรายวิชาในการลงทะเบียนเรียน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">

    <style>
        .color-update {
            background-color: #9cf7e282;
        }

        .for-this-table td,
        .for-this-table th {
            padding: .1rem;
        }

        .table-blue {
            color: #fff;
            background-color: #0f48e8;
        }

        .tr-gray {
            text-align: center;
            color: #fff;
            background-color: #adadaf;
        }

        .td-center {
            text-align: center;
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
                                <div class="card-header">ระบบกรอก เกรด</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12  col-sm-12">
                                            <h3 class="text text-info">ข้อมูลรายวิชา</h3>
                                        </div>
                                        <div class="col-lg-6 col-md-6  col-sm-12">
                                            <div class="row">
                                                <div class="col-3 "><label for="" class="text-primary float-right">ปี/ภาคการศึกษา : </label></div>
                                                <div class="col-9 "><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <!-- <label for="" class="mr-sm-2 text-primary ">ปี/ภาคการศึกษา :
                                                <span id="yt_name text-info"></span> test </label> -->
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">รหัสวิชา : </label></div>
                                                <div class="col-9"><span class="text-info" id="subject_id"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">ชื่อวิชา : </label></div>
                                                <div class="col-9"><span class="text-info" id="subject_name_en"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">ผู้สอน : </label></div>
                                                <div class="col-9"><span class="text-info" id="teacher_name"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">นิสิตทั้งหมด : </label></div>
                                                <div class="col-9"><span class="text-info" id="count_student">คน</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-6"><label for="" class="text-primary float-right">Drop : </label></div>
                                                <div class="col-6"><span class="text-info" id="count_W">คน</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">รวมนิสิตที่ได้เกรด A-F : </label></div>
                                                <div class="col-9"><span class="text-info" id="count_A_F"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <!-- <div class="row">
                                                <div class="col-6"><label for="" class="text-primary float-right">ระดับคะแนนเฉลี่ย <br>
                                                        (คิดจากนิสิตที่ได้เกรด A-F เท่านั้น) : </label></div>
                                                <div class="col-6"><span class="text-info" id="">test</span></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <!-- <div class="col-12">
                                            <table class="mb-0 table table-borderless table-blue">
                                                <thead>
                                                    <tr>
                                                        <th>เกรด</th>
                                                        <th scope="row">A</th>
                                                        <th scope="row">B+</th>
                                                        <th scope="row">B</th>
                                                        <th scope="row">C+</th>
                                                        <th scope="row">C</th>
                                                        <th scope="row">D+</th>
                                                        <th scope="row">D</th>
                                                        <th scope="row">F</th>
                                                        <th scope="row">P</th>
                                                        <th scope="row">NP</th>
                                                        <th scope="row">I</th>
                                                        <th scope="row">N</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>จำนวนคน</th>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h5 class="text text-info">เงื่อนไขการกรอกเกรด</h5>
                                            <table class="mb-0 table table-bordered table-blue">
                                                <thead>
                                                    <tr>
                                                        <th>ประเภทการลงทะเบียน</th>
                                                        <th>เกรดที่ถูกต้อง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>A</th>
                                                        <td rowspan="3">S / U</td>
                                                    </tr>
                                                    <tr>
                                                        <th>UA</th>

                                                    </tr>
                                                    <tr>
                                                        <th>GA</th>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="divider"></div>
                                            <table class="mb-0 table table-bordered table-blue">
                                                <thead>
                                                    <tr>
                                                        <th>รายวิชา</th>
                                                        <th>เกรดที่ถูกต้อง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>01355501</th>
                                                        <td>S / U</td>
                                                    </tr>
                                                    <tr>
                                                        <th>XXXXX599</th>
                                                        <td>S / U </td>
                                                    </tr>
                                                    <tr>
                                                        <th>XXXXX699</th>
                                                        <td>S / U </td>
                                                    </tr>
                                                    <tr>
                                                        <th>01355111</th>
                                                        <td>P / NP </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="divider"></div>
                                            <table class="mb-0 table table-bordered table-blue">
                                                <thead>
                                                    <tr>
                                                        <th>เกรด</th>
                                                        <th>คำอธิบาย</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>A</th>
                                                        <td>4.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>B+</th>
                                                        <td>3.5</td>
                                                    </tr>
                                                    <tr>
                                                        <th>B</th>
                                                        <td>3.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>C+</th>
                                                        <td>2.5</td>
                                                    </tr>
                                                    <tr>
                                                        <th>C</th>
                                                        <td>2.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>D+</th>
                                                        <td>1.5</td>
                                                    </tr>
                                                    <tr>
                                                        <th>D</th>
                                                        <td>1.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>F</th>
                                                        <td>0.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>I</th>
                                                        <td>ยังไม่สมบูรณ์</td>
                                                    </tr>
                                                    <tr>
                                                        <th>N</th>
                                                        <td>ยังไม่ทราบระดับคะแนน</td>
                                                    </tr>
                                                    <tr>
                                                        <th>P</th>
                                                        <td>ผ่าน</td>
                                                    </tr>
                                                    <tr>
                                                        <th>NP</th>
                                                        <td>ไม่ผ่าน</td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-9">
                                            <form name="form_student_subject_edit" id="form_student_subject_edit">
                                                <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered for-this-table">
                                                    <thead>
                                                        <tr class="tr-gray">
                                                            <th>ลำดับ</th>
                                                            <th>รหัสนักศึกษา</th>
                                                            <th>ชื่อ - สกุล</th>
                                                            <th><button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg"> บันทึก </button></th>
                                                            <th>หมายเหตุ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="grade_edit">

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg"> บันทึก </button></td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>


                                            </form>
                                        </div>
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

    <?php include_once "../layouts/5-drawer-start.php"; ?>
    <?php include_once "../layouts/6-script-include.php"; ?>

    <script>
        $("#form_student_subject_edit").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../query/student_subject_update.php",
                data: $("#form_student_subject_edit").serialize(),
                dataType: "JSON",
                success: function(response) {
                    // console.log(response)
                    $("#grade_edit").html("")
                    if (response.success == true) {
                        // console.log(response.update)
                        grade_show(response.update)
                        Swal.fire({
                            title: 'อัพเดทเกรด',
                            text: 'สำเร็จ',
                            type: 'success',
                            confirmButtonText: 'OK'
                        });
                    }

                }
            });
        });

        var objtableGrade = {
            number: "",
            ss_id: "",
            std_id: "",
            std_fname: "",
            std_lname: "",
            grade_text: "",
            color_update: "",
            tableGrade: function() {
                var td1 = "<td class=\"td-center\">" + this.number + "</td>"
                var td2 = "<td>" + this.std_id + "</td>"
                var td3 = "<td>" + this.std_fname + " " + this.std_lname + "</td>"
                var strTd4 = ""
                var td5 = "<td></td>"
                var arrGrade = ['A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'F', 'W', 'P'];
                var GradeDefault = ''
                strTd4 += "<td><select class=\"mb-2 form-control " + this.color_update + " \" name=\"ss_id[" + this.ss_id + "]\" id=\"ss_id-" + this.ss_id + "\">";
                strTd4 += "<option value=\"\">ยังไม่ระบุ</option>"
                arrGrade.forEach((element, key) => {
                    if (element == this.grade_text) {
                        GradeDefault = 'selected'
                    } else {
                        GradeDefault = ''
                    }

                    strTd4 += "<option value=\"" + element + "\" " + GradeDefault + ">" + element + "</option>"

                });
                strTd4 += "</select></td>";


                return "<tr>" + td1 + td2 + td3 + strTd4 + td5 + "</tr>";
            }
        }



        function grade_show(arr_ss_id) {
            var ts_id = '<?php echo $_POST['teacher_grade_ts_id']; ?>';
            // console.log(arr_ss_id)
            $.ajax({
                type: "POST",
                url: "../query/student_subject_edit.php",
                data: {
                    "ts_id": ts_id
                },
                dataType: "JSON",
                success: function(response) {

                    // console.log(response)
                    response.data1.forEach((element, key) => {
                        var table = Object.create(objtableGrade);
                        var strColor = ""
                        table.number = key + 1
                        table.ss_id = element['ss_id']
                        table.std_id = element['std_id']
                        table.std_fname = element['std_fname']
                        table.std_lname = element['std_lname']
                        table.grade_text = element['grade_text']

                        if (typeof(arr_ss_id) != 'undefined') {
                            arr_ss_id.forEach((element1, key1) => {

                                if (parseInt(element['ss_id']) == element1) {
                                    strColor = " color-update "

                                }

                            });
                        }

                        table.color_update = strColor
                        $("#grade_edit").append(table.tableGrade());
                    });

                    $("#yt_name").text(response.detail_subject.yt_name)
                    $("#subject_id").text(response.detail_subject.subject_id)
                    $("#subject_name_en").text(response.detail_subject.subject_name_en)
                    $("#teacher_name").text(response.detail_subject.teacher_title_name + response.detail_subject.teacher_fname + " " + response.detail_subject.teacher_lname)
                    // console.log()
                    $("#count_student").text(Object.keys(response.data1).length + " คน")
                    $("#count_W").text(Object.keys(response.data2).length + " คน")
                    $("#count_A_F").text(Object.keys(response.data3).length + " คน")


                }
            });
        }

        $(document).ready(function() {
            grade_show()
        });
    </script>

</body>

</html>