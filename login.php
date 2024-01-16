<?php
session_start();
if (isset($_SESSION['Admin-name'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="js/jquery-2.2.3.min.js"></script>
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.message', function() {
        $('form').animate({
          height: "toggle",
          opacity: "toggle"
        }, "slow");
        $('h1').animate({
          height: "toggle",
          opacity: "toggle"
        }, "slow");
      });
    });
  </script>
</head>

<body class="bg-dark text-white">

  <?php include 'header.php'; ?>


  <div class="table-responsive slideInRight animated">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">


      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/Philscahangar.jpg" alt="Los Angeles" class="w-100">

          <div class="container">
            <div class="carousel-caption text-center">
              <h1>Avionics Inventory System</h1>
              <p>Some representative placeholder content for the first slide of the carousel.</p>

              <div class="fade show" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content bg-dark-500">
                    <div class="modal-header">
                      <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body form">
                      <?php
                      if (isset($_GET['error'])) {
                        if ($_GET['error'] == "invalidEmail") {
                          echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
                        } elseif ($_GET['error'] == "sqlerror") {
                          echo '<div class="alert alert-danger">
                        There a database error!!
                      </div>';
                        } elseif ($_GET['error'] == "wrongpassword") {
                          echo '<div class="alert alert-danger">
                        Wrong password!!
                      </div>';
                        } elseif ($_GET['error'] == "nouser") {
                          echo '<div class="alert alert-danger">
                        This E-mail does not exist!!
                      </div>';
                        }
                      }
                      if (isset($_GET['reset'])) {
                        if ($_GET['reset'] == "success") {
                          echo '<div class="alert alert-success">
                        Check your E-mail!
                      </div>';
                        }
                      }
                      if (isset($_GET['account'])) {
                        if ($_GET['account'] == "activated") {
                          echo '<div class="alert alert-success">
                        Please Login
                      </div>';
                        }
                      }
                      if (isset($_GET['active'])) {
                        if ($_GET['active'] == "success") {
                          echo '<div class="alert alert-success">
                        The activation like has been sent!
                      </div>';
                        }
                      }
                      ?>
                      <div class="alert1"></div>
                      <form class="reset-form" action="reset_pass.php" method="post" enctype="multipart/form-data">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="user@email.com" class="form-control mb-1" required />
                        <p class="message"><a href="#">LogIn</a></p>
                        <div class="modal-footer">
                          <button type="submit" name="reset_pass" id="login" class="btn btn-primary">Reset</button>
                        </div>
                      </form>
                      <form class="login-form" action="ac_login.php" method="post" enctype="multipart/form-data">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" placeholder="user@email.com" class="form-control mb-2" required />
                        <label for="">Password</label>
                        <input type="password" name="pwd" id="pwd" placeholder="*************" class="form-control mb-2" required />

                        <p class="message">Forgot your Password? <a href="#">Reset your password</a></p>

                        <div class="modal-footer">
                          <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                        </div>
                      </form>

                    </div>
                    <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>


      </div>

      <div class="container">

        <div class="text-center">

          <h1>Avionics Instructors</h1>
          <p>The instructors of the Aviation Electronics Technology of PhilSCA Villamor Campus</p>

        </div>



        <div class="container row">

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/toolkeeper.webp" />
            <h2>Heading</h2>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/toolkeeper.webp" />
            <h2>Heading</h2>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/toolkeeper.webp" />
            <h2>Heading</h2>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-12 text-center">

            <h1>Administrators</h1>
            <p>The researchers behind the project</p>

          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/Patrick gradpic.jpg" />
            <h2>Patrick</h2>
            <p>Thesis Leader</p>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/Allen gradpic.jpg" />

            <h2>Allen</h2>
            <p>Thesis Member</p>

          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4 text-center">
            <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/CJ gradpic.jpg" />

            <h2>Carl</h2>
            <p>Thesis Member</p>

          </div><!-- /.col-lg-4 -->

          <div class="col-lg-12 text-center">
              <img class="rounded" width="200px" height="250px" alt="avatar1" src="./images/Choy gradpic.jpg" />
              <h2>Choy</h2>
              <p>Thesis Member</p>


            </div><!-- /.col-lg-4 -->

          



        </div><!-- /.row -->

        <div class="container row">
          <!-- START THE FEATURETTES -->

          <hr class="featurette-divider" style='margin-top: 50px;'>

          <div class="row featurette">
            <div class="col-md-11">
              <h4 class="featurette-heading" style='margin-top: 0px;'>Unparalleled Security, Streamlined Management System</h4>
              <p></p>
              <p class="" style='margin-top: 50px;'>In the dynamic and safety-critical world of aviation, tool room security and management are paramount. Introducing a revolutionary solution that elevates tool room security to unprecedented levels while streamlining inventory management processes: the integration of Radio Frequency Identification (RFID) technology with the Avionics Inventory System (AIS).</p>

              <p class="">A system that:</p>
              <!-- Other paragraphs with the same styling -->

              <p class="">Utilizes RFID tags to uniquely identify and track every tool in the tool room, preventing unauthorized access and ensuring the whereabouts of every critical piece of equipment.

                Leverages RFID technology to automate tool check-in and check-out procedures, eliminating manual processes and reducing the risk of human error.

                Integrates seamlessly with the AIS, providing real-time visibility into tool inventory levels and usage patterns, enabling data-driven decision-making for procurement and maintenance planning.</p>

              <p class="">Empowers tool room personnel with real-time alerts and notifications, ensuring immediate action in case of tool misplacement or unauthorized access attempts.

                Streamlines the tool calibration process, ensuring that only calibrated and certified tools are used on aircraft, enhancing overall safety and compliance.

                Provides comprehensive audit trails for all tool movements and usage, fostering accountability and transparency within the tool room.</p>

              <p class=""> This groundbreaking integration of RFID technology and AIS marks a new era in tool room security and management. By combining the power of real-time tracking, automated inventory management, and enhanced security measures, this system empowers aviation organizations to achieve unparalleled levels of efficiency, safety, and compliance.

                The future of tool room security and management is here. Embrace the power of RFID and AIS to transform your operations today.</p>
            </div>


          </div>


          <hr class="featurette-divider">

          <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

      </div>
    </div>

  </div>



  </div>

</body>

</html>