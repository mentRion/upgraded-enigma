<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
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

            <div class="text-left mb-3">
					<a href="tools.php" class="btn btn-primary">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
					</a>
					</div>

              <div class="table-responsive slideInRight animated" style="max-height: 400px;">
                <table class="table">
                  <thead class="table-primary">
                    <tr>
                      <th class="text-dark">ID | Name</th>
                      <th class="text-dark">Serial Number</th>
                      <th class="text-dark">Gender</th>
                      <th class="text-dark">User UID</th>
                      <th class="text-dark">Email</th>
                      <th class="text-dark">Contact Number</th>
                      <th class="text-dark">Date</th>
                      <th class="text-dark">Department</th>
                    </tr>
                  </thead>
                  <tbody class="bg-dark">
                    <?php
                    //Connect to database
                    require 'connectDB.php';

                    $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id DESC";
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
                            <TD>
                                <i class="fa fa-user" aria-hidden="true"></i>
                              <?php echo $row['id'];
                                echo " | ";
                                echo $row['username']; ?></TD>
                            <TD><?php echo $row['serialnumber']; ?></TD>
                            <TD><?php echo $row['gender']; ?></TD>
                            <TD><?php echo $row['card_uid']; ?></TD>
                            <TD><?php echo $row['email']; ?></TD>
                            <TD><?php echo $row['contact_number']; ?></TD>
                            <TD><?php echo $row['user_date']; ?></TD>
                            <TD><?php echo $row['device_dep']; ?></TD>
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

            </div>
          </div>
        </div>
      </div>

        </div>
      </div>
    </section>



  </main>
</body>

</html>