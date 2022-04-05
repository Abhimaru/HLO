
<?php
  $bmi = "";
  $bmicontent = "";
  include("header.php");
?>

<?php
 
 if(isset($_POST['calculate']))
 {
     $h=empty($_POST["height"]) ? 0 : $_POST["height"];
     $w=empty($_POST["weight"]) ? 0 : $_POST["weight"];
     
     $index =0;
     $h = $h/39.37;
     if($h !=0 && $w !=0){
        $index = round($w/($h*$h),2);
        $bmi="";
        $bmiStyle="alert alert-primary";
        if ($index < 18.5) {
          $bmi="Underweight - BMI : " . $index;
		      $bmicontent = "Eat more frequently. When you're underweight, you may feel full faster. Eat five to six smaller meals during the day rather than two or three large meals.
          Choose nutrient-rich foods. As part of an overall healthy diet, choose whole-grain breads, pastas and cereals; fruits and vegetables; dairy products; lean protein sources; and nuts and seeds.";
          $bmiStyle="alert alert-secondary";
        } else if ($index < 25) {
          $bmi="Normal - BMI : ". $index;
		      $bmicontent="Maintaining a healthy BMI, it's important to exercise at least 60-90 minutes most days of the week. Stay hydrated and eat a balanced diet.";
          $bmiStyle="alert alert-success";
        } else if ($index < 30) {
          $bmi="Overweight - BMI : " . $index;
		      $bmicontent="Burn calories and maintain weight loss with daily workouts, cycling, swimming, etc.A diet is recommended that reduces ≥500 kcal/d [usually 1200 to 1500 kcal/d for women and 1500 to 1800 kcal/d for men]";
          $bmiStyle="alert alert-warning";
        } else {
          $bmi="Obese - BMI : " .$index;  
		      $bmicontent="Change your diet.Consider adding physical activity after reaching a minimum of 10 percent weight-loss goal.A diet is recommended that reduces ≥500 kcal/d [usually 1200 to 1500 kcal/d for women and 1500 to 1800 kcal/d for men]";
          $bmiStyle="alert alert-danger";
        }
      }else {
        $bmi = "enter the porper values";
        $bmiStyle = "alert alert-danger";
      }
 }
  
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>BMI</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
      rel="stylesheet"
    />

    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/owl.carousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/css/Bmi.css" rel="stylesheet" />
  </head>

  <body>
    <div class id="cen">
      <h1>BODY MASS INDEX (BMI)</h1>
    </div>

    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label for="height">Please Enter your Height in Inches :</label>
          <input
            type="text"
            class="form-control"
            name="height"
            placeholder="60"
            require
          />
        </div>
        <div class="form-group">
          <label for="weight">Please Enter your weight in KG :</label>
          <input
            type="text"
            class="form-control"
            name="weight"
            placeholder="150"
            require
          />
        </div>
        <div class="form-group">
          <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
        </div>
      </form>
    </div>

    <div class="<?=$bmiStyle?>" role="alert" id="bmi">
      <?php 
        echo $bmi ; 
	      echo "</br>";
	      echo $bmicontent;
      ?>
    </div>


  </body>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>
