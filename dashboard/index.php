<?php

//session_start();
//error_reporting(E_ALL);
//session timer should not be put here
//include_once 'includes/magicquotes.inc.php';       // deprecate
 include_once 'includes/dbConfig.inc.php' ;
 /*//include_once 'includes/functions.inc.php';  
 //not used yet, beacuse user defined functions are not working yet
 */
error_reporting(E_ALL);
require_once 'includes/access.inc.php';
//include 'includes/access.inc.php';
//------
//download generated QR code 
if (isset($_GET['download']))
{
	
		if(!empty($_GET['download'])){
			$filename = basename($_GET['download']);
			//$filename = $_GET['download'];
			$filePath = '../assets/gen-qrcode/'.$filename;
			if(!empty($filename) && file_exists($filePath)){
				// Define headers
				header('Content-Length: ' . filesize($filePath));  
				header('Content-Encoding: none');
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=$filename");
				header("Content-Type: application/zip");
				header("Content-Transfer-Encoding: binary");
				
				// Read the file
				readfile($filePath);
				exit (0);
			} else
			{
				$error = 'The File whose name is'.$filename.' does not exist.';
				include 'home.html.php';
	            exit();
			}
		}
}

if (isset($_GET['forgot']) )
{
	$pagetitle = "Forgot Password";
	$action = "forgotpassword";
	$button = "Request new password";
	include 'pages/forgot.html.php';
	exit(0);
}

if (isset($_GET['forgotpassword']))
{
	$pagetitle = "Reset Password";
	$action = "resetpassword";
	$button = "Change password";
	session_start();
	include 'includes/dbConfig.inc.php' ;
	
// receive all input values from the user form. and prepare them for use in database
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	//$email = mysqli_real_escape_string($con, $_POST['email']);
	
	$sql = mysqli_query($con,"select id from user where  email='$email' and phone ='$phone' ");
	 $ret=mysqli_fetch_array($sql);
	$_SESSION['phone'] = $phone;
	$_SESSION['email'] = $email;
if (!$ret) 
{
	$error = 'Error supplied user details does not match or invalid'. mysqli_error($con);
	include 'pages/forgot.html.php';
	mysqli_close($con);
	exit();	
}

	$_SESSION['msg'] = "User record validated. Proceed to create new password";

	include 'pages/reset.html.php';
	mysqli_close($con);
	exit();
} 

//Update user password field with the new password

if (isset($_GET['resetpassword']))
{
	session_start();
	$phone = $_SESSION['phone'];
	$email = $_SESSION['email'];
	$button = "Change password";
	$salt = '5e7bf38ae95cce501c3f5357b919c12c'; 
	include 'includes/dbConfig.inc.php' ;
	
// receive all input values stored in session plus new password posted and prepare them for use in database
	
	$phone = mysqli_real_escape_string($con, $phone);
	$email = mysqli_real_escape_string($con, $email);
	$newpassword = md5($_POST['newpassword'].$salt);
	$sql = "UPDATE user SET password ='$newpassword' where email='$email' AND phone = '$phone' ";
	if (!mysqli_query($con, $sql))
	{
		$error = 'Error setting new password.'. mysqli_error($con);
		include 'pages/reset.html.php';
		mysqli_close($con);
		exit();
	}
				   
				   




	$_SESSION['msg'] = "New Password Created Successfully you may now login";

	include 'pages/reset.html.php';
	mysqli_close($con);
	exit();

}

//check if user is logged in
if (!userIsLoggedIn())
	{

		include 'pages/login-v1.html.php';
		mysqli_close($con);
		exit();
	}
//Implements logout	
if (isset($_GET['logout'])) 
{ 
	include 'pages/logout.html.php';
	exit(0);
}
/* This code is written in php by Engr. Anionovo Ugochukwu Edebeani for certverify solution. 
Get old password of the user and change it if it matches */
if (isset($_GET['changepass']))
{
		session_start();
		include 'includes/dbConfig.inc.php' ;
		$email= mysqli_real_escape_string($con, $_SESSION['email']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$salt = '5e7bf38ae95cce501c3f5357b919c12c' ;
		$password=MD5($_POST['oldpass'].$salt);	
		$newpass=MD5($_POST['newpass'].$salt);
		$sql = "SELECT password FROM user WHERE email = '$email'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$oldpass = $row['password'];
if ($oldpass !== $password)
	{
		$_SESSION['error'] = 'Old password entered not correct! Please try again.'. mysqli_error($con);
		include 'pages/profile.html.php';
		mysqli_close($con);
		exit();
	}	
	$sql = "UPDATE user SET
	password ='$newpass', phone = '$phone'
	WHERE email='$email'";
if (!mysqli_query($con, $sql))
	{
	
		$_SESSION['error'] = 'Error Changing user password! Please try again.'. mysqli_error($con);
		include 'pages/profile.html.php';
		mysqli_close($con);
		exit();
	} 
	$_SESSION['msg'] = "User password changed successfully";
	include 'pages/profile.html.php';
	mysqli_close($con);
	exit();

 
}
	/**
	 * this section should always be the last on this index * page.
	 */	
	//THis section retireves the role assigned to user
	include 'includes/dbConfig.inc.php';

	$email = mysqli_real_escape_string($con, $_SESSION['email']);
	//$role = mysqli_real_escape_string($con, $role);

	$uid = mysqli_real_escape_string($con, $_SESSION['userid']);

	$sql = "SELECT * FROM user
	LEFT JOIN user_role ON user.id = userid
	LEFT JOIN role ON roleid = role.id
	WHERE email = '$email' AND userid = '$uid' "; 
	$result = mysqli_query($con, $sql);
	
	if (!$result)
	{
		$error = 'Error searching for user roles.' . mysqli_error($con);
		
		include 'pages/error-page.html.php';
		mysqli_close($con);
		exit(0);
	}
	$row = mysqli_fetch_array($result);
	//$row = mysqli_fetch_assoc($result);
	
	if ($row)
	{
		$_SESSION['role'] = $row['roleid'];
	}
	

	 //include 'admin-home.html.php'; //a scond version of the home page
	  include 'pages/home.html.php';
	  mysqli_close($con);		

?>