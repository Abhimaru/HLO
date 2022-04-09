<?php 
  include 'Connect.php';
  session_start();

  if(!$_SESSION['type'] == 'A'){
    header("location:adminlogin.php");
  }
?>

<?php
	$errors = array();

    if(isset($_POST['Submit'])){
      $files = "";
      $posttitle = $_POST['posttitle'];
      $posttext = $_POST['posttext'];

      $files = $_FILES['image'];
      $filename = $files['name'];
      $filetmp = $files['tmp_name'];

      $fileext = explode('.',$filename);
      $filecheck = strtolower(end($fileext));
      $fileexstored = array('png','jpg' ,'jpeg');
      
      if(in_array($filecheck,$fileexstored))
      {
        $destinationfile = 'upload/' .$filename;
        move_uploaded_file($filetmp,$destinationfile);
      
        $query = "INSERT INTO post_info(Doc_ID,Post_Img,Post_Head,Post_Txt) VALUES('$docid','$destinationfile','$posttitle','$posttext')";
        $result = mysqli_query($db , $query); 
        if($result){
          array_push($errors, "Post inserted ");  
        }
        else{
          array_push($errors, "Post Not inserted");
        }
      }else{
        array_push($errors, "Only PNG, JPG and JPEG Format Accepted");
      }	
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
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
    </style>
  </head>
  <body>
    <div id="wrapper">
      <br /><br />
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <p style="color:white">Welcome Admin</p>
          <ul class="nav" id="main-menu">
            <li>
              <a class="" href="allusers.php"><i class="fa fa-user fa-3x"></i> Manage Users</a>
            </li>
            <li>
              <a href="alldoctors.php"><i class="fa fa-user-md fa-3x"></i> Manage Doctor</a>
            </li>
            <li>
              <a class="" href="verifydoc.php"><i class="fa fa-check fa-3x"></i> Verify Doctor</a>
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
              <h2>Welcome to Admin Panel</h2>
            </div>
          </div>
        </div>

        <!-- /. PAGE INNER  -->
      </div>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
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
