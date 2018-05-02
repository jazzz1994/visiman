<?php
    include('../common/admin/header.php');
      if(!isset($_SESSION['aemail'])){
      header("location:index.php");
} ?>
<title>Add Parent</title>




        <?php


       $msg="";




        if(isset($_GET['pid'])){
           $pid=$_GET['pid'];
           $res=readAll('parent',array("id"=>$pid));
           $res_ass=mysqli_fetch_assoc($res);
           $first_name =$res_ass["first_name"];
           $last_name  =$res_ass["last_name"];
           $gender     =$res_ass["gender"];
           $reg_id     =$res_ass["reg_id"];
           $phone_no   =$res_ass["phone_no"];
           $address    =$res_ass["address"];
           $email      =$res_ass["email"];


             if(isset($_POST['update']) && $_POST['update']=="update"){
               $first_name = $_POST["first_name"];
               $last_name  = $_POST["last_name"];
               $gender     = $_POST["gender"];
               $reg_id     = $_POST["reg_id"];
               $phone_no   = $_POST["phone_no"];
               $address    = $_POST["address"];
               $email      = $_POST["email"];

               $arr = array(
                 "first_name"=>$first_name,
                 "last_name"=>$last_name,
                 "gender"=>$gender,
                 "reg_id"=>$reg_id,
                 "phone_no"=>$phone_no,
                 "address"=>$address,
                 "email"=>$email
               );
               $cond = array('id' => $pid);
              update('parent',$arr,$cond);
              header("Location:listParent.php");
             }



          }

          if(isset($_POST['submit']) && $_POST['submit']=="submit")
          {
            $first_name = $_POST["first_name"];
            $last_name  = $_POST["last_name"];
            $gender     = $_POST["gender"];
            $reg_id     = $_POST["reg_id"];
            $phone_no   = $_POST["phone_no"];
            $address    = $_POST["address"];
            $email      = $_POST["email"];

            $res_mail = readrow('parent',array("email"=>$email));
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
                  "reg_id"=>$reg_id,
                  "phone_no"=>$phone_no,
                  "address"=>$address,
                  "email"=>$email
                );

                 insert('parent', $arr);
            }




            $mailmsg =  mailFormat($first_name.' '.$last_name);


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
                <h3>Add Parent</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Parent Details<small>please fill the following form</small></h2>
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


 <!-- parent first name -->
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                         </label>
                         <div class="col-md-2 col-sm-6 col-xs-12">
                             <select id="heard" class="form-control" name="gender" required>
                               <?php
                                 if(isset($_GET['pid'])){
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
                             <?php if(isset($_GET['pid'])){
                               echo "<input type='text' name='first_name' value='$first_name' id='first-name' required class='form-control col-md-7 col-xs-12'>";
                                       }
                                   else{
                               echo "<input type='text' name='first_name' value='' id='first-name' required class='form-control col-md-7 col-xs-12'>";

                                   }
                           ?>
                         </div>
                     </div>

  <!-- parent first name end-->



  <!--parent last name -->
                         <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php if(isset($_GET['pid'])){
                                echo "<input type='text' name='last_name' value='$last_name' id='last-name' required class='form-control col-md-7 col-xs-12'>";
                                        }
                                    else{
                                echo "<input type='text' name='last_name' value='' id='last-name' required class='form-control col-md-7 col-xs-12'>";

                                    }
                               ?>
                          </div>
                         </div>
  <!--parent last name e-->


<!--registeration ID  s-->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reg_id">Registeration ID </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <?php if(isset($_GET['pid'])){
                         echo"<input type='text' name='reg_id' value='$reg_id' id='reg_id' required class='form-control col-md-7 col-xs-12'>";

                       }
                       else{
                         echo"<input type='text' name='reg_id' value='' id='reg_id' required class='form-control col-md-7 col-xs-12'>";

                       }?>
                  </div>
                  </div>

<!--registeration ID  e-->

<!-- phone no s -->

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone NO </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php if(isset($_GET['pid'])){
                           echo"<input type='text' name='phone_no' value='$phone_no' id='pno' required class='form-control col-md-7 col-xs-12'>";
                         }
                         else{
                         echo"<input type='text' name='phone_no' value='' id='pno' required class='form-control col-md-7 col-xs-12'>";
                         }
                         ?>
                    </div>
                    </div>

<!-- phone no e -->



<!-- address s-->

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php if(isset($_GET['pid'])){
                               echo"   <textarea name='address' class='form-control col-md-7 col-xs-12' rows='3' cols='80'>$address</textarea>";
                             }
                             else{
                               echo"   <textarea name='address' class='form-control col-md-7 col-xs-12' rows='3' cols='80'></textarea>";

                             }
                             ?>

                      </div>
                      </div>

<!-- address e-->


<!-- email s -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <?php if(isset($_GET['pid'])){
                               echo"<input type='email' name='email' value='$email' id='pno' required class='form-control col-md-7 col-xs-12'>";
                             }
                             else{
                               echo"<input type='email' name='email' value='' id='pno' required class='form-control col-md-7 col-xs-12'>";

                             }
                             ?>

                        </div>
                        </div>
<!-- email e -->
<div class="ln_solid"></div>
<!-- button s -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              
                               <!-- <input class="btn btn-primary" type="reset" value="Reset" name="reset"> -->
                              <?php
                              if(isset($_GET['pid'])){
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
