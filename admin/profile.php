<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

$user_details = mysqli_query($connect, "select * from users where id = '".$_SESSION['id']."' ");
	$user = mysqli_fetch_assoc($user_details);

	if(isset($_POST['update_profile'])){
		 mysqli_query($connect, "update users set password='".$_POST['new_password']."' where id='".$_SESSION['id']."' ");

		 header('location:profile.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>profile</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.content .main .box {

    margin: 25px 2rem auto 2rem;
}
button#update_profile_btn {
    margin: 40px 10px 10px 10px;
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
				<h1>My Profile</h1>
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
				<li><a href="./screenList.php">Screening</a></li>
				<li class="active"><a href="./profile.php">My Profile</a></li>
				<li><a href="profile.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" >
			<div class="content">
				<div class="button-bar">
					<button type="submit" name="update_profile" id="update_profile_btn">Save Changes</button>
				</div>
				<div class="main">
					<div class="box">
						<div class="left">
							<li>Username:</li>
							<li>Name:</li>
							<li>Employee ID:</li>
							<li>Email:</li>
							<li>Mobile Number:</li>
							<li>New Password:</li>
						</div>
						
						<div class="right">
							<li><?php echo $user['user_name'];?></li>
							<li><?php echo $user['first_name']." ".$user['last_name'];?></li>
							<li>A123456</li>
							<li><?php echo $user['email'];?></li>
							<li>0123456789</li>
							<li>

								<input type="text" name="new_password" id="pwd1" />
								&nbsp; &nbsp; &nbsp; Retype Password:
								<input
									type="text"
									name="confirm_password"
									id="pwd2"
								/>
							</li>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
