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
                                <div class="card-header">สรุปเกรด รายวิชา</div>
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
                                                <div class="col-9"><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">ชื่อวิชา : </label></div>
                                                <div class="col-9"><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">ผู้สอน : </label></div>
                                                <div class="col-9"><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">นิสิตทั้งหมด : </label></div>
                                                <div class="col-9"><span class="text-info" id="yt_name">คน</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-6"><label for="" class="text-primary float-right">Drop : </label></div>
                                                <div class="col-6"><span class="text-info" id="yt_name">คน</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-3"><label for="" class="text-primary float-right">วมนิสิตที่ได้เกรด A-F : </label></div>
                                                <div class="col-9"><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-6"><label for="" class="text-primary float-right">ระดับคะแนนเฉลี่ย <br>
                                                        (คิดจากนิสิตที่ได้เกรด A-F เท่านั้น) : </label></div>
                                                <div class="col-6"><span class="text-info" id="yt_name">test</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="mb-0 table table-borderless">
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
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-3">
                                            <h5 class="text text-info">เงื่อนไขการกรอกเกรด</h5>
                                            <table class="mb-0 table table-bordered">
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
                                            <table class="mb-0 table table-bordered">
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
                                            <table class="mb-0 table table-bordered">
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
                                            <h3 class="text text-info">รายชื่อนิสิต</h3>
                                            <table class="mb-0 table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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