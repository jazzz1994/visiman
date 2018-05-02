


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
         include 'db/crud_fun.php';

 	 ?>

   <?php


   if(isset($_SESSION['pemail'])){
     $pemail = $_SESSION['pemail'];
   }else{
     header("location:index.php");
   }


   $parent = readrow('parent',array("email"=>$pemail));
   $result  = mysqli_fetch_assoc($parent);
  //  print_r($result);

   if(isset($_POST['update']) && $_POST['update']=='update'){

    $fist_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $reg_id    = $_POST['reg_id'];
    $phone_no  = $_POST['phone_no'];
    $address   = $_POST['address'];
    $email     = $_POST['email'];

    $qry =  "UPDATE parent SET first_name='$fist_name',last_name='$last_name',reg_id='$reg_id',phone_no='$phone_no',address='$address',email='$email' WHERE email = '$email'";
    mysqli_query($conn,$qry);
   }


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
 			<h5 class="main-w3l-title">Edit details</h5>

      <!-- <div class="modal fade" id="myModal3" tabindex="-1" role="dialog"> -->
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <div class="signin-form profile">
                <h3 class="register-title"><?php echo $result['first_name'] ?></h3>
                <div class="login-form">
                  <form  method="post">

                    <div class="fields-main">
                      <div class="fields">
                        <input type="text" value="<?php echo $result['first_name']; ?>" name="first_name" placeholder="first_name" required="">
                      </div>
                      <div class="fields">
                        <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" placeholder="last_name" required="">
                      </div>
                    </div>
                   <div class="fields-main">
                    <div class="fields">
                      <input type="text" name="reg_id" value="<?php echo $result['reg_id']; ?>" placeholder="student registeration ID" required="">
                    </div>
                    <div class="fields">
                      <input type="text" name="phone_no" value="<?php echo $result['phone_no']; ?>" placeholder="phone number" required="">
                    </div>
                  </div>
                    <div class="fields">
                      <textarea name="address"  placeholder="address" rows="2" cols="30"><?php echo $result['address']; ?></textarea>
                    </div>
                    <div class="fields">
                      <input type="email" name="email" value="<?php echo $result['email']; ?>" placeholder="Email ID" required="">
                    </div>

                    <input type="submit" name="update" value="update">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->



 		</div>
 	</div>
 	<!--//about-->






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
