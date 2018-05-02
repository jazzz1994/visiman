
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Institute an Education Category Bootstrap Responsive Website Template | About :: w3layouts</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Institute Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta Tags -->
	<!-- Style-sheets -->
	<?php include 'common/landing/style.php';
        include 'common/dbConn.php';

	 ?>

  <?php
  include 'db/crud_fun.php';
  if(isset($_SESSION['pemail'])){
    $pemail = $_SESSION['pemail'];
  }else{
    header("location:index.php");
  }


  $resp    = readrow('parent',array("email"=>$pemail));
  $res_par = mysqli_fetch_assoc($resp);
  $par_name = $res_par['first_name'];
  $ress = readrow('student', array("pemail"=>$pemail));
  $ress2 = readrow('student',array("pemail"=>$pemail));
  $ress1 =readrow('student',array("pemail"=>$pemail));
	$ress4 =readrow('student',array("pemail"=>$pemail));

	$tid = array();
  $teacher = array();
	while($stu_res4 = mysqli_fetch_assoc($ress4)){

		$class =  $stu_res4['class_name'];
		$qry4 = "SELECT id FROM teacher WHERE class_name LIKE '%$class%'";
		$res_teach = mysqli_query($conn,$qry4);

        while($tea_ass =mysqli_fetch_assoc($res_teach)){
					$teacher[] = $tea_ass;
				}
	}
foreach ($teacher as $key => $value) {
	   $tid[] = $value['id'];
}
$utid = array_unique($tid);


	// $qry2 = "SELECT * FROM attendence WHERE date>(date-(60*60*24)) AND red_id = $reg_id ORDER BY date DESC";
  // $res_attend = mysqli_query($conn,$qry2);
  // while($res_ass_attend = mysqli_fetch_assoc($res_attend)){
	// 	print_r($res_ass_attend);
	// }

?>
</head>

<body>
	<!-- banner -->
	<div class="banner inner-banner" id="home">
		<div class="container">
			<!-- header -->
			<header>

				<div class="header-bottom-w3layouts">
					<div class="main-w3ls-logo">
						<h1><a href="index.html"><span class="fa fa-check-square-o" aria-hidden="true"></span>Institute</a></h1>
					</div>
					<!-- navigation -->

					<?php include 'common/landing/navigation.php'; ?>


				<div class="clearfix"></div>
				<!-- //navigation -->
			</header>
			<!-- //header -->
		</div>
	</div>
	<!-- //banner -->


	<!--about-->
	<div class="about-section" id="about">
		<div class="container">
			<h5 class="main-w3l-title">student diary</h5>
       <div class="col-md-12 team-right">
		 <?php  while($res_stu = mysqli_fetch_assoc($ress)){?>
			 	<div class="col-md-6 col-sm-6 col-xs-6 team-grid stuinfo">
					<h6><?php echo strtoupper($res_stu['first_name']." (".$res_stu['class_name'].")");?></h6>
					<table>
					 <thead>
					   <tr>
					     <th>Subject</th>
					     <th>Topic covered</th>
					     <th>Date</th>
					   </tr>
					 </thead>

					 <tbody>
					     <?php
							 $date = date("Y-m-d",strtotime("-7 days"));
					     $class =  $res_stu['class_name'];
					     $qry3  = "SELECT sub_name, title, curr_date  FROM dailydairy WHERE class_name = '$class' AND curr_date>'$date' ORDER BY curr_date DESC";
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
	<!--//about-->

<!-- attendence list s -->
	<div class="container">
		<h5 class="main-w3l-title">attendence list</h5>
		<div class="about-top">

		</div>
		 <div class="col-md-12 team-right">
   <?php
    while($res_stu_attend = mysqli_fetch_assoc($ress1)){?>
			<div class="col-md-6 col-sm-6 col-xs-6 team-grid stuinfo">
				<h6><?php echo strtoupper($res_stu_attend['first_name']) ?>  weekly Attendence</h6>
				<table>
				 <thead>
					 <tr>
						 <th>Date</th>
						 <th>Status</th>
					 </tr>
				 </thead>

				 <tbody>
						 <?php
						 $reg_id =  $res_stu_attend['reg_id'];
						 $qry2 = "SELECT * FROM attendence WHERE date >'$date' AND reg_id = '$reg_id' ORDER BY date DESC";
					   $res_attend = mysqli_query($conn,$qry2);
					   // while($res_ass_attend = mysqli_fetch_assoc($res_attend)){
					 	// 	print_r($res_ass_attend);
					 	// }
							while($res_ass_attend = mysqli_fetch_assoc($res_attend)){ ?>
					 <tr>
						 <td><?php echo $res_ass_attend['date']; ?></td>
						 <td><?php echo $res_ass_attend['status'] ?></td>
					 </tr>
					<?php } ?>
				 </tbody>
				</table>
			</div>
	<?php } ?>
	</div>
</div>
<!-- Attendence List e-->



	<!-- Teacher List s-->
	<div class="team-section" id="team">
		<div class="container">
			<h5 class="main-w3l-title">Student Trainers</h5>


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
 		 						</ul>
 		 					</div>
 		 					<div class="clearfix"> </div>
 		 				</div>

 			<?php }
 		}
				?>


		</div>
	</div>
	<!--// Team -->
	<!-- Footer -->
	<div class="footer-agileits-w3layouts">
		<div class="container">
			<div class="btm-logo-w3ls">
				<h2><a href="index.html"><span class="fa fa-check-square-o" aria-hidden="true"></span>Institute</a></h2>
			</div>
			<div class="subscribe-w3ls">
				<h6>Let us inform you about everything important directly.</h6>
				<form action="#" method="post">
					<div class="col-md-8 col-sm-8 col-xs-8 input-flds-w3-agile">
						<input type="email" name="Email" placeholder="Email" required="">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 input-flds-w3-agile">
						<input type="submit" value="Subscribe">
					</div>
					<div class="clearfix"> </div>
				</form>
			</div>
			<div class="social-icons-agileits">
				<ul>
					<li><a href="#"><span class="fa fa-facebook"></span></a></li>
					<li><a href="#"><span class="fa fa-twitter"></span></a></li>
					<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
				</ul>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="copyright-w3layouts">
		<div class="container">
			<p>&copy; 2018 Institute . All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts </a></p>
		</div>
	</div>
	<!-- //Footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
	<!-- forms s-->

	<?php include "common/landing/forms.php" ?>
	<!-- forms e-->

	<script type='text/javascript' src='js/landing/jquery-2.2.3.min.js'></script>

	<!--search-bar-->
	<script src="js/landing/main.js"></script>
	<!--//search-bar-->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/landing/move-top.js"></script>
	<script type="text/javascript" src="js/landing/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!--js for bootstrap working-->
	<script src="js/landing/bootstrap.js"></script>
	<!-- //for bootstrap working -->
</body>

</html>
