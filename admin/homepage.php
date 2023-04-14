<?php
require_once 'config.php';

$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking App</title>
<link rel="stylesheet" href="./styles/style.css" />
	<style type="text/css">
		.header{
			width: 100%;
			height: 40px;
			background-color: #fbebd8;
		}
		.header > h2 {
			text-align: center;
		}
		.header > time {
			float: right;
		}

		.body{
			float: right;
			width: 100%;
			height: 550px;
		}

		.buttons{
		
			padding: 10px;
			text-align: center;
		}
		.buttons > button {
			color: white;
			background-color: #e53c38;
			padding: 35px 35px 35px 35px;
			border-radius: 10px;
			border: none;
			font-size: 20px;
			margin: 15px;
		}
		   a{
      text-decoration: none;
      color: white;

    }
      .buttons > .lobtn{
    		color: white;
			background-color: #e53c38;
			padding: 10px;
			border-radius: 10px;
			border: none;
			font-size: 20px;
			margin: 15px;
    }
	</style>
</head>
<body>

		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Homepage</h1>
			</div>
			<div class="date">
				<h2><?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
	<div class="body">
		<div class="buttons">
			<button><a href="./movieList.php">Movie</a></button>
			<button><a href="./branchList.php">Branch</a></button>
			<button><a href="./account-list.php">Account</button> <br>
			<button><a href="./screenList.php">Screening</button>
			<button><a href="./profile.php">My Profile</button> <br><br>
				<button class="lobtn"><a href="homepage.php?logout" title="Log Out">Log Out</a></button>
		</div>
		<div>
			
		</div>
	</div>

</body>
</html>