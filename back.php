<!-- profile s -->
<div id="profile">
<div class="container">

				<?php
				while($profile = mysqli_fetch_assoc($ress3)){ ?>
			<div class="card stuprofile">
				<img src="images/landing/dummymale.jpg" alt="John" style="width:100%; height:200px;">
			  <h1></h1>
			  <p class="protitle"><?php echo $profile['first_name']." ".$profile['last_name'] ?></p>
			  <p><?php echo "class :".$profile['class_name']; ?></p>
			  <div style="margin: 24px 0;">
			 </div>

			</div>
			<?php } ?>
</div>
</div>
<!-- profile e -->




<!-- diary s -->
		<div id="diary">
		<div class="container">
			<!-- <h5 class="main-w3l-title">student diary</h5> -->
       <div class="col-md-12">
		 <?php  while($res_stu = mysqli_fetch_assoc($ress)){?>
			 	<div class="col-md-6 col-sm-12 col-xs-12  stuinfo">
					<h6><?php echo strtoupper($res_stu['first_name']." daily diary");?></h6>
					<table class="table">
					 <thead>
					   <tr>
					     <th scope="col">Subject</th>
					     <th scope="col">Topic covered</th>
					     <th scope="col">Date</th>
					   </tr>
					 </thead>

					 <tbody>
					     <?php
							 $date1 = date("Y-m-d");
							 $date = date("Y-m-d",strtotime("-7 days"));
					     $class =  $res_stu['class_name'];
					     $qry3  = "SELECT sub_name, title, curr_date  FROM dailydairy WHERE class_name = '$class' AND curr_date>'$date1' ORDER BY curr_date DESC";
               $diary = mysqli_query($conn,$qry3);
							  // readrow('dailydairy',array("class_name"=>$class));
					      while($res_diary = mysqli_fetch_assoc($diary)){ ?>
					   <tr>
               <td><?php echo $res_diary['sub_name']; ?></td>
					     <td><?php echo $res_diary['title'] ?></td>
					     <td><?php echo $res_diary['curr_date'] ?></td>
						 </tr>
					  <?php } ?>
					 </tbody>
					</table>
				</div>
    <?php } ?>
</div>
</div>
</div>
<!-- diary e -->








<!-- attendence list s -->
<div id="attendence">
	<div class="container">
		<!-- <h5 class="main-w3l-title">attendence list</h5> -->
		 <div class="col-md-12">
   <?php
    while($res_stu_attend = mysqli_fetch_assoc($ress1)){?>
			<div class="col-md-12 col-sm-12 col-xs-12 stuinfo">
				<h6><?php echo strtoupper($res_stu_attend['first_name']) ?>  weekly Attendence</h6>
				<table class="table">
				 <thead>
					 <tr>
						 <th scope="col">Date</th>
						 <th scope="col">Status</th>
					 </tr>
				 </thead>

				 <tbody>
						 <?php
						 $reg_id =  $res_stu_attend['reg_id'];
						 $qry2 = "SELECT * FROM stu_attendence WHERE date >'$date' AND reg_id = '$reg_id' ORDER BY date DESC";
					   $res_attend = mysqli_query($conn,$qry2);

							while($res_ass_attend = mysqli_fetch_assoc($res_attend)){ ?>
					 <tr>
						 <td><?php echo $res_ass_attend['date']; ?></td>
						 <td><?php if($res_ass_attend['status']=="p"){echo "present";}else{echo"Absent";} ?></td>
					 </tr>
					<?php } ?>
				 </tbody>
				</table>
			</div>
	<?php } ?>
	</div>
</div>
</div>
<!-- Attendence List e-->






<!-- payment s -->
<div id="payment">
		<div class="container">
			 <div class="col-md-12">
<form class="" action="checkout.php" method="post">
				 <div class="payinfo">
	 				<h6></h6>
	 				<table class="table">
	 				 <thead>
	 					 <tr>
	 						 <th scope="col">Description</th>
	 						 <th scope="col">Amount</th>
	 					 </tr>
	 				 </thead>

	 				 <tbody>

	 					 <tr>
	 						 <td>fees</td>
	 						 <td>Rs. 200</td>
	 					 </tr>
	 				 </tbody>
	 				</table>
	 			</div>
</form>

		</div>
		</div>
</div>
<!-- payment e -->


<!-- Teacher List s-->
<div id="teacher">
	 <div class="team-section" id="team">
		<div class="container">
			<!-- <h5 class="main-w3l-title">Student Trainers</h5> -->


			<div class="col-md-12 team-right">

				<?php
				foreach ($utid as $key => $value) {
					  $qry5 = "SELECT * FROM teacher WHERE id = '$value'";
						$res_teach = mysqli_query($conn,$qry5);
						while($teacher = mysqli_fetch_assoc($res_teach)){?>


 						 <div class="col-md-6 col-sm-6 col-xs-6 team-grid">
 		 					<img class="team-img img-responsive" <?php if($teacher['gender']=='f'){?>src="images/landing/dumfem.jpg"<?php } else{ ?> src="images/landing/dummymale.jpg"<?php } ?>alt="">
 		 					<h6><?php echo $teacher['first_name']." ( ".$teacher['class_name']." ) ";?></h6>
 		 					<div class="social-icons-agileits">
 		 						<ul>
 		 							<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
									<li>
										<div id="SkypeButton_Call_skype_1">
										 <script type="text/javascript">
										  Skype.ui({
										 "name": "call",
										 "element": "SkypeButton_Call_skype_1",
										 "participants": ["skype"],
										 "imageColor": "white",
										 "imageSize": 32
										 });
										 </script>
										</div>
									</li>
									<li><a href="callto://15555551212" title="Call Me"><i class="fa fa-phone fa-2x"></i></a></li>
 		 						</ul>
 		 					</div>
						<!-- </li> -->
 		 					<div class="clearfix"> </div>
 		 				</div>

 			<?php }
 		}
				?>


		</div>
	</div>
</div>
</div>
</div>
	<!--// Team -->
