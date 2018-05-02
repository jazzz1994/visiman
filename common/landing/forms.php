

<!-- Modal3 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="signin-form profile">
          <h3 class="register-title">Register</h3>
          <div class="login-form">
            <form action="common/landing/validate.php" method="post">

              <div class="fields-main">
                <div class="fields">
                  <input type="text" name="first_name" placeholder="first_name" required="">
                </div>
                <div class="fields">
                  <input type="text" name="last_name" placeholder="last_name" required="">
                </div>
              </div>
             <div class="fields-main">
              <div class="fields">
                <input type="text" name="reg_id" placeholder="student registeration ID" required="">
              </div>
              <div class="fields">
                <input type="text" name="phone_no" placeholder="phone number" required="">
              </div>
            </div>
              <div class="fields">
                <textarea name="address" placeholder="address" rows="2" cols="30"></textarea>
              </div>
              <div class="fields">
                <input type="email" name="email" placeholder="Email ID" required="">
              </div>

              <div class="fields">
                <input type="password" name="password1" placeholder="password" required="">
              </div>
              <div class="fields">
                <input type="password" name="password2" placeholder="re-enter password" required="">
              </div>

              <input type="submit" name="signup" value="signup">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- //Modal3 -->

<!-- modal 2 s-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="signin-form profile">
          <h3 class="register-title">login</h3>
          <div class="login-form">
            <form action="common/landing/validate.php" method="post">

                <div class="fields">
                  <input type="email" name="email" placeholder="Email" required="">
                </div>
                <div class="fields">
                  <input type="password" name="password" placeholder="Password" required="">
                </div>
               <input type="submit" name="login" value="login">
            </form>
<!-- modal 2 e-->
