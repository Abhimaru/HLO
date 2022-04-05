<?php
  include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
    />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="assets/css/Sym.css" />

    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <br /><br /><br /><br /><br />

    <h1 style="text-align: center; font-size: 60px; color: #3fbbc0">
      Symptom Checker
    </h1>
    <br /><br />
    <form autocomplete="off" action="disinfo.php" method="POST">
      <div class="autocomplete" style="width: 300px; margin-left: 35%">
        <input
          id="myInput"
          type="text"
          name="disease"
          placeholder="Search....."
          required="required"
        />
      </div>
      <input type="submit" value="submit" />
    </form>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <br /><br />
  </body>
</html>
