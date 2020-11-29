<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>สมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="../assets/css/base.min.css">
    <style>
        .bg-premium-dark {
            background-image: linear-gradient(to right, #660000 0, #000 100%) !important;
            padding: .10rem 5rem;
            height: 100px;
        }

        .text-color {
            /* color: linear-gradient(to right, #660000 0, #000 100%) !important; */
            font-size: 30px;
            background: -webkit-linear-gradient(#660000, #000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .widget-chart .widget-numbers {

            line-height: 2;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 bg-premium-dark">
        <a class="navbar-brand" href="#">รายชื่อสมาคมศิษย์เก่าวิศวกรรมชลประทาน ในพระบรมราชูปถัมภ์</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
            </ul>
            <!-- <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-row">
                            <form action="" class="form-inline" name="search_select_std" id="search_select_std">
                                <div class="mb-2 ml-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                    <label for="select_yt_year" class="mr-sm-2">นรช.รุ่นที่</label>
                                    <input type="text" class="form-control" name="batch" id="batch">
                                </div>
                                <!-- <div class="mb-2 ml-2 mr-sm-2 mb-sm-0  position-relative form-group">
                                    <label for="select_yt_year" class="mr-sm-2">สังกัดห้อง</label>
                                    <input type="text" class="form-control mr-2" name="search_class_name" id="search_class_name">
                                </div>
                                <div class="mb-2 ml-2 mr-sm-2 mb-sm-0  position-relative form-group">
                                    <label for="select_yt_year" class="mr-sm-2">สังกัดห้อง</label>
                                    <input type="text" class="form-control mr-2" name="search_std_home_town" id="search_std_home_town">
                                </div> -->
                                <button class="btn btn-primary" type="submit">ค้นหา</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <table style="width: 100%;" id="table_alumni_list" class="table table-hover table-striped table-bordered for-this-table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="text-center">เลขประจำตัว</th>
                                    <th scope="col" class="text-center">ชื่อ - สกุล <span class="text text-danger">(ชื่อเก่า)</span></th>
                                    <th scope="col" class="text-center">ฉายา</th>
                                    <th scope="col" class="text-center">นรช.รุ่นที่</th>
                                    <th scope="col" class="text-center">สังกัดห้อง</th>
                                    <th scope="col" class="text-center">จังหวัด</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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

    <!--SCRIPTS INCLUDES-->
    <?php include_once "../layouts/6-script-include.php"; ?>
    <script>
        show_table()

        $("#search_select_std").submit(function(e) {
            e.preventDefault();
            show_table()
        });

        function show_table() {
            $.ajax({
                type: "POST",
                url: "../query_alumni/alumni_list.php",
                data: $("#search_select_std").serialize(),
                dataType: "JSON",
                success: function(response) {
                    var table1 = []
                    response.data.forEach((element, key) => {
                        var dataTables = []
                        dataTables['ku_id'] = element['ku_id']
                        dataTables['std_fullname'] = element['std_title_name_th'] + element['std_fname_th'] + " " + element['std_lname_th']
                        dataTables['std_nickname'] = element['std_nickname']
                        dataTables['batch'] = element['batch']
                        dataTables['class_name'] = element['class_name']
                        dataTables['std_home_town'] = element['std_home_town']
                        table1.push(dataTables)
                    });
                    table.clear().rows.add(table1).draw();
                    $.unblockUI();
                },
                beforeSend: function() {
                    $.blockUI({
                        message: $('.body-block-example-1')
                    });
                }
            });
        }

        var dataTables = [{
            "ku_id": "",
            "std_fullname": "",
            "std_nickname": "",
            "batch": "",
            "class_name": "",
            "std_home_town": ""
        }];

        var table = $('#table_alumni_list').DataTable({
            "data": dataTables,
            "deferRender": true,
            "autoWidth": false,
            "columns": [{
                    "data": "ku_id",
                    "className": 'details-control text-center',
                },
                {
                    "data": "std_fullname"
                },
                {
                    "data": "std_nickname"
                },
                {
                    "data": "batch",
                    "className": 'details-control text-center',
                },
                {
                    "data": "class_name"
                },
                {
                    "data": "std_home_town"
                }
            ],
            "columnDefs": [{
                    "targets": ["ku_id"],
                    "searchable": true
                },
                {
                    "targets": ["std_fullname"],
                    "searchable": true
                },
                {
                    "targets": ["std_nickname"],
                    "searchable": true
                },
                {
                    "targets": ["batch"],
                    "searchable": false
                },
                {
                    "targets": ["class_name"],
                    "searchable": false
                },
                {
                    "targets": ["std_home_town"],
                    "searchable": false
                }
            ],
            'pageLength': 20,
            "lengthMenu": [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"]
            ]
        });
    </script>
</body>

</html>