<?php 
  include 'Connect.php';
  session_start();
  if(!$_SESSION['type'] == 'D'){
    header("location:logindoc.php");
  }
?>

<?php
        $errors = array();
        $docname = $_SESSION['name'];
        if(isset($_POST['update_btn'])){
            $oldpass = mysqli_real_escape_string($db, $_POST['old_password']);
            $newpass = mysqli_real_escape_string($db, $_POST['new_password']);
            $cnewpass = mysqli_real_escape_string($db, $_POST['cnew_password']);
        
            $oldpasshash = md5($oldpass);
            $query = "SELECT * FROM doc_account WHERE Doc_Pwd='$oldpasshash'";
            $result = mysqli_query($db, $query);
            
            if(mysqli_num_rows($result) > 0)
            {
                if($newpass === $cnewpass){
                    $password = md5($newpass);
                    $query = "Update doc_account set Doc_Pwd='$password' where Doc_Name = '$docname'";
                    $result = mysqli_query($db , $query); 
                    if($result){
                        header('location:logindoc.php');
                    }
                    else{
                        array_push($errors, "Password Not Updated");
                    }	
                }
                else{
                    array_push($errors, "Both Passwords must be same");
                }
            }
            else{
                 array_push($errors, "Old Password is incorrect! please enter correct Password");
            }
        }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Doctor Password</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <script
      src="https://kit.fontawesome.com/da6b9789f2.js"
      crossorigin="anonymous"
    ></script>
    <!-- CUSTOM STYLES-->
    <link href="assets/css/docpanel.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link
      href="http://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
      type="text/css"
    />
    <style>
      .btscol {
        background-color: #4caf50;
        border: none;
        color: white;
        padding: 6px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
      }
      .bts {
        background-color: white;
        color: black;
        border: 2px solid #3fbbc0;
      }

      .bts:hover {
        background-color: #3fbbc0;
        color: white;
      }

      .valid{
          color: green;
      }

      .invalid{
          color: red;
      }
    </style>
  </head>
  <body>
    <div id="wrapper">
      <br /><br />
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <p style="color:white">Welcome Doctor,  <?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?></p>
          <ul class="nav" id="main-menu">
            <li>
              <a href="docpanel.php"><i class="fas fa-mail-bulk fa-3x"></i> Add Posts</a>
            </li>
            <li>
              <a class="" href="yourposts.php"><i class="far fa-edit fa-3x"></i> Your Posts</a>
            </li>
            <li>
              <a class="" href="profile.php"><i class="fa fa-user-md fa-3x"></i> Profile</a>
            </li>
            <li>
              <a class="active-menu" href="changepassdoc.php"><i class="fa fa-key fa-3x"></i> Change Password</a>
            </li>
            <li>
              <a class="" href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
            </li>
          </ul>
        </div>
      </nav>

<!-- Profile -->

<div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Change Your Password</h2>
              <hr />
              <form method="POST" enctype = "multipart/form-data">

                <div class="form-group">
                    <label class="col-2">Old Password: </label>
                    <div class="col-10">
                        <input type="password" class="form_control" name="old_password">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">New Password: </label>
                    <div class="col-10">
                        <input type="password" class="form_control" name="new_password" id="psw">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12" style="display:none" id="validation">
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
                </br>

                <div class="form-group">
                    <label class="col-2">Confirm New Password: </label>
                    <div class="col-10">
                        <input type="password" class="form_control" name="cnew_password">
                    </div>
                </div>
                </br>
                
                <div class="col-10">
                    <input
                    type="submit"
                    name="update_btn"
                    value="Update Password"
                    class="bts btscol"
                    disabled = "true"
                    id="submitbtn"
                    />
                </div>

                <div><?php include('errors.php');?></div>
              </form>
            </div>
          </div>
        </div>

        <!-- /. PAGE INNER  -->
      </div>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
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
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
</body>
</html>