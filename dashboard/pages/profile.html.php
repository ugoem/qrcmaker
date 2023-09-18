<?php 
session_start();
// include file with ref to document root ( with this, PHP keep track of the document root of the web server.)
//include $_SERVER['DOCUMENT_ROOT'].'includes/appConfig.inc.php';
// Normal Include with higher version of php 6 and abobe
include 'includes/sessiontimer.inc.html.php';
//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 

	//stripslashes() ucfirst() trim() strtoupper() strtolower() //some string manipulation functions. 
$year = date('Y');

$pagetitle = "My Profile";

if ($_SESSION['role'] == 'Administrator'|| $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Client' || $_SESSION['role'] == 'Guest') 
{ 

	

?>

<!DOCTYPE html>
<html>

<!-- Header -->
<?php include 'includes/layouts/headerbend.inc.html.php'; ?>
<!-- Header -->

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<!-- Site wrapper -->
<div class="wrapper">


 <!-- Navbar -->
<?php include 'includes/layouts/navbend.inc.html.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include  'includes/layouts/sidebarbend.inc.html.php'; ?>
 
<!--  Side bar end here-->
<!--<p align="center">testing</p> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <div class="container-fluid">
	  
        <div class="row mb-2">
          <div class="col-sm-6">
		<font color="0080ff">  <h1><?php echo $pagetitle; ?></h1> </font>
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

    <!-- Main content -->
    <section class="content">
      
        <div class="row">
          <div class="col-12 col-sm-8 col-lg-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
		<!-- DIspalys messages-->
<?php include 'includes/layouts/messages.php'; ?>  

                
<h2 class="card-title"><?php  htmlout($pagetitle); ?></h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse/Expand">
                    <i class="fas fa-minus"></i></button>
              <!--    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button> -->
                </div>             
			 </div>
             <div class="card-body">
		   <div class="row">	  
	 
	 <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="assets/profile-images/<?php echo $_SESSION['profile_picture'];?>"
                       alt="User profile picture" >
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION['email']; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
	
              <!-- About Me Box -->
            <div class="card card-info">
            <!--  <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>       -->
              <!-- /.card-header -->
              <div class="card-body">
	<?php if ($_SESSION['role'] == 'Client')
		{
			echo "";
		} else 
		{
			?>
               <strong><i class="fas fa-book mr-1"></i> Department</strong>

                <p class="text-muted">
            <?php echo $dept; ?>
                </p>

                <hr>

           <!--     <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">My Address</p>    

                <hr>            -->

                <strong><i class="fas fa-pencil-alt mr-1"></i> Position</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">
				  <?php echo $position; ?>
				  
				  </span>
               <!--   <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">.</span>  -->
                </p>   
<?php 	} ?>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Phone</strong>

                <p class="text-muted">  <?php echo $_SESSION['phone'] ; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		</div>
          <!-- /.col -->	
	<div class="col-md-8">
	            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="assets/profile-images/<?php echo $_SESSION['profile_picture'];?>" alt="user image">
                        <span class="username">
                          <a href="#">.</a>
                        <!--  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>  -->
                        </span>
                        <span class="description"></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                       Coming soon
                      </p>

                    <!--  <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">   -->
                    </div>
                    <!-- /.post -->

                   

                   
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method = "post" name = "profileform" class="form-horizontal" action="?changepass" onSubmit="return checkpass();">
					   <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="oldpass" placeholder="Old Password" name="oldpass" required="true">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="newpass" placeholder="New Password" name="newpass" required="true">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="repeatpassword" class="col-sm-2 col-form-label">Repeat New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="rnewpass" placeholder="Repeat New Password" name="rnewpass" required="true">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" value = "<?php echo $_SESSION['email']; ?>" class="form-control" id="email" placeholder="email" readonly required="true" name = "email">
                        </div>
                      </div>
                  
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text"  value = "<?php echo $_SESSION['phone']; ?>" class="form-control" id="phone" name = "phone" placeholder="Phone" required="true">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required="true"> I agree to the <a href="#"base target "_parent" data-toggle="modal" data-target="#modal-privacy" >Privacy Policy</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
	</div>
	 </div> <!--/row -->
			  </div>
                       <!-- /.card-body amin  -->
              <div class="card-footer">
    
	 <!-- <p><a href="#">Admin Home</a></p> -->
	

              </div>
              <!-- /.card-footer-->


        <!-- /.card -->
			  
            </div>
            <!-- /.card -->

  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- row main-->
	  <!---- footer is here --->
<?php include 'includes/layouts/footerbend.inc.html.php'; ?>

<!---- footer end here ---> 
   </section>
   <!-- section content  -->

 	 <?php 
	} else 
	{
		$error2 = "Error! You are not authorized to be here. ";
			include 'error-page.html.php';

			exit();
	}
		?>

     <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

</div><!-- /.container-fluid -->
 


<!-- jQuery -->
<?php include 'includes/layouts/scriptbend.inc.html.php'; ?>
<!--- Scripts ends here ---> 

</body>

</html>

