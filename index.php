<?php
    include 'Connect.php';

    include("header.php");

    if(isset($_POST['contact_button_submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $Subject=$_POST['subject'];
      $message=$_POST['message'];

      $sql="SELECT User_ID from user_account where User_Email='$email'";
      $sql1=mysqli_query($db,$sql);
      $sql2=mysqli_fetch_assoc($sql1);
      $sql3=$sql2['User_ID'];
      
      if($sql3){
          $result = "INSERT INTO contact(User_ID,User_Name,User_Email,Con_Sub,Con_Text) VALUES ('$sql3','$name','$email','$Subject','$message')";
      }else{
          $result = "INSERT INTO contact(User_ID,User_Name,User_Email,Con_Sub,Con_Text) VALUES (NULL,'$name','$email','$Subject','$message')";
      }

      mysqli_query($db, $result);
    }


?>

<title>Home</title>
    <!-- Hero Section -->
    <section id="hero">
      <div
        id="heroCarousel"
        class="carousel slide carousel-fade"
        data-ride="carousel"
      >
        <div
          class="carousel-item active"
          style="background-image: url(assets/img/HeroImage.jpg)"
        >
          <div class="container">
            <h2>Welcome to <span>Healthy Little Ones</span></h2>
            <p>
              This is an pocket tool for everyone even childs can use this very
              easily, this includes BMI calculator, Symptem Checker and many
              more to come
            </p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
      </div>
    </section>

    <main id="main">
      <!-- About Us Section -->
      <section id="about" class="about">
        <div class="container">
          <div class="section-title">
            <h2>About Us</h2>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <img src="assets/img/SVP.jpg" class="img-fluid" alt="" />
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Our Main Agenda.</h3>
              <ul>
                <li>
                  <i class="icofont-check-circled"></i>Our main goal is to
                  promote awareness about the issue of child health care.
                </li>
                <li>
                  <i class="icofont-check-circled"></i>We Provide multiple
                  robust features.
                </li>
                <li>
                  <i class="icofont-check-circled"></i>We have a dedicated team
                  of doctors and staff to help you.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Doctors Section -->
      <section id="doctors" class="doctors section-bg">
        <div class="container">
          <div class="section-title">
            <h2>Doctors</h2>
            <p>List of Expert Doctors in Different Fields</p>
          </div>

          <div class="row">
            <?php 
              $sql = "SELECT * FROM doc_account LIMIT 4;";
              if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){  
                  while($rows=$result->fetch_assoc()){ ?>
                  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos-delay="100">
                      <div class="member-img">
                        <img
                          src=<?php echo "./" . $rows['Doc_Image']; ?> 
                          class="img-fluid" width="250px" height="300px"
                          alt=""
                        />
                      </div>
                      <div class="member-info">
                        <h4><?php echo $rows['Doc_Name']; ?></h4>
                      </div>
                    </div>
                  </div>
            <?php }}} ?>
        </div>
      </section>

      <!-- Contact Section -->
      <section id="contact" class="contact">
        <div class="container">
          <div class="section-title">
            <h2>Contact</h2>
            <p>SVP HOSPITAL</p>
          </div>
        </div>
        <div>
          <iframe
            style="border: 0; width: 100%; height: 350px"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.111374862329!2d72.56951351444215!3d23.019682522213856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8519e29e77a1%3A0x5b3ac4b4ab68d19!2sSVP%20Hospital!5e0!3m2!1sen!2sin!4v1646804368513!5m2!1sen!2sin"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
        <div class="container">
          <div class="row mt-5">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>Ellisbridge, Ahmedabad 380002</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@example.com<br />contact@example.com</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+91 1234567890<br />+91 0987654321</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <form method="POST" class="php-email-form">
                <div class="form-row">
                  <div class="col form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      data-rule="minlen:4"
                      data-msg="Please enter at least 4 chars"
                      require
                    />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      data-rule="email"
                      data-msg="Please enter a valid email"
                      require
                    />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    data-rule="minlen:8"
                    data-msg="Please enter at least 8 chars of subject"
                    require
                  />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    data-rule="minlen:20"
                    data-msg="Please write some descriptive message"
                    placeholder="Message"
                    require
                  ></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3"></div>
                <div class="text-center">
                  <button
                    type="submit"
                    class="btn btn-primary btn-lg"
                    name="contact_button_submit"
                  >
                    Send
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer Section -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Healthy Little Ones</span></strong
          >. All Rights Reserved
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
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
  </body>
</html>
