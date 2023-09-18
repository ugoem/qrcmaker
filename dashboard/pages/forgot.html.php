<?php 

//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 

?>
<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include 'includes/layouts/headerbend.inc.html.php'; ?>
  <script type="text/javascript">
function checkpass()
{
if(document.resetform.newpassword.value!=document.resetform.repeatpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.resetform.repeatpassword.focus();
return false;
}
return true;
} 

</script>
<!-- Header -->

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
    <!-- /.forgot password section -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="." class="h1"> <?php echo $appTitle; ?> <b></b></a>
	   <p align="center" style="font-size:16px; color:red"> <?php if($error) { echo html($error);  } ?></p>
	   
 <?php include'includes/layouts/messages.php'; ?>
<p align="center" style="font-size:16px; color:red"> 
<?php if (isset($GLOBALS['loginError'])): ?>
<?php echo html($GLOBALS['loginError']); ?></p>
<?php endif; ?> 
    </div>
    <div class="card-body">
	
            <p class="login-box-msg">You forgot your password? Here you can easily reset it to a new one.</p>
			
      <form action="?<?php htmlout($action); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Enter Registered Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter Registered Phone number" name="phone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-info btn-block"><?php htmlout($button); ?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1" align = "right"> <strong> Or 
        <a href="./"> <strong> Login</strong></a>
      </p>
	  <hr>
	    <p class="mb-0"> 
        <a base target = "_parent" href=".." class="text-center">Back Home</a>
      </p>
    </div>
    <!-- /.reset-card-body -->
    </div>
    <!-- /.card-primary -->

  </div>
  <!-- /.card -->
  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php include 'includes/layouts/scriptbend.inc.html.php'; ?>
<!--- Scripts ends here --->
</body>


</html>
