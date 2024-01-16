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
  <title>Users Logs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" type="image/png" href="icon/ok_check.png"> -->
  <link rel="stylesheet" type="text/css" href="css/userslog.css">

  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="js/bootbox.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  
  <script src="js/user_log.js"></script>
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
  <script>
    $(document).ready(function() {
      
      // $.ajax({
      //   url: "user_log_up.php",
      //   type: 'POST',
      //   data: {
      //     'select_date': 1,
      //   }
      // }).done(function(data) {
      //   $('#userslog').html(data);
      // });

      // setInterval(function() {
      //   $.ajax({
      //     url: "user_log_up.php",
      //     type: 'POST',
      //     data: {
      //       'select_date': 0,
      //     }
      //   }).done(function(data) {
      //     $('#userslog').html(data);
      //   });
      // }, 5000);



    });
  </script>

</head>

<body class="bg-dark text-white">


<?php include 'nav-top-header.php'; ?>

  <section class="container-lg py-lg-5">
    <!--User table-->
    <!-- <h1 class="slideInDown animated">Here are the Users daily logs</h1> -->

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
            <form method="POST" action="Export_Excel.php" enctype="multipart/form-data">

              <div class="form-row">
                <div class="form-group mb-2 col-2">
                  <label for="date_sel_start">From:</label>
                  <input type="date" name="date_sel_start" id="date_sel_start" class="form-control form-control-sm">
                </div>
                <div class="form-group mb-2 col-2">
                  <label for="End -Date">To:</label>
                  <input type="date" name="date_sel_end" id="date_sel_end" class="form-control form-control-sm">
                </div>

                <div class="form-group mb-2 col-2">
                  <label for="">Time:</label>
                  <div class="form-control">
                    <label for="radio-one" class="mb-0">in:</label>
                    <input type="radio" id="radio-one" name="time_sel" class="time_sel" value="Time_in" checked />
                    <label for="radio-two" class="mb-0">out:</label>
                    <input type="radio" id="radio-two" name="time_sel" class="time_sel" value="Time_out" />
                  </div>
                </div>

                <div class="form-group mb-2 col-2">
                  <label for="Start-Time">Time From:</b></label>
                  <input type="time" name="time_sel_start" id="time_sel_start" class="form-control form-control-sm">
                </div>
                <div class="form-group mb-2 col-2">
                  <label for="End -Time"><b>Time To:</b></label>
                  <input type="time" name="time_sel_end" id="time_sel_end" class="form-control form-control-sm">
                </div>
                <div class="form-group mb-2 col-2">
                  <label for="Fingerprint"><b>User:</b></label>
                  <select class="card_sel form-control" name="card_sel" id="card_sel" title="user">
                    <option value="0" class="form-control">All Users</option>
                    <?php
                    require 'connectDB.php';
                    $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id ASC";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                      echo '<p class="error">SQL Error</p>';
                    } else {
                      mysqli_stmt_execute($result);
                      $resultl = mysqli_stmt_get_result($result);
                      while ($row = mysqli_fetch_assoc($resultl)) {
                    ?>
                        <option value="<?php echo $row['card_uid']; ?>"><?php echo $row['username']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group mb-2 col-2">
                  <label for="Device">Department:</label>
                  <select class="dev_sel form-control" name="dev_sel" id="dev_sel">
                    <option value="0">All Departments</option>
                    <?php
                    require 'connectDB.php';
                    $sql = "SELECT * FROM devices ORDER BY device_dep ASC";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                      echo '<p class="error">SQL Error</p>';
                    } else {
                      mysqli_stmt_execute($result);
                      $resultl = mysqli_stmt_get_result($result);
                      while ($row = mysqli_fetch_assoc($resultl)) {
                    ?>
                        <option value="<?php echo $row['device_uid']; ?>" class="form-control"><?php echo $row['device_dep']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>


                <div class="form-group mb-2 col-6">
                  <label for="">&nbsp;</label>
                  <div>
                    <button type="button" name="user_log" id="user_log" class="btn btn-success">Load</button>
                    <input type="submit" name="To_Excel" value="Export" class="btn btn-danger">
                  </div>


                </div>
              </div>

            </form>
            <!-- //Log filter -->

              <div class="slideInRight animated">
                <div id="userslog"></div>
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


  <div class="modal fade" id="add-tool" tabindex="-1" role="dialog" aria-labelledby="New Device" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content bg-dark">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">Add Tool:</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

					<div class="modal-body">

          <label for="user_id"><b>User Id:</b></label>
						<input type="text" name="user_id" id="user_id" class="form-control" required disabled/><br>

						<label for="user_name"><b>User Name:</b></label>
						<input type="text" name="user_name" id="user_name" class="form-control" required disabled/><br>

						<label for="tool"><b>Tool:</b></label>
            <select class="form-control" name="tool" id="tool" required>
                <?php
                require 'connectDB.php';
                $sql = "SELECT * FROM tools";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                  echo '<p class="error">SQL Error</p>';
                } else {
                  mysqli_stmt_execute($result);
                  $resultl = mysqli_stmt_get_result($result);
                  while ($row = mysqli_fetch_assoc($resultl)) {
                ?>
                    <option value="<?php echo $row['tool_id']; ?>"><?php echo $row['tool_name']; ?></option>
                <?php
                  }
                }
                ?>
              </select><br>

            <label for="User-mail"><b>Asset Code:</b></label>
						<input type=text name="asset_code" id="asset_code" class="form-control" required/><br>

            <label for="User-mail"><b>Remarks:</b></label>
						<textarea name="remarks" id="remarks" class="form-control" required rows="3"></textarea><br>
            
					</div>
					<div class="modal-footer">
						<a type="button" name="save_tool" id="save_tool" class="btn btn-success save_tool" data-dismiss="modal" aria-label="Close">Add</a>
						<a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
					</div>

			</div>
		</div>
	</div>

  <div class="modal fade" id="view-tool" tabindex="-1" role="dialog" aria-labelledby="New Device" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content bg-dark">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">View Tools:</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
          <div class="slideInRight animated">
                <div id="viewTools"></div>
              </div>
					</div>
					<div class="modal-footer">
            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-tool">Add Tool</button> -->
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

  <script src="./dist/js/jquery-3.7.0.js"></script>
	<script src="./dist/js/jquery.dataTables.min.js"></script>
	<script src="./dist/js/dataTables.buttons.min.js"></script>

</body>

</html>