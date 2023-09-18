<?php 
//
//session_start();

?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="." class="brand-link">
      <img src="../assets/dist/img/QrcmLogo.png" alt="Qrcm Logo Main" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold"><?php echo $appTitle; ?> </span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   
	  			 
 	<span class="brand-img ">
	     <?php   include 'displayUserPic.inc.php'; ?> 
	</span>
	    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

<?php  

if ($_SESSION['role'] == 'Administrator') {
	
echo '
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-qrcode"></i>
              <p>
                QR Codes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?activeqrc" class="nav-link ">
                  
				  <i class="fa fa-cog fa-spin fa-2x fa-fw" aria-hidden="true"></i>
				
                  <p>Active QRC</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="?archivedqrc" class="nav-link ">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archived QRC</p>
                </a>
              </li>

             
            </ul>
          </li>



		   	<li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="fas fa-search fa-fw"></i>
              <p>
                Explore QRC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?searchdoc" class="nav-link ">
                  <i class="fa fa-search fa-fw"></i>
                  <p title = "Explore Document">Explore</p>
                </a>
              </li>              
             
            </ul>
          </li>


         
              

           
		



		  
		';
} elseif($_SESSION['role'] == 'Manager') 
{
	
	echo '';
} elseif($_SESSION['role'] == 'Guest') 
{
	echo '';
} elseif($_SESSION['role'] == 'Client') 
{
	echo '';
}
?>




   
         <br>
         
          
         
        
          
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>