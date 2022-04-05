<?php 
session_start();
include 'Connect.php';
$errors = array(); 
?>

<?php 
  if(isset($_POST['Submit'])){
      $files = "";
      $files1 = "";
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
      $experience = mysqli_real_escape_string($db, $_POST['experience']);
      $address = mysqli_real_escape_string($db, $_POST['address']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password']);
      $password_2 = mysqli_real_escape_string($db, $_POST['confirm_password']);
      $token = bin2hex(random_bytes(15));

      #For 1st Image
      $files = $_FILES['image'];
      $filename = $files['name'];
      $fileerror = $files['error'];
      $filetmp = $files['tmp_name'];
      $fileext = explode('.',$filename);
      $filecheck = strtolower(end($fileext));
      $fileexstored = array('png','jpg' ,'jpeg');

      #For Second Image
      $files1 = $_FILES['image1'];
      $filename1 = $files1['name'];
      $fileerror = $files1['error'];
      $filetmp1 = $files1['tmp_name'];
      $fileext1 = explode('.',$filename1);
      $filecheck1 = strtolower(end($fileext1));

      $user_check_query = "SELECT * FROM doc_account WHERE Doc_Name = '$username'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_num_rows($result);
      
      if($user>0)
      {
        array_push($errors, "Username is already registered");
      }
      else{
        $emailquery = "SELECT * from doc_account where Doc_Email='$email'";
        $query_email = mysqli_query($db, $emailquery);
        $emailcount = mysqli_num_rows($query_email);
        if($emailcount>0){ 
          array_push($errors, "Email id is already registered");
        }
        else{
          if($password_1 === $password_2){
              $password = md5($password_1);
              if(in_array($filecheck,$fileexstored) && in_array($filecheck,$fileexstored)){
                $destinationfile = 'upload/' .$filename;
                move_uploaded_file($filetmp,$destinationfile);
                
                $destinationfile1 = 'upload/' .$filename1;
                move_uploaded_file($filetmp1,$destinationfile1);
                
                $query = "INSERT INTO doc_account(Doc_Name,Doc_Qualification,Doc_Image,Doc_Certificate,Doc_Experience,Doc_Address,Doc_Email,Doc_Pwd,Doc_Token,D_Valid) VALUES('$username','$qualification','$destinationfile','$destinationfile1','$experience','$address','$email','$password','$token','inactive')";
                $iquery = mysqli_query($db , $query);          
                if($iquery)
                {
                  $subject = "Email Activation";
                  $body = "Hi, $username. Click here to activate your account http://localhost/hlo/activatedoc.php?token=$token";
                  $headers = "From:connectus1111@gmail.com";
                  if(mail($email, $subject, $body, $headers)){
                    $_SESSION['msg'] = "Check mail to activate your account $email";	
                    header("location: logindoc.php");
                  }
                  else{
                    alert("Failed to send mail");
                  }
                }
                else{
                  array_push($errors, "Failed to Insert");
                }
              }
          }
          else{
            array_push($errors, "Password must be same");
          }
        }
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Doctor Signup</title>
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
    <link href="assets/css/doc-signup.css" rel="stylesheet" />
  </head>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-colock-time"></i>
      </div>
      <div class="d-flex align-items-center"></div>
    </div>
  </div>
  <body>
    <div class="signup-form">
      <form method="post" class="form-horizontal" enctype = "multipart/form-data">
        <div class="row">
          <div class="col-8 offset-2">
            <h2>Doctor Registration.</h2>
          </div>
        </div>
        <div>
          <p class="bg-success text-white px-4"></p>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-4"
            >Username<span class="required"> *</span></label
          >
          <div class="col-8">
            <input
              type="text"
              class="form-control"
              name="username"
              required="required"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Email Address<span class="required"> *</span></label
          >
          <div class="col-8">
            <input
              type="email"
              class="form-control"
              name="email"
              required="required"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Qualification<span class="required"> *</span></label
          >
          <div class="col-8">
            <input
              type="tel"
              class="form-control"
              name="qualification"
              id="qualification"
              required="required"
            />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Your-Photo<span class="required"> *</span></label
          >
          <div class="col-8">
            <input type="file" name="image1" id="image" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Certificate<span class="required"> *</span></label
          >
          <div class="col-8">
            <input type="file" name="image" id="image" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Experience<span class="required"> *</span></label
          >
          <div class="col-8">
            <input type="text" class="form-control" name="experience" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-4"
            >Address<span class="required"> *</span></label
          >
          <div class="col-8">
            <input type="text" class="form-control" name="address" />
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
              name="password"
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
              name="confirm_password"
              required="required"
            />
          </div>
        </div>

        <div class="text-center">
            <?php include ('Errors.php');?>
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
        <div class="form-group row">
          <div class="col-8 offset-4">
            <button
              type="submit"
              name="Submit"
              id="submitbtn"
              class="btn btn-primary btn-lg"
              disabled
            >
              Register
            </button>
            <div class="text-center">
              Click Here
              <a href="signup.php">For User Registration & Login</a>
            </div>
            <div class="center">
              Already have an account? <a href="logindoc.php">Login here</a>
            </div>
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
