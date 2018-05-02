<?php
include ('../common/admin/header.php');

if(!$_SESSION['aemail']){
  header("location:login.php");
}
?>
<title>Students</title>

<?php



  // if(isset($_GET['did'])){
  //   $did =$_GET['did'] ;
  //   delete('',array("id"=>$did));
  // }


  $read_class_sub     = readAll('class_sub');
  // $read_stu_class = readAll('class_sub');

  // print_r($read_stu_ass);
  // echo'<pre>';
  // print_r(mysqli_fetch_assoc($getstudent_exe));
  //Row Count
  $get_row_count = mysqli_num_rows($read_class_sub);
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
              <h3>Class List (<?php echo $get_row_count; ?>)</h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Class<small>list of all the class</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <div class="table-responsive">
                    <table border="1" class="table table-striped jambo_table bulk_action">

                        <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">class</th>
                            <th class="column-title">subject</th>
                            <th class="column-title">operations</th>
                        </tr>


                  <?php
                    $i=1;
                    while($result = mysqli_fetch_assoc($read_class_sub)) {
                        $cid          = $result["id"];
                        $class_name   = $result["class_name"];
                        $sub_name     = $result["sub_name"];


                  ?>


                    <tr class="even pointer">

                      <td> <?php echo $i; ?>  </td>
                      <td> <?php echo  $class_name;?> </td>
                      <td> <?php echo $sub_name; ?> </td>



                      <td><a href='formClass.php?cid=<?php echo $cid ;?>'>Edit</a> |
                        <a onclick = "return confirm('Are you sure?')" href='listClass.php?cid=<?php echo $cid;?>'>Delete</a></td>
                  </tr>
                    <?php $i++; }
             ?>
              </table>
            </div>

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
