<?php 
        error_reporting(0);
       /*
          if(session_status() === PHP_SESSION_NONE)
            {
                session_start();
            }
            */

     
    ?>

<!DOCTYPE htm

<html lang="en">
<!-- Header section -->
<?php include 'includes/headerfend.inc.html.php'; ?>
<!-- Header section end --> 
<body class="hold-transition layout-top-nav">
<div class = "wrapper">
<!-- Controls the social share icon by the left -->
    <div class="sr-sharebar sr-sb-vl sr-sb-left">
		<div class="socializer" data-features="32px,squircle-2,opacity,vertical,bdr-md,bdr-dark,bg-white,pad" data-sites="facebook,twitter,reddit,email,whatsapp,discord,wechat,print,linkedin,instagram,pdf">
        
		</div>
    
    </div>
<!-- controls Scroll to top button -->
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<div class="content-wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="." class="navbar-brand">
        <img src="assets/dist/img/QrcmLogo.png" alt="QRCMaker Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">QRCMaker</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="." class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="?contact_us" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">QRCode</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="?static_qrc" class="dropdown-item">Static </a></li>
              <li><a href="?dynamic_qrc" class="dropdown-item">Dynamic</a></li>

              

            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="far fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="dashboard/"  >
            
            <span class="badge badge-success navbar-badge"><b>Login</b></span>
          </a>

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="?sign_up">
            <i class="far fa-user"></i>
            <span class="badge badge-info navbar-badge"><b>Sign-Up</b></span>
          </a>

        </li>
            
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Quick Response Code <small>Maker 1.0</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=".">Home</a></li>
              <li class="breadcrumb-item active">QRCMaker</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
		  <div class="col-lg-9">    
            <div class="card">
			
              <div class="card-header p-2">
                <h5 class="card-header"><b>Options</b></h5>
				<br>
				<ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#text" data-toggle="tab">Text</a></li>
                  <li class="nav-item"><a class="nav-link" href="#file" data-toggle="tab">File</a></li>
                  <li class="nav-item"><a class="nav-link" href="#link" data-toggle="tab">Link</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
			  
                <div class="tab-content">
		  		               		<!-- DIspalys messages-->
                 <?php include 'dashboard/includes/layouts/messages.php'; 

				 ?> 
				 <p align="center" style="font-size:16px; color:red"> <?php 
				if($error) 
				{
					 echo $error;  
				} ?>
				</p>
			<br>
                   
				<p align="center" > <font color ="red"><?php 
				if( !empty($error) )
				{
					 echo $error;  
				} ?>
				</font></p>
				<p align="center" ><font color ="green"> <?php 
				if( !empty($msgSuccess) )
				{
					 echo $msgSuccess;  
				} ?>
				</font></p>
				<!-- for text input -->
                  <div class=" active tab-pane" id="text">
                    <form class="form-horizontal"name="qrcodeForm" id="qrcodeForm" action="" method="post">
                <input type="hidden" name="action" value="qrcodegentext"/>
                      <div class="form-group row">
                        <label for="QrcinputText" class="col-sm-2 col-form-label">Text</label>
						
                        <div class="col-sm-10">
						
						 <input type="text" class="form-control" placeholder="Title" name="qrcname" value = "<?php echo $qrcname; ?>"id="qrcname"  
				  required data-validation-required-message="Please enter qrc name.">
				  <br>
                          <textarea class="form-control" rows = "5" cols "90" name = "QrcText" id="QrcText" placeholder="Enter QR Code text to display here" required><?php echo $input; ?></textarea>
						  <small class "muted">Scanning the QR code will show this text.</small>
                        </div>
                      </div>

						<input type ="hidden" name ="option" value ="Text" />
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="btnSubmit" class="btn btn-info float-right">Text Generate</button>
                        </div>
                      </div>
					  <div class="alert alert-danger" role="alert" id="responseContainer">
                 
					</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
				  <!-- for file input -->
                  <div class="tab-pane" id="file">
                  <form class="form-horizontal"name="qrcodeForm" id="qrcodeForm" action="" method="post"action = "#file">
                <input type="hidden" name="action" value="qrcodegenfile" required />
                   <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">File </label>
                    <div class="input-group col-sm-10" >
					<input type="text" class="form-control" placeholder="Title" name="qrcname" value = "<?php echo $qrcname; ?>"id="qrcname"  
				  required data-validation-required-message="Please enter qrc name.">
				  <br> &nbsp;
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name = "QrcInput" id="QrcInput" value = "<?php echo $input; ?>" required> 
                        <label class="custom-file-label" for="QrInputFile">Choose file</label>
                      </div>
                   <!--   <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                    </div>
					 <small class "muted"> &nbsp; &nbsp;Scanning the QR code will show the file Name.</small>
                  </div>
				 <input type ="hidden" name ="option" value ="File" />
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="btnSubmit" class="btn btn-success float-right">File Generate</button>
                        </div>
                      </div>
					<div class="alert alert-danger" role="alert" id="responseContainer">
                 
					</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
				  
				  <!-- for url / link input -->
                  <div class="tab-pane" id="link">
                    <form class="form-horizontal"name="qrcodeForm" id="qrcodeForm" action="" method="post">
                <input type="hidden" name="action" value="qrcodegenurl" required />
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
						 <input type="text" class="form-control" placeholder="Title" name="qrcname" value = "<?php echo $qrcname; ?>"id="qrcname"  
				  required data-validation-required-message="Please enter qrc name.">
				  <br>
                          <textarea class="form-control" rows = "5" cols "90" name = "QrcUrl"  id="QrcUrl" placeholder="Enter url to display here (https://...)" required ><?php echo $input; ?></textarea>
						  <small class "muted">Scanning the QR code will show the url entered.</small>
                        </div>
                      </div>
					  <input type ="hidden" name ="option" value ="URL" />
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="btnSubmit" class="btn btn-secondary float-right">Link Generate</button>
                        </div>
                      </div>
					  <div class="alert alert-danger" role="alert" id="responseContainer">
                 
					</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <em>Click the tabs to choose an option to generate your QR Code</em>
                </div>
                <!-- /.tab-content -->
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3">


            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-header"><b>Generated QR Code</b></h5>
				  <br>

				                <!-- Attachment -->
                <div class="attachment-block " align = "center">
<?php
        if(!empty($filename))
        
        {
            echo '<img  width ="200" height = "200" src=" '.$filename.' " alt="Sample QR code">';
            
        } else
        {
            echo '<img  width ="200" height = "200" src="assets/gen-qrcode/6505df99691eb.png" alt="Sample QR code">';
        }
?>
        
                 <!--  <img  width ="150" height = "150" src="<?php //echo $filename; ?>" alt="Sample QR code"> -->
                    <!-- /.Sample QR code -->
                    
                    <!--       <img  width ="150" height = "150" src="assets/gen-qrcode/6505df99691eb.png" alt="Sample QR code"> -->
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->
              <!-- this row will not appear when printing -->

                   <span>
				 <a href="?download=<?php echo $_SESSION['file']; ?>" >  
                  <button type="button" class="btn btn-info float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Download
                  </button>  </a>  </span>
                    <hr>                       

						
        <span>&nbsp;
        <a href="<?php echo $fburl. $baseurl. $filename; ?>" class="facebook" target = "_blank" title = "Share on facebook"><i class="fab fa-facebook"></i></a> 
        <span><a href="<?php echo $twturl. $baseurl. $filename; ?>" class="twitter" target = "_blank" title = "Share on Twitter"><i class="fab fa-twitter"></i></a></span>
        <span><a href="<?php echo $lknurl. $baseurl. $filename; ?>" class="linkedin" target = "_blank"  title = "Share on Linkedin"><i class="fab fa-linkedin"></i></a></span>
        <span><a href="<?php echo $gplus. $baseurl. $filename; ?> " class="google+" target = "_blank" title = "Share on Google+"><i class="fab fa-google-plus"></i></a></span>
        <span><a href="<?php echo $reddit. $baseurl. $filename. "&title =".$qrctitle ; ?>" class="reddit" target = "_blank" title = "Share on Reddit"><i class="fab fa-reddit"></i></a></span>
        <span><a href="<?php echo $whatsapp.$baseurl. $filename; ?>" class="whatsapp" target = "_blank" title = "Share on whathsapp"><i class="fab fa-whatsapp"></i></a></span>
        <span><a href="<?php echo $emailurl .$qrctitle. "&Body=".$baseurl. $filename; ?>" class="email" title="Email"><i class="fa fa-envelope"></i></a></span>

        <span><a href="<?php echo $baseurl. $filename; ?>" class="print-link" title="Print"><i class="fa fa-print"></i></a></span>
        &nbsp;</span>              
              </div> <!-- /.card Primary-card-outline -->
             
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
<!-- Footer start -->
 <?php include 'includes/footerfend.inc.html.php'; ?>
<!-- Footer end -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

  <?php include 'includes/scriptfend.inc.html.php'; ?>

</body>

</html>

