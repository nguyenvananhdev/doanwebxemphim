<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

$sc_id = $_GET['id'];
$screening_id = $_GET['id'];
$occupied = mysqli_query($connect, "select * from seat where screening_id= '".$screening_id."' ");

if (isset($_POST['update_screening'])) {
	  mysqli_query($connect, "update screening set movie_id ='".$_POST['movie_id']."', branch_id='".$_POST['branch_id']."', hall_id ='".$_POST['hall_id']."', screening_date='".$_POST['screening_date']."', screening_time='".$_POST['screening_time']."'  where screening_id='".$sc_id."' ");

	  header('location:screenList.php');
}

if(isset($_POST['delete_screening'])){
	mysqli_query($connect, "delete from screening where screening_id = '".$sc_id."' ");
	header('location:screenList.php');
}

$fetch_movies = mysqli_query($connect,"select * from movie");
$fetch_branches = mysqli_query($connect,"select * from branch GROUP BY branch_name");
$fetch_halls = mysqli_query($connect,"select * from hall");


	$screening_details = mysqli_query($connect, "select * from screening where screening_id = '".$sc_id."' ");
	$screening = mysqli_fetch_assoc($screening_details);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>screenEdit</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.draw-body .content .button-bar-screen {
   
    display: flex;
}
button {
    margin: 20px 134px 20px 20px;
}
a {
    color: white;
    text-decoration: none;
}
		</style>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
$(document).ready(function(){
    $('#branch_id').on('change', function(){
        var branchID = $(this).val();
       // alert(branchID);
              
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'branchEdit_id='+branchID,
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
				<h1>Screening Edit</h1>
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
					<button class="delete" type="submit" name="delete_screening">DELETE</button>
					<button><a href="addScreen.php">New Screen</a></button>
					<button type="submit" name="update_screening">Save Changes</button>
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
							<li><?php echo $screening['screen_id']; ?></li>
							<li>
								<select style="width:750px; font-size: 1.3rem; border: none;" name="movie_id">
									<option>Select Movie</option>
									<?php
										while($movie = mysqli_fetch_assoc($fetch_movies)){
									?>

										<option value="<?php echo $movie['movie_id'];?>" <?php if($screening['movie_id'] == $movie['movie_id'] ){ echo "selected"; } ?>><?php echo $movie['movie_name'];?></option>

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

										<option value="<?php echo $branch['br_id'];?>" <?php if($screening['branch_id'] == $branch['br_id'] ){ echo "selected"; } ?> ><?php echo $branch['branch_name'];?></option>

									<?php
										}
									?>
									
								</select>
							</li>
							<li>
								<select style="width:750px; font-size: 1.3rem; border: none;" name="hall_id" id="hall_id">
									<option value="0">Select Hall</option>
									<?php
										$hall = mysqli_fetch_assoc($fetch_halls);
									?>

										<option value="<?php echo $screening['hall_id'];?>" selected><?php echo $screening['hall_id'];?></option>

									
								</select>
							</li>
							<li><input type="date" name="screening_date" style="width:750px; font-size: 1.3rem; border: none;" required value="<?php echo $screening['screening_date']; ?>"></li>
							<li><input type="text" name="screening_time" style="width:750px; font-size: 1.3rem; border: none;" required value="<?php echo $screening['screening_time']; ?>"></li>
					
						</div>
					</div>
					</form>
					<div class="screen-box">
						<div class="movie-screen">
                    <div class="movie"></div>
                    <div class="seats">
                        <div class="row">
                            <div class="number">A</div>
                            <?php
                            for ($i = 1; $i <= 9; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "A$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="A' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">A</div>
                        </div>
                        <div class="row">
                            <div class="number">B</div>
                            <?php

                            for ($i = 1; $i <= 9; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "B$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="B' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">B</div>
                        </div>
                        <div class="row">
                            <div class="number">C</div>
                            <?php

                            for ($i = 1; $i <= 9; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "C$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="C' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">C</div>
                        </div>
                        <div class="row">
                            <div class="number">D</div>
                            <?php

                            for ($i = 1; $i <= 9; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "D$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="D' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">D</div>
                        </div>
                        <div class="path"></div>
                        <div class="row">
                            <div class="number">E</div>
                            <?php

                            for ($i = 1; $i <= 11; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "E$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="E' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">E</div>
                        </div>
                        <div class="row">
                            <div class="number">F</div>

                            <?php

                            for ($i = 1; $i <= 11; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "F$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="F' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">F</div>
                        </div>
                        <div class="row">
                            <div class="number">G</div>
                            <?php

                            for ($i = 1; $i <= 11; $i++) {
                                $x = 0;
                                $occupied = mysqli_query($connect, "SELECT * FROM seat WHERE screening_id=$screening_id");
                                while ($row = mysqli_fetch_array($occupied)) {
                                    if ($row['seat_code'] == "G$i") {
                                        $x = 1;
                                    }
                                }

                                if ($x == 1) {
                                    echo '<div class="seat occupied"></div>';
                                    $x = 0;
                                } else if ($x == 0) {
                                    echo '<div class="seat"><input type="checkbox" name="seat[]" value="G' . $i . '" class="check"></div>';
                                }
                            }

                            ?>
                            <div class="number">G</div>
                        </div>
                    </div>
                </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
