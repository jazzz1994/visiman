<?php
     include('../common/admin/header.php');
    if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
      header("location:index.php");
    }
?>



<title>diary</title>
      <?php



      $class_res=readAll('class');
      $sub_res = readAll('subject');
      $msg="";


      if(isset($_GET['sid'])){
         $sid=$_GET['sid'];
         $res=readrow('student',array("id"=>$sid));
         $res_ass=mysqli_fetch_assoc($res);

         $first_name = $res_ass["first_name"];
         $last_name  = $res_ass["last_name"];
         $reg_id     = $res_ass["reg_id"];
         $gender     = $res_ass["gender"];
         $dob        = $res_ass["dob"];
         $class      = $res_ass["class_name"];

           if(isset($_POST['update']) && $_POST['update']=="update"){
             $first_name = $_POST["first_name"];
             $last_name  = $_POST["last_name"];
             $reg_id     = $_POST["reg_id"];
             $gender     = $_POST["gender"];
             $class      = $_POST["class_name"];
             $dob        = $_POST["dob"];

             $arr = array(
               "first_name"=>$first_name,
               "last_name"=>$last_name,
               "reg_id"=>$reg_id,
               "gender"=>$gender,
               "class_name"=>$class,
               "dob"=>$dob
             );
             $cond = array('id' => $sid);
            update('student',$arr,$cond);
            header("Location:listStudent.php");
           }


           }


        if(isset($_POST['submit']) && $_POST['submit']=="submit")
        {
          $class_name = $_POST["class_name"];
          $sub_name   = $_POST["sub_name"];
          $title      = $_POST["title"];
          $curr_date  = $_POST["curr_date"];

          $qry   = "SELECT * FROM dailydairy WHERE title = '$title' AND class_name = '$class_name' AND curr_date='$curr_date'";
          $msg  = check($qry);

           if(empty($msg)){
             $arr = array(
                 "class_name"=>$class_name,
                 "sub_name"=>$sub_name,
                 "title"=>$title,
                 "curr_date"=>$curr_date

               );

               insert('dailydairy', $arr);
               $msg = "Success";
           }
           }




      ?>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

          <?php include('../common/admin/leftNavBar.php'); ?>
        <?php include('../common/admin/topNavBar.php'); ?>



  <!-- page content -->
        <div class="right_col" role="main">
          <div class=""><br/>
            <div class="page-title">
              <div class="title_left">
                <?php
                  if(isset($_GET['sid'])){
                   echo "<h3>Edit Student</h3>";
                 }
                 else{
                   echo "<h3>Add Student</h3>";
                 }
                ?>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Details<small>please fill the following form</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                      <form method='POST' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

<!-- error message s-->
                                        <div class="form-group">
                                              <?php
                                                    if($msg == "Error"){
                                                      echo"<div class='alert alert-danger' role='alert'>topic already added to databases</div>";
                                                    }
                                                    elseif($msg == "Success"){
                                                      echo"<div class='alert alert-success' role='alert'>Success</div>";
                                                    }else {
                                                      echo"<div></div>";
                                                    }
                                              ?>
                                         </div>


<!-- error message e-->







<!-- class dropdown s -->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">class <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="class_name" class="form-control" required name="class_name">
                             <?php
                             while($result_class = mysqli_fetch_assoc($class_res)){
                                  $classname=$result_class['class_name']; ?>
                                  <option value='<?php echo $classname;?>'  > <?php echo $classname;?> </option>
                             <?php }

                             ?>
                            </select>
                          </div>
                      </div>
<!-- class dropdown e -->


<!-- subject dropdown s -->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_name">Subject<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="sub_name" class="form-control" required name="sub_name">
                             <?php
                             while($result_class = mysqli_fetch_assoc($sub_res)){
                                  $subname=$result_class['sub_name']; ?>
                                  <option value='<?php echo $subname;?>'  > <?php echo $subname;?> </option>
                             <?php }

                             ?>
                            </select>
                          </div>
                      </div>
<!-- subject dropdown e -->



<!-- title s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Topic Covered</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea name="title" id='title' rows="8" cols="80" class='form-control col-md-7 col-xs-12'></textarea>
                             <!-- <input type='text' name='title' value='' id='title' required class='form-control col-md-7 col-xs-12'> -->
                       </div>
                      </div>
<!-- title e -->




  <!--  current date s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Current_date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                             <input id='date' name='curr_date' value = '<?php echo date("Y-m-d"); ?>'  required  >
                          </div>
                      </div>
<!--  current date e-->

                      <div class="ln_solid"></div>
<!-- buttons s -->
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <input class="btn btn-primary" type="reset" value="Reset" name="reset">
                            <input type='submit' class='btn btn-success' name='submit' value='submit'>
                             </div>
                      </div>
<!-- buttons e -->

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

  </body>
