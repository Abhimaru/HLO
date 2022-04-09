<?php
session_start();
if($_SESSION['type']!=="U"){
    header("location:login.php");
}


if(isset($_POST['disease'])){
    include 'Connect.php';
    $sql = "SELECT * FROM sym_info WHERE Dis_name = '".$_POST['disease']."'";
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

    <title>Diseas INFO</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>

   <br><br><br><br>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Disease Information
          </h3>
         <?php $rows=$result->fetch_assoc() ?>
          <div class="blog-post">
            <h1 class="blog-post-title"><?php echo $rows['Dis_name'];?></h1><hr>
            <b style="font-size:20px">Symptoms:- </b><?php echo $rows['Symptoms'];?></p>
            <hr>
            <b style="font-size:20px">Disease Info:- </b><br><?php echo $rows['Dis_text'];?></p>
            <hr>
            <b style="font-size:20px">Possible Treatment:- </b><br><?php echo $rows['Tre_text'];?></p>
            <hr>
            
            
          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0"> <em>This is aimed to provide</em> you with a detailed information about the diseases that occur in children. Here, you will get the detailed information.</p>
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
    <br><br><hr>
  </body>

</html>


<?php
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

}else{
 include('404.html');}
?>