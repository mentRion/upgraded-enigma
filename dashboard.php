<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">

  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="css/Users.css">
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }



    .lead {
      text-align: justify;
      text-align-last: left;
      text-justify: inter-word;
      margin-top: 50px;
    }
  </style>
  <link href="css/carousel.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

  <?php include 'nav-top-header.php'; ?>

  <main>

    <section class="container-lg py-lg-5">
      <?php include 'header.php'; ?>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

          <div class="card bg-dark-500 mb-2">
            <div class="card-body bg-dark-500 window">
              <div class="row g-0">


                <div class="col-sm-3 mb-5">
                  <div class="card bg-dark mb-2 h-100">
                    <div class="card-body">
                      <h4><i class="fa fa-users" aria-hidden="true"></i> Users</h4>
                      <h1 class="font-weight-bold text-success">
                        <?php
                        //Connect to database
                        require 'connectDB.php';

                        $sql = "SELECT count(*) count FROM users";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                          echo '<p class="error">SQL Error</p>';
                        } else {
                          mysqli_stmt_execute($result);
                          $resultl = mysqli_stmt_get_result($result);
                          if (mysqli_num_rows($resultl) > 0) {
                            while ($row = mysqli_fetch_assoc($resultl)) {
                        ?>
                              <?php echo $row['count']; ?>
                        <?php
                            }
                          }
                        }
                        ?>
                      </h1>

                      <div class="text-right">
                        <a href="index.php" class="btn btn-primary">
                          <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-sm-3 mb-5">
                  <div class="card bg-dark mb-2 h-100">
                    <div class="card-body">
                      <h4><i class="fa fa-building" aria-hidden="true"></i> Department</h4>
                      <h1 class="font-weight-bold text-success">

                        <?php
                        //Connect to database
                        require 'connectDB.php';

                        $sql = "SELECT count(*) count FROM devices";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                          echo '<p class="error">SQL Error</p>';
                        } else {
                          mysqli_stmt_execute($result);
                          $resultl = mysqli_stmt_get_result($result);
                          if (mysqli_num_rows($resultl) > 0) {
                            while ($row = mysqli_fetch_assoc($resultl)) {
                        ?>
                              <?php echo $row['count']; ?>
                        <?php
                            }
                          }
                        }
                        ?>

                      </h1>

                      <div class="text-right">
                        <a href="devices.php" class="btn btn-primary">
                          <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>


                <div class="col-sm-3  mb-5">
                  <div class="card bg-dark mb-2 h-100">
                    <div class="card-body">
                      <h4><i class="fa fa-wrench" aria-hidden="true"></i> Tools</h4>

                      <h1 class="font-weight-bold text-success">

                        <?php
                        //Connect to database
                        require 'connectDB.php';

                        $sql = "SELECT count(*) count FROM tools";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                          echo '<p class="error">SQL Error</p>';
                        } else {
                          mysqli_stmt_execute($result);
                          $resultl = mysqli_stmt_get_result($result);
                          if (mysqli_num_rows($resultl) > 0) {
                            while ($row = mysqli_fetch_assoc($resultl)) {
                        ?>
                              <?php echo $row['count']; ?>
                        <?php
                            }
                          }
                        }
                        ?>

                      </h1>

                      <div class="text-right">
                        <a href="tools.php" class="btn btn-primary">
                          <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>



                <div class="col-sm-3 mb-5">
                  <div class="card bg-dark mb-2 h-100">
                    <div class="card-body">
                      <h4><i class="fa fa-book" aria-hidden="true"></i> User Logs </h4>
                      <h1 class="font-weight-bold text-success">
                        <?php
                        //Connect to database
                        require 'connectDB.php';

                        $sql = "SELECT count(*) count FROM users_logs";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                          echo '<p class="error">SQL Error</p>';
                        } else {
                          mysqli_stmt_execute($result);
                          $resultl = mysqli_stmt_get_result($result);
                          if (mysqli_num_rows($resultl) > 0) {
                            while ($row = mysqli_fetch_assoc($resultl)) {
                        ?>
                              <?php echo $row['count']; ?>
                        <?php
                            }
                          }
                        }
                        ?>
                      </h1>

                      <div class="text-right">
                        <a href="UsersLog.php" class="btn btn-primary">
                          <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-sm-3 mb-5">
                  <div class="card bg-dark mb-2">
                    <div class="card-body">
                      <h4><i class="fa fa-book" aria-hidden="true"></i> Tool Logs </h4>
                      <h1 class="font-weight-bold text-success">
                        <?php
                        //Connect to database
                        require 'connectDB.php';

                        $sql = "SELECT count(*) count FROM tool_logs";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                          echo '<p class="error">SQL Error</p>';
                        } else {
                          mysqli_stmt_execute($result);
                          $resultl = mysqli_stmt_get_result($result);
                          if (mysqli_num_rows($resultl) > 0) {
                            while ($row = mysqli_fetch_assoc($resultl)) {
                        ?>
                              <?php echo $row['count']; ?>
                        <?php
                            }
                          }
                        }
                        ?>
                      </h1>
                      <div class="text-right">
                        <a href="tool_logs.php" class="btn btn-primary">
                          <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-sm-9 mb-5">
                  <div class="card bg-dark mb-2 shadow-lg">
                    <div class="card-body">
                      <h4><i class="fa fa-user" aria-hidden="true"></i> Administrators</h4>

                      <table class="table">
                        <thead class="table-primary">
                          <tr>
                            <th class="text-dark">ID</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Email</th>

                          </tr>
                        </thead>

                        <tbody class="bg-dark">

                          <?php
                          //Connect to database
                          require 'connectDB.php';

                          $sql = "SELECT * FROM admin ORDER BY id DESC";
                          $result = mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                          } else {
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            if (mysqli_num_rows($resultl) > 0) {
                              while ($row = mysqli_fetch_assoc($resultl)) {
                          ?>
                                <TR>

                                  <TD><?php echo $row['id']; ?></TD>
                                  <TD><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row['admin_name']; ?></TD>
                                  <TD><?php echo $row['admin_email']; ?></TD>

                                </TR>
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


              </div>



            </div>
          </div>

          <div class="row g-0">
            <div class="col-sm-3">
              <div class="card bg-dark-500 mb-2 h-100">
                <div class="card-body">
                  <?php include 'footer.php'; ?>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="card bg-dark-500 mb-2 h-100">
                <div class="card-body">
                  In the dynamic and safety-critical world of aviation, tool room security and management are paramount. Introducing a revolutionary solution that elevates tool room security to unprecedented levels while streamlining inventory management processes: the integration of Radio Frequency Identification (RFID) technology with the Avionics Inventory System (AIS).
                </div>
              </div>
            </div>
          </div>

        </div>
    </section>



  </main>
</body>

</html>