<?php 
session_start();
include 'Connect.php';

  if(!isset($_GET['token'])){
  header("location:login.php");
}
?>

<?php
    $errors = array();
    if(isset($_POST['reset_btn']))
	{
		if(isset($_GET['token'])){
		    $token = $_GET['token'];
		}
		$newpassword = mysqli_real_escape_string($db,$_POST['password_1']);
		$cpassword = mysqli_real_escape_string($db,$_POST['password_2']);
			
		if($newpassword === $cpassword)
		{
		    $password = md5($newpassword);
		    $updatequery = "UPDATE doc_account SET Doc_Pwd='$password' Where Doc_Token='$token'";	   
			$iquery= mysqli_query($db,$updatequery);
			if($iquery)
			{
			    $_SESSION['msg']="your password has been updated";
				header('location:logindoc.php');
			}
			else
			{
			    $_SESSION['msg']="your password is not updated";
				header('location:forgotpassdoc.php');
			}
		}
		else
		{
	        $_SESSION['msg']="your password is not updated";
			array_push($errors, "Password must be same");
		}   
	}  
	else{
	    $_SESSION['msg']="No token found";  
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
      rel="stylesheet"
    />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/owl.carousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/signup.css" rel="stylesheet" />
  </head>

  
  <body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="fixed-top"></div>
    
    <div class="signup-form">
      <form method="post" class="form-horizontal">
        <div class="row">
          <div class="col-8 offset-4">
            <h2>Reset Password Doctor</h2>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-4"
            >Password<span class="required"> *</span></label
          >
          <div class="col-8">
            <input
              type="password"
              class="form-control"
              name="password_1"
              required="required"
              id="psw"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Confirm Password<span class="required"> *</span></label
          >
          <div class="col-8">
            <input
              type="password"
              class="form-control"
              name="password_2"
              required="required"
            />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-4"></label>
          <div class="col-8" id="validation">
            <p id="letter" class="invalid">
              <i class="icofont-warning-alt"></i> Lowercase Letters [a-z]
            </p>
            <p id="capital" class="invalid">
              <i class="icofont-warning-alt"></i> Uppercase Letters [A-Z]
            </p>
            <p id="number" class="invalid">
              <i class="icofont-warning-alt"></i> Digits [0-9]
            </p>
            <p id="special" class="invalid">
              <i class="icofont-warning-alt"></i> Special Character [@/- etc.]
            </p>
            <p id="length" class="invalid">
              <i class="icofont-warning-alt"></i> Maximum Character [8-16]
              Characters
            </p>
          </div>
        </div>

        <div class="text-center"><?php include('Errors.php')?></div>

        <div class="form-group row">
          <div class="col-8 offset-4">
            <button
              type="submit"
              class="btn btn-primary btn-lg"
              name="reset_btn"
            >
              RESET 
            </button>
          </div>
        </div>
      </form>
    </div>
  </body>

  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var special = document.getElementById("special");
    var length = document.getElementById("length");
    var button = document.getElementById("submitbtn");

    myInput.onfocus = function () {
      document.getElementById("validation").style.display = "block";
    };
    myInput.onblur = function () {
      document.getElementById("validation").style.display = "none";
    };
    myInput.onkeyup = function () {
      var lowerCasepattern = "^(?=.*[a-z])";
      var capitalpattern = "^(?=.*[A-Z])";
      var numberpattern = "(?=.*[0-9])";
      var specialpattern = "(?=.*[!@#$%^&*])";
      var f1, f2, f3, f4, f5;

      if (myInput.value.match(lowerCasepattern)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
        f1 = 1;
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
        f1 = 0;
      }

      if (myInput.value.match(capitalpattern)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        f2 = 1;
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        f2 = 0;
      }

      if (myInput.value.match(numberpattern)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
        f3 = 1;
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        f3 = 0;
      }

      if (myInput.value.match(specialpattern)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
        f4 = 1;
      } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
        f4 = 0;
      }

      if (myInput.value.length >= 8 && myInput.value.length <= 16) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        f5 = 1;
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        f5 = 0;
      }

      if (f1 == 1 && f2 == 1 && f3 == 1 && f4 == 1 && f5 == 1) {
        button.disabled = false;
      } else {
        button.disabled = true;
      }
    };
  </script>
</html>
