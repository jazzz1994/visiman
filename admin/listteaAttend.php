<title>teacher attendence</title>
<?php include('../common/admin/header.php'); ?>
<?php include('../common/dbConn.php'); ?>
<?php

  $msg = "";
  if(isset($_POST["update"]) && $_POST["update"]=="update"){

  foreach ($_POST['status'] as $id => $value) {

      $reg_id       = $_POST['reg_id'][$id];
      $date         = $_POST['date'][$id];

      $qry2     = "UPDATE tea_attendence SET status = '$value' WHERE date = '$date' AND reg_id ='$reg_id'";
      $upattend = mysqli_query($conn,$qry2);



  }



 }
 ?>



  <?php

           $attennd_q = "SELECT DISTINCT date FROM tea_attendence ";
           $res_attend = mysqli_query($conn,$attennd_q);


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




                    <form id="form"   data-parsley-validate class="form-horizontal form-label-left" >

                  <!--  Date picker s-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Search by Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id='date' name='date' class='date-picker form-control col-md-7 col-xs-12' required placeholder='dd/mm/yy' type='date'>
                                            </div>
                                        </div>
                  <!--  Date picker e-->

                 </form>




                 <form data-parsley-validate class="form-horizontal form-label-left"  action="listteaAttend.php" method="post">
                  <div  id="tea_attend">

                  </div>
                  <!--  Date button s-->
                                      <div class="form-group" >
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id ="upattend" type="submit" class = "btn btn-primary" name="update" value="update">
                                          </div>
                                      </div>
                <!--  Date button e-->
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

   <script type="text/javascript">

   var date   = document.querySelector("#date");
   var update = document.querySelector("#upattend");
   update.style.display = "none";

  //  var btn      = document.querySelector("#view");
   var sclass   = document.querySelector("#class_name");
   var date     = document.querySelector('#date');



   date.onchange = function(){

     var selected = document.querySelector("#tea_attend");
     var datevalue  = date.value;
     console.log(selected);
     if(update.style.display =="none"){
     update.style.display = "block";
     }


      if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();

        } else {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        }




      xmlhttp.onreadystatechange=function() {
        if(xmlhttp.status==200 && xmlhttp.readyState==4){
          document.getElementById("tea_attend").innerHTML = xmlhttp.responseText;

        }
      }
     console.log(xmlhttp.responseText);
       xmlhttp.open("GET","../hiddenajx/getTeaAttend.php?date="+datevalue);
       xmlhttp.send();
   }

   </script>
    </body>
</html>
