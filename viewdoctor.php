<?php 
  include 'Connect.php';
  session_start();
?>

<?php
    if(!isset($_GET['id'])){
        header("location:alldoctors.php");
    }   

    if(isset($_POST['back_btn'])){
        header("location:alldoctors.php");
    }

    $uid = $_GET['id'];
    if(isset($_POST['delete_btn'])){
        $query = "DELETE from doc_account WHERE Doc_ID = '$uid'";
        $result = mysqli_query($db , $query); 
        if($result){
            header("location:alldoctors.php");
        }
        else{
            array_push($errors, "Doctor Not Removed");
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
          <p style="color:white">Welcome Admin</p>
          <ul class="nav" id="main-menu">
            <li>
              <a href="allusers.php"><i class="fa fa-user fa-3x"></i> Manage Users</a>
            </li>
            <li>
              <a class="active-menu" href="alldoctors.php"><i class="fa fa-user-md fa-3x"></i> Manage Doctor</a>
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
                $sql = "SELECT * FROM doc_account where Doc_ID = '$uid'";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){  
                            $rows=$result->fetch_assoc();
                ?>
                <div class="form-group">
                    <label class="col-2">Doctor Image: </label>
                    <div class="col-10">
                        <img style="border-radius: 8px; border-width:5px;border-style:solid;border-color:#3fbbc0;" 
                            class="mx-auto d-block" width="250" height="300"
                            src=<?php echo $rows['Doc_Image'];?> />
                        </br>
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">Doctor Name: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docnm" value="<?php if(isset($rows['Doc_Name'])){echo $rows['Doc_Name'];} ?>">
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">Doctor Qualification: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docquali" value="<?php if(isset($rows['Doc_Qualification'])){echo $rows['Doc_Qualification'];} ?>">
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">Doctor Experience: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docexp" value="<?php if(isset($rows['Doc_Experience'])){echo $rows['Doc_Experience'];} ?>">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">Doctor Email: </label>
                    <div class="col-10">
                        <input type="text" disabled="true" name="docmail" value="<?php if(isset($rows['Doc_Email'])){echo $rows['Doc_Email'];} ?>">
                    </div>
                </div>
                </br>
                
                <div class="form-group">
                    <label class="col-2">Doctor Address: </label>
                    <div class="col-10">
                        <textarea
                            rows="1"
                            cols="1"
                            class="form-control"
                            name="docaddress"
                            disabled = "true";
                            placeholder="Enter the Post text here."
                        ><?php if(isset($rows['Doc_Address'])){echo $rows['Doc_Address'];}?></textarea>
                    </div>
                </div>
                </br>

                <div class="form-group">
                    <label class="col-2">Dcotor Certificate: </label>
                    <div class="col-10">
                        <img style="border-radius: 8px; border-width:5px;border-style:solid;border-color:#3fbbc0;" 
                            class="mx-auto d-block" width="250" height="300"
                            src=<?php echo $rows['Doc_Certificate'];?> />
                        </br>
                    </div>
                </div>
                </br>

                
                <div class="col-10">
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

                <div><?php include('errors.php');?></div>
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