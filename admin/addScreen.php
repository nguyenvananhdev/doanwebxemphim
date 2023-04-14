<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

$fetch_movies = mysqli_query($connect,"select * from movie");
$fetch_branches = mysqli_query($connect,"select * from branch GROUP BY branch_name");
$fetch_halls = mysqli_query($connect,"select * from hall");

if(isset($_POST['add_screen'])){
	// echo $_POST['screen_id']."<br>";
	// echo $_POST['movie_id']."<br>";
	// echo $_POST['branch_id']."<br>";
	// echo $_POST['hall_id']."<br>";
	// echo $_POST['screening_date']."<br>";
	// echo $_POST['screening_time']."<br>";
	// exit();

	mysqli_query($connect, "insert into screening(screen_id, movie_id, branch_id, hall_id, screening_date, screening_time) values('".$_POST['screen_id']."','".$_POST['movie_id']."', '".$_POST['branch_id']."', '".$_POST['hall_id']."', '".$_POST['screening_date']."', '".$_POST['screening_time']."') ");

	header('location:screenList.php');
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>addScreen</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.content .main .box-account {
    margin: 40px 2rem auto 2rem;
}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
$(document).ready(function(){
    $('#branch_id').on('change', function(){
        var branchID = $(this).val();
     //   alert(branchID);
              
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'branch_id='+branchID,
                success:function(html){
                    $('#hall_id').html(html);
                   
                }
            }); 
        
    });

});


</script>
	</head>
	<body>
		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Add New Screen</h1>
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
				<li><a href="screen.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" action="#">
			<div class="content">
				<div class="button-bar-screen">
					<button class="delete" >DELETE</button>

					<button type="submit" name="add_screen">Add Screen</button>
				</div>
				<div class="main">
					<div class="box-account screen">
						<div class="left">
							<li>Screening ID:</li>
							<li>Movie:</li>
							<li>Location:</li>
							<li>Hall:</li>
							<li>Date:</li>
							<li>Time:</li>
						</div>
						<div class="right">
							<li><input type="text" name="screen_id" style="width:750px; font-size: 1.3rem; border: none;" placeholder="Enter screen here..." required></li>
							<li>
								<select style="width:750px; font-size: 1.3rem; border: none;" name="movie_id">
									<option>Select Movie</option>
									<?php
										while($movie = mysqli_fetch_assoc($fetch_movies)){
									?>

										<option value="<?php echo $movie['movie_id'];?>"><?php echo $movie['movie_name'];?></option>

									<?php
										}
									?>
									
								</select>
							</li>
							<li>
								<select style="width:750px; font-size: 1.3rem; border: none;" name="branch_id" id="branch_id">
									<option >Select Branch</option>
									<?php
										while($branch = mysqli_fetch_assoc($fetch_branches)){
									?>

										<option value="<?php echo $branch['br_id'];?>" ><?php echo $branch['branch_name'];?></option>

									<?php
										}
									?>
									
								</select>
							</li>

							<li>
								<select style="width:750px; font-size: 1.3rem; border: none;" name="hall_id" id="hall_id">
									<option value="" >Select Hall</option>
									
								</select>
							</li>
							<li><input type="date" name="screening_date" style="width:750px; font-size: 1.3rem; border: none;" required></li>
							<li><input type="text" name="screening_time" style="width:750px; font-size: 1.3rem; border: none;" required></li>
						</div>
							</form>
					</div>
					<!-- <div class="screen-box">
						<div class="movie-screen">
							<div class="movie"></div>
							<div class="seats">
								<div class="row">
									<div class="number">1</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">1</div>
								</div>
								<div class="row">
									<div class="number">2</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">2</div>
								</div>
								<div class="row">
									<div class="number">3</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">3</div>
								</div>
								<div class="row">
									<div class="number">4</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">4</div>
								</div>
								<div class="path"></div>
								<div class="row">
									<div class="number">5</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat selected"></div>
									<div class="seat selected"></div>
									<div class="seat occupied"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">5</div>
								</div>
								<div class="row">
									<div class="number">6</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat occupied"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">6</div>
								</div>
								<div class="row">
									<div class="number">7</div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="seat"></div>
									<div class="number">7</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</body>
</html>
