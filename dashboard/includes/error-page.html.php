<?php 
 error_reporting(0);
//testing
include 'includes/html-output-helpers.inc.php';

include 'includes/sessiontimer.inc.html.php';
$pagetitle = "500 Error Page";


?>
<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include_once 'includes/layouts/headerbend.inc.html.php'; ?>
<!-- Header -->

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">
   <!-- Navbar -->
<?php include_once 'includes/layouts/navbend.inc.html.php'; ?>
  <!-- /.navbar -->
     <!-- Main Sidebar Container -->
 <?php 

	include_once 'includes/layouts/sidebarbend.inc.html.php'; 
 
	?>
<!--  Side bar end here-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <div class="container-fluid">
	  
        <div class="row mb-2">
          <div class="col-sm-6">
      <font color="0080ff">      <h1><?php echo $pagetitle; ?></h1> </font>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="." base target = "_parent">Home</a></li>
              
              <li class="breadcrumb-item "> <?php  htmlout($pagetitle); ?> </li>
			  
            </ol> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <!-- Content Wrapper. Contains page content -->
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	<br>
	<div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>


   		<p align="center" style="font-size:16px; color:red"> 
			<?php if($error) 
					{ 				
					 //  echo $splitcode;
						echo $error . '<a base target = "_parent" href = "."> Back </a>';
					} ?> 
		  
		</p>
		 <br>
		  <p align="center" style="font-size:16px; color:red"> 
		  <?php 
		  if($error2) 
		  { 
			echo $error2 .'<a base target = "_parent" href = "."> Back </a>';  
		  } ?>
		  
		  </p>
		
	  </div>
    </div>
      <!-- /.error-page -->
		 
  
	
  

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
</div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
<!-- footer is here--> 
<?php include 'includes/layouts/footerbend.inc.html.php'; ?> 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'includes/layouts/scriptbend.inc.html.php'; ?>
<!--- Scripts ends here --->

</body>
</html>
