<?php 
session_start();
include 'Connect.php';
?>

<?php
  $email = "";
  $errors = array();

  if(isset($_POST['send_mail']))
  {
    $email = mysqli_real_escape_string($db, $_POST['email']);
 
    $emailquery = "SELECT * FROM doc_account WHERE Doc_Email='$email'";
    $result = mysqli_query($db, $emailquery);

    $userdata = mysqli_fetch_assoc($result);
    
    if($userdata > 0)
    {
      $username = $userdata['Doc_Name'];
      $token = $userdata['Doc_Token'];

      $subject = "Reset Password";
      $body = "Hi, $username. Click here to change your password http://localhost/hlo/resetpassdoc.php?token=$token";
      $headers = "From:connectus1111@gmail.com";
      if(mail($email, $subject, $body, $headers)){
        $_SESSION['msg'] = "Check mail to activate your account $email";	
        header("location: logindoc.php");
      }
    }
    else
    {
      array_push($errors, "Please Enter Correct Email ID");
    }
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
    <link href="assets/css/login.css" rel="stylesheet" />
  </head>

  
  <body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="fixed-top"></div>
    
    <div class="login-form">
      <form method="post" class="form-horizontal">
        <div class="row">
          <div class="col-8 offset-4">
            <h2>Doctor Forgot Password?</h2>
          </div>
        </div>
        <div>
		    <p class= "bg-success text-white px-4"> 
		      <?php
		        if(isset($_SESSION['msg']))
	          {
		          echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            else
	          {
		          echo $_SESSION['msg']= "";
	          }
	        ?>
	        </p>
		</div>

        <div class="form-group row">
          <label class="col-form-label col-4">Email Address <span class="required"> *</span></label>
          <div class="col-8">
            <input
              type="email"
              class="form-control"
              name="email"
              required="required"
            />
          </div>
        </div>

        <div class="text-center"><?php include('Errors.php')?></div>

        <div class="form-group row">
          <div class="col-8 offset-4">
            <button
              type="submit"
              class="btn btn-primary btn-lg"
              name="send_mail"
            >
              SEND MAIL 
            </button>
            <div class="center">
              Remembered Password? <a href="logindoc.php">Login Here</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
