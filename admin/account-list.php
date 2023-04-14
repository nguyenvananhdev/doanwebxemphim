<?php
require_once 'config.php';

$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

	$membersList = mysqli_query($connect, "select * from member");
if(isset($_POST['sort_member'])){
	$membersList = mysqli_query($connect, "select * from member order by m_name asc");
}
if(isset($_POST['search_member'])){
	$membersList = mysqli_query($connect, "select * from member where m_name = '".$_POST['search_mem']."' or m_card = '".$_POST['search_mem']."' or m_email = '".$_POST['search_mem']."' ");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>account-list</title>
		<link rel="stylesheet" href="./styles/style.css" />

	</head>
	<body>
		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Account List/Overview</h1>
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
				<li><a href="account-list.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<div class="content">
				<form method="post" action="#">
				<div class="button-bar-overview button-bar-ac-list">
					<input type="text" placeholder="Search" name="search_mem" id="search_mem"/>
					<button type="submit" name="search_member">Search</button>
					<button type="submit" name="sort_member">Sort By v</button>
					<button><a href="./addaccount.php" style="text-decoration:none; color:#ffffff;">Add Account</a></button>
				</div>
				</form>
				<div class="main">
					<div class="ac-list">
						<table>
							<tr>
								<th>Member ID</th>
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Email</th>
								<th>Edit</th>
							</tr>
							<?php
								while($member = mysqli_fetch_assoc($membersList)){

							?>
							<tr>
								<td><?php echo $member['m_card'] ?></td>
								<td><?php echo $member['m_name'] ?></td>
								<td><?php echo $member['m_number'] ?></td>
								<td><?php echo $member['m_email'] ?></td>
							
								<td>
									<a href="accountEdit.php?id=<?php echo $member['member_id'] ?>">
										<img src="./images/pencil-solid.svg" alt="eye-icon"/>
									</a>
								</td>
							</tr>
						<?php } ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>&nbsp;</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
