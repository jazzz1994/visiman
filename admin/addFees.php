<?php
include('../common/admin/header.php');

if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
  header("location:index.php");
}



if(isset($_GET['fid'])){

    $fid = $_GET['fid'];
    $fees = readrow('fees',array("id"=>$fid));

    while($fee_asc = mysqli_fetch_assoc($fees)){
    $class  = $fee_asc['class_name'];
    $amount = $fee_asc['fees'];
    }


    if(isset($_POST['update']) && $_POST['update']=="update"){

       $class_name = $_POST['class_name'];
       $amt = $_POST['amount'];
       $tname = "fees";
       $arr   = array("class_name"=>$class_name,
                      "fees"      =>$amt
                    );
       update("fees",$arr,array("id"=>$fid));
         header("location:listFees.php");

    }
}






if(isset($_POST['submit']) && $_POST['submit']=="submit")
{

    $class_name = $_POST['class_name'];
    $amount     = $_POST['amount'];

   insert('fees',array("class_name"=>$class_name,"fees"=>$amount));
}

 ?>
<title>Manage Fees</title>

<?php
$class_res=readAll('class');
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
               <h3>Assign fees to class</h3>
             </div>

             <div class="title_right">
             </div>
           </div>
           <div class="clearfix"></div>
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Fees amount<small>please fill the following form</small></h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <br />

                   <form method='POST' action=""  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                     <!-- class dropdown s -->
                                           <div class="form-group">
                                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">class <span class="required">*</span>
                                               </label>
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <select id="class_name" class="form-control" required name="class_name">
                                                   <option value="">select</option>
                                                  <?php
                                                  while($result_class = mysqli_fetch_assoc($class_res)){
                                                       $classname=$result_class['class_name']; ?>
                                                       <option value='<?php echo $classname;?>' <?php if(isset($class) && $classname == $class){?>selected<?php } ?>> <?php echo $classname;?> </option>
                                                  <?php }

                                                  ?>
                                                 </select>
                                               </div>
                                           </div>
                     <!-- class dropdown e -->

                     <!-- last name s-->
                                           <div class="form-group">
                                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Enter Amount Rs.</label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type='text' name='amount' value='<?php if(isset($_GET["fid"])){echo "$amount";} ?>' id='amount' required class='form-control col-md-7 col-xs-12'>
                                            </div>
                                           </div>
                     <!-- last name e -->

            <div class="ln_solid"></div>

                     <!-- buttons s -->
                                           <div class="form-group">
                                               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                 <?php
                                                 if(isset($_GET['fid'])){
                                                   echo"<input type='submit' class='btn btn-success col-md-7 col-xs-12' name='update' value='update'>";

                                                 }else{
                                                   echo"<input type='submit' class='btn btn-success col-md-7 col-xs-12' name='submit' value='submit'>";
                                                 } ?>


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
