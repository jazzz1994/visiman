<?php

include('../common/admin/header.php');
if(!isset($_SESSION['aemail']) ){
  header("location:login.php");
}

if(isset($_SESSION['aemail'])){
   $aemail       = $_SESSION['aemail'];
   $ad_result   = readrow("admin",array("email"=>$aemail));
   $admin      = mysqli_fetch_assoc($ad_result);

}

 ?>
<title>Add Teacher</title>





        <?php
          if(isset($_POST['update']) && $_POST['update']=='update'){

                $name  = $_POST['name'];
                $email = $_POST['email'];

             update('admin',array("name"=>$name,"email"=>$email),array("id"=>$admin['id']));

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
<!-- admin  name -->
                         <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type='text' name='name' value="<?php echo $admin['name']; ?>" id='name' required class='form-control col-md-7 col-xs-12'>


                          </div>
                         </div>
  <!-- admin  name end-->






<!-- email s -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">

                              <input type='email' name='email' value='<?php echo $admin['email']; ?>' id='pno' required class='form-control col-md-7 col-xs-12'>


                        </div>
                        </div>
<!-- email e -->


<div class="ln_solid"></div>


<!-- button s -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button  type='submit' class='btn btn-success col-md-7 col-xs-12' name='update' value='update'>update</button>
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
