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
                      <th class="text-dark">Tool ID:</th>
                      <th class="text-dark">Tool Name</th>
                      <th class="text-dark">Remarks</th>
                      <th class="text-dark">Quantity</th>

                    </tr>
                  </thead>
                  <tbody class="bg-dark">
                    <?php
                    //Connect to database
                    require 'connectDB.php';

                    $sql = "SELECT t0.tool_name, t0.tool_id, t0.remarks, t0.quantity - count(t0.tool_id) quantity FROM tools t0 
                    right JOIN tool_logs t1 on t1.tool_id = t0.tool_id 
                    left join users_logs t2 on t2.id = t1.user_log_id 
                    WHERE t2.card_out = 0 group by t0.tool_name, t0.tool_name, t0.remarks;";
                    
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
                            <TD><?php echo $row['tool_id']; ?></TD>
                            <TD><?php echo $row['tool_name']; ?></TD>
                            <TD><?php echo $row['remarks']; ?></TD>
                            <TD>
                              <h3>
                              <?php echo $row['quantity']; ?>
                              </h3>
                            </TD>
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
            In the dynamic and safety-critical world of aviation, tool room security and management are paramount. Introducing a revolutionary solution that elevates tool room security to unprecedented levels while streamlining inventory management processes: the integration of Radio Frequency Identification (RFID) technology with the Avionics Inventory System (AIS).
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