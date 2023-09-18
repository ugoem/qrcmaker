<?php
	session_start();
	

	unset($_SESSION['cart_count'] );
	
	session_destroy();
  
	unset($_SESSION['loggedIn']);
	unset($_SESSION['email']);
	unset($_SESSION['password']);

	unset($_SESSION['userid']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['timestamp']);
	unset($_SESSION['act_status']);

	//header('Location: admin/' );
	//exit();
  
	echo '
			<div align="center" class="alert alert-success" style=" 	background-color:green;"><i class="fa fa-fw fa-thumbs-up"></i><font color="white"><i class="glyphicon glyphicon-ok"></i><b>&nbsp;You are now logged out. Thank you for using our service!</b></font></div>
			';
	echo '
			<div style="visibility:hidden">
			<script>
			window.parent.location.href="../";
			</script>
			</div>';

?>