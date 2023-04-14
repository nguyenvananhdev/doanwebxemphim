<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

	$get_member = mysqli_query($connect, "select * from member where member_id = '".$_GET['id']."' ");
	$member_details = mysqli_fetch_assoc($get_member);

	if(isset($_POST['update_account'])){
	 	//echo $_POST['m_name']."<br>";
	// 	echo $_POST['m_gender']."<br>";
	// 	echo $_POST['m_address']."<br>";
	// 	echo $_POST['m_email']."<br>";
	// 	echo $_POST['m_password']."<br>";
	// 	echo $_POST['m_number']."<br>";
	// 	echo $_POST['m_dob']."<br>";
	// 	echo $_POST['m_id_card']."<br>";
	// 	echo $_POST['m_points']."<br>";
	// exit();

mysqli_query($connect, "update member set m_name = '".$_POST['m_name']."', m_gender = '".$_POST['m_gender']."', m_address = '".$_POST['m_address']."', m_email = '".$_POST['m_email']."', m_password = '".$_POST['m_password']."', m_number = '".$_POST['m_number']."', m_dob = '".$_POST['m_dob']."', m_card = '".$_POST['m_id_card']."', m_points = '".$_POST['m_points']."' where member_id = '".$_GET['id']."' ");

header('location:account-list.php');

	}

	if(isset($_POST['delete_account'])){
		mysqli_query($connect, "delete from member where member_id = '".$_GET['id']."' ");
		header('location:account-list.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>accountEdit</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
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
				<h1>Edit Account</h1>
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
				<li><a href="account1.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" action="#">
			<div class="content">
				<div class="button-bar-account">
					<button class="delete" type="submit" name="delete_account">DELETE</button>
					
					<button type="submit" name="update_account">Save Changes</button>
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
							<li><input type="text" name="m_name" style="width:750px; font-size: 1.3rem; border: none;" value="<?php echo $member_details['m_name']; ?>" required></li>
							<li>
								<select  name="m_gender" style="width:750px; font-size: 1.3rem; border: none;" required>
									<option>Select Gender</option>
									<option value="Male" <?php if($member_details['m_gender'] == "Male"){ echo "selected";}?> >Male</option>
									<option value="Female" <?php if($member_details['m_gender'] == "Female"){ echo "selected";}?>>Female</option>
									<option value="Other" <?php if($member_details['m_gender'] == "Other"){ echo "selected";}?>>Other</option>
								</select>
							</li>
							<li><input type="text" name="m_address" style="width:750px; font-size: 1.3rem; border: none;" value="<?php echo $member_details['m_address']; ?>" required></li>
							<li><input type="email" name="m_email" style="width:750px; font-size: 1.3rem; border: none;" value="<?php echo $member_details['m_email']; ?>" required></li>
							<li><input type="text" name="m_password" style="width:750px; font-size: 1.3rem; border: none;" value="<?php echo $member_details['m_password']; ?>" required></li>
							<li><input type="text" name="m_number" style="width:750px; font-size: 1.3rem; border: none;"  value="<?php echo $member_details['m_number']; ?>" required></li>
							<li><li><input type="date" name="m_dob" style="width:750px; font-size: 1.3rem; border: none;" required  value="<?php echo $member_details['m_dob']; ?>"></li></li>
							
							<li class="mem"></li>
							<li><li><input type="text" name="m_id_card" style="width:750px; font-size: 1.3rem; border: none;" required  value="<?php echo $member_details['m_card']; ?>"></li></li>
							<li><li><input type="text" name="m_points" style="width:750px; font-size: 1.3rem; border: none;" required  value="<?php echo $member_details['m_points']; ?>"></li></li>
						</div>
						
					</div>
					<br><br>
					<?php
						$member_transactions = mysqli_query($connect, "select * from transaction where member_id = '".$member_details['member_id']."' ");
					?>
					<div class="txn">
						<h3>Transaction History</h3>
						<table>
							<tr>
								<th>Transaction Date</th>
								<th>Transaction ID</th>
								<th>Screening ID</th>
								<th>View</th>
							</tr>
							<?php
								while($transaction = mysqli_fetch_assoc($member_transactions)){
							?>
							<tr>
								<td><?php echo $transaction['transactionDateTime']; ?></td>
								<td><?php echo $transaction['transaction_id']; ?></td>
								<td>KL00001</td>
								<td>
									<a href="viewTransaction.php?id=<?php echo $transaction['transaction_id']; ?>"><img src="./images/eye-solid.svg" alt="eye-icon"/></a>
									
								</td>
							</tr>
						<?php
							}
						?>
						</table>
					</div>
				</div>
			</div>
			</form>
		</div>
	</body>
</html>
