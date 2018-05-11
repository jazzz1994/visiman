

    <?php

    include('../common/admin/header.php');
    include('../common/dbConn.php');


      // $attend = readrow('attendence',array("date"=>date(d-m-Y)));
      // while($result = mysqli_fetch_assoc($attend)){
      //
      //
      // }

      $qry = "SELECT * FROM stu_attendence WHERE date ='". date('d-m-Y')."'AND status = 'p'";
      $qry2= "SELECT * FROM stu_attendence WHERE date ='". date('d-m-Y')."'AND status = 'a'";
      $qry3= "SELECT * FROM stu_attendence WHERE date ='". date('d-m-Y')."'AND status = 'l'";
      $attend = mysqli_query($conn,$qry);
      $absent = mysqli_query($conn,$qry2);
      $leave  = mysqli_query($conn,$qry3);
      $res_attend = mysqli_num_rows($attend);
      $res_absent = mysqli_num_rows($absent);
      $res_leave = mysqli_num_rows($leave);




    $dataPoints = array(
    	array("label"=>"Present", "symbol" => "Present","y"=>$res_attend),
    	array("label"=>"leave", "symbol" => "leave","y"=>$res_leave),
    	array("label"=>"Absent", "symbol" => "Absent","y"=>$res_absent),
    	// array("label"=>"Iron", "symbol" => "Fe","y"=>5),
    	// array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
    	// array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
    	// array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
    	// array("label"=>"Others", "symbol" => "Others","y"=>1.5),

    )

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
    	theme: "light2",
    	animationEnabled: true,
    	title: {
    		text: "Student attendence "
    	},
    	data: [{
    		type: "doughnut",
    		indexLabel: "{symbol} - {y}",
    		// yValueFormatString: "#,##0.0\"\"",
    		showInLegend: true,
    		legendText: "{label} : {y}",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();

    }
    </script>
    </head>
      <body class="nav-md">
        <div class="container body">
          <div class="main_container">

              <?php include('../common/admin/leftNavBar.php'); ?>
            <?php include('../common/admin/topNavBar.php'); ?>



      <!-- page content -->
            <div class="right_col" role="main">
              <div class=""><br/>
                <div class="page-title">
                  <div class="title_left">

                  </div>

                  <div class="title_right">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Student Details</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />






          <div id="chartContainer" style="height: 200px; width: 40%;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          <?php include('../common/admin/footer.php'); ?>
    </body>
    </html>
