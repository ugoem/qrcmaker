<?php
        error_reporting(E_ALL);
		//Function to generate QRcode and stor in database
		function genQRCode($input)
		{
		    if(session_status() === PHP_SESSION_NONE)
            {
                session_start();
                   
        			require 'includes/phpqrcode/qrlib.php';

        			// $path variable store the location where to
        			// store image and $file creates directory name
        			// of the QR code file by using 'uniqid'
        			// uniqid creates unique id based on microtime
        			$path = 'assets/gen-qrcode/';
        			$Qruniqid = uniqid();
        			$file = $path.$Qruniqid.".png";

        			//$count = 1;
					
        			// $ecc stores error correction capability('L')
        			$ecc = 'L';
        			$pixel_Size = 10;
        			$frame_size = 1;
        
        			// Generates QR Code and Stores it in directory given
        			QRcode::png($input, $file, $ecc, $pixel_Size, $frame_size);
        		
        		
        			
        				$_SESSION['qrcid'] = mysqli_insert_id($con);
        				$_SESSION['file'] = $file;
						$_SESSION['Qruniqid'] = $Qruniqid;
            }	    			
		}
		
function QrcDisplay()
{
  
   if(session_status() === PHP_SESSION_NONE)
   {
        session_start();
    
    
        include 'includes/dbConfig.inc.php';
        $id = $_SESSION['qrcid'];
        $sql = "SELECT * FROM tb_dynamic_code WHERE ID = '$id' "; 
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $filename = $row['file_name'];
    
        if (empty($result))
		{
			$error = 'Error fetching requested QrCode details.'. mysqli_error($con);	
			include 'home.html.php';
			exit();
		} 
   
    //return true;
   }
   
}

//generate QR Code from text and output to browser
function gen_textQrcode($input)
{
		include 'includes/phpqrcode/qrlib.php';
		//include('includes/QRcode/libs/phpqrcode/qrlib.php'); 
	   	QRcode::png($input);
}

//Generate QR code using Text input	
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'qrcodegentext' ) 
{	
	session_start();
	include 'includes/dbConfig.inc.php';
	$input = $_POST['QrcText'];
  	$type = "Static";
	$option = mysqli_real_escape_string($con, $_POST['option']);
    $userid = $_SESSION['userid'];
	$status = "Active";
	$qrcname = mysqli_real_escape_string($con, $_POST['qrcname']);
	$Qruniqid = $_SESSION['Qruniqid'];
	
	//Also store file footprint in database
        			$sql = "INSERT INTO tb_dynamic_code SET
        					type ='$type', 
        					file_name = '$Qruniqid',
							options = '$option',
        					user_id = '$userid', 
        					qrc_status = '$status',
							qrc_name = '$qrcname' ";
        			
        		//	$_SESSION['qrcid'] = mysqli_insert_id($con);
        			
        
        					if (!mysqli_query($con, $sql) )
        					{
        						$error = 'Error adding submitted QrCode details.'. mysqli_error($con);	
        						    			           			
        						include 'home.html.php';
        						
        					}
	
   if ( empty($_POST['QrcText']) AND empty($_POST['option']) AND empty($_POST['qrcname']) ) 
   {
		$error = '<li>QR code text option detail is required</li>';
		
	
   } else {
				$input = $input.$option;
				genQRCode($input);
				//gen_textQrcode($input);
				$msgSuccess = '<li>Your QR Code successfully Generated from text provided</li>';
			//	echo "QrCodeID = ".	$_SESSION['qrcid']."<br>";
				
				$filename = $_SESSION['file'];
			   // echo "image and path is ". $filename;

				include 'home.html.php';
			    exit();
		  } 
}

//Generate QRcode using uploaded file input
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'qrcodegenfile' ) 
{	
	session_start();
	include 'includes/dbConfig.inc.php';
	$input = $_POST['QrcInput'];
	$type = "Static";
	$option = mysqli_real_escape_string($con, $_POST['option']);
    $userid = $_SESSION['userid'];
	$status = "Active";
	$qrcname = mysqli_real_escape_string($con, $_POST['qrcname']);
	$Qruniqid = $_SESSION['Qruniqid'];
	
	//Also store file footprint in database
        			$sql = "INSERT INTO tb_dynamic_code SET
        					type ='$type', 
        					file_name = '$Qruniqid',
							options = '$option',
        					user_id = '$userid', 
        					qrc_status = '$status',
							qrc_name = '$qrcname' ";
        			
        		//	$_SESSION['qrcid'] = mysqli_insert_id($con);
        			
        
        					if (!mysqli_query($con, $sql) )
        					{
        						$error = 'Error adding submitted QrCode details.'. mysqli_error($con);	
        						
        			           			
        						include 'home.html.php';
        						
        					}
							
   if ( empty($_POST['QrcInput']) AND empty($_POST['option']) AND empty($_POST['qrcname']) ) 
   {
		$error = '<li>QR code file option detail is required</li>';
		
	
   } else {
				$input = $input.$option;
				genQRCode($input);
				//gen_textQrcode($input);
				$msgSuccess = '<li>Your QR Code successfully Generated from file</li>';
			//	echo "QrCodeID = ".	$_SESSION['qrcid']."<br>";
				
				$filename = $_SESSION['file'];
			   // echo "image and path is ". $filename;
				include 'home.html.php';
				exit();
				
		  } 
}

//Generate QR code using web url or address or link
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'qrcodegenurl' ) 
{	
	session_start();
	include 'includes/dbConfig.inc.php';
	$input = $_POST['QrcUrl'];
   	$type = "Static";
	$option = mysqli_real_escape_string($con, $_POST['option']);
    $userid = $_SESSION['userid'];
	$status = "Active";
	$qrcname = mysqli_real_escape_string($con, $_POST['qrcname']);
	$Qruniqid = $_SESSION['Qruniqid'];
	
	//Also store file footprint in database
        			$sql = "INSERT INTO tb_dynamic_code SET
        					type ='$type', 
        					file_name = '$Qruniqid',
							options = '$option',
        					user_id = '$userid', 
        					qrc_status = '$status',
							qrc_name = '$qrcname' ";
        			
        		//	$_SESSION['qrcid'] = mysqli_insert_id($con);
        			
        
        					if (!mysqli_query($con, $sql) )
        					{
        						$error = 'Error adding submitted QrCode details.'. mysqli_error($con);	
        				
        						include 'home.html.php';
        						
        					}
							
   if ( !empty($_POST['QrcUrl']) AND empty($_POST['option']) AND empty($_POST['qrcname']) AND filter_var($input, FILTER_VALIDATE_URL) ) 
   {
		$input = $input.$option;
		genQRCode($input);
		//gen_textQrcode($input);
		$msgSuccess = '<li>Your QR Code successfully Generated from valid url / link/ web address</li>';
			//	echo "QrCodeID = ".	$_SESSION['qrcid']."<br>";
				
				$filename = $_SESSION['file'];
			   // echo "image and path is ". $filename;
		include 'home.html.php';
	    exit();
		
   } 
   
   
 else {
	   
			$error = '<li>QR code url option detail is empty or value entered is invalid </li>';
			
			
		  } 
}                                          

//download generated QR code 
if (isset($_GET['download']))
{
	
		if(!empty($_GET['download'])){
			$filename = basename($_GET['download']);
			//$filename = $_GET['download'];
			$filePath = 'assets/gen-qrcode/'.$filename;
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

//empty sign-up page-front end is built up and dispalyed with minimal items
if (isset($_GET['sign_up'])) 
{
	$pagetitle = 'User';
	$action = 'addsignupform';
	/*
	$username = '';
	$fname=  '';
	$lname=  '';
	*/
	$contno= '';
	$email = '';
	//$act_type = '';
	$id = '';
	$created_at = '';
	$act_status = '';
	$activ_code ='';	
	$button = 'Register';
	include 'signup-v1.html.php';
	exit(0);
}

if (isset($_GET['addsignupform'])) 
{
	session_start();
	include 'dashboard/includes/dbConfig.inc.php' ;
	$salt = '5e7bf38ae95cce501c3f5357b919c12c' ;
	// receive all input values from the form. and prepare them for use in database
	/*
	$username = mysqli_real_escape_string($con, $_POST['username']);
    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
	*/
    $contno = mysqli_real_escape_string($con, $_POST['phone']);
	$_SESSION['email'] =  $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = MD5($_POST['password'].$salt);
	//$act_type = mysqli_real_escape_string($con, $_POST['account_type']);
	$act_status = 0;
    $activ_code = mysqli_real_escape_string($con,random_int(100000, 9999999));
	$_SESSION['activ_code_hash']   = md5($activ_code);
	//$activ_code_hash = md5($activ_code);
	$created_at = date('Y-m-d H:i:s');
	//$maxsize = 1000000; // this is equivalent to 100kb
	//$button = 'Register';
	$role = "Administrator";
/*
	$profile_picture = trim($_FILES['profile_picture']['name']);
	$profile_psize = trim($_FILES['profile_picture']['size']);
	$extension = substr($profile_picture,strlen($profile_picture)-4,strlen($profile_picture));
		// allowed extensions
	$allowed_extensions = array(".jpg",".JPG",".JPEG","jpeg",".png",".PNG");
		// Validation for allowed extensions .in_array() function searches an array for a specific value.
	if(!in_array($extension, $allowed_extensions))
		{

			$error = 'Invalid profile Picture format. Only jpg/JPG, jpeg/JPEG, png/PNG, format allowed.';
			unset($_SESSION['activ_code_hash'] );
			include 'pages/sign-up.html.php';
			exit();
	
		} else
			if($profile_psize > $maxsize) 
			{


				$error = 'Profile picture size too large. 100 Kilobyte or less acceptble, cancel and try again.';
				unset($_SESSION['activ_code_hash'] );
				header("location: ./");
				exit();
			} else {
					  
						$target = "admin/assets/profile-images/";
						$profile_picture = md5($profile_picture).$extension;
						move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target.$profile_picture);
											*/
						mysqli_query($con, "SET AUTOCOMMIT=0");
						mysqli_query($con, "START TRANSACTION");
						
						$sql = "INSERT INTO user SET 
						phone = '$contno', 
						account_status ='$act_status', 
						activation_code = '$activ_code', 
						created_at = '$created_at', 
						email = '$email', 
						password = '$password' ";
						if (!mysqli_query($con, $sql))
						{
							$error = 'Error adding submitted user details.'. mysqli_error($con);
							unset($_SESSION['activ_code_hash'] );
							//unlink($target.$profile_picture);
							include 'signup-v1.html.php';
							exit();
						}

						//insert registered user ID into user_role table
						$userid = mysqli_insert_id($con);
	
						$sql = "INSERT INTO user_role SET
						userid = '$userid',
						roleid = '$role' ";
						if (mysqli_query($con, $sql)) 
						{
  	
							mysqli_query($con, "COMMIT");

							//function send activation message here
							
							//Send activation code message
							$ip = getenv('HTTP_CLIENT_IP')?:
							getenv('HTTP_X_FORWARDED_FOR')?:
							getenv('HTTP_X_FORWARDED')?:
							getenv('HTTP_FORWARDED_FOR')?:
							getenv('HTTP_FORWARDED')?:
							getenv('REMOTE_ADDR');

							$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
							$query2 = @json_decode(file_get_contents("https://api.ipdata.co/{$ip}"));

							if($query && $query['status'] == 'success') 
							{
								$ipDetails = 'You visited us from '.$query['country'].', '.$query['regionName'] .', '.$query['city'].' with IP Address of - '.$query['query'];
							} else 
							{
								$ipDetails = $ip. ' | '.@$query2->country . ' | '.@$query2->region. ' | '. @$query2->city ;

							}

							$to = $email;      //Receipient email
							$from = "no-reply@qrcmaker.io";
			
							//$headers .= $from;
						//	$headers .= "Sign up Activation Code!\r\n";
							$headers = 'MIME-Version: 1.0' ."\r\n";
							$headers .= 'Content-Type: text/html; charset=utf-8' ."\r\n";
							$subject = "Sign UP Activation Code!";
							
							//message header 
							$headers .= 'From: ' . $from. "\r\n". 'Reply-To: '. 'info@qrcmaker.io'. "\r\n";
							
						   /*
							$message = "This is your activation code: ". $activ_code ."\r\n";
							$message .=  "Use it to complete your registration \r\n";
							$message .=  "This email was sent from " . $_SERVER['HTTP_REFERER'] . "\r\n";

							$message .=  $ipDetails ."\r\n";
							*/
							
							//get html content of the email
$htmlcontent = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QRC Maker | Welcome Email</title>
	
    <style type="text/css">
      body {
        margin: 0;
        background-color: #eceff1;
        font-family: sans-serif;
      }
      table {
        border-spacing: 0;
      }
      td {
        padding: 0;
      }
      img {
        border: 0;
      }
      .wrapper {
        width: 100%;
        table-layout: fixed;
        background-color: #eceff1;
        padding-bottom: 60px;
      }
      .main {
        background-color: #ffffff;
        margin: 0px auto;
        width: 100%;
        border-spacing: 0;
        color: #000000;
        border-radius: 10px;
        border-color: #ebebeb;
        border-width: 1px;
        border-style: solid;
        padding: 50px;
        line-height: 20px;
      }
      .button {
        background-color: #000000;
        color: #ffffff;
        text-decoration: none;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 5px;
      }
      .logo {
        width: 600px;
        margin: 0px auto;
      }
      .link {
        color: #535353;
        text-decoration-color: #535353;
      }
      .footer {
        margin-top: 20px auto;
        width: 100%;
      }
      .content {
        line-height: 25px;
      }
    </style>
  </head>
  <body>
    <center class="wrapper">
      <table class="logo" width="100%">
        <tr>
          <td style="text-align: center">
            <a href="https://qrcmaker.io"
              ><img
                src="https://auenetengtech.com.ng/qrcmaker/assets/dist/img/QrcmLogo.png"
                width="130"
                style="width: 100%"
                alt="Logo"
            /></a>
          </td>
        </tr>
      </table>
      <table class="main" width="100%">
        <tr>

          <td style="text-align: center">
		  		<h2>' . $subject. '</php></h2>
	
            <p style="font-size: 30px">Hi <strong>'. $email. '!</strong></p>
          </td>
        </tr>
        <tr>
          <td style="text-align: center">
            <img src="https://auenetengtech.com.ng/qrcmaker/assets/dist/img/waving-hand.png" alt="Waving Hand" />
          </td>
        </tr>
        <tr>
          <td
            style="
              font-size: 16px;
              text-align: center;
              width: 100%;
              padding: 30px 5px;
            "
          >
            <p class="content">
              Thank you for signing up to use our QR Code Maker Services. <br>Please spare a second to confirm your email.
            </p>
          </td>
        </tr>
        <tr style="text-align: center">
          <td>
            <button  class="button">'. $activ_code. '</button>
		<!--	<a target="__blank" href="https://auenetengtech.com.ng/qrcmaker/?confirm-email" class="button">Click Here! to CONFIRM</a> -->
		<br>
		<p> This email was sent from <a target="__blank" href="' . $_SERVER["HTTP_REFERER"] .'"><b>this link </b></a>
		</p>
		  <p>'.$ipDetails.' </p>
          </td>

        </tr>
      </table>

      <!-- Footer -->

      <table class="footer">
        <tr>
          <td style="text-align: center; color: #858585">
            <p> <strong > &copy;'. date("Y"). '<a href="https://qrcmaker.io" class="link" > QR Code Maker </a>.  </strong>All rights reserved. |<br> Block B, Electrical Engineering Dept. Unizik Awka Anambra State.</p>
            <a data-target="#modal-terms" href="https://qrcmaker.io/?terms" class="link">Terms of Service</a>
            <a data-target="#modal-privacy" href="https://qrcmaker.io/?privacy" class="link" style="padding-left: 15px">Privacy Policy</a>
			<br>
			 <p>Powered by <a href="https://auenetengtech.com.ng" class="link"><strong>AUENET</strong></a></p>
			 
			 <span class="link"> Follow us @ </span>
            <a href="https://www.facebook.com/qrcmaker">
			  <i class="fab fa-facebook" title = "Follow us @ facebook"></i>
			</a>
            <a href="https://twitter.com/qrcmaker">
			 <i class="fab fa-twitter" title = "Follow us @ twitter"></i>
			</a>
            <a href="https://youtube.com/qrcmaker">
             <i class="fab fa-youtube" title = "Follow us @ youtube"></i>
			 </a>
            <a href="https://linkedin.com/mwlite/in/did-versol-a9539525a">
			  <i class="fab fa-linkedin" title = "Follow us @ linkedin"></i>
			 <i class="fab fa-linkedin" title = "Follow us @ twitter"></i>
			 </a>
            <a href="https://instagram.com/qrcmaker">
			<i class="fab fa-instagram" title = "Follow us @ instagram"></i>
		 </a>
          </td>
        </tr>
       
      </table>
    </center>
  </body>
</html> ';
							
							//sending email
							$send  = @mail($to, $subject, $htmlcontent, $headers);

							$_SESSION['msgr'] = "User registration successful. An email had been sent to the email address provided with activation code.";
							//include 'pages/welcome-msg.html.php';
							include 'activation.html.php';
							exit();
						} else 
						{ 
							$error = 'Error setting user ID role table.'. mysqli_error($con);
							unset($_SESSION['activ_code_hash'] );

							mysqli_query($con, "ROLLBACK");
							include 'signup-v1.html.php';
							exit();
						}
						
						
}
		



		 //function perform activation proper is here
 if (isset($_GET['activparam']))
	{
		//session_start();
		include 'dashboard/includes/dbConfig.inc.php' ;
		$activ_code = mysqli_real_escape_string($con, $_POST['activate']);
		$activ_code_hash_comfirm = MD5($activ_code);
		$email =  $_GET['activparam'];
	
		//	$email=  $_SESSION['email'];
		//echo $email;
 
		//echo $activ_code_hash_comfirm;
 
		/* else  if (isset($_GET['activation_link']))
		{
		$activ_code_hash_comfirm =  $_GET['activation_link'];
		$email =  $_GET['email'];    
		}    */
		$act_status = 1;
		$activated_on = date('Y-m-d H:i:s');  
		$sql = "SELECT id, activation_code FROM user WHERE email = '$email'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);

		$userid = $row['id'];
		$activ_c_db = $row['activation_code'];
		$activ_c_db_hash = MD5($activ_c_db);

		if ($activ_c_db_hash !== $activ_code_hash_comfirm)
		{
			session_start();
			$button = 'Register';
			$_SESSION['activ_code_hash']  = $activ_code_hash_comfirm;
			//  $_SESSION['error'] = 'Activation code entered not correct! Please try again.'. mysqli_error($con);
	
			echo ' <br>
			<div class="alert alert-danger alert-dismissible" role="alert" align = "center">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
			Activation code entered not correct! Please try again
			</div>';
	
			include 'activation.html.php';
			
			exit();	
		}
		$sql = "UPDATE user SET
		account_status ='$act_status', 
		activation_date = '$activated_on'
		WHERE email='$email'";
		if (!mysqli_query($con, $sql))
		{
	
			$_SESSION['error'] = 'Error updating user status! Please try again.'. mysqli_error($con);
			include 'activation.html.php';
			exit();
		} 
		//$_SESSION['msg'] = "Activation successful. You may proceed to login";
		//echo "<script>alert('Activation successful. You may proceed to login.');</script>";
		  unset($_SESSION['activ_code_hash']);
		echo '
			<div align="center" class="alert alert-success" style=" background-color:green;"><i class="fa fa-fw fa-thumbs-up"></i><font color="white"><i class="glyphicon glyphicon-ok"></i><b>&nbsp;Activation successful. You may proceed to login </b></font></div>
			';

		echo '
				<div style="visibility:hidden">
				<script>
				window.location.href="dashboard/";
				</script>
				</div>';
				//header('Location: admin/') ;
				//window.parent.location.href="admin/";
		exit();
}
 include 'home.html.php';
?>