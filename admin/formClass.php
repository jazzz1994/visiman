<?php
include('../common/admin/header.php');
if(!isset($_SESSION['aemail'])){
header("location:index.php");
}



   $sub_res = readAll('subject');



   if(isset($_GET['cid'])){
      $cid=$_GET['cid'];
      $res=readrow('class_sub',array("id"=>$cid));
      $res_ass=mysqli_fetch_assoc($res);

      $class_name =$res_ass["class_name"];
      $sub_arr    =explode(',',$res_ass["sub_name"]);

        if(isset($_POST['update']) && $_POST['update']=="update"){
          $class_name = $_POST["class_name"];
          $sub_name   = implode(',',$_POST["sub_name"]);


          $arr = array(
            "class_name"=>$class_name,
            "sub_name"=>$sub_name
          );
          $cond = array('id' => $cid);
         update('class_sub',$arr,$cond);
         header("Location:listClass.php");
        }


        }


   if(isset($_POST['submit']) && $_POST['submit']=="submit")
   {
      $sub_name =array();
      $class_name = $_POST["class_name"];
      $sub_name  = $_POST["sub_name"];
      $str = implode(',',$sub_name);


        $arrsc  = array('class_name' => $class_name,
                       'sub_name'=> $str
                                );

       insert('class_sub', $arrsc);

      $arrcs=array(
        "class_name"=>$class_name
      );
      insert('class',$arrcs);
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
                        if(isset($_GET['cid'])){
                         echo "<h3>Edit Class</h3>";
                       }
                       else{
                         echo "<h3>Add Class</h3>";
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
                          <h2>Class Details<small>please fill the following form</small></h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />

                            <form method='POST' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

<!-- class name s-->
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="classname">Class Name </label>
                                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                                         <?php if(isset($_GET['cid'])){
                                                           echo "<input type='text' name='class_name' value='$class_name' id='classname' required class='form-control col-md-7 col-xs-12'>";
                                                                   }
                                                               else{
                                                           echo "<input type='text' name='class_name' value='' id='class_name' required class='form-control col-md-7 col-xs-12'>";

                                                               }
                                                       ?>
                                                     </div>
                                                    </div>
<!-- class name e -->

<!-- subject name s -->
                                              <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Subject</label>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <select class="select2_multiple form-control col-md-7 col-xs-12" required name="sub_name[]" multiple="multiple">
                                                    <?php
                                                    while($result_sub = mysqli_fetch_assoc($sub_res)){
                                                             $subname = $result_sub["sub_name"];
                                                             $tf      = in_array($subname,$sub_arr);
                                                             ?>
                                                            <option value='<?php echo $subname;?>' <?php if(isset($_GET['cid']) && $tf){?> selected <?php } ?>> <?php echo $subname;?> </option>
                                                         <?php } ?>

                                                  </select>
                                                  </div>
                                              </div>
<!-- subject name e -->

  <!-- buttons s -->
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <?php
                                  if(isset($_GET['cid'])){
                                    echo"<button  type='submit' class='btn btn-success col-md-7 col-xs-12' name='update' value='update'>update</button>";
                                        }
                                  else{
                                    echo "<input type='submit' class='btn btn-success col-md-7 col-xs-12' name='submit' value='submit'>";
                                  }
                                  ?>

                                </div>
                              </div>
<!-- buttons e -->




      </div>
    </div>



<?php include('../common/admin/footer.php'); ?>
  </body>
</html>
