<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>booking-details</title>
		<link rel="stylesheet" href="./styles/style.css" />
	</head>
	<body>
		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Booking Details</h1>
			</div>
			<div class="date">
				<h2><?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
		<div class="draw-body">
			<div class="drawer">
				<li><a href="./movieList.php">Movie</a></li>
				<li><a href="./branchList.php">Branch</a></li>
				<li><a href="./account-list.php">Account</a></li>
				<li class="active"><a href="./screenList.php">Screening</a></li>
				<li><a href="./profile.php">My Profile</a></li>
				<li><a href="booking-details.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<div class="content">
				<div class="button-bar-screen">
					<button class="delete">DELETE</button>
					<button>Save Changes</button>
				</div>
				<div class="main">
					<div class="box booking-details">
						<div class="left">
							<li>Transaction ID:</li>
							<li>Transaction Date & Time:</li>
							<li>Account:</li>
							<li>Screening & Movie:</li>
							<li>Seats:</li>
							<li>Food ID:</li>
							<li>Ticket ID</li>
							<li>Total Price (RM)</li>
							<li>Payment Type</li>
							<li>Status</li>
						</div>
						<div class="right">
							<li>A000001</li>
							<li>28/2/2022 18:24</li>
							<li>U00001 John Doe</li>
							<li>S00001 The Batman Movie</li>
							<li>J05, J06</li>
							<li>F000001</li>
							<li>T000001</li>
							<li>51</li>
							<li>Credit Card</li>
							<li style="background-color: white">
								Successful / Refund
							</li>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
