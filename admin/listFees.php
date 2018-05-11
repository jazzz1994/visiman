<?php
include ('../common/admin/header.php');
include ('../common/dbConn.php');
if(!isset($_SESSION['aemail']) && !isset($_SESSION['temail'])){
  header("location:login.php");
}
?>

<title>Fees</title>

<?php




if(isset($_GET['did'])){

   $did = $_GET['did'];
   delete('fees',array("id"=>$did));
}
 $read_fees = readAll("fees");






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
              <h3>Fees Assign to class</h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Fees<small>list of all the fees</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />




                  <form method='POST'  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div id ="stud_list">
                        <div class="table-responsive" >
                          <table border="2" class="table table-striped jambo_table bulk_action">
                            <tr class="headings">
                              <th class="column-title">s.no</th>
                              <th class="column-title">Class</th>
                              <th class="column-title">Fees</th>
                              <th class="column-title">Operations</th>
                            </tr>

                            <?php
                                $i = 1;
                                while($result = mySqli_fetch_assoc($read_fees)){
                                  $fid        = $result['id'];
                                  $class_name = $result['class_name'];
                                  $fees       = $result['fees'];
                             ?>
                             <tr class="even pointer">
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $class_name; ?></td>
                                 <td>Rs <?php echo $fees; ?></td>
                                 <td><a href='addFees.php?fid=<?php echo $fid ;?>'>Edit</a> |
                                   <a onclick = "return confirm('Are you sure?')" href='listFees.php?did=<?php echo $fid;?>'>Delete</a></td>
                             </tr>
                          <?php $i++;} ?>



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
