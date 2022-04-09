<?php 
  include 'Connect.php';
  session_start();
?>

<?php
    if(!isset($_GET['id'])){
        header("location:allusers.php");
    }   

    if(isset($_POST['back_btn'])){
        header("location:allusers.php");
    }

    $uid = $_GET['id'];
    if(isset($_POST['delete_btn'])){
        $query = "DELETE from user_account WHERE User_ID = '$uid'";
        $result = mysqli_query($db , $query); 
        if($result){
            header("location:allusers.php");
        }
        else{
            array_push($errors, "User Not Removed");
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
              <a class="active-menu" href="allusers.php"><i class="fa fa-user fa-3x"></i> Manage Users</a>
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
                <h2>User Profile</h2>
                <hr />
                <form method="POST" enctype = "multipart/form-data">

                <?php
                $sql = "SELECT * FROM user_account where User_ID = '$uid'";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){  
                            $rows=$result->fetch_assoc();
                ?>
                <div class="form-group">
                    <label class="col-2">User ID: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['User_ID'])){echo $rows['User_ID'];} ?>">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">User Name: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['User_Name'])){echo $rows['User_Name'];} ?>">
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">User Email: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['User_Email'])){echo $rows['User_Email'];} ?>">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">User Created: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['U_Created'])){echo $rows['U_Created'];} ?>">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">User Updated: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['U_Updated'])){echo $rows['U_Updated'];} ?>">
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">User Status: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['U_Valid'])){echo $rows['U_Valid'];} ?>">
                    </div>
                </div>
                </br>

                <div><?php include('errors.php');?></div>
                  <input
                    type="submit"
                    name="back_btn"
                    value="Back"
                    class="bts btscol"
                  />
                  <input
                    type="submit"
                    name="delete_btn"
                    value="Delete"
                    class="bts btscol"
                  />
                </div>
              </form>
            </div>

            <?php 
            }
            }?>
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


<?php
    
?>