<?php include('../db/crud_fun.php'); ?>
<?php include('../common/dbConn.php');
$get_class = $_GET['class'];
$get_date  = $_GET['date'];

   $qry  = "SELECT * FROM dailydairy  WHERE class_name = '$get_class' AND curr_date ='$get_date'";
   $res_q = mysqli_query($conn,$qry);



?>


<table border="2" class="table table-striped jambo_table bulk_action" >
    <tr class="headings">
        <th class="column-title">sno</th>
        <th class="column-title">Subject</th>
        <th class="column-title">Topic Covered</th>
    </tr>




<?php $i=1;  while($res_attend = mysqli_fetch_assoc($res_q)){?>
<tr class="even pointer">
  <td class="column-title"><?php echo $i; ?></td>
  <td class="column-title"><?php echo $res_attend['sub_name']; ?></td>
  <td class="column-title"><?php echo $res_attend['title']; ?></td>
</tr>
<?php $i++;} ?>
</table>
