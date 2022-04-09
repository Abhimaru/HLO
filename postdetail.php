<?php
include 'Connect.php';

if(!isset($_GET['id'])){
  header("location:login.php");
}

if(isset($_GET['id'])){
    $sql = "SELECT * FROM post_info WHERE Post_ID = '".$_GET['id']."'";
    if($result = mysqli_query($db, $sql)){
      if(mysqli_num_rows($result) > 0){  
include('header.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Blog Detail</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>
<br><br><br>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Doctors    
          </h3>
          <?php
           $rows=mysqli_fetch_assoc($result);
           $doc = $rows['Doc_ID'];
           $sql = "SELECT * FROM doc_account WHERE Doc_ID = '$doc'";
           if($result1 = mysqli_query($db, $sql)){
            $rows1=mysqli_fetch_assoc($result1);
             $name =  $rows1['Doc_Name'];
           }
          ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $rows['Post_Head'];?></h2>
            <p class="blog-post-meta"><?php echo $rows['P_Created'];?> by <a href="findadoc.php"><?php echo $name ?></a></p>
            <hr>
       <img style="border-radius: 8px; border-width:5px;border-style:solid;border-color:#3fbbc0;" 
       class="mx-auto d-block" 
       src=<?php echo $rows['Post_Img'];?> /><hr>
            <p><?php echo $rows['Post_Txt'];?></p>
          </div>
        </div>

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0"> <em>This is aimed to provide</em> you with diversified articles about the children. Here, you will get the detailed information.</p>
          </div>
        </aside>


      </div>

    </main>
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
        //include('footer.php'); 
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

}else{
 include('404.html');}

