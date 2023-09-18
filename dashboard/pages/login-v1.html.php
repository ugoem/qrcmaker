<?php 

//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 
$pagetitle = 'Login';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include 'includes/layouts/headerbend.inc.html.php'; ?>
<!-- Header -->

<body class="hold-transition login-page">
  <span class="clearfix"></span>
                    <img src="../assets/dist/img/QrcmLogo.png" style="width:100px; rounded;" align ="center">
					<br>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="." class="h1"><?php echo $appTitle; ?> <b>Login</b></a>
	<!-- Display message here-->  
	   <p align="center" style="font-size:16px; color:red"> 
	   
	   <?php if($error) { echo html($error);  } ?></p>
	   
 <?php include'includes/layouts/messages.php'; ?>
   <p align="center" style="font-size:16px; color:red"> 
	<?php if (isset($GLOBALS['loginError'])): ?>
	<?php echo html($GLOBALS['loginError']); ?></p>
		<?php endif; ?> 
    </div>
	                  
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value = "<?php echo $email; ?>"id="email"  
		  required data-validation-required-message="Please enter email address.">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value = "<?php echo $password; ?>" maxlength="8" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" required>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
		  <input type="hidden" name="action" value="login"/>
 <button type="submit" class="btn btn-info" ><i class="ft-user"></i> Log in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a base target = "_parent" href="?forgot">I forgot my password</a>
      </p>
       <p class="mb-0"> 
        <a base target = "_parent" href=".." class="text-center">Back Home</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php include 'includes/layouts/scriptbend.inc.html.php'; ?>
<!--- Scripts ends here --->
</body>


</html>
