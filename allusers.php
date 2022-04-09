<?php
session_start();
include 'Connect.php';
if(!$_SESSION['type'] == 'A'){
    header("location:adminlogin.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Users</title>
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

<!-- Side Section -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Manage Users</h2>   
                    <h1 class="lead hidden-xs-down">List of all users</h1>
                    <hr />
                    <div class="col-md-9 col-lg-10 main"><br>
                        <table style="table-layout: fixed; width: 100%" class="table table-hover">
                        <thead>
                            <tr>
                                <th  style=" width: 25%"scope="col">ID</th>
                                <th style=" width: 25%"scope="col">Name</th>
                                <th style=" width: 50%"scope="col">Email</th>
                                <th style=" width: 25%"scope="col">Created on</th>
                                <th style=" width: 25%"scope="col">View </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM user_account";
                                $result = mysqli_query($db, $sql);
                                if($result){
                                if(mysqli_num_rows($result) > 0){  
                                while($rows=$result->fetch_assoc())
                                {
                                ?>
                                <tr>
                                    <td style="word-wrap: break-word" ><?php echo $rows['User_ID'] ?></td>
                                    <td><?php echo $rows['User_Name']; ?></td>
                                    <td><?php echo $rows['User_Email']; ?></td>
                                    <td><?php echo $rows['U_Created']; ?></td>
                                    <td><a href="viewuser.php?id=<?php echo $rows['User_ID'];?>" class="btscol bts">
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
