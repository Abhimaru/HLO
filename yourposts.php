<?php
session_start();
include 'Connect.php';

$docid = $_SESSION['doctor_id'];
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
              <a href="docpanel.php"><i class="fas fa-mail-bulk fa-3x"></i> Add Posts</a>
            </li>
            <li>
              <a class="active-menu" href="yourposts.php"><i class="far fa-edit fa-3x"></i> Your Posts</a>
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

<!-- Side Section -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Your Post</h2>   
                    <h1 class="lead hidden-xs-down">Update or Delete any Posts</h1>
                    <hr />
                    <div class="col-md-9 col-lg-10 main"><br>
                        <table style="table-layout: fixed; width: 100%" class="table table-hover">
                        <thead>
                            <tr>
                                <th  style=" width: 25%"scope="col">ID</th>
                                <th style=" width: 25%"scope="col">Title</th>
                                <th style=" width: 50%"scope="col">Text</th>
                                <th style=" width: 25%"scope="col">Created on</th>
                                <th style=" width: 25%"scope="col">See Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM post_info where Doc_ID = '$docid'";
                                $result = mysqli_query($db, $sql);
                                if($result){
                                if(mysqli_num_rows($result) > 0){  
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <td style="word-wrap: break-word" ><?php echo $rows['Post_ID'] ?></td>
                                <td><?php echo $rows['Post_Head']; ?></td><?php $ans = "user"; ?></td>
                                <td><?php echo $rows['Post_Txt']; ?></td>
                                <td><?php echo $rows['P_Created']; ?></td>
                                <td><a href="viewpost.php?id=<?php echo $rows['Post_ID'];?>" class="btscol bts">
                                    <i class="lni lni-trash"></i>View>></a>
                                </td>
                                <!-- <td><a href="deleteans.php?id=<?php #echo $rows['Post_ID'];?>" class="btscol bts">
                                    <i class="lni lni-trash"></i>Delete
                                </td> -->
                            </tr> 
                            <?php 
                                }
  }
}
                            ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
        <hr />
    </div>
</div>
</div>

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
