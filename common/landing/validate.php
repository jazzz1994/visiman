<?php

include "../dbConn.php";
include "../../db/crud_fun.php";



if(isset($_POST['login']) && $_POST['login']=='login'){

   $user_email = $_POST['email'];
   $user_pass  = md5($_POST['password']);
   $check_parent = "select * from parent where email = '$user_email' AND password='$user_pass'";
   $parent_exe = mysqli_query($conn ,$check_parent);

   if($parent_exe){
           if(mysqli_num_rows($parent_exe)){
             session_start();
             $_SESSION['pemail']=$user_email;
             echo "<script type='text/javascript'>window.open('../../parentlanding.php','_self')</script>";

          }else{

            echo "<script type='text/javascript'>window.open('../../index.php','_self')</script>";
          }

   }

}




if(isset($_POST['signup']) && $_POST['signup']=='signup'){

  $first_name = $_POST["first_name"];
  $last_name  = $_POST["last_name"];
  $reg_id     = $_POST["reg_id"];
  $phone_no   = $_POST["phone_no"];
  $address    = $_POST["address"];
  $email      = $_POST["email"];
  $password1   = $_POST["password1"];
  $password2   = $_POST["password1"];

  $res_mail = readrow('parent',array("email"=>$email));
  $rowcount = mysqli_num_rows($res_mail);
  if($rowcount>0 || $password1 != $password2){
       $msg = "Error";
       echo "<script type='text/javascript'>window.alert('user already registered with this account')</script>";
       echo "<script type='text/javascript'>window.open('../../index.php','_self')</script>";
  }
  else{
      $msg = "Success";
      $arr = array(
        "first_name"=>$first_name,
        "last_name"=>$last_name,
        "reg_id"=>$reg_id,
        "phone_no"=>$phone_no,
        "address"=>$address,
        "email"=>$email,
        "password"=>md5($password1)
      );

       insert('parent', $arr);
       echo "<script type='text/javascript'>window.alert('sucessfully registered')</script>";
       echo "<script type='text/javascript'>window.open('../../index.php','_self')</script>";


  }


  $mailmsg =  mailFormat($first_name.' '.$last_name);
  // echo $mailmsg;



}
 ?>
