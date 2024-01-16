<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Manage Users</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_users.js"></script>
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
			$.ajax({
				url: "manage_users_up.php"
			}).done(function(data) {
				$('#manage_users').html(data);
			});
			setInterval(function() {
				$.ajax({
					url: "manage_users_up.php"
				}).done(function(data) {
					$('#manage_users').html(data);
				});
			}, 5000);
		});
	</script>
</head>

<body class="bg-dark text-white">

	<?php include 'nav-top-header.php'; ?>

	<section class="container-lg py-lg-5">
		<?php include 'header.php'; ?>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

				<div class="card bg-dark-500 mb-2">
					<div class="card-body bg-dark-500  window">

						<div class="text-left mb-3">
							<a href="tools.php" class="btn btn-primary">
								<i class="fa fa-arrow-left" aria-hidden="true"></i>
							</a>
						</div>

						<div class="alert_user"></div>
						<!-- <h1 class="slideInDown animated">Add a new User or update his information <br> or remove him</h1> -->

						<div class="form-row">

							<div class="form-group col-8">
								<div class="section">
									<div id="manage_users"></div>
								</div>
							</div>

							<form enctype="multipart/form-data" class="col-4">

								<div class="form-group mb-2" hidden>
									<input type="hidden" class="form-control" name="user_id" id="user_id" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<div class="form-group mb-2">
									<label for="name" class="small">Username</label>
									<input type="text" class="form-control" name="name" id="name">
								</div>
								<div class="form-group mb-2">
									<label for="name" class="small">Serial Number:</label>
									<input type="number" class="form-control" name="number" id="number">
								</div>
								<div class="form-group mb-2">
									<label for="email" class="small">Email:</label>
									<input type="email" class="form-control" name="number" id="email">
								</div>
								<div class="form-group mb-2">
									<label for="contact" class="small">Contact:</label>
									<input type="number" class="form-control" name="number" id="contact_number">
								</div>

								<div class="form-group mb-2">
									<label for="Device" class="small">User Department:</label>
									<select class="dev_sel form-control" name="dev_sel" id="dev_sel" style="color: #000;">
										<option value="0">All Departments</option>
										<?php
										require 'connectDB.php';
										$sql = "SELECT * FROM devices ORDER BY device_name ASC";
										$result = mysqli_stmt_init($conn);
										if (!mysqli_stmt_prepare($result, $sql)) {
											echo '<p class="error">SQL Error</p>';
										} else {
											mysqli_stmt_execute($result);
											$resultl = mysqli_stmt_get_result($result);
											while ($row = mysqli_fetch_assoc($resultl)) {
										?>
												<option value="<?php echo $row['device_uid']; ?>"><?php echo $row['device_dep']; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>

								<div class="form-group mb-2">
									<input type="radio" name="gender" class="gender" value="Female"> Female

								</div>
								<div class="form-group mb-2">
									<input type="radio" name="gender" class="gender" value="Male" checked="checked"> Male
								</div>

								<div class="form-group">
									<button type="button" name="user_add" class="btn btn-success user_add form-control mb-2">Add User</button>
									<button type="button" name="user_upd" class="btn btn-primary user_upd form-control mb-2">Update User</button>
									<button type="button" name="user_rmo" class="btn btn-danger user_rmo form-control mb-2">Remove User</button>
								</div>
							</form>
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

</body>

</html>