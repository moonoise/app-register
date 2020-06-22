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
                                    <form  name="form_student_subject_edit" id="form_student_subject_edit">                                    <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>เกรด</th>
                                                <th>หมายเหตุ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="grade_edit">
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><button type="submit" class="btn btn-primary">บันทึก</button></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>                                           
                                    </table>

                                        
                                    </form>

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

    $("#form_student_subject_edit").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../query/student_subject_update.php",
            data: $("#form_student_subject_edit").serialize(),
            dataType: "JSON",
            success: function (response) {
                console.log(response)
            }
        });
    });

    var objtableGrade = {
        number: "",
        ss_id: "",
        std_id:"",
        std_fname: "",
        std_lname:"",
        grade_text:"",
        tableGrade : function () {
            var td1 = "<td>"+this.number+"</td>"
            var td2 = "<td>"+this.std_id+"</td>"
            var td3 = "<td>"+this.std_fname+" "+this.std_lname +"</td>"
            var strTd4 = ""
            var td5 = "<td></td>"
            var arrGrade = ['A','B+','B','C+','C','D+','D','F','W'];
            var GradeDefault = ''
            strTd4 += "<td><select class=\"mb-2 form-control\" name=\"ss_id["+this.ss_id+"]\" id=\"ss_id-"+this.ss_id+"\">";
            arrGrade.forEach((element,key) => {
                if (element == this.grade_text ) {
                    GradeDefault = 'selected'
                }else{
                    GradeDefault = ''
                }
                
                strTd4 += "<option "+GradeDefault+">" +element+ "</option>"
                
            });
            strTd4 += "</select></td>";


            return "<tr>" +td1+td2+td3+strTd4+td5+ "</tr>";
        }
    }

    var ts_id = '<?php echo $_POST['teacher_grade_ts_id'];?>';

        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "../query/student_subject_edit.php",
                data: {"ts_id":ts_id},
                dataType: "JSON",
                success: function (response) {
                    var table = Object.create(objtableGrade);
                    response.data1.forEach((element,key) => {
                        table.number = key+1
                        table.ss_id = element['ss_id']
                        table.std_id = element['std_id']
                        table.std_fname = element['std_fname']
                        table.std_lname = element['std_lname']
                        table.grade_text = element['grade_text']
                        table.tableGrade()
                        $("#grade_edit").append(table.tableGrade());
                    });
                }
            });
        });


    </script>

</body>

</html>