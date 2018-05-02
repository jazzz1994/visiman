<?php include('../db/crud_fun.php'); ?>
<?php
    $get_class = $_GET['class'];
    $read_stu = readrow('student',array("class_name"=>$get_class));
?>


<table border="2" class="table table-striped jambo_table bulk_action" >
    <tr class="headings">
        <th class="column-title">RegId</th>
        <th class="column-title">Student name</th>
        <th class="column-title">Status</th>
    </tr>




<?php $i=0; $status = array(); while($result = mysqli_fetch_assoc($read_stu)){?>
<tr class="even pointer">
  <td class="column-title"><?php echo $result['reg_id']; ?><input type="hidden" name="reg_id[]" value="<?php echo $result['reg_id']; ?>"></td>
  <td class="column-title"><?php echo $result['first_name'];?><input type="hidden" name="first_name[]" value="<?php echo $result['first_name']; ?>"></td>
  <td class="column-title">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div id="gender" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
        <input name="status[<?echo$i?>]" value="p" data-parsley-multiple="gender" data-parsley-id="12" type="radio">  P
      </label>
      <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
        <input name="status[<?echo$i?>]" value="a" data-parsley-multiple="gender" type="radio"> A
      </label>
    </div>
  </div>
</div></td>
</tr>
<?php $i++;} ?>
</table>
