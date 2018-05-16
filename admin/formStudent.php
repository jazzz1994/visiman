<?php
include('../common/admin/header.php');

if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
  header("location:index.php");
}



 ?>
<title>Manage Students</title>
      <?php

     $class_res=readAll('class');
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
         $pemail     = $res_ass["pemail"];
         $class      = $res_ass["class_name"];
         $stu_img    = $res_ass["stu_img"];


           if(isset($_POST['update']) && $_POST['update']=="update"){
             $first_name = $_POST["first_name"];
             $last_name  = $_POST["last_name"];
             $reg_id     = $_POST["reg_id"];
             $gender     = $_POST["gender"];
             $class      = $_POST["class_name"];
             $pemail     = $_POST["pemail"];
             $dob        = $_POST["dob"];
             $imgpath    = upload('stu_img',$reg_id);


             $arr = array(
               "first_name"=>$first_name,
               "last_name" =>$last_name,
               "reg_id"    =>$reg_id,
               "gender"    =>$gender,
               "class_name"=>$class,
               "pemail"    =>$pemail,
               "dob"       =>$dob,
               "stu_img"   =>$imgpath
             );
             $cond = array('id' => $sid);
            update('student',$arr,$cond);
            header("Location:listStudent.php");
           }


           }


        if(isset($_POST['submit']) && $_POST['submit']=="submit")
        {



           $first_name = $_POST["first_name"];
           $last_name  = $_POST["last_name"];
           $reg_id     = $_POST["reg_id"];
           $gender     = $_POST["gender"];
           $class      = $_POST["class_name"];
           $pemail     = $_POST["pemail"];
           $dob        = $_POST["dob"];
           $imgpath    = upload('stu_img',$reg_id);


           $fees = readrow("fees",array("class_name"=>$class));
           while($fees_asc = mysqli_fetch_assoc($fees)){
                 $amt      = $fees_asc['fees'];
           }




           $msg = check('student',array("reg_id"=>$reg_id));

           if($msg=="Success"){



               $arr = array(
                 "first_name"=>$first_name,
                 "last_name" =>$last_name,
                 "reg_id"    =>$reg_id,
                 "gender"    =>$gender,
                 "class_name"=>$class,
                 "dob"       =>$dob,
                 "pemail"    =>$pemail,
                 "tfees"     =>$amt,
                 "bfees"     =>$amt,
                 "stu_img"   =>$imgpath
               );

               insert('student', $arr);

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

  <!-- error message s-->
                                          <div class="form-group">
                                                <?php
                                                   if(isset($msg)){
                                                      if($msg == "Error"){
                                                        echo"<div class='alert alert-danger' role='alert'>student already registered with this registeration id</div>";
                                                      }
                                                      elseif($msg == "Success"){
                                                        echo"<div class='alert alert-success' role='alert'>Success</div>";
                                                      }else {
                                                        echo"<div></div>";
                                                      }
                                                    }
                                                ?>
                                           </div>


  <!-- error message e-->
                      <form method='POST' action="" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">



<!-- First name s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                              <select id="heard" class="form-control" name="gender" required>
                                <?php
                                  if(isset($_GET['sid'])){
                                    if($gender=="m"){
                                         echo "<option value='m' selected > Mr.</option>";
                                         echo "<option value='f' > Ms.</option>";
                                         }
                                    else{
                                         echo "<option value='f' selected> Ms.</option>";
                                         echo "<option value='m'> Mr.</option>";
                                        }

                                 }
                                 else{
                                   echo "<option value='' selected ></option>
                                         <option value='m'> Mr.</option>
                                         <option value='f'> Ms.</option>";
                                 }
                                ?>

                              </select>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                              <?php if(isset($_GET['sid'])){
                                echo "<input type='text' name='first_name' value='$first_name' id='first-name'class='form-control col-md-7 col-xs-12'>";
                                        }
                                    else{
                                echo "<input type='text' name='first_name' value='' id='first-name' required class='form-control col-md-7 col-xs-12'>";

                                    }
                            ?>
                          </div>
                      </div>
<!-- First name e-->


<!-- last name s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php if(isset($_GET['sid'])){
                             echo "<input type='text' name='last_name' value='$last_name' id='last-name' required class='form-control col-md-7 col-xs-12'>";
                                     }
                                 else{
                             echo "<input type='text' name='last_name' value='' id='last-name' required class='form-control col-md-7 col-xs-12'>";

                                 }
                         ?>
                       </div>
                      </div>
<!-- last name e -->

<!-- class dropdown s -->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">class <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="class_name" class="form-control" required name="class_name">
                             <?php
                             while($result_class = mysqli_fetch_assoc($class_res)){
                                  $classname=$result_class['class_name']; ?>
                                  <option value='<?php echo $classname;?>' <?php   if(isset($_GET['sid']) && $classname==$class){?>selected<?php } ?> > <?php echo $classname;?> </option>
                             <?php }

                             ?>
                            </select>
                          </div>
                      </div>
<!-- class dropdown e -->


<!-- registerationid s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reg_id">reg_id </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php if(isset($_GET['sid'])){
                             echo "<input type='text' name='reg_id' value='$reg_id' id='last-name' required class='form-control col-md-7 col-xs-12'>";
                                     }
                                 else{
                             echo "<input type='text' name='reg_id' value='' id='reg_id' required class='form-control col-md-7 col-xs-12'>";

                                 }
                         ?>
                       </div>
                      </div>
<!-- registerationid e-->


  <!--  Date of birth s-->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            if(isset($_GET['sid'])){
                              echo "<input id='birthday' name='dob' value='$dob' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>";
                               }
                            else{
                              echo "<input id='birthday' name='dob' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>";
                            }

                              ?>
                          </div>
                      </div>
<!--  Date of birth e-->




<!-- parent email s-->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">parent email <span class="required">*</span>
                    </label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                          <?php if(isset($_GET['sid'])){
                            echo "<input type='email' name='pemail' required value='$pemail' id='pemail' class='form-control col-md-7 col-xs-12'>";
                                    }
                                else{
                            echo "<input type='email' name='pemail' value='' id='pemail' required class='form-control col-md-7 col-xs-12'>";

                                }
                        ?>
                      </div>
                </div>
<!-- parent email e-->

<!-- Display image s -->
            <?php if(isset($_GET['sid'])){ ?><div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="<?php echo $stu_img ?>" width="10%" height="100px" style="margin: 6px 28%;" alt="">
                  </div>
            </div>
          <?php } ?>
<!-- Display image e -->

<!-- upload s -->
                      <div class="form-group">
                          <label for="upload" class="control-label col-md-3 col-sm-3 col-xs-12">Photo<span class="required"></span>
                          </label>
                            <?php
                            if(isset($_GET['sid'])){
                              echo "<input  id='upload' name='stu_img'  class='col-md-7 col-xs-12' placeholder='upload your image' type='file'>";
                               }
                            else{
                              echo "<input id='upload' name='stu_img' class='col-md-7 col-xs-12' required type='file'>";
                            }

                              ?>
                          </div>
                      </div>




<!-- upload e -->
                      <div class="ln_solid"></div>
<!-- buttons s -->
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                              <!-- <button type="reset" name="reset" class='btn btn-primary col-md-4 col-xs-12'> reset</button> -->
                            <?php
                            if(isset($_GET['sid'])){
                              echo"<button  type='submit' class='btn btn-success col-md-4 col-xs-12' name='update' value='update'>update</button>";


                               }
                             else{
                               echo "<input type='submit' class='btn btn-success col-md-4 col-xs-12' name='submit' value='submit'>";
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
