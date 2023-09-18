<?php 

//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 

?>
<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include 'includes/layouts/headerbend.inc.html.php'; ?>
 <style>
/* Style all input fields */
input {
  width: 100%;
  padding: 1px;
  border: 1px solid #ccc;
  border-radius: 1px;
  box-sizing: border-box;
  margin-top: 1px;
  margin-bottom: 0px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
}


/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 1px;
  margin-top: 4px;
}

#message p {
  padding: 0px 0px;
  font-size: 10px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -10px;
  content: "[✔]";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -10px;
  content: "[✖]";
}
</style>

<!-- Header -->

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
	<!-- reset password section-->
	
	  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="." class="h1"><?php echo $appTitle; ?><b></b></a>
	   <p align="center" style="font-size:16px; color:red"> <?php if($error) { echo html($error);  } ?></p>
	   
 <?php include'includes/layouts/messages.php'; ?>
<p align="center" style="font-size:16px; color:red"> 
<?php if (isset($GLOBALS['loginError'])): ?>
<?php echo html($GLOBALS['loginError']); ?></p>
<?php endif; ?> 
    </div>
    <div class="card-body">
           <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form name = "signup" action="?<?php htmlout($action); ?>" method="post" onSubmit="return checkpass();">

                <!-- Password field -->
       <div class="form-group"id="password_validations">
        <div class="input-group mb-3">
        <input type="password" name="newpassword" value = "" id="passwordd" class="form-control input-lg"placeholder="Set Password (Max 8 Charaters)" tabindex="5" maxlength="8" required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div id="message">
			<h7>Password Requirements:</h7>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>
		</div>
        <div class="input-group mb-3">
		<input type="password" name="repeatpassword" value = "" id="repeatpassword" class="form-control input-lg"placeholder=" Repeat password (Max 8 Charaters)" tabindex="5" maxlength="8" required="true" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
		   <input type="hidden" name="action" value="resetpassword"/>
            <button type="submit" class="btn btn-info btn-block"><?php htmlout($button); ?> </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a base target = "_parent" href="./">Login</a>
      </p>
    </div>
    <!-- /.reset-card-body -->
    </div>
    <!-- /.card-primary for reset-->
	

    <!-- /.card-body -->

  </div>
  <!-- /.card -->
  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php include 'includes/layouts/scriptbend.inc.html.php'; ?>

<!-- jQuery -->
<?php include 'includes/scriptfend.inc.html.php'; ?>
 	<script type="text/javascript">
		function checkpass() {
				if(document.signup.passwordd.value!=document.signup.repeatpassword.value)
				{
					alert('Password and Repeat Password field does not match');
					document.signup.repeatpassword.focus();
					return false;
				}
					return true;
			} 

	</script>

	<!-- script for password validation-->
	<script>
		var passVal = document.getElementById("passwordd");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");

		// When the user clicks on the password field, show the message box
			passVal.onfocus = function() {
			document.getElementById("message").style.display = "block";
		}

			// When the user clicks outside of the password field, hide the message box
				passVal.onblur = function() {
				document.getElementById("message").style.display = "none";
		}

			// When the user starts to type something inside the password field
			passVal.onkeyup = function() {
			// Validate lowercase letters
			var lowerCaseLetters = /[a-z]/g;
			if(passVal.value.match(lowerCaseLetters)) {  
				letter.classList.remove("invalid");
				letter.classList.add("valid");
			} else {
						letter.classList.remove("valid");
						letter.classList.add("invalid");
		}
  
			// Validate capital letters
			var upperCaseLetters = /[A-Z]/g;
			if(passVal.value.match(upperCaseLetters)) {  
				capital.classList.remove("invalid");
				capital.classList.add("valid");
			} else {
						capital.classList.remove("valid");
						capital.classList.add("invalid");
			}

			// Validate numbers
			var numbers = /[0-9]/g;
			if(passVal.value.match(numbers)) {  
				number.classList.remove("invalid");
				number.classList.add("valid");
			} else {
						number.classList.remove("valid");
						number.classList.add("invalid");
			}
  
			// Validate length
			if(passVal.value.length >= 8) {
				length.classList.remove("invalid");
				length.classList.add("valid");
			} else {
						length.classList.remove("valid");
						length.classList.add("invalid");
			}
  

		}
	</script>
<!--- Scripts ends here --->
</body>


</html>
