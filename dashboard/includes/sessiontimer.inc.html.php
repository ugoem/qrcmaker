<?php
	session_start();
	$loginTime = $_SESSION['timestamp'];
 if(time() - $loginTime > 900) 
 { //subtract new timestamp from the old one
    echo' 
   <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<div class="alert alert-info alert-dismissible">
			
			<h4><i class="icon fas fa-info"></i> Session Time Out!</h4>
			15 Minutes over! Logging you out ....&hellip;!
     </div>';

	unset($_SESSION['cart_count'] ); 
	 
    unset($_SESSION['email'], $_SESSION['password'],$_SESSION['timestamp']);
    $_SESSION['loggedIn'] = FALSE;
   // header("Location:."); //redirect to home page
	echo '<div style="visibility:hidden"><script>
	window.parent.location.href="../";
	</script>';
    exit();
} else 
	{
		$_SESSION['timestamp'] = time(); //set new timestamp
	}
?>
	      