<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   // 
    $admin->logout();
}
//Fetch movies from database...
$fetch_movies = mysqli_query($connect, "select * from movie");

if(isset($_POST['sort_movie'])){
	$fetch_movies = mysqli_query($connect, "select * from movie order by movie_name asc");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>movieList</title>
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
#tr_link{
	color: black;
}
#tr_link:hover{
	color: black;
	text-decoration: underline;
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
				<h1>Movie List</h1>
			</div>
			<div class="date">
				<h2><?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
		<div class="draw-body">
			<div class="drawer">
				<li class="active"><a href="./movieList.php">Movie</a></li>
				<li><a href="./branchList.php">Branch</a></li>
				<li><a href="./account-list.php">Account</a></li>
				<li><a href="./screenList.php">Screening</a></li>
				<li><a href="./profile.php">My Profile</a></li>
				<li><a href="branchList.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<div class="content">
				<div class="button-b">
					<form method="post" action="#" style="display: inline;">
						
						<button type="submit" name="sort_movie">Sort By</button>

					</form>
					
				
					<button><a href="./addMovie.php">New Movie</a></button>
				</div>
				<div class="main">
					 <?php
            $count = 1;
              while($movie = mysqli_fetch_assoc($fetch_movies)){
                
             ?>
					<div class="box-account">
						<div class="image">
							<img src="./images/<?php echo $movie['movie_poster']; ?>" alt="user-image" />
						</div>
						<div class="left">
							<li>Movie Name: <?php echo $movie['movie_name']; ?></li>
							<li>Duration: <?php echo $movie['movie_duration']; ?></li>
							<li>Publish Date: <?php echo $movie['movie_date']; ?></li>
							<li>Rating: <?php echo $movie['movie_rating']; ?></li>
							<li>Trailer Link: <a href="<?php echo $movie['movie_trailer']; ?>" id="tr_link"><?php echo $movie['movie_trailer']; ?></a></li>
						</div>
						<button class="br_ed_btn"><a href="movieEdit.php?id=<?php echo $movie['movie_id']; ?>">Edit</a></button>
						
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
