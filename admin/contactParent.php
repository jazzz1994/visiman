<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

include ('../common/admin/header.php');
include ('../common/dbConn.php');
require ('../vendors/sms/textlocal.class.php');

if(!isset($_SESSION['aemail']) && !isset($_SESSION['temail'])){
  header("location:login.php");
}
?>

<title>contact parent</title>
<?php
    if(isset($_POST['submit']) && $_POST['submit'] =='sendmessage'){


      $phone_list = array();
      $email_list = array();
      if(isset($_POST['parent'])){
       foreach($_POST['parent'] as $key => $value) {
         $con_detail = explode('-',$value);
         array_push($phone_list,$con_detail[0]);
         array_push($email_list,$con_detail[1]);
       }

      }

    $email_list_str = "'".implode("','",$email_list)."'";

// sending sms s
//       $textlocal = new Textlocal(false, false, '9l3pBQcnpc0-VMUe73Bm66b3fG74B3p356fE9WOjfU');
//
//       $numbers = $phone_list;
//       $sender = 'TXTLCL';
//       $message = $_POST['message'];
//
//       try {
//           $result = $textlocal->sendSms($numbers, $message, $sender);
//       } catch (Exception $e) {
//           die('Error: ' . $e->getMessage());
//       }
// // sending sms e




$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'phpbtes0101@gmail.com';                 // SMTP username
    $mail->Password = 'phpbtes2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('phpbtes0101@gmail.com', 'phpbtes');
    // $mail->addAddress('jazzz1994aps@gmail.com','subject'); // Add a recipient

    foreach ($email_list as $key => $value) {
      $mail->addAddress($value);  // Name is optional
    }
    $mail->addReplyTo('phpbtes0101@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "<b>".$_POST['message']."</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

    }
 ?>


<?php

  $class_res =  readAll('class');

  $qry = "SELECT parent.first_name AS pname, parent.email, parent.address , parent.phone_no, student.first_name AS sname FROM parent INNER JOIN student ON parent.email = student.pemail";
  $stu_par = mysqli_query($conn,$qry);

  // $read_par     = readAll('parent');
  // $get_row_count = mysqli_num_rows($read_par);
?>


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
              <h3></h3>
            </div>

            <div class="title_right">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Students<small>list of all the parents</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <form   method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <!-- class dropdown s -->
                                          <div class="form-group" >
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_name">search class<span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="class_name" class="form-control"  name="class_name">
                                                  <option value="">select</option>
                                                 <?php
                                                 while($result_class = mysqli_fetch_assoc($class_res)){
                                                      $classname=$result_class['class_name']; ?>
                                                      <option value='<?php echo $classname;?>'> <?php echo $classname;?> </option>
                                                 <?php }

                                                 ?>
                                                </select>
                                              </div>
                                          </div>
                            <!-- class dropdown e -->

                  <div class="table-responsive">
                    <table border="2" id = "contact_list" class="table table-striped jambo_table bulk_action">

                        <tr class="headings">
                          <th> <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" id = "firstCheck" onclick = "check();" aria-label="Checkbox for following text input">
                                  </div>
                                </div>
                          </th>
                            <th class="column-title">ID</th>
                            <th class="column-title">Student Name</th>
                            <th class="column-title">Parent Name</th>
                            <th class="column-title">Parent Phone no.</th>
                            <th class="column-title">Parent Address</th>
                            <th class="column-title">Email</th>
                        </tr>


                  <?php
                    $i=1;
                      while($result = mysqli_fetch_assoc($stu_par)){
                        $student_name   = $result["sname"];
                        $parent_name    = $result["pname"];
                        $phone_no       = $result["phone_no"];
                        $address        = $result["address"];
                        $email          = $result["email"];
                      ?>


                    <tr class="even pointer">
                       <td> <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" value = "<?php echo $phone_no.'-'.$email;?>" name = "parent[]"  aria-label="Checkbox for following text input">
                              </div>
                            </div>
                      </td>
                      <td> <?php echo $i; ?>  </td>
                      <td> <?php echo ucfirst($student_name); ?> </td>
                      <td> <?php echo ucfirst($parent_name); ?> </td>
                      <td> <?php echo $phone_no;  ?>  </td>
                      <td> <?php echo $address; ?>  </td>
                      <td> <?php echo $email; ?>  </td>


                      <!-- <td> <i class="fa fa-comments"></i> | <i class="fa fa-phone"></i></td> -->
                  </tr>
                    <?php $i++; }?>
              </table>
            </div>

            <!-- title s-->
                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">write message here </label>
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                       <textarea name="message" rows="4" cols="50" class='form-control col-md-7 col-xs-12' ></textarea>
                                   </div>
                                  </div>
            <!-- title e -->

            <!-- buttons s -->
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type='submit' class='col-md-7 col-xs-12 btn btn-success'  name='submit' value='sendmessage'>
                                      </div>
                                  </div>

            <!-- buttons e -->




         </form>





               </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      </div>
  </div>


<?php include('../common/admin/footer.php'); ?>
<script src = "../ajax/admin/ajxContact.js"></script>


</body>
