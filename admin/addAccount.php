<?php
require_once 'config.php';

$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

if(isset($_POST['add_account'])){
		// echo $_POST['m_name']."<br>";
		// echo $_POST['m_gender']."<br>";
		// echo $_POST['m_address']."<br>";
		// echo $_POST['m_email']."<br>";
		// echo $_POST['m_password']."<br>";
		// echo $_POST['m_number']."<br>";
		// echo $_POST['m_dob']."<br>";
		// echo $_POST['m_id_card']."<br>";
		// echo $_POST['m_points']."<br>";
	//exit();

	mysqli_query($connect, "insert into member(m_name, m_gender, m_address, m_email, m_password, m_number, m_dob, m_card, m_points) values('".$_POST['m_name']."', '".$_POST['m_gender']."', '".$_POST['m_address']."', '".$_POST['m_email']."', '".$_POST['m_password']."', '".$_POST['m_number']."', '".$_POST['m_dob']."', '".$_POST['m_id_card']."', '".$_POST['m_points']."')");
	//Transaction query
	if(!empty($_POST['booking_price'])){


		$fetch_member_id = mysqli_query($connect, "select * from member order by member_id desc");
		$member_id = mysqli_fetch_assoc($fetch_member_id);
		$last_member_id = $member_id['member_id'];
		$new_member_id = $last_member_id ;

	mysqli_query($connect, "insert into transaction(member_id, transactionDateTime, total_price, payment_type) values('".$new_member_id."', '".$_POST['transaction_date']."',  '".$_POST['booking_price']."', '".$_POST['payment_type']."')");

	header('location:account-list.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>addAccount</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.content .main .box-account li {
    padding-bottom: 0px;
}
.draw-body .content .button-bar-account {
    grid-template-columns: 83% 16% auto;
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
				<h1>Add Account</h1>
			</div>
			<div class="date">
				<h2><?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
		<div class="draw-body">
			<div class="drawer">
				<li><a href="./movieList.php">Movie</a></li>
				<li><a href="./branchList.php">Branch</a></li>
				<li class="active"><a href="./account-list.php">Account</a></li>
				<li><a href="./screenList.php">Screening</a></li>
				<li><a href="./profile.php">My Profile</a></li>
				<li><a href="account.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" action="#">
			<div class="content">
				<div class="button-bar-account">
					
					<button type="reset">Reset Details</button>
					<button type="submit" name="add_account">Add Account</button>
				</div>
				<div class="main">
					<div class="box-account">
						<div class="left">
							<li>Name:</li>
							<li>Gender:</li>
							<li>Address:</li>
							<li>Email:</li>
							<li>Password:</li>
							<li>Mobile Number:</li>
							<li>Date of Birth:</li>
							<li class="mem">Membership</li>
							<li>Member ID</li>
							<li>Member Points</li>
						</div>
						<div class="right">
							<li><input type="text" name="m_name" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter name here..." required></li>
							<li>
								<select  name="m_gender" style="width:750px; font-size: 1.3rem; border: none;" required>
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</li>
							<li><input type="text" name="m_address" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter address here..." required></li>
							<li><input type="email" name="m_email" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter email here..." required></li>
							<li><input type="password" name="m_password" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter password here..." required></li>
							<li><input type="text" name="m_number" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter mobile number here..." required></li>
							<li><li><input type="date" name="m_dob" style="width:750px; font-size: 1.3rem; border: none;" required></li></li>
							
							<li class="mem"></li>
							<li><li><input type="text" name="m_id_card" style="width:750px; font-size: 1.3rem; border: none;" required></li></li>
							<li><li><input type="text" name="m_points" style="width:750px; font-size: 1.3rem; border: none;" required></li></li>
						</div>
					
					</div>
					<br><h2 style="margin-left: 35px">Transaction Details</h2>
					<div class="box-account">
						<div class="left">
							<li>Transaction Date:</li>
							<li>Booking Price:</li>
							<li>Payment Type:</li>
						</div>
						<div class="right">
							<li><input type="date" name="transaction_date" style="width:750px; font-size: 1.3rem; border: none;" ></li>
							<li><input type="text" name="booking_price" style="width:750px; font-size: 1.3rem; border: none;" ></li>
							<li>
								<select name="payment_type" style="width:750px; font-size: 1.3rem; border: none;">
									<option value="VISA Card">VISA Card</option>
									<option value="Mastercard">Mastercard</option>
									<option value="Touch n Go eWallet">Touch n Go eWallet</option>
									<option value="Bank Transfer">Bank Transfer</option>
								</select>
							</li>

							
						</div>
					
					</div>
				</div>
			</div></form>
		</div>
	</body>
</html>
