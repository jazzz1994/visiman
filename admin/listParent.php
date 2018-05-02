<?php
include ('../common/admin/header.php');
include ('../common/dbConn.php');
if(!isset($_SESSION['aemail']) && !isset($_SESSION['temail'])){
  header("location:login.php");
}
?>

<title>Students</title>

<?php


if(isset($_POST['submit']) && $_POST['submit']=='delete'){

  if(isset($_POST['parent'])){
      foreach($_POST['parent'] as $key => $value) {
     delete('parent',array('id'=>$value));
   }
}
}


  $get_row_count = "";
  if(isset($_GET['did'])){
    $did =$_GET['did'] ;
    delete('parent',array("id"=>$did));
  }


  // $qry = "SELECT * FROM parent INNER JOIN student ON parent.email = student.pemail";
  // $stu_par = mysqli_query($conn,$qry);
  // while($res_par = mysqli_fetch_assoc($stu_par)){
  //   echo "<pre>";
  //   print_r($res_par);
  //   echo "</pre>";
  // }
  $read_par     = readAll('parent');
  $get_row_count = mysqli_num_rows($read_par);
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
              <h3>Parent List (<?php echo $get_row_count; ?>)</h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Students<small>list of all the parents</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <div class="table-responsive">

                    <table border="2" class="table table-striped jambo_table bulk_action">
                    <form method='POST'  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <tr class="headings">
                          <th> <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" id = "firstcheck" onclick = "parentcheck()" aria-label="Checkbox for following text input">
                                  </div>
                                </div>
                          </th>
                            <th class="column-title">ID</th>
                            <th class="column-title">First name</th>
                            <th class="column-title">Last name</th>
                            <th class="column-title">gender</th>
                            <th class="column-title">phone no..</th>
                            <th class="column-title">Address</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Operations</th>
                        </tr>


                  <?php
                    $i=1;
                    while($result = mysqli_fetch_assoc($read_par)) {
                        $pid          = $result["id"];
                        $first_name   = $result["first_name"];
                        $last_name    = $result["last_name"];
                        $gender       = $result["gender"];
                        $phone        = $result["phone_no"];
                        $address      = $result["address"];
                        $email        = $result["email"];

                       $stud = readrow('student',array("pemail"=>$email));


                  ?>


                    <tr class="even pointer">
                      <td> <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" name="parent[]" value = "<?php echo $pid; ?>"aria-label="Checkbox for following text input">
                              </div>
                            </div>
                      </td>
                      <td> <?php echo $i; ?>  </td>
                      <td> <?php echo ucfirst($first_name); ?> </td>
                      <td> <?php echo ucfirst($last_name); ?> </td>
                      <td> <?php if($gender=='m'){echo "Male";}else{echo "Female";} ?> </td>
                      <td> <?php echo $phone;  ?>  </td>
                      <td> <?php echo $address; ?>  </td>
                      <td> <?php echo $email; ?>  </td>


                      <td><a href='formParent.php?pid=<?php echo $pid ;?>'>Edit</a> | <a onclick = "return confirm('Are you sure?')" href='listParent.php?did=<?php echo $pid;?>'> Delete<i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                    <?php $i++; }
             ?>


              </table>
            </div>

            <!-- buttons s -->
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                       <button  type='submit' class='btn btn-success col-md-7 col-xs-12' onclick="return confirm('Are you sure?')" name='submit' value='delete'>delete selected</button>
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
  <script>


    function parentcheck(){
       var scheck       = document.querySelector("#firstcheck");
       var selectall    = document.querySelectorAll("input[name='parent[]']");

      for(var i=0; i<selectall.length;i++){
        if(scheck.checked == true){
         selectall[i].checked = true;
         }
         if(scheck.checked == false){
           selectall[i].checked =false;

         }
    }
    }

  </script>
</body>
