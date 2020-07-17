<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="">
                    <a href="index.php">
                        <i class="metismenu-icon pe-7s-home"></i>
                        หน้าแรก
                        <i class="metismenu-state-icon caret-left"></i>
                    </a>
                </li>
                <?php
                if ($_SESSION[__PER_TYPE__] == 'student') {
                    echo "
                        <li id=\"menu2\">
                        <a href=\"#\" >
                            <i class=\"metismenu-icon pe-7s-user-female\"></i>
                            บริการนักศึกษา
                            <i class=\"metismenu-state-icon pe-7s-angle-down caret-left\"></i>
                        </a>
                        <ul>
                            <li>
                                <a href=\"" . __PATH_WEB__ . "/view_student/student_analytics.php\" id=\"sub1-menu2\">
                                    <i class=\"metismenu-icon\">
                                    </i>
                                    วิเคราะห์แผนการเรียน
                                </a>
                            </li>
                        </ul>
                    </li>
                        ";
                }

                ?>

                <?php
                if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
                    echo "<li id=\"menu3\">
                       <a href=\"#\">
                           <i class=\"metismenu-icon pe-7s-piggy\"></i>
                           บริการครูผู้สอน
                           <i class=\"metismenu-state-icon pe-7s-angle-down caret-left\"></i>
                       </a>
                       <ul>
                           <li>
                               <a href=\"" . __PATH_WEB__ . "/view_admin/teacher_subject.php\" id=\"sub1-menu3\">
                                   <i class=\"metismenu-icon\">
                                   </i>รายวิชาสอน
                               </a>
                           </li>
                           <li>
                               <a href=\"" . __PATH_WEB__ . "/view_admin/teacher_student.php\" id=\"sub2-menu3\">
                                   <i class=\"metismenu-icon\">
                                   </i>วิเคราะห์แผนการเรียนนิสิต
                               </a>
                           </li>
                       </ul>
                   </li>
                
                   ";
                }
                ?>
                <?php
                if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
                    echo "
                        <li id=\"menu4\">
                            <a href=\"#\">
                                <i class=\"metismenu-icon pe-7s-smile\"></i>
                                บริการเจ้าหน้าที่
                                <i class=\"metismenu-state-icon pe-7s-angle-down caret-left\"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href=\"" . __PATH_WEB__ . "/view_admin/admin_student.php\" id=\"sub1-menu4\">
                                        <i class=\"metismenu-icon\">
                                        </i>ข้อมูลนักศึกษา
                                    </a>
                                </li>
                                <li>
                                    <a href=\"" . __PATH_WEB__ . "/view_admin/admin_teacher.php\" id=\"sub2-menu4\">
                                        <i class=\"metismenu-icon\">
                                        </i>ข้อมูลอาจารย์
                                    </a>
                                </li>
                                <li>
                                    <a href=\"" . __PATH_WEB__ . "/view_admin/admin_subject.php\" id=\"sub3-menu4\">
                                        <i class=\"metismenu-icon\">
                                        </i>ข้อมูลรายวิชา
                                    </a>
                                </li>
                                <li>
                                    <a href=\"" . __PATH_WEB__ . "/view_admin/view_config.php\" id=\"sub4-menu4\">
                                        <i class=\"metismenu-icon\">
                                        </i>กำหนดปีการศึกษา
                                    </a>
                                </li>
                            </ul>
                        </li>
                        ";
                }
                ?>

            </ul>
        </div>
    </div>
</div>

<!-- <li>
    <a href=\"#\">
        <i class=\"metismenu-icon pe-7s-users\"></i>
        บริการครูที่ปรึกษา
        <i class=\"metismenu-state-icon pe-7s-angle-down caret-left\"></i>
    </a>
    <ul>
        <li>
            <a href=\"analytics.html\">
                <i class=\"metismenu-icon\">
                </i>Analytics
            </a>
        </li>
    </ul>
</li> -->