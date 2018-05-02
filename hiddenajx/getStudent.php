<?php include('../db/crud_fun.php'); ?>
<?php
$get_class = $_GET['class'];


  $read_stu = readrow('student',array("class_name"=>$get_class));




?>




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



?>


  <tr class="even pointer">
    <th> <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="checkbox" name = "student[]" value="<?php echo $sid; ?>" aria-label="Checkbox for following text input">
            </div>
          </div>
    </th>
    <td> <?php echo $i; ?>  </td>
    <td> <?php echo "<img src='../upload/$stu_img' width=50px height=50px>"; ?>  </td>
    <td> <?php echo ucfirst($first_name); ?> </td>
    <td> <?php echo ucfirst($last_name); ?> </td>
    <td> <?php if($gender=='m'){echo "Male";}else{echo "Female";} ?> </td>
    <td> <?php  echo $class;  ?>  </td>
    <td> <?php echo $dob;    ?>  </td>


    <td><a href='formStudent.php?sid=<?php echo $sid ;?>'>Edit</a> |
      <a onclick = "return confirm('Are you sure?')" href='listStudent.php?did=<?php echo $sid;?>'>Delete</a></td>
</tr>
  <?php $i++; }
?>
</table>
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
