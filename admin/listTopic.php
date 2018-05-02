<?php include('../common/admin/header.php'); ?>
<?php include('../common/dbConn.php'); ?>
<?php

 // if(isset($_POST["submit"]) && $_POST["submit"]=="submit"){
 //
 //
 //
 //
 //
 // }
 // ?>



  <?php


           $res_class = readAll('class');

   ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include('../common/admin/leftNavBar.php'); ?>
        <?php include('../common/admin/topNavBar.php'); ?>


        <div class="right_col" role="main">
          <div class=""><br/>
            <div class="page-title">
              <div class="title_left">
                <h3>Topic Covered </h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Read Attendence<small>Read Attendence </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />




                    <form id="form"  method="POST" data-parsley-validate class="form-horizontal form-label-left" >


                      <!-- class dropdown s -->
                      <div class="form-group" >
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">search class<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="class_name" class="form-control"  required name="class_name">
                              <option value="">select</option>
                             <?php
                             while($result_class = mysqli_fetch_assoc($res_class)){
                                  $classname=$result_class['class_name']; ?>
                                  <option value='<?php echo $classname;?>'> <?php echo $classname;?> </option>
                             <?php }

                             ?>
                            </select>
                          </div>
                      </div>
                    <!-- class dropdown e -->

                    <!--  Date picker s-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id='date' name='date' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>
                                            </div>
                                        </div>
                  <!--  Date picker e-->

                  <!--  Date button s-->
                                      <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input id ="view"  class = "btn btn-primary" name="submit" value="topic search">
                                          </div>
                                      </div>
                <!--  Date button e-->

              </form>


                    <div  id="stud_topic">

                    </div>




                 </div>
                </div>
              </div>
            </div>


          </div>
        </div>

      </div>
    </div>





   <?php include('../common/admin/footer.php'); ?>

   <script type="text/javascript" src = "../ajax/admin/ajxlsTopic.js"></script>
  </body>
</html>
