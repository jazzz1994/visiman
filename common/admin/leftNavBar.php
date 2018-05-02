<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
            <!-- <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>VisitorMNT</span></a> -->
          </div>

          <div class="clearfix"></div>
              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="../images/admin/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?php if(isset($_SESSION['tname'])){
                      echo $_SESSION['tname'];
                    }else{
                      echo $_SESSION['aname'];
                    }
                                 ?></h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br>

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  <ul class="nav side-menu">

                    <?php if(isset($_SESSION['aemail']) || isset($_SESSION['temail'])){
                      echo
                      "<li><a><i class='fa fa-home'></i> Home <span class='fa fa-chevron-down'></span></a>
                        <ul class='nav child_menu'>
                          <li><a href='dash.php'>Dashboard</a></li>
                        </ul>
                      </li>
                      <li><a><i class='fa fa-user'></i> Manage Student<span class='fa fa-chevron-down'></span></a>
                      <ul class='nav child_menu'>
                        <li><a href='formStudent.php'>Add Student</a></li>
                        <li><a href='listStudent.php'>List Students</a></li>
                      </ul>
                    </li>
                    <li><a><i class='fa fa-user'></i> Manage Diary<span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='formdairy.php'>Add Topic</a></li>
                      <li><a href='listTopic.php'>List Topic</a></li>
                    </ul>
                  </li>

                  <li><a><i class='fa fa-user'></i> Attendence<span class='fa fa-chevron-down'></span></a>
                  <ul class='nav child_menu'>
                    <li><a href='stu_attendence.php'>Mark student Attendence</a></li>
                    <li><a href='tea_attendence.php'>Mark teacher Attendence</a></li>
                    <li><a href='listAttend.php'>List Attendence</a></li>
                  </ul>
                </li>
                <li><a><i class='fa fa-desktop'></i> Parent Details <span class='fa fa-chevron-down'></span></a>
                  <ul class='nav child_menu'>
                  <li><a href='formParent.php'>Add Parent</a></li>
                    <li><a href='listParent.php'>List Parent</a></li>
                    <li><a href='contactParent.php'>Contact Parent</a></li>
                  </ul>
                </li>";}

                  if(isset($_SESSION['aemail'])){
                    echo"<li><a><i class='fa fa-group'></i> Manage Teacher <span class='fa fa-chevron-down'></span></a>
                      <ul class='nav child_menu'>
                        <li><a href='formTeacher.php'>Add Teacher</a></li>
                        <li><a href='listTeacher.php'>List Teacher</a></li>

                      </ul>
                    </li>";}

                    ?>
              </ul>
                </div>
                <!-- <div class="menu_section"> -->
                  <!-- <h3>Live On</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="e_commerce.html">E-commerce</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project Detail</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="page_403.html">403 Error</a></li>
                        <li><a href="page_404.html">404 Error</a></li>
                        <li><a href="page_500.html">500 Error</a></li>
                        <li><a href="plain_page.html">Plain Page</a></li>
                        <li><a href="login.html">Login Page</a></li>
                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="#level1_1">Level One</a>
                          <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li class="sub_menu"><a href="level2.html">Level Two</a>
                              </li>
                              <li><a href="#level2_1">Level Two</a>
                              </li>
                              <li><a href="#level2_2">Level Two</a>
                              </li>
                            </ul>
                          </li>
                          <li><a href="#level1_2">Level One</a>
                          </li>
                      </ul>
                    </li>
                  </li> -->
<!--
                  </ul>
                </div> -->

              </div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <!-- <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div> -->
              <!-- /menu footer buttons -->
            </div>
          </div>





          <!-- <li><a><i class='fa fa-desktop'></i> Manage Class <span class='fa fa-chevron-down'></span></a>
           <ul class='nav child_menu'>
               <li><a href='formClass.php'>Add Class</a></li>
              <li><a href='listClass.php'>List Class</a></li>

             </ul>
           </li> -->
