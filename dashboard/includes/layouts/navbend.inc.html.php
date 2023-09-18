<?php 
//


date_default_timezone_set("Africa/Lagos");
?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" title="Menu"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="." class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?contact_us" class="nav-link">Contact</a>
      </li>
    </ul>
&nbsp;<font color="green" size="2.5"><strong> <?php echo "&nbsp;". date("h:i:s A");?></strong>
</font>&nbsp; <!--<span ><b>Role: &nbsp;</b> <?php // echo $_SESSION['role']; ?> </span> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	 <!--   <a href="?lockscreen" base target = "_parent" title = "Lock Screen">
        <i class="fas fa-lock mr-2"></i> 
         </a> -->
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search" title = "Explore Documents"></i>
        </a>
        <div class="navbar-search-block" title="Search">
          <form class="form-inline" method="post" name="search" action="?search">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name = "searchfield" type="search" placeholder="Type Document number or Candidate name here to check availability" aria-label="Search" value="<?php echo $searchfield; ?>" required>
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">
                  <i class="fas fa-search" ></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>                            
        </div>
      </li>
	<?php   include 'displayUser.inc.php';

	
	?>

       <!-- Cart Dropdown Menu -->
<?php 
   /*
	if ($_SESSION['role'] == 'Administrator'|| $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Client' || $_SESSION['role'] == 'Guest')
		{
			*/
			?>
	<!--		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cart-plus fa-lg mr-2" title="View Cart"> 
			&nbsp; <small> (<?php //echo $_SESSION['cart_count']; ?>) </small>
			</i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<p align="center"> 
			<span class="dropdown-item" >
		 
			<span class="cart_quantity"> (<?php// echo $_SESSION['cart_count']; ?>) </span>
			<strong>&nbsp; Your Cart </strong></span> </p>
		 
			<div class="dropdown-divider"></div>
				
		  
			<!--   <h4 align = "right">
		   <span class="dropdown-item" > 
		   <strong>
		   Total:
		   </strong> 
		   </span> 
		   </h4>  -->
			
        <!--      <p><a href= "?view_cart" base target = "_parent" class="btn btn-default btn-lg btn-flat" title="View Cart">View Cart</a>   -->
            &nbsp; 
			<!--	  <button align = "right" type="submit" name="submit" class="btn btn-info btn-lg btn-flat" title="Checkout"> Checkout </button> -->
			  
		<!--	  <a href="?checkout" base target ="_parent" class="btn btn-info btn-lg btn-flat" align = "right" title="Checkout">Checkout</a> 
			</p>
        
			</div>
			</li>  -->
<?php 
		/*
		} else 
		{
			echo "";
		}	
		*/
?>
      <!-- Account Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user" title="Account & Services"></i>
       <!--   <span class="badge badge-success navbar-badge">Account</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <p align="center"> <span class="dropdown-item" ><i class="fas fa-user-circle nav-icon"> </i><strong>&nbsp; Accounts </strong></span> </p>
          <div class="dropdown-divider"></div>
			
          <a href="?logout" class="dropdown-item">
            <i title = "Sign out" class="fas fa-sign-out-alt mr-2"></i> Logout
            
          </a>
		  
          <div class="dropdown-divider"></div>
          <a href="?myprofile" class="dropdown-item">
            <i title = "My profile" class="fas fa-users mr-2"></i> My Profile
        <!--    <span class="float-right text-muted text-sm">12 hours</span> -->
          </a>
        </div>
		</li>
		
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" title="Fullscreen mode"></i>
        </a>
      </li>

	  
	  
    </ul>
  </nav>
  
  
  
                                  