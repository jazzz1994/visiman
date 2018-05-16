<?php
include ('../common/admin/header.php');
if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
    header("location:index.php");
}

 ?>
<title>List Students</title>

<?php
  $class_res =  readAll('class');


  if(isset($_GET['did'])){
    $did =$_GET['did'] ;
    delete('student',array("id"=>$did));
  }


  if(isset($_POST['submit']) && $_POST['submit']=='delete'){
    if(isset($_POST['student'])){
        foreach($_POST['student'] as $key => $value) {
       delete('student',array('id'=>$value));
     }
  }
}


  $read_stu     = readAll('student');

  $get_row_count = mysqli_num_rows($read_stu);
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
              <h3>Students List (<?php echo $get_row_count; ?>)</h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Students<small>list of all the students</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <form method='GET'   class="form-horizontal form-label-left">
                  <!-- class dropdown s -->
                                        <div class="form-group" >
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">search class<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select id="class_name" class="form-control"  required name="class_name">
                                                <option value="">select</option>
                                               <?php
                                               while($result_class = mysqli_fetch_assoc($class_res)){
                                                    $classname=$result_class['class_name']; ?>
                                                    <option value='<?php echo $classname;?>'> <?php echo $classname;?> </option>
                                               <?php }

                                               ?>
                                              </select>
                                            </div>
                                        </div>

                  <!-- class dropdown e -->
                  </form>



            <form method='POST'  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div id ="stud_list">
                  <div class="table-responsive" >
                    <table border="2" class="table table-striped jambo_table bulk_action">

                        <tr class="headings">
                            <th> <div class="input-group-prepend" width = "10">
                                    <div class="input-group-text">
                                      <input type="checkbox" id ="stu" onclick="stuCheck();" aria-label="Checkbox for following text input">
                                    </div>
                                  </div>
                            </th>
                            <th class="column-title">ID</th>
                            <th class="column-title" width = "50">Photo</th>
                            <th class="column-title">First name</th>
                            <th class="column-title">Last name</th>
                            <th class="column-title">gender</th>
                            <th class="column-title">class</th>
                            <th class="column-title">D.O.B</th>
                            <th class="column-title">Total Fees</th>
                            <th class="column-title">Balance due</th>
                            <th class="column-title">operations</th>
                        </tr>


                  <?php
                    $i=1;
                    while($result = mysqli_fetch_assoc($read_stu)) {
                        $sid          = $result["id"];
                        $stu_img      = $result["stu_img"];
                        $first_name   = $result["first_name"];
                        $last_name    = $result["last_name"];
                        $gender       = $result["gender"];
                        $class        = $result["class_name"];
                        $dob          = $result["dob"];
                        $tfees        = $result["tfees"];
                        $bfees        = $result["bfees"];


                  ?>


                    <tr class="even pointer">
                      <th> <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" name = "student[]" value="<?php echo $sid; ?>" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                      </th>
                      <td> <?php echo $i; ?>  </td>
                      <td> <?php echo "<img src='$stu_img' width=50px height=50px>"; ?>  </td>
                      <td> <?php echo ucfirst($first_name); ?> </td>
                      <td> <?php echo ucfirst($last_name); ?> </td>
                      <td> <?php if($gender=='m'){echo "Male";}else{echo "Female";} ?> </td>
                      <td> <?php  echo $class;  ?>  </td>
                      <td> <?php echo $dob;    ?>  </td>
                      <td> <?php echo $tfees;    ?>  </td>
                      <td> <?php echo $bfees;    ?>  </td>


                      <td><a href='formStudent.php?sid=<?php echo $sid ;?>'>Edit</a> |
                        <a onclick = "return confirm('Are you sure?')" href='listStudent.php?did=<?php echo $sid;?>'>Delete</a></td>
                  </tr>
                    <?php $i++; }
             ?>
              </table>
            </div>
           </div>


    <!-- buttons s -->
                          <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                               <button  type='submit' class='btn btn-danger col-md-7 col-xs-12' onclick="return confirm('Are you sure?')" name='submit' value='delete'>delete selected</button>
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

  <script>


    function stuCheck(){
       var scheck       = document.querySelector("#stu");
       var selectall    = document.querySelectorAll("input[name='student[]']");

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
 <script type="text/javascript" src = "../ajax/admin/ajxListstu.js"></script>
  <?php include('../common/admin/footer.php'); ?>

</body>
