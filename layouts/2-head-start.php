  <!--Header START-->
  <div class="app-header header-shadow">
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
      <div class="app-header__content">

          <div class="app-header-right">


              <div class="header-btn-lg pr-0">
                  <div class="widget-content p-0">
                      <div class="widget-content-wrapper">
                          <div class="widget-content-left">
                              <div class="btn-group">
                                  <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                      <img width="42" class="rounded-circle" src="../assets/images/avatars/avatar-1-256.png" alt="">

                                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                  </a>
                                  <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                      <div class="dropdown-menu-header">
                                          <div class="dropdown-menu-header-inner bg-info">
                                              <div class="menu-header-image opacity-2" style="background-image: url('../assets/images/dropdown-header/city3.jpg');"></div>
                                              <div class="menu-header-content text-left">
                                                  <div class="widget-content p-0">
                                                      <div class="widget-content-wrapper">
                                                          <div class="widget-content-left mr-3">
                                                              <img width="42" class="rounded-circle" src="../assets/images/avatars/avatar-1-256.png" alt="">
                                                          </div>
                                                          <div class="widget-content-left">
                                                              <div class="widget-heading"><?php echo  $_SESSION[__FULLNAME__]; ?>
                                                              </div>
                                                              <div class="widget-subheading opacity-8"><?php echo  $_SESSION[__PER_TYPE__]; ?>
                                                              </div>
                                                          </div>
                                                          <div class="widget-content-right mr-2">
                                                              <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="logout.php">Logout
                                                              </a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="scroll-area-xs" style="height: 150px;">
                                          <div class="scrollbar-container ps">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <?php
                                                        if ($_SESSION[__PER_TYPE__] == 'student') {
                                                            echo " <a href=\"" . __PATH_WEB__ . "/view_student/view_student_change_password.php\" class=\"nav-link\">เปลี่ยนรหัสผ่าน</a>";
                                                        } else if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
                                                            echo " <a href=\"" . __PATH_WEB__ . "/view_admin/my_account_change_password.php\" class=\"nav-link\">เปลี่ยนรหัสผ่าน</a>";
                                                        }
                                                        ?>

                                                  </li>
                                                  <li class="nav-item">
                                                      <?php
                                                        if ($_SESSION[__PER_TYPE__] == 'student') {
                                                            echo " <a href=\"" . __PATH_WEB__ . "/view_student/view_student_my_account.php\" class=\"nav-link\">My Account</a>";
                                                        } else if ($_SESSION[__PER_TYPE__] == 'admin' || $_SESSION[__PER_TYPE__] == 'teacher') {
                                                            echo " <a href=\"" . __PATH_WEB__ . "/view_admin/my_account.php\" class=\"nav-link\">My Account</a>";
                                                        }
                                                        ?>
                                                  </li>

                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content-left  ml-3 header-user-info">
                              <div class="widget-heading">
                                  <?php echo  $_SESSION[__FULLNAME__]; ?>
                              </div>
                              <div class="widget-subheading">
                                  <?php echo  $_SESSION[__PER_TYPE__]; ?>
                              </div>
                          </div>
                          <div class="widget-content-right header-user-info ml-3">
                              <!-- <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                  <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                              </button> -->
                          </div>
                      </div>
                  </div>
              </div>
              <div class="header-btn-lg">
                  <!-- open-right-drawer -->
                  <button type="button" class="hamburger hamburger--elastic ">
                      <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                      </span>
                  </button>
              </div>
          </div>
      </div>
  </div>
  <!--Header END-->