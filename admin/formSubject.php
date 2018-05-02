<?php
 include('../common/admin/header.php');

  if(!$_SESSION['aemail']){
    header("location:login.php");
}


  // read all subject
   $sub_res = readAll('subject');


   if(isset($_POST['submit']) && $_POST['submit']=="submit")
   {
      $sub_name =array();
      $class_name = $_POST["class_name"];
      $sub_name  = $_POST["sub_name"];
      $sub_len = count($sub_name);

      foreach ($sub_name as $key => $value) {
        $arrsc  = array('class_name' => $class_name,
                       'sub_name'=> $value
                                );

       insert('class_sub', $arr);
      }
      $arrc=array(
        "class_name"=>$class_name
      );
      insert('class',$arrc);
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
                          <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
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

                                              <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Subject</label>
                                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <select class="select2_multiple form-control" name="sub_name[]" multiple="multiple">
                                                    <?php
                                                    while($result_sub = mysqli_fetch_assoc($sub_res)){

                                                            echo "<option value='$result_sub[sub_name]'>$result_sub[sub_name]</option>";
                                                         }
                                                    ?>
                                                  </select>
                                                  </div>
                                              </div>


  <!-- buttons s -->
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button class="btn btn-primary" type="button">Cancel</button>
                                  <input class="btn btn-primary" type="reset" value="Reset" name="reset">
                                  <?php
                                  if(isset($_GET['cid'])){
                                    echo"<button  type='submit' class='btn btn-success' name='update' value='update'>update</button>";


                                  }
                                  else{
                                    echo "<input type='submit' class='btn btn-success' name='submit' value='submit'>";
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
