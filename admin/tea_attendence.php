<title>teacher attendence</title>
<?php include('../common/admin/header.php'); ?>
<?php include('../common/dbConn.php'); ?>
<?php

  $msg = "";
  if(isset($_POST["submit"]) && $_POST["submit"]=="submit"){

  foreach ($_POST['status'] as $id => $value) {
      $teacher_name = $_POST['first_name'][$id];
      $reg_id       = $_POST['reg_id'][$id];
      $date         =  date('Y-m-d');
      $qry          = "SELECT * FROM tea_attendence WHERE reg_id = '$reg_id' AND date = '$date'";
      $tea          = mysqli_query($conn,$qry);
      $count        = mysqli_num_rows($tea);
      if($count>0){
        $msg = "Error";
      }else{
      insert('tea_attendence',array("reg_id"=>$reg_id, "date"=>$date, "status"=>$value ));
      }
  }



 }
 ?>



  <?php
           $res_class = readAll('class');
           $res_stu = readAll('teacher');

   ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include('../common/admin/leftNavBar.php'); ?>
        <?php include('../common/admin/topNavBar.php'); ?>


        <div class="right_col" role="main">
          <div class=""><br/>
            <div class="page-title">
              <div class="title_left">
                <h3>Students attendence </h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Attendence <?php echo date('d-m-Y'); ?><small>mark teacher Attendence </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <form method='GET' action=""  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <!-- error message s-->
                                      <div class="form-group">
                                            <?php
                                                  if($msg == "Error"){
                                                    echo"<div class='alert alert-danger' role='alert'>Attendence already Marked</div>";
                                                  }
                                                  elseif($msg == "Success"){
                                                    echo"<div class='alert alert-success' role='alert'>Success</div>";
                                                  }else {
                                                    echo"<div></div>";
                                                  }
                                            ?>
                                       </div>


                      <!-- error message e-->


                    </form>


                    <form id="form"  method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="table-responsive" id="stud_attend">
                      <table border="2" class="table table-striped jambo_table bulk_action" >
                          <tr class="headings">
                              <th class="column-title">RegId</th>
                              <th class="column-title">teacher name</th>
                              <th class="column-title">class</th>
                              <th class="column-title">Status</th>
                          </tr>




                   <?php $read_tea     = readAll('teacher');
                          $i=0; $status = array(); while($result = mysqli_fetch_assoc($read_tea)){?>
                      <tr class="even pointer">
                        <td class="column-title"><?php echo $result['reg_id']; ?><input type="hidden" name="reg_id[]" value="<?php echo $result['reg_id']; ?>"></td>
                        <td class="column-title"><?php echo $result['first_name'];?><input type="hidden" name="first_name[]" value="<?php echo $result['first_name']; ?>"></td>
                        <td class="column-title"><?php echo $result['class_name'];?></td>

                        <td class="column-title">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="attend" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary" data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
                              <input name="status[<?echo$i?>]" value="p" data-parsley-id="12" type="radio">  P
                            </label>
                            <label class="btn btn-primary " data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
                              <input name="status[<?echo$i?>]" value="a" type="radio"> A
                            </label>
                            <label class="btn btn-primary " data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
                              <input name="status[<?echo$i?>]" value="l" type="radio"> L
                            </label>
                          </div>
                        </div>
                      </div></td>
                      </tr>
                    <?php $i++;} ?>
                  </table>
              </div>
              <br><br><br>
              <input type='submit' id="searchsub" class='btn btn-success' name='submit' value='submit'>
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
   <script type="text/javascript" src = "../ajax/admin/ajxAttend.js"></script>
    </body>
</html>
