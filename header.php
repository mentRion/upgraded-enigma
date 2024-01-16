<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.css"/>

</head>

<header>
<?php  
  if (isset($_GET['error'])) {
		if ($_GET['error'] == "wrongpasswordup") {
			echo '	<script type="text/javascript">
					 	setTimeout(function () {
			                $(".up_info1").fadeIn(200);
			                $(".up_info1").text("The password is wrong!!");
			                $("#admin-account").modal("show");
		              	}, 500);
		              	setTimeout(function () {
		                	$(".up_info1").fadeOut(1000);
		              	}, 3000);
					</script>';
		}
	} 
	if (isset($_GET['success'])) {
		if ($_GET['success'] == "updated") {
			echo '	<script type="text/javascript">
			 			setTimeout(function () {
			                $(".up_info2").fadeIn(200);
			                $(".up_info2").text("Your Account has been updated");
              			}, 500);
              			setTimeout(function () {
                			$(".up_info2").fadeOut(1000);
              			}, 3000);
					</script>';
		}
	}
	if (isset($_GET['login'])) {
	    if ($_GET['login'] == "success") {
	      echo '<script type="text/javascript">
	              
	              setTimeout(function () {
	                $(".up_info2").fadeIn(200);
	                $(".up_info2").text("You successfully logged in");
	              }, 500);

	              setTimeout(function () {
	                $(".up_info2").fadeOut(1000);
	              }, 4000);
	            </script> ';
	    }
	  }
?>

	  <?php  
    	if (isset($_SESSION['Admin-name'])) {
			echo '<ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist ">';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="home-tab" href="dashboard.php" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="users-tab" href="index.php" role="tab" aria-controls="users" aria-selected="false"><i class="fa fa-home" aria-hidden="true"></i> Users</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="contact-tab"  href="devices.php" role="tab" aria-controls="contact" aria-selected="true"><i class="fa fa-tablet" aria-hidden="true"></i> Department</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="profile-tab"  href="ManageUsers.php"role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user" aria-hidden="true"></i> Manage Users</a>';
			echo '</li>';
			
			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="contact-tab"  href="UsersLog.php" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-th-list" aria-hidden="true"></i> User Logs</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="tools-tab" href="tools.php" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-wrench" aria-hidden="true"></i> Tools</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" id="tool_logs-tab" href="tool_logs.php" role="tab" aria-controls="tool" aria-selected="false"><i class="fa fa-history" aria-hidden="true"></i> Tool Logs</a>';
			echo '</li>';

			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0 bg-dark-500 mr-1" href="#" data-toggle="modal" data-target="#admin-account" role="tab">'.$_SESSION['Admin-name'].'</a>';
			echo '</li>';
			
			echo '<li class="nav-item">';
			echo '<a class="nav-link bg-dark border-0  bg-dark-500 mr-1" href="logout.php" role="tab"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>';
			echo '</li>';

			echo '</ul>';

    	}
    	else{
			// echo '<li class="nav-item">';
			// echo '<a class="nav-link" href="login.php" role="tab"> Log Login</a>';
			// echo '</li>';
			
    	}
    ?>

<div class="up_info1 alert-danger"></div>
<div class="up_info2 alert-success"></div>
</header>

<script>
	function navFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>

<div class="modal fade " id="admin-account" tabindex="-1" role="dialog" aria-labelledby="Admin Update" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content  bg-dark">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Update Your Account Info:</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ac_update.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-body bg-dark">
	      	<label for="User-mail"><b>Admin Name:</b></label>
	      	<input type="text" name="up_name" placeholder="Enter your Name..." value="<?php echo $_SESSION['Admin-name']; ?>" class="form-control form-control-sm" required/><br>
	      	<label for="User-mail"><b>Admin E-mail:</b></label>
	      	<input type="email" name="up_email" placeholder="Enter your E-mail..." value="<?php echo $_SESSION['Admin-email']; ?>" class="form-control form-control-sm" required/><br>
	      	<label for="User-psw"><b>Password</b></label>
	      	<input type="password" name="up_pwd" placeholder="Enter your Password..."  class="form-control form-control-sm" required/><br>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" name="update" class="btn btn-success">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	  </form>
    </div>
  </div>
</div>

	

	
