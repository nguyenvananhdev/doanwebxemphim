<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}
$fetch_screening = mysqli_query($connect, "select * from screening");

if(isset($_POST['sort_screening'])){
	$fetch_screening = mysqli_query($connect, "select * from screening order by screen_id asc");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>screenList</title>
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
	display: flow-root;
}
button.br_ed_btn {
 
    margin-left: 900px;
}
.left {
    padding-top: 10px;
}
.button-b {
    float: right;
    text-align: right;
    margin: 0px 20px 0px 0px
}
.draw-body .content {

    grid-template-rows: 5% auto;
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
				<h1>Screening List</h1>
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
				<li><a href="branchList.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<div class="content">
				<div class="button-b">
					<form method="post" action="#" style="display: inline;">
						
						<button type="submit" name="sort_screening">Sort By</button>

					</form>
					
				
					<button><a href="addScreen.php">New Screening</a></button>
				</div>
				<div class="main">
					 <?php
            $count = 1;
              while($screening = mysqli_fetch_assoc($fetch_screening)){
                $movie_det = mysqli_query($connect, "select * from movie where movie_id = '".$screening['movie_id']."' ");
                $movie = mysqli_fetch_assoc($movie_det);
                 $branch_det = mysqli_query($connect, "select * from branch where br_id = '".$screening['branch_id']."' ");
                $branch = mysqli_fetch_assoc($branch_det);
             ?>
					<div class="box-account">
						
						<div class="left">
							<li>Screening ID: <?php echo $screening['screen_id']; ?></li>
							<li>Movie: <?php echo $movie['movie_name']; ?></li>
							<li>Location: <?php echo $branch['branch_name']; ?></li>
							<li>Hall: <?php echo $screening['hall_id']; ?></li>
							<li>Date: <?php echo $screening['screening_date']; ?></li>
							<li>Time: <?php echo $screening['screening_time']; ?></li>
						</div>
						<button class="br_ed_btn"><a href="screenEdit.php?id=<?php echo $screening['screening_id']; ?>">Edit</a></button>
						
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
