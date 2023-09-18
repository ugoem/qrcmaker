 <?php 
//testing
//session_start();		
//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';		
require_once 'includes/access.inc.php';
include 'includes/sessiontimer.inc.html.php';
$pagetitle = "Dashboard";

	$userid = $_SESSION['userid'];
	
	// Display QR Code list
	$result = mysqli_query($con, "SELECT * FROM tb_dynamic_code WHERE user_id = '$userid' ORDER BY ID DESC LIMIT 6");
	if (!$result)
	{
		$error = 'Error fetching QR Code lists from Record!'. mysqli_error($con);
		include 'error-page.html.php';
		exit();
	}
	while ($row = mysqli_fetch_array($result))
	{
		$qrCodez[] = array(
		'ID' => $row['ID'], 
		'type' => $row['type'], 
		'filename' => $row['file_name'],
		'scancount' => $row['scan_count'],
		'gendate' => $row['gen_date'],
		'status' => $row['qrc_status'],
		'option' => $row['options'],
		'qrcname' => $row['qrc_name']
		);
	}

 
/*   */
?>

<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include 'includes/layouts/headerbend.inc.html.php'; ?>
<!-- Header -->
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height" oncontextmenu="return false;">
<!-- Site wrapper -->
<div class="wrapper">
      <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../assets/dist/img/QrcmLogo.png" alt="QRCMLogo" height="60" width="60">
  </div>
 <!-- Navbar -->
<?php 
	$act_status =  $_SESSION['act_status'];
	if ($act_status == '0' )
		{
			echo "";
		} else 
		{
			include 'includes/layouts/navbend.inc.html.php'; 
		}
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php
	
	$act_status =  $_SESSION['act_status'];
	if ($act_status == '0' )
		{
			echo "";
		} else
		{
			include 'includes/layouts/sidebarbend.inc.html.php'; 
		}			
			
			?>
<!--  Side bar end here-->


<?php 
if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Manager' 
|| $_SESSION['role'] == 'Client' )
{ ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active QR Codes (<?php  
  		
		$sql = mysqli_query($con, "SELECT * FROM tb_dynamic_code WHERE user_id = '$userid' AND qrc_status = 'Active' "); 
		$count = mysqli_num_rows($sql);
			   echo $count; ?>) </h1> 
			</span>
		
		  </div>
		  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=".">Home</a></li>
              <li class="breadcrumb-item active">QR Code</li>
            </ol>
          </div>		 
        </div>                            										   
      </div><!-- /.container-fluid -->
    </section>
<section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2 ">

		  
            <div class="col" align = "left">
                <div class="col-md-8 >
                    <form action="">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search QR Code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
				
		<div class = "col" align = "right">
		  <button align = "right" type="button" class="btn btn-outline-info  "><i class="fa fa-plus"> </i> Create QR Code</button>
		</div>
	</div><!-- /.container-fluid -->
</section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
<?php 
   if($qrCodez == "")
	{
		echo "<p align = 'center'> <font color = 'red'>No record to display here, try add some department data </font> </p>";
	} else 
		{


			foreach ($qrCodez as $qrCode): 

			$cnt++;
?> 
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                
 				
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> <?php echo $qrCode['qrcname']; ?></b></h2>
                      <p class="text-muted text-sm"><b>Option: </b><?php echo $qrCode['option']; ?> 
					  </p>
					<br><b>Date:</b> <?php echo $qrCode['gendate']; ?>
                    <br> <b>Status #:</b> <?php echo $qrCode['status']; ?>
					</div>
                    <div class="col-5 text-center">
                      <img src="../assets/gen-qrcode/<?php echo $qrCode['filename']; ?>" alt="QRC-avatar" class="img-sqaure img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-button"><?php echo $qrCode['type']; ?></i>
                    </a>
                    <a href="?download=<?php echo 'assets/gen-qrcode/'.$qrCode['filename']; ?>" class="btn btn-sm btn-info">
                      <i class="fas fa-download"></i> Download
                    </a>
                  </div>
                </div>
              </div>
            </div>
<?php 

	endforeach; 
}
?>			


          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
        <!--  <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>   -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  <!-- Main Footer -->
<?php 		 

		
     	//<!---- footer for guest is here ---> <br> <br>
		include_once 'includes/layouts/footerbend.inc.html.php';
	//	<!-- ./ end footer for guest is here --->

?>
  </div>
  <!-- /.content-wrapper -->
<?php } ?>

 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include_once 'includes/layouts/scriptbend.inc.html.php'; ?>
<!--- Scripts ends here --->
</body>

</html>
