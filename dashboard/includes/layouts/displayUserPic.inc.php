<?php 
//session_start();	  
	
echo ' 
<div class="user-panel  d-flex" align="center">
  <div class="image">
    <img src="assets/profile-images/'.$_SESSION['profile_picture'].'"class="img-circle elevation-2" alt="Profile picture"  title="Profile picture" >
	

       
   </div>
	  &nbsp; &nbsp; <a href="?myprofile" class="d-block">'.$_SESSION['firstname'].'</a>
 </div>
        
 
 ';

	?>
   
	  