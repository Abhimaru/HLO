<?php
  $type='';
  session_start();
  if(isset($_SESSION["type"])){
    $type=$_SESSION["type"];
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top">
  </div>
  
 <?php
 if($type=='U')
 {
   ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a style="margin:-80px"href="index.php" class=" mr-auto">Welcome User, <?php echo $_SESSION['username']; ?></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>

          <li><a href="Sym.php">Symptom checker</a></li>
          <li><a href="postmain.php">Blog</a></li>
          <li><a href="docmain.php">Find A doctor</a></li>
           <li class="drop-down"><a href="">Health Info.</a>
          <ul>
            <li><a href="Bmi.php">BMI</a></li>
          </ul>
        </li> 
          <li><a href="index.php#contact">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="logout.php" class="appointment-btn scrollto" target="_self"> Logout  </a>

    </div>
  </header><!-- End Header --><br><br>
  <?php
  }
  else
  {
  ?>
   <!-- ======= Start Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a style="margin:-80px" href="index.php" class=" mr-auto"><img src="assets/img/logo.png" alt=""></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <a href="login.php" class="appointment-btn"> Login  </a>
    </div>
  </header>
  <!-- ======= END Header ======= -->
  
  <br><br>
  <?php
  }
  ?>