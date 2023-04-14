<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

$trans_details = mysqli_query($connect, "select * from transaction where transaction_id = '".$_GET['id']."' ");
	$trans = mysqli_fetch_assoc($trans_details);

	if(isset($_POST['update_transaction'])){
		// echo $_POST['new_status'];
		// exit();
		 mysqli_query($connect, "update transaction set status= '".$_POST['new_status']."' where transaction_id='".$_GET['id']."' ");

		 header('location:account-list.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>viewTransaction</title>
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
				<h1>Transation Details</h1>
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
				<li><a href="profile.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" >
			<div class="content">
				<div class="button-bar">
					<button type="submit" name="update_transaction" id="update_profile_btn">Save Changes</button>
				</div>
				<div class="main">
					<div class="box">
						<div class="left">
							<li>Transaction ID:</li>
							<li>Transaction Date & Time:</li>
							<li>Account:</li>
							<li>Screening & Movie:</li>
							<li>Seats:</li>
							<li>Total Price (RM):</li>
							<li>Payment Type</li>
							<li>Status:</li>
						</div>
						
						<div class="right">
							<li><?php echo $trans['transaction_id'];?></li>
							<li><?php echo $trans['transactionDateTime'];?></li>
							<li>A123456</li>
							<li>Abc Movie</li>
							<li>Abc Seat</li>
							<li><?php echo $trans['total_price'];?></li>
							<li><?php echo $trans['payment_type'];?></li>
							<li>
								<select name="new_status" value="<?php echo $trans['status'];?>">
									<option>Update Status</option>
									<option value="Successful" <?php if($trans['status'] == "Successful"){ echo "selected"; } ?> >Successful</option>
									<option value="Refund" <?php if($trans['status'] == "Refund"){ echo "selected"; } ?> >Refund</option>
								</select>
								
							</li>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
