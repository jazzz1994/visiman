<?php include('../db/crud_fun.php'); ?>
<?php include('../common/dbConn.php');?>


<?php
$get_class = $_GET['class'];
$qry = "SELECT parent.first_name AS pname, parent.email, parent.address , parent.phone_no, student.first_name AS sname FROM parent INNER JOIN student ON parent.email = student.pemail WHERE class_name ='$get_class'";
$stu_par = mysqli_query($conn,$qry);
?>

<tr class="headings">
  <th> <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox" id = "firstCheck" onclick="check();"aria-label="Checkbox for following text input">
          </div>
        </div>
  </th>
    <th class="column-title">ID</th>
    <th class="column-title">Student Name</th>
    <th class="column-title">Parent Name</th>
    <th class="column-title">Parent Phone no.</th>
    <th class="column-title">Parent Address</th>
    <th class="column-title">Email</th>
    <th class="column-title">Operations</th>
</tr>


<?php
$i=1;
while($result2 = mysqli_fetch_assoc($stu_par)){
$student_name   = $result2["sname"];
$parent_name    = $result2["pname"];
$phone_no       = $result2["phone_no"];
$address        = $result2["address"];
$email          = $result2["email"];
?>


<tr class="even pointer" id ="contact_list">
<td> <div class="input-group-prepend">
      <div class="input-group-text">
        <input type="checkbox" name="parent[]" value="<?php echo $phone_no.'-'.$email;?>" aria-label="Checkbox for following text input">
      </div>
    </div>
</td>
<td> <?php echo $i; ?>  </td>
<td> <?php echo ucfirst($student_name); ?> </td>
<td> <?php echo ucfirst($parent_name); ?> </td>
<td> <?php echo $phone_no;  ?>  </td>
<td> <?php echo $address; ?>  </td>
<td> <?php echo $email; ?>  </td>


<td> <i class="fa fa-comments"></i> | <i class="fa fa-phone"></i></td>
</tr>
<?php $i++; }?>
