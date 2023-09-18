<?php
error_reporting(0);
//error_reporting(E_ALL); 
  // controls user log in
function userIsLoggedIn()
{
		if (isset($_POST['action']) and $_POST['action'] == 'login')
		{
			if (!isset($_POST['email']) or $_POST['email'] == '' or
			!isset($_POST['password']) or $_POST['password'] == '')
			{
				$GLOBALS['loginError'] = 'Please fill in both fields';
				return FALSE;
			}
			//$email = mysqli_real_escape_string($con, $_POST['email']);
			$salt = '5e7bf38ae95cce501c3f5357b919c12c' ;
			$password = md5($_POST['password'] . $salt);
			//$password = md5($_POST['password']);
			if (dbContainsUser($_POST['email'], $password))
			{
				session_start();
				include 'dbConfig.inc.php' ;
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$ret=mysqli_query($con, "SELECT id, firstname, lastname, account_status, profile_picture, username, phone, account_type  FROM user WHERE email='$email'");
				$result = mysqli_fetch_array($ret);

				$_SESSION['userid'] = $result['id'];
				$_SESSION['firstname'] = $result['firstname'];
				$_SESSION['lastname'] = $result['lastname'];
				$_SESSION['username'] = $result['username'];
				$_SESSION['loggedIn'] = TRUE;
				$_SESSION['profile_picture'] = $result['profile_picture'];
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['phone'] = $result['phone'];
				$_SESSION['password'] = $password;
				$_SESSION['timestamp'] = time();
				$_SESSION['act_status'] = $result['account_status'];
				$_SESSION['account_type'] = $result['account_type'];
	
				return TRUE;
			} else
			{
				session_start();
				unset($_SESSION['loggedIn']);
				unset($_SESSION['email']);
				unset($_SESSION['password']);
				unset($_SESSION['act_status']);
				unset($_SESSION['userid']);
				unset($_SESSION['firstname']);
				unset($_SESSION['lastname']);
				unset($_SESSION['timestamp']);

				$GLOBALS['loginError'] =
				'The specified email address or password is incorrect.';
				return FALSE;
			}
		}

		//controls user log out routine
		if (isset($_POST['action']) and $_POST['action'] == 'logout')
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);

			unset($_SESSION['userid']);
			unset($_SESSION['firstname']);
			unset($_SESSION['lastname']);
			unset($_SESSION['timestamp']);
			header('Location: ' . $_POST['goto']);
			exit();
		}
		session_start();
		if (isset($_SESSION['loggedIn']))
		{
			return dbContainsUser($_SESSION['email'],
			$_SESSION['password']);
		}
}


function dbContainsUser($email, $password)
{
	include 'dbConfig.inc.php' ;
	$email = mysqli_real_escape_string($con, $email);
	$password = mysqli_real_escape_string($con, $password);
	$sql = "SELECT COUNT(*) FROM user
	WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if (!$result)
		{
			$error = 'Error searching for User. No such User exist';
			include '../home.html.php';
			exit();
		}
		$row = mysqli_fetch_array($result);
	if ($row[0] > 0)
		{
			return TRUE;
		} else
		{
			return FALSE;
		}
}

/**
 * Other functions
 */
 /**
 function AppServices()
 {
	 include 'dbConfig.inc.php';
	 $sql = "SELECT * FROM services ORDER BY sid ";
	 $result = mysqli_query($con, $sql);
	 if (!$result)
		{
			$error = 'Error fetching Application Services.';
			include 'error-page.html.php';
			exit();
		}
		$row = mysqli_fetch_array($result);
		while ($row)
		{
			$appservices[] = array(
			'sid' => $row['sid'], 
			'sname' => $row['sname'], 
			'sno' => $row['sno'],
			'sprice' => $row['sprice']
			);
		}
		if ($appservices)
		{
			return $appservices[];
		} else 
		{
			return $error;
		}
	 
	 
 }  
   */
/*
function userHasRole($role)
{
	include 'dbConfig.inc.php';

	$email = mysqli_real_escape_string($con, $_SESSION['email']);
	$role = mysqli_real_escape_string($con, $role);
	
	//$role = "Author";
	$sql = "SELECT COUNT(*) FROM user
	INNER JOIN user_role ON user.id = userid
	INNER JOIN role ON roleid = role.id
	WHERE email = '$email' AND role.id = '$role' "; 
	$result = mysqli_query($con, $sql);
	if (!$result)
	{
		$error = 'Error searching for user roles.' . mysqli_error($con);
		include 'error-page.html.php';
		exit();
	}
	$row = mysqli_fetch_array($result);

	if ($row[0] > 0)
	{
	
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}  
*/
?>