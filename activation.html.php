<?php 

//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 
$pagetitle = 'Activation';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<!-- Style for password validation section and script-->	

<?php include 'includes/headerfend.inc.html.php'; ?>
<!-- Header -->

<body class="hold-transition login-page">

<!-- Site wrapper -->
<div class="wrapper">
 <br>


  <div class="body" align = "center">
            
<div class="login-box">
  <!-- login-logo -->
		 <hr>
      <span class="clearfix"></span>
                    <img src="assets/dist/img/QrcmLogo.png" style="width:100px; rounded;" align ="center">
					<br>
					<hr>
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="." class="h1"><?php echo $appTitle; ?> <b></b></a>
	<!-- Display message here-->
   <?php include 'dashboard/includes/layouts/messages.php'; ?> 	
   
	   <p align="center" style="font-size:16px; color:red"> 
	   
	   <?php if($error) { echo $error;  } ?></p>
	   
 <?php include'dashboard/includes/layouts/messages.php'; ?>
   <p align="center" style="font-size:16px; color:red"> 
	<?php if (isset($GLOBALS['loginError'])): ?>
	<?php echo html($GLOBALS['loginError']); ?></p>
		<?php endif; ?> 
    </div>
	<em align ="center">Avtivation</em>                  
    <div class="card-body">
	
    	<!-- Sign up activation form begins here-->		  
	<?php 
if(!empty($_SESSION['activ_code_hash']))  
	{  ?>
	
      <section class="py-xl bg-cover bg-size--cover" >
        <span class="mask bg-primary alpha-6"></span>
        <div class="container d-flex align-items-center no-padding">
          <div class="col">
		  	
            <div class="row justify-content-center">
              <div class="col-lg">
                <div class="card bg-info text-white">

                  <div class="card-body" align ="center">
				  <a href="." target="_self"> 
                    <button type="button" class="btn btn-info btn-nobg btn-zoom--hover mb-5">
                     <span class="btn-inner--icon"><i class="fas fa-arrow-left" title ="Back"></i></span> 
                    </button> </a>
                    <span class="clearfix"></span>

                    <h5 class="heading h5 text-black" align ="center">Thank you for Signing Up! </h5>
                   
 
                    <form  class="form-info" method="post" name="signup" action ="?activparam=<?php echo $_SESSION['email']; ?> " >
                      <div class="form-group" align ="center">
                        <input type="text" class="form-control" name ="activate" id="activate" placeholder="Enter the code sent to your email here to activate" required="true">
                      </div>

                     
					  
                      <button type="submit" class="btn btn-block btn-lg bg-white mt-4">Activate</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
	  <!-- Activation section ends here-->
<?php 
	  
	  unset($_SESSION['activ_code_hash']);
	}
	  ?>	  
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <hr> <br>
</div>
<!-- /.signup-box -->
            </div>

          
        </div>
        <!-- /.card-wrapper  -->


<!-- jQuery -->
<?php include 'includes/scriptfend.inc.html.php'; ?>
 
<!--- Scripts ends here --->
</body>


</html>
