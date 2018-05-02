<?php
session_start();
if(isset($_SESSION['temail']) || isset($_SESSION['aemail'])){
  header("location:listStudent.php");
}


include '../common/dbConn.php' ;


if(isset($_POST['login']) && $_POST['login']=='login'){

   $role = $_POST['role'];

   if($role =='teacher'){
     $user_email = $_POST['email'];
     $user_pass  = md5($_POST['password']);
     $check_teach = "select * from teacher where email = '$user_email' AND password='$user_pass'";
     $teach_exe = mysqli_query($conn ,$check_teach);
     if(mysqli_num_rows($teach_exe)){

           $tres=mysqli_fetch_array($teach_exe,MYSQLI_ASSOC);
           $_SESSION['temail']=$user_email;
           $_SESSION['tname'] =$tres['first_name'];
           echo "<script type='text/javascript'>window.open('listStudent.php','_self')</script>";
        }

   }

   if($role=='admin'){
     $user_email = $_POST['email'];
     $user_pass  = md5($_POST['password']);
     $check_admin = "select * from admin where email = '$user_email' AND password='$user_pass'";
     $admin_exe = mysqli_query($conn ,$check_admin);
     if(mysqli_num_rows($admin_exe)){
           $ares=mysqli_fetch_array($admin_exe,MYSQLI_ASSOC);
           $_SESSION['aemail']=$user_email;
           $_SESSION['aname'] =$ares['name'];
           echo "<script type='text/javascript'>window.open('listStudent.php','_self')</script>";
        }

   }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>  </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!-- <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a> -->

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Login Form</h1>
              <div>
                <select class="form-control" name="role" required placeholder="select your role">
                    <option value="teacher">teacher</option>
                    <option value="admin">admin</option>
                </select>
              </div>
              <br><br>
              <div>
                <input type="email" class="form-control" name="email" placeholder="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" name="login" value="login">submit</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                </div>
              </div>
            </form> -->
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
