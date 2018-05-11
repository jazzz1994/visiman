<?php include('../db/crud_fun.php'); ?>
<?php include('../common/dbConn.php');
$get_class = $_GET['class'];
$get_date  = $_GET['date'];
$datesep   = explode('-',$get_date);
$datenew=$datesep[2]."-".$datesep[1]."-".$datesep[0];
   $qry  = "SELECT student.reg_id,student.first_name,stu_attendence.date,stu_attendence.status FROM student INNER JOIN stu_attendence ON student.reg_id = stu_attendence.reg_id WHERE student.class_name = '$get_class' AND stu_attendence.date ='$datenew'";
   $res_q = mysqli_query($conn,$qry);



?>


<table border="2" class="table table-striped jambo_table bulk_action" >
    <tr class="headings">
        <th class="column-title">RegId</th>
        <th class="column-title">First Name</th>
        <th class="column-title">Date</th>
        <th class="column-title">Status</th>
    </tr>




<?php $i=0;  while($res_attend = mysqli_fetch_assoc($res_q)){?>
<tr class="even pointer">
  <td class="column-title"><input type="hidden" name="reg_id[]" value="<?php echo $res_attend['reg_id']; ?>"><?php echo $res_attend['reg_id']; ?></td>
  <td class="column-title"><input type="hidden" name="first_name[]" value="<?php echo $res_attend['first_name']; ?>"><?php echo $res_attend['first_name']; ?></td>
  <td class="column-title"><input type="hidden" name="date[]" value="<?php echo $res_attend['date']; ?>"><?php echo $res_attend['date']; ?></td>
  <td class="column-title">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div id="attend" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary <?php if($res_attend['status']=='p'){?>active <?php } ?>" data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
        <input name="status[<?echo$i?>]" <?php if($res_attend['status']=='p'){?>checked <?php } ?> value="p" data-parsley-id="12" type="radio">  P
      </label>
      <label class="btn btn-primary <?php if($res_attend['status']=='a'){?>active <?php } ?>" data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
        <input name="status[<?echo$i?>]" <?php if($res_attend['status']=='a'){?>checked <?php } ?> value="a" type="radio"> A
      </label>
      <label class="btn btn-primary <?php if($res_attend['status']=='l'){?>active <?php } ?>" data-toggle-class="btn-primary-success" data-toggle-passive-class="btn-default">
        <input name="status[<?echo$i?>]" <?php if($res_attend['status']=='l'){?>checked<?php } ?> value="l" type="radio"> L
      </label>
    </div>

  </div>
</div></td>
</tr>
<?php $i++;} ?>
</table>
