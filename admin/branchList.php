<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}
$fetch_branches = mysqli_query($connect, "select * from branch GROUP BY branch_name");

if(isset($_POST['sort_branch'])){
	$fetch_branches = mysqli_query($connect, "select * from branch GROUP BY branch_name order by branch_name asc");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>branchList</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
						.content .main .box-account .image {
    display: flow-root;
}
a{
	text-decoration: none;
	color: white;
}
img {
    border-radius: 10% 0% 0% 10%;
}

.content .main .box-account {
	padding: 0px !important;
	margin-top: 30px !important;
}
button.br_ed_btn {
    margin-top: 125px;
}
.left {
    padding-top: 10px;
}
.button-b {
    float: right;
    text-align: right;
    margin: 30px 35px 10px 10px;
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
				<h1>Branch List</h1>
			</div>
			<div class="date">
				<h2><?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
		<div class="draw-body">
			<div class="drawer">
				<li><a href="./movieList.php">Movie</a></li>
				<li class="active"><a href="./branchList.php">Branch</a></li>
				<li><a href="./account-list.php">Account</a></li>
				<li><a href="./screenList.php">Screening</a></li>
				<li><a href="./profile.php">My Profile</a></li>
				<li><a href="branchList.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<div class="content">
				<div class="button-b">
					<form method="post" action="#" style="display: inline;">
						
						<button type="submit" name="sort_branch">Sort By</button>

					</form>
					
				
					<button><a href="./addBranch.php">New Branch</a></button>
				</div>
				<div class="main">
					 <?php
            $count = 1;
              while($branch = mysqli_fetch_assoc($fetch_branches)){
                
             ?>
					<div class="box-account">
						<div class="image">
							<img src="./images/<?php echo $branch['branch_image']; ?>" alt="user-image" />
						</div>
						<div class="left">
							<li>Branch ID: <?php echo $branch['branch_id']; ?></li>
							<li>Branch Name: <?php echo $branch['branch_name']; ?></li>
							<li>Location: <?php echo $branch['branch_address']; ?></li>
						</div>
						<button class="br_ed_btn"><a href="branchEdit.php?id=<?php echo $branch['branch_id']; ?>&br_id=<?php echo $branch['br_id']; ?>">Edit</a></button>
						
					</div>
					<br>
			<?php 
				++$count;
		} ?>					
				</div>
			</div>
		</div>
	</body>
</html>
