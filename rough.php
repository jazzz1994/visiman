
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
	<!-- //Meta Tags -->
	<!-- Style-sheets -->
	<?php include 'common/landing/style.php';
        include 'common/dbConn.php';

	 ?>


<style media="screen">
li:active{
  color: blue;
}
ul.nav-pills {
    top: 20px;
    position: fixed;
}
@media screen and (max-width: 810px) {
    #section1, #section2, #section3, #section41, #section42  {
        margin-left: 150px;
    }
  }
</style>



</head>


<body>




<div class="container">
  <div data-spy="scroll" data-target="#myScrollspy" data-offset="20">
  <div class="row">
    <nav class="col-sm-3" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Section 1</a></li>
        <li><a href="#section2">Section 2</a></li>
        <li><a href="#section3">Section 3</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#section41">Section 4-1</a></li>
            <li><a href="#section42">Section 4-2</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="col-sm-9">
      <div id="section1">
        <h1>Section 1</h1>
        <p>Try to scroll this section and look <br><br><br><br><br><br>  at the navigation list while scrolling!</p>
      </div>
      <div id="section2">
        <h1>Section 2</h1>
        <p>Try to scroll this section and look at the navigation <br><br><br><br><br><br><br><br><br>list while scrolling!</p>
      </div>
      <div id="section3">
        <h1>Section 3</h1>
        <p>Try to scroll this section and look at the <br><br><br><br><br><br><br><br><br><br><br>navigation list while scrolling!</p>
      </div>
      <div id="section41">
        <h1>Section 4-1</h1>
        <p>Try to scroll this section and look at <br><br><br><br><br><br><br><br><br><br>the navigation list while scrolling!</p>
      </div>
      <div id="section42">
        <h1>Section 4-2</h1>
        <p>Try to scroll this section and look at <br><br><br><br><br><br><br><br><br><br><br><br><br>the navigation list while scrolling!</p>
      </div>
    </div>
  </div>
</div>


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
