<?php
include('../common/admin/header.php');

if(!isset($_SESSION['aemail'])){
  header("location:index.php");
}




      if(isset($_GET['hid'])){
         $hid=$_GET['hid'];
         $res=readrow('holidays',array("id"=>$hid));
         $res_ass = mysqli_fetch_assoc($res);

         $title   = $res_ass["title"];
         $date    = $res_ass["date"];
         $descr   = $res_ass["descr"];


           if(isset($_POST['update']) && $_POST['update']=="update"){
             $title = $_POST["hol_title"];
             $date  = $_POST["hdate"];
             $descr     = $_POST["hdescr"];



             $arr = array(
               "title"     =>$title,
               "date"      =>$date,
               "descr"     =>$descr
             );
             $cond = array('id' => $hid);
            update('holidays',$arr,$cond);
            header("Location:listHoliday.php");
           }


           }



      if(isset($_POST["submit"]) && $_POST['submit']=='submit'){

        $hol_title = $_POST['hol_title'];
        $hdate     = $_POST['hdate'];
        $hdescr    = $_POST['hdescr'];

        $msg = check('holidays',array('date'=>$hdate));

        if($msg == "Success"){
              $insArr = array(
                'title' => $hol_title,
                'date'  =>  $hdate,
                'descr' => $hdescr
              );
        insert('holidays', $insArr);
        }

}

 ?>
 <title>Manage Holidays</title>


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
                 if(isset($_GET['hid'])){
                  echo "<h3>Edit Holiday</h3>";
                }
                else{
                  echo "<h3>Add Holiday</h3>";
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
                   <h2>Holiday<small>please fill the following form</small></h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <br />

 <!-- error message s-->
                                         <div class="form-group">
                                               <?php if(isset($msg)){
                                                     if($msg == "Error"){
                                                       echo"<div class='alert alert-danger' role='alert'>Holiday already assigned to this date</div>";
                                                     }
                                                     elseif($msg == "Success"){
                                                       echo"<div class='alert alert-success' role='alert'>Successfully inserted</div>";
                                                     }else {
                                                       echo"<div></div>";
                                                     }
                                                    }
                                               ?>
                                          </div>


 <!-- error message e-->
 
                   <form method='POST' action="" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">



<!-- holiday title s-->
                 <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Holiday Title </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php if(isset($_GET['hid'])){
                        echo "<input type='text' name='hol_title' value='$title' id='last-name' required class='form-control col-md-7 col-xs-12'>";
                                }
                            else{
                        echo "<input type='text' name='hol_title' value='' id='last-name' required class='form-control col-md-7 col-xs-12'>";

                            }
                    ?>
                  </div>
                 </div>
<!-- holiday title e -->

<!--  Holiday date s-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Holiday Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          if(isset($_GET['hid'])){
                            echo "<input  name='hdate' value='$date' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>";
                             }
                          else{
                            echo "<input  name='hdate' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>";
                          }

                            ?>
                        </div>
                    </div>
<!--  Holiday date e-->

<!--  Description s-->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Holiday Description</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <textarea name="hdescr" id='title' rows="8" cols="80" class='form-control col-md-7 col-xs-12'><?php if(isset($_GET['hid'])){ echo "$descr";} ?></textarea>
                   </div>
                  </div>
<!--  Description e-->


<!-- buttons s -->
                      <div class="form-group">

                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                            if(isset($_GET['hid'])){
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
