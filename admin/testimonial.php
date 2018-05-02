<?php
include('../common/admin/header.php');

if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
  header("location:index.php");
}



 ?>
<title>Add Testimonials</title>
      <?php




      $msg="";


      if(isset($_GET['tsid'])){
         $sid=$_GET['tsid'];
         $res=readrow('testimonial',array("id"=>$sid));
         $res_ass=mysqli_fetch_assoc($res);

         $first_name = $res_ass["first_name"];
         $rating     = $res_ass["rating"];
         $desc       = $res_ass["desc"];


           if(isset($_POST['update']) && $_POST['update']=="update"){
             $first_name = $_POST["first_name"];
             $rating     = $_POST["rating"];
             $desc       = $_POST["desc"];

             $arr = array(
               "first_name"=>$first_name,
               "rating"=>$rating,
               "desc"=>$desc
             );
             $cond = array('id' => $sid);
            update('testimonial',$arr,$cond);

           }


           }


        if(isset($_POST['submit']) && $_POST['submit']=="submit")
        {

              print_r($_POST);

          $first_name = $_POST["first_name"];
          $rating     = $_POST["rating"];
          $desc       = $_POST["desc"];



             $arr = array(
               "first_name"=>$first_name,
               "rating"=>$rating,
               "desc"=>$desc
             );

             print_r($arr);
               insert('testimonial', $arr);
               $msg = "Success";




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
                  if(isset($_GET['tsid'])){
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

                      <form method='POST' action="" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

<!-- error message s-->
                                        <div class="form-group">
                                              <?php
                                                    if($msg == "Error"){
                                                      echo"<div class='alert alert-danger' role='alert'>student already registered with this registeration id</div>";
                                                    }
                                                    elseif($msg == "Success"){
                                                      echo"<div class='alert alert-success' role='alert'>Success</div>";
                                                    }else {
                                                      echo"<div></div>";
                                                    }
                                              ?>
                                         </div>


<!-- error message e-->

<!-- First name s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                          </label>

                          <div class="col-md-4 col-sm-6 col-xs-12">
                              <?php if(isset($_GET['tsid'])){
                                echo "<input type='text' name='first_name' value='$first_name' id='first-name' required class='form-control col-md-7 col-xs-12'>";
                                        }
                                    else{
                                echo "<input type='text' name='first_name' value='' id='first-name' required class='form-control col-md-7 col-xs-12'>";

                                    }
                            ?>
                          </div>
                      </div>
<!-- First name e-->


<!-- description s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php if(isset($_GET['tsid'])){
                             echo "<textarea class='form-control col-md-7 col-xs-12' name='desc' placeholder= 'Enter the description'>$desc</textarea>";
                                     }
                                 else{
                             echo "<textarea class='form-control col-md-7 col-xs-12' name='desc' placeholder= 'Enter the description'></textarea>";

                                 }
                         ?>
                       </div>
                      </div>
<!-- description e -->
<!-- First name s-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating">rating <span class="required">*</span>
                        </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                              <?php if(isset($_GET['tsid'])){
                                echo "<input type='number' min='0' max='5' name='rating' value='$ratings' id='rating' required class='form-control col-md-7 col-xs-12'>";
                                        }
                                    else{
                                echo "<input type='number' min='0' max='5' name='rating' value='' id='rating' placeholder ='rating range from 0 to 5'required class='form-control col-md-7 col-xs-12'>";

                                    }
                            ?>
                          </div>
                      </div>
<!-- First name e-->




                      <div class="ln_solid"></div>
<!-- buttons s -->
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <input class="btn btn-primary" type="reset" value="Reset" name="reset">
                            <?php
                            if(isset($_GET['tsid'])){
                              echo"<button  type='submit' class='btn btn-success' name='update' value='update'>update</button>";


                               }
                             else{
                               echo "<input type='submit' class='btn btn-success' name='submit' value='submit'>";
                             }
                                ?>

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
