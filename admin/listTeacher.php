<?php
include ('../common/admin/header.php');

if(!isset($_SESSION['aemail']) && !isset($_SESSION['temail'])){
  header("location:login.php");
}
?>

<title>Manage Teacher</title>

<?php

  if(isset($_POST['submit']) && $_POST['submit']=='delete'){

    if(isset($_POST['teacher'])){
        foreach($_POST['teacher'] as $key => $value) {
       delete('teacher',array('id'=>$value));
     }
  }
}

 if(isset($_GET['did'])){

    $did =$_GET['did'] ;
    delete('teacher',array('id'=>$did));

    }



  $read_teach     = readAll('teacher');


  if(mysqli_num_rows($read_teach)){
    $get_row_count = mysqli_num_rows($read_teach);
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
              <h3>Teacher List (<?php if(mysqli_num_rows($read_teach)){
                echo "$get_row_count";

              } ?>)</h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Teachers<small>list of all the teacher</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <div class="table-responsive">
                    <table border="1" class="table table-striped jambo_table bulk_action">


                        <tr class="headings">
                          <?php if(isset($_SESSION['aemail'])){ ?>
                          <th> <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" id ="teaCheck" onclick="teaCheck();" aria-label="Checkbox for following text input">
                                  </div>
                                </div>
                          </th>
                        <?php } ?>
                                  <th class="column-title">ID</th>
                                  <th class="column-title" width = "50">Photo</th>
                                  <th class="column-title">First name</th>
                                  <th class="column-title">Last name</th>
                                  <th class="column-title">gender</th>
                                  <th class="column-title">Class</th>
                                  <th class="column-title">Subject</th>
                                  <th class="column-title">Email</th>
<?php if(isset($_SESSION['aemail'])){ ?> <th class="column-title">Operations</th><?php } ?>
                        </tr>


                  <?php
                    $i=1;
                    while($result = mysqli_fetch_assoc($read_teach)) {
                        $tid          = $result["id"];
                        $tea_img      = $result["photo"];
                        $first_name   = $result["first_name"];
                        $last_name    = $result["last_name"];
                        $gender       = $result["gender"];
                        $class        = $result["class_name"];
                        $subject      = $result["sub_name"];
                        $email        = $result["email"];

                        ?>

      <form method='POST'  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <tr class="even pointer">
                      <?php if(isset($_SESSION['aemail'])){ ?>
                      <td> <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" name="teacher[]" value="<?php echo $tid; ?>" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                      </td>
                    <?php } ?>

                      <td> <?php echo $i; ?>  </td>
                      <td> <?php echo "<img src='$tea_img' width=50px height=50px>"; ?>  </td>
                      <td> <?php echo ucfirst($first_name); ?> </td>
                      <td> <?php echo ucfirst($last_name); ?> </td>
                      <td> <?php if($gender=='m'){echo "Male";}elseif($gender=='f'){echo "Female";}else{ echo '---';} ?> </td>
                      <td> <?php echo $class;  ?>  </td>
                      <td> <?php echo $subject;  ?>  </td>
                      <td> <?php echo $email; ?>  </td>


                    <?php if(isset($_SESSION['aemail'])){ ?>  <td><a href='formTeacher.php?tid=<?php echo $tid ;?>'>Edit</a> |
                        <a onclick = "return confirm('Are you sure?')" href='listTeacher.php?did=<?php echo $tid;?>'>Delete</i></a></td>
                  </tr><?php } ?>
                    <?php $i++; }?>
              </table>
            </div>

  <!-- buttons s -->
                      <?php if(isset($_SESSION['aemail'])){ ?>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button  type='submit' class='btn btn-danger col-md-7 col-xs-12' onclick="return confirm('Are you sure?')" name='submit' value='delete'>delete selected</button>
                            </div>
                        </div>
                      <?php } ?>
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


    function teaCheck(){
       var scheck       = document.querySelector("#teaCheck");
       var selectall    = document.querySelectorAll("input[name='teacher[]']");

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
