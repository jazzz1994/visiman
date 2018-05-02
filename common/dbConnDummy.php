<!DOCTYPE html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "edl";

// Create connection
$conn = mysqli_connect($host, $username, $password, $db)
        or die("Error Connecting to Database");
// // Check connection
// if ($conn) {
//     die("Connected Successfully");
// } 
// echo "Connection Failed";
$getbatch_sql ="SELECT * FROM batch_details";
$getbatch_exe = mysqli_query($conn,$getbatch_sql);
//Row Count
$get_row_count = mysqli_num_rows($getbatch_exe);

 
?> 

<div id="container_demo" >
	<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="register" class="animate form">
			<h1>Batch Listing  (<?php echo $get_row_count;?>) </h1> 
			<!--<table border=2>
			<tr>
				<th>ID</th>
				<th>Category name</th>
				<th>Category Desc</th>
				<th>Action</th>
			</tr>-->
			<select name='trainer'>
			<?php 
			$i=1;
			while($result = mysqli_fetch_assoc($getbatch_exe)){ 
			
			$batchcode = $result['batch_code'];
			$trainer_name = $result['trainer_name'];
			$batch_sdate=  $result['batch_start_date'];
			//echo '<pre>'; print_r($result);?>
			<option value='<?php echo $batchcode;?>'><?php echo $trainer_name;?></option>
				<!-- <tr>
					<td><?php //echo $i;?></td>
					<td><?php //echo $cat_name;?></td>
					<td><?php //echo $catDesc ;?></td>
					<td><a href='form.php?cid=<?php //echo $cid ;?>'>Edit</a> | <a href='form.php?cid=<?php //echo $cid;?>'>Delete</a></td>
				 </tr>-->
			<?php $i++; }
?>
			</select>			
				 
		</div>
	</div>
</div>  