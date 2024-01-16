<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Manage Devices</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--   	<link rel="icon" type="image/png" href="images/favicon.png"> -->
	<link rel="stylesheet" type="text/css" href="css/devices.css" />

	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/dev_config.js"></script>
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
				url: "dev_up.php",
				type: 'POST',
				data: {
					'dev_up': 1,
				}
			}).done(function(data) {
				$('#devices').html(data);
			});
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
					<div class="card-body bg-dark-500 window">

									
						<div class="text-left mb-3">
						<a href="tools.php" class="btn btn-primary">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</a>
						</div>

						<div class="alert_user"></div>
						<!-- <h1 class="slideInDown animated">Add a new User or update his information <br> or remove him</h1> -->

						<div class="form-row">

							<div class="form-group col-12">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new-device">New Device</button>
							</div>

							<div class="form-group col-12">
								<div id="devices"></div>
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
		</div>

	</section>



	<div class="modal fade" id="new-device" tabindex="-1" role="dialog" aria-labelledby="New Device" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content bg-dark">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">Add new device:</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<label for="User-mail"><b>Device Name:</b></label>
						<input type="text" name="dev_name" id="dev_name" placeholder="Device Name..." class="form-control" required /><br>
						<label for="User-mail"><b>Device Department:</b></label>
						<input type="text" name="dev_dep" id="dev_dep" placeholder="Device Department..." class="form-control" required /><br>
					</div>
					<div class="modal-footer">
						<button type="button" name="dev_add" id="dev_add" class="btn btn-success">Create new Device</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>