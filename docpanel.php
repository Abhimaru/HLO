<?php 
  include 'Connect.php';
  session_start();
?>

<?php
	$errors = array();
  $docid = $_SESSION['doctor_id'];
  

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
    <title>DOCPANEL</title>
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
          <p style="color:white">Welcome Doctor,  <?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?></p>
          <ul class="nav" id="main-menu">
            <li>
              <a class="active-menu" href="docpanel.php"><i class="fas fa-mail-bulk fa-3x"></i> Add Posts</a>
            </li>
            <li>
              <a href="yourposts.php"><i class="far fa-edit fa-3x"></i> Your Posts</a>
            </li>
            <li>
              <a class="" href="#"><i class="fa fa-user-md fa-3x"></i> Profile</a>
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
              <h2>Add Posts</h2>
              <h1 class="lead hidden-xs-down">Write Down an Article!</h1>
              <hr />
              <form method="POST" enctype = "multipart/form-data">
                <div class="form-group">
                  <label class="col-2"
                    >Post Title<span class="required"> *</span></label
                  >
                  <div class="col-10">
                    <input
                      type="text"
                      class="form-control"
                      name="posttitle"
                      required="required"
                    />
                  </div>
                  <hr />
                </div>

                <label class="col-2"
                  >Post Text<span class="required"> *</span></label
                >
                <div class="col-10">
                  <textarea
                    rows="15"
                    cols="50"
                    class="form-control"
                    name="posttext"
                    placeholder="Enter the Post text here."
                  ></textarea>
                </div>
                <hr />

                <label class="col-4"
                  >Post Image<span class="required"> *</span></label
                >
                <div class="col-2">
                  <input type="file" name="image" required="required" />
                </div>
                <hr />

                <div><?php include('errors.php');?></div>

                <div class="col-10">
                  <input
                    type="submit"
                    name="Submit"
                    value="Post"
                    class="bts btscol"
                  />
                </div>
              </form>
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
