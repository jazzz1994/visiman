
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

	<script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
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


  $a = $t = $d = 0;

  $resp    = readrow('parent',array("email"=>$pemail));
  $res_par = mysqli_fetch_assoc($resp);
  $par_name = $res_par['first_name'];
  $ress = readrow('student', array("pemail"=>$pemail));



  $ress1 =readrow('student',array("pemail"=>$pemail));
	$ress2 = readrow('student',array("pemail"=>$pemail));
	$ress3 =readrow('student',array("pemail"=>$pemail));
	$ress4 =readrow('student',array("pemail"=>$pemail));


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
</div>
	<!-- //banner -->

<br>
	<div class="container">
	<ul class="resp-tabs-list">

		<?php
		    while($stu_ress2 = mysqli_fetch_assoc($ress2)){ ?>
							<li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
                 <?php echo $stu_ress2['first_name']." ".$stu_ress2['last_name']; ?>
							</li>
						<?php } ?>
	</ul>

	</div>


	<br>
  <br>


<?php
$i = 1;
while($stu_ress = mysqli_fetch_assoc($ress)) {
   $name    = $stu_ress['first_name']." ".$stu_ress['last_name'];
	 $class   = $stu_ress['class_name'];
	 $reg_id  = $stu_ress['reg_id'];
	 $balance = $stu_ress['bfees'];
	 $total   = $stu_ress['tfees'];

	?>

<div class="container outline">
	<!-- <p>Click on the buttons inside the tabbed menu:</p> -->
		<div class="tab">
		  <button class="tablinks active" onclick="openCity(event, 'profile<?php echo $i;?>')" id="defaultOpen<?php echo $i; ?>" >student Profile</button>
		  <button class="tablinks" onclick="openCity(event, 'attendence<?php echo $i;?>')">Attendence</button>
		  <button class="tablinks" onclick="openCity(event, 'diary<?php echo $i;?>')">Diary</button>
			<button class="tablinks" onclick="openCity(event, 'teacher<?php echo $i;?>')">Teacher Info</button>
			<button class="tablinks" onclick="openCity(event, 'payment<?php echo $i;?>')">Online fees payment</button>
			<!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Teacher In</button> -->
		</div>

		<div id="profile<?php echo $i;?>" class="tabcontent">
        <div class="card stuprofile">
				<img src="images/landing/dummymale.jpg" alt="John" style="width:100%; height:200px;">
			  <h1><?php echo "NIIT";?> </h1>
			  <p class="protitle"><?php echo $name;  ?></p>
			  <p><?php echo "class :".$class ?></p>
			  <!-- <div style="margin: 24px 0;">

			 </div> -->
     </div>
		  <!-- <p>London is the capital city of England.</p> -->
		</div>


		<div id="attendence<?php echo $i;?>" class="tabcontent">
			<table class="table">
			 <thead>
				 <tr>
					 <th scope="col">Date</th>
					 <th scope="col">Status</th>
				 </tr>
			 </thead>

			 <tbody>
					 <?php
					 $date1 = date("Y-m-d",strtotime("-7 days"));
					 $qry2 = "SELECT * FROM stu_attendence WHERE date >='$date1' AND reg_id = '$reg_id' ORDER BY date DESC";
					 $res_attend = mysqli_query($conn,$qry2);

						while($res_ass_attend = mysqli_fetch_assoc($res_attend)){ ?>
				 <tr>
					 <td><?php echo $res_ass_attend['date']; ?></td>
					 <td><?php if($res_ass_attend['status']=="p"){echo "present";}elseif ($res_ass_attend['status']=="l"){echo "leave";}else{echo"Absent";} ?></td>
				 </tr>
				<?php } ?>
			 </tbody>
			</table>
		</div>

		<div id="diary<?php echo $i;?>" class="tabcontent">
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
					 $qry3  = "SELECT sub_name, title, curr_date  FROM dailydairy WHERE class_name = '$class' AND curr_date='$date1' ORDER BY curr_date DESC";
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

		<div id="teacher<?php echo $i;?>" class="tabcontent">
     <?php
          $qry4 = "SELECT * FROM teacher WHERE class_name LIKE '%$class%'";
					$res_teach = mysqli_query($conn,$qry4);

			        while($tea_ass =mysqli_fetch_assoc($res_teach)){ ?>
							<div class="card teaprofile">
							<img src="images/landing/dummymale.jpg" alt="John" style="width:100%; height:200px;">
							<h1><?php echo $tea_ass['sub_name']; ?></h1>
							<p class="protitle"><?php echo $tea_ass['first_name']." ".$tea_ass['last_name']; ?></p>
							<p><?php echo "Assign classes : ".$tea_ass['class_name'] ?></p>
							<div style="margin: 24px 0;">
								<a class="prolink" href="skype:echo123?call"><i class="fa fa-skype"></i></a>&nbsp;
								<a class="prolink" href="mailto:<?php echo $tea_ass['email'];?>"><i class="fa fa-envelope"></i></a>&nbsp;
								<a class="prolink" href="tel:<?php echo $tea_ass['pno'];?>"><i class="fa fa-phone"></i></a>
						 </div>
					 </div>
				 <?php } ?>
		</div>

<?php if($balance > 0 ){?>
		<!-- payment s -->
		<div id="payment<?php echo $i; ?>" class="tabcontent">
		        <form action="checkout.php" method="post">
			 				<!-- <h6></h6> -->
			 				<table class="table">
			 				 <thead>
			 					 <tr>
			 						 <th scope="col">Description</th>
			 						 <th scope="col">Amount</th>
			 					 </tr>
			 				 </thead>

			 				 <tbody>

			 					 <tr>
			 						 <td>Balance due</td>
			 						 <td><?php echo $balance; ?></td>
			 					 </tr>
								 <tr>
			 						 <td>Installment</td>
			 						 <td><?php echo $total/4; ?></td>
			 					 </tr>
								 <tr>
			 						 <td>Net payable Amount</td>
			 						 <td><?php echo $total/4; ?><input type="hidden" name="amount" value="<?php echo $total/4;?>"> <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>"></td>
			 					 </tr>
			 				 </tbody>
			 				</table>
							<button type="submit" class = "btn btn-primary" name="pay" value ="pay">Make Payment Now</button>
		       </form>
		</div>
<!-- payment e -->
<?php } ?>

</div>
<?php $i++;} ?>
<br><br>

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
	<script type="text/javascript" src = "js/landing/custom.js"></script>





</body>

</html>
