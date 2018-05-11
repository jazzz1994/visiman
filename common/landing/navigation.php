<nav class="navbar navbar-default">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
        aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <!-- <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="icons.html">Web Icons</a></li>
          <li><a href="typography.html">Typography</a></li>
        </ul>
      </li> -->
      <li><a href="contact.php">Contact</a></li>


      <?php if(isset($_SESSION['pemail'])){?>
        <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="fa fa-user"></span>&nbsp;&nbsp;<?php if(isset($res_par['first_name'])){echo $res_par['first_name'];} ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="parentlanding.php">your</a></li>
            <li><a href="editparent.php">Edit profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      <?php } ?>
      <?php if(!isset($_SESSION['pemail'])) {?>
      <li><a href="#" data-toggle="modal" data-target="#myModal3">Register</a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal2">Login</a></li>
      <?php } ?>
    </ul>

  </div>
  <!-- /.navbar-collapse -->

</nav>
