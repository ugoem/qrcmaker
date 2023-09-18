<?php 

//include 'includes/magicquotes.inc.php';
include 'includes/html-output-helpers.inc.php';

//error_reporting(E_ALL);
error_reporting(0); 
$pagetitle = 'SignUp';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<!-- Style for password validation section and script-->	
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
<?php include 'includes/headerfend.inc.html.php'; ?>
<!-- Header -->

<body class="hold-transition login-page">

<!-- Site wrapper -->
<div class="wrapper">
 <br>


  <div class="body" align = "center">
            
<div class="login-box">
  <!-- login-logo -->
		 <hr>
      <span class="clearfix"></span>
                    <img src="assets/dist/img/QrcmLogo.png" style="width:100px; rounded;" align ="center">
					<br>
					<hr>
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="." class="h1"><?php echo $appTitle; ?> <b>SignUp</b></a>
	<!-- Display message here-->  
	   <p align="center" style="font-size:16px; color:red"> 
	   
	   <?php if($error) { echo $error;  } ?></p>
	   
 <?php include'dashboard/includes/layouts/messages.php'; ?>
   <p align="center" style="font-size:16px; color:red"> 
	<?php if (isset($GLOBALS['loginError'])): ?>
	<?php echo html($GLOBALS['loginError']); ?></p>
		<?php endif; ?> 
    </div>
	                  
    <div class="card-body">
      <p class="login-box-msg">New to this Space? <span> <small> <font color = "gray"> SignUp  to get Started. </font></small> </span></p>

<form  class="form-primary" method="post" name="signup" action="?<?php htmlout($action). '&activation_code='.$activ_code_hash. '&email='. $email; ?>"  onSubmit="return checkpass();" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value = "<?php echo $email; ?>"id="email" data-validation-required-message="Please enter email address." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

                <!-- Phone number field -->
                <div class="form-group">
                  <div class="input-group my-colorpicker2">
					<input type="text" class="form-control" name ="phone" value = "<?php  echo $contno; ?>" id="contactno" required="true" placeholder="Contact Number" tabindex="0" maxlength="14" data-validation-required-message="Please enter your mobile number.">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <!-- Password field -->
                <div class="form-group"id="password_validations">
                  <div class="input-group my-colorpicker2">
        <input type="password" name="password" value = "" id="passwordd" class="form-control input-lg"placeholder="Set Password (Max 8 Charaters)" tabindex="5" maxlength="8" required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                  </div>
		<div id="message">
			<h7>Password Requirements:</h7>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
					  
                <!-- Repeat password field -->
                <div class="form-group" id="">
                  <div class="input-group my-colorpicker2">
		<input type="password" name="repeatpassword" value = "" id="repeatpassword" class="form-control input-lg"placeholder=" Repeat password (Max 8 Charaters)" tabindex="5" maxlength="8" required="true" >

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

        <div class="row">
          
            <div class ="col" align ="left">
              <input type="checkbox" required><span><label for="remember"> Remember Me </label> </span>
            </div>
          
          <!-- /.col -->
		             <div class ="col"> 
        <a base target = "_parent" href="." >Back Home</a>
      </div> 
          <!-- /.row -->
        </div>
      

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

    
	             <div class="modal-footer justify-content-between">
             <a base target = "_parent" href="dashboard/"> <button type="button" class="btn btn-default" >Login</button></a>
       
          
		  <input type="hidden" name="action" value="signup"/>
 <button type="submit" class="btn btn-info" ><i class="ft-user"></i>Submit</button>
         
            </div>
          
</form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <hr> <br>
</div>
<!-- /.signup-box -->
            </div>

          
        </div>
        <!-- /.card-wrapper  -->


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
