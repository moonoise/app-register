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
                                    <form name="form_student_subject_edit" id="form_student_subject_edit">
                                        <table style="width: 100%;" id="table_teacher_subject" class="table table-hover table-striped table-bordered for-this-table">
                                            <thead>
                                                <tr>
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
        $(document).ready(function() {
            show_grade()
        });

        function show_grade(ts_id) {
            var ts_id = '<?php echo $_POST['ts_id']; ?>';
            $.ajax({
                type: "POST",
                url: "../query/teacher_student_subject_show_by_ts.php",
                data: {
                    "ts_id": ts_id
                },
                dataType: "JSON",
                success: function(response) {

                }
            });
        }
    </script>

</body>

</html>