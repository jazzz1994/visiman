<?php include('../common/admin/header.php'); ?>
<?php include('../common/dbConn.php'); ?>
<?php

 if(isset($_POST["update"]) && $_POST["update"]=="update"){

   foreach ($_POST['status'] as $id => $value) {

       $student_name = $_POST['first_name'][$id];
       $reg_id       = $_POST['reg_id'][$id];
       $date         = $_POST['date'][$id];

         $qry2     = "UPDATE stu_attendence SET status = '$value' WHERE date = '$date' AND reg_id ='$reg_id'";
         $upattend = mysqli_query($conn,$qry2);

   }




 }
 ?>



  <?php
           $attennd_q = "SELECT DISTINCT date FROM stu_attendence";
           $res_attend = mysqli_query($conn,$attennd_q);
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
                <h3>Students List </h3>
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




                    <form id="form"   data-parsley-validate class="form-horizontal form-label-left" >


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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id='date' name='date' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>
                                            </div>
                                        </div>
                  <!--  Date picker e-->

                  <!--   button s-->
                                      <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input id ="view" class = "btn btn-primary col-md-7 col-xs-12" name="submit" value="viewattendence">
                                          </div>
                                      </div>
                <!--  button e-->

              </form>


                   <form data-parsley-validate class="form-horizontal form-label-left"  action="liststuAttend.php" method="post">
                    <div  id="stud_attend">

                    </div>
                    <!--  Date button s-->
                                        <div class="form-group" >
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id ="upattend" type="submit" class = "btn btn-primary col-md-7 col-xs-12" name="update" value="update">
                                            </div>
                                        </div>
                  <!--  Date button e-->
                    </form>




                 </div>
                </div>
              </div>
            </div>


          </div>
        </div>

      </div>
    </div>





   <?php include('../common/admin/footer.php'); ?>

   <script type="text/javascript" src = "../ajax/admin/ajxlsAttend.js"></script>
  </body>
</html>
