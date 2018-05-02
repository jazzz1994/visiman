<?php

include('../common/admin/header.php');
if(!isset($_SESSION['aemail']) && !isset($_SESSION['temail'])){
  header("location:login.php");
}

if(isset($_SESSION['temail'])){
   $temail       = $_SESSION['temail'];
   $tea_result   = readrow("teacher",array("email"=>$temail));
   $teacher      = mysqli_fetch_assoc($tea_result);
   $_GET['tid']  = $teacher['id'];
}
 ?>
<title>Add Teacher</title>





        <?php


       $msg="";


       $cls_res=readAll('class');

        if(isset($_GET['tid'])){
           $tid=$_GET['tid'];
           $res=readrow('teacher',array("id"=>$tid));
           $res_ass=mysqli_fetch_assoc($res);
           $first_name = $res_ass["first_name"];
           $last_name  = $res_ass["last_name"];
           $gender     = $res_ass["gender"];
           $class      = $res_ass["class_name"];
           $classarr   = explode(',',$class);
           $email      = $res_ass["email"];



             if(isset($_POST['update']) && $_POST['update']=="update"){
               $first_name = $_POST["first_name"];
               $last_name  = $_POST["last_name"];
               $gender     = $_POST["gender"];
               $class      = implode(',',$_POST["class_name"]);
               $email      = $_POST["email"];



               $arr = array(
                 "first_name"=>$first_name,
                 "last_name"=>$last_name,
                 "gender"=>$gender,
                 "class_name"=>$class,
                 "email"=>$email
               );
               $cond = array('id' => $tid);
              update('teacher',$arr,$cond);
              header("Location:listTeacher.php");
             }



          }

          if(isset($_POST['submit']) && $_POST['submit']=="submit")
          {
            $first_name = $_POST["first_name"];
            $last_name  = $_POST["last_name"];
            $gender     = $_POST["gender"];
            $class      = implode(',',$_POST["class_name"]);
            $email      = $_POST["email"];
            if($_POST["password1"]==$_POST["password2"]){
            $password   = md5($_POST["password1"]);
              }else{
                $msg="incorrect password";
            }
            $res_mail = readrow('teacher',array("email"=>$email));
            $rowcount = mysqli_num_rows($res_mail);
            if($rowcount>0){
                 $msg = "Error";

            }
            else{
                $msg = "Success";
                $arr = array(
                  "first_name"=>$first_name,
                  "last_name"=>$last_name,
                  "gender"=>$gender,
                  "class_name"=>$class,
                  "email"=>$email,
                  "password"=>$password
                );
                // print_r($arr);

                 insert('teacher', $arr);
            }


            $mailmsg =  mailFormat($first_name.' '.$last_name);
            // echo $mailmsg;

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
                <h3>Add Teacher</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teacher Details<small>please fill the following form</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="parent" method="POST" data-parsley-validate class="form-horizontal form-label-left">

<!-- error message s-->
                <div class="form-group">
                      <?php
                            if($msg == "Error"){
                              echo"<div class='alert alert-danger' role='alert'>email already exist</div>";
                            }
                            elseif($msg == "Success"){
                              echo"<div class='alert alert-success' role='alert'>Success</div>";
                            }else {
                              echo"<div></div>";
                            }
                      ?>
                 </div>


<!-- error message e-->


 <!-- teacher first name -->
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                         </label>
                         <div class="col-md-2 col-sm-6 col-xs-12">
                             <select id="heard" class="form-control" name="gender" required>
                               <?php
                                 if(isset($_GET['tid'])){
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
                             <?php if(isset($_GET['tid'])){
                               echo "<input type='text' name='first_name' value='$first_name' id='first-name' required class='form-control col-md-7 col-xs-12'>";
                                       }
                                   else{
                               echo "<input type='text' name='first_name' value='' id='first-name' required class='form-control col-md-7 col-xs-12'>";

                                   }
                           ?>
                         </div>
                     </div>

  <!-- teacher first name end-->



  <!--teacher last name -->
                         <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php if(isset($_GET['tid'])){
                                echo "<input type='text' name='last_name' value='$last_name' id='last-name' required class='form-control col-md-7 col-xs-12'>";
                                        }
                                    else{
                                echo "<input type='text' name='last_name' value='' id='last-name' required class='form-control col-md-7 col-xs-12'>";

                                    }
                               ?>
                          </div>
                         </div>
  <!--teacher last name e-->





<!-- class s -->
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Class</label>
              <div class="col-md-6 col-sm-9 col-xs-12">
              <select class="select2_multiple form-control" required name="class_name[]" multiple="multiple">
                <?php
                while($result_class = mysqli_fetch_assoc($cls_res)){
                         $classname = $result_class["class_name"];
                         $tf = in_array($classname,$classarr);
                         ?>
                        <option value='<?php echo $classname;?>' <?php if(isset($_GET['tid']) && $tf){?>selected <?php } ?>><?php echo $classname;?></option>
                     <?php } ?>

              </select>
              </div>
          </div>
<!-- class e -->





<!-- email s -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php if(isset($_GET['tid'])){
                               echo"<input type='email' name='email' value='$email' id='pno' required class='form-control col-md-7 col-xs-12'>";
                             }
                             else{
                               echo"<input type='email' name='email' value='' id='pno' required class='form-control col-md-7 col-xs-12'>";

                             }
                             ?>

                        </div>
                        </div>
<!-- email e -->

                    <?php if(!isset($_GET['tid'])){
echo"<!-- password1 s -->
                        <div class='form-group'>
                            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password1'>Password</label>
                           <div class='col-md-6 col-sm-6 col-xs-12'>
                              <input type='password' name='password1' value='' id='password1' required class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
<!-- password1 e -->

<!-- password2 s -->

                        <div class='form-group'>
                            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password2'>Re-Type Password</label>
                           <div class='col-md-6 col-sm-6 col-xs-12'>
                              <input type='password' name='password2' value=''  required class='form-control col-md-7 col-xs-12'>
                          </div>
                        </div>
<!-- password2 e -->";
}?>


<div class="ln_solid"></div>
<!-- button s -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              
                              <?php
                              if(isset($_GET['tid'])){
                                echo"<button  type='submit' class='btn btn-success' name='update' value='update'>update</button>";


                                 }
                               else{
                                 echo "<input type='submit' class='btn btn-success' name='submit' value='submit'>";
                               }
                                  ?>

                            </div>
                        </div>
<!-- button e -->



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
