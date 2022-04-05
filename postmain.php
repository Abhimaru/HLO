<?php
include('header.php');

include 'Connect.php';
$sql = "SELECT * FROM post_info";
if($result = mysqli_query($db, $sql)){
  if(mysqli_num_rows($result) > 0){  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
    <style>
      .btscol{
      background-color: #4CAF50; 
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
      .bts{
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
  <br><br><br>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-10 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Doctors    
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title">Articles</h2>
            <table style="table-layout: fixed; width: 100%" class="table table-hover">
            <thead>
              <tr>
                <th  style=" width: 60%"scope="col">Posts</th>
                <th style=" width: 25%"scope="col">Created at</th>
                <th style=" width: 15%"scope="col">More</th>
              </tr>
            </thead>

            <tbody>
            <?php 
              while($rows=$result->fetch_assoc())
              {
            ?>
              <tr>
                <td style="word-wrap: break-word" ><?php echo $rows['Post_Head'] ?></td>
                <td><?php echo $rows['P_Created']; ?></td>
                <td><?php echo'<a href="postdetail.php?id='.$rows['Post_ID'].'" class=" btscol bts ">'?>
                    <i class="lni lni-trash"></i></i> More>>
                      </a></td>
              </tr> 
              <?php 
              }
              ?>
            </tbody>
          </table>
      </div>
    </div><!-- /.blog-main -->

    <aside class="col-md-2 blog-sidebar">
      <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
          <p class="mb-0"> <em>This is aimed to provide</em> you with diversified articles about the children. Here, you will get the detailed information.</p>
      </div>
    </aside><!-- /.blog-sidebar -->
  </div><!-- /.row -->
</main><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
  <?php
  //include('footer.php');
}
else{
  include('header.php');
  echo '  
        <br><br><br><h1>Sorry no records found.</h1><hr>';
        include('footer.php'); 
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

 ?>
</html>
