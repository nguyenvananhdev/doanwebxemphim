<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['add_movie'])) {

    $filename = $_FILES["movie_poster"]["name"];
    $tempname = $_FILES["movie_poster"]["tmp_name"];    
        $folder = "images/".$filename;

        // Get all the submitted data from the form
  
        // Execute query
        mysqli_query($connect, "insert into movie (movie_name,movie_duration, movie_date, movie_case, movie_rating, movie_desc, movie_trailer, movie_poster) values('".$_POST['movie_name']."', '".$_POST['movie_duration']."', '".$_POST['movie_date']."', '".$_POST['movie_case']."', '".$_POST['movie_rating']."', '".$_POST['movie_desc']."', '".$_POST['movie_trailer']."', '".$filename."') ");
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      header('location:movieList.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>addMovie</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.content .main .box-account .image {
    display: flow-root;
}
.mov_des_box{
    background-color: #fce7dc;
    border-radius: 15px;
    margin: 15px 30px 15px 30px;
    padding: 15px;
}
.movie_description {
    background-color: white;
    font-size: 18px;
    height: 140px;
    padding: 5px;
}
.mov_trailer_box{
    background-color: #fce7dc;
    border-radius: 15px;
    margin: 15px 30px 15px 30px;
    padding: 15px;
}
.movie_trailer_img {
    text-align: center;
    font-size: 18px;
    height: 215px;
    padding: 5px;
}
a{
	text-decoration: none;
	color: white;
}
label {
    border-radius: 15px;
    font-size: 1.3rem;
    background-color: #da310f;
    color: #fff;
    font-weight: 500;
    padding: 10px 45px 10px 45px;
    line-height: 45px;
}
.draw-body .content .button-bar-account {
    grid-template-columns: 83% 16% auto;
    }
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script>
			// To preview movie poster
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory

    }
  };

  // To preview trailer 
  $(document).ready(function(){

  $('input#url').on('propertychange paste keyup',function(){

  var url = this.value;
  $('#frame').attr('src', url);
  
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
				<h1>Add New Movie</h1>
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
				<li><a href="addMovie.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" enctype="multipart/form-data">
			<div class="content">
				<div class="button-bar-account">
					<!-- <button class="delete">DELETE</button> -->
					<button type="reset">Reset Details</button>
					<button type="submit" name="add_movie">Add Movie</button>
				</div>
				<div class="main">
					<div class="box-account">
						<div class="left">
							<li>Movie Name:</li>
							<li>Duration (min):</li>
							<li>Publish Date:</li>
							<li>Case:</li>
							<li>Rating:</li>
							
						</div>
						<div class="right">
							
							<li><input type="text" name="movie_name" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter movie name here..." required></li>
							<li><input type="number" name="movie_duration" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter movie duration here..." required></li>
							<li><input type="date" name="movie_date" style="width:550px; font-size: 1.3rem; border: none;" required></li>
							<li><input type="text" name="movie_case" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter movie case here..." required></li>
							<li><input type="number" name="movie_rating" placeholder="Enter movie rating here..." style="width:550px; font-size: 1.3rem; border: none;" required></li>
							
						</div>
						<div class="image">
							<img src="./images/user.png" alt="user-image" id="output" />
							<input type="file" name="movie_poster" id="movie_poster" hidden accept="image/*" onchange="loadFile(event)" value="user.png">
							<label for="movie_poster">Upload Image</label>
						</div>
					</div> <br>
					<div class="mov_des_box">
						<h3>Description:</h3>
						<div class="movie_description">
							<textarea name="movie_desc" rows="9" cols="136" style="border:none; resize: none;" required></textarea>
						</div>
					</div>
					<br>
					<div class="mov_trailer_box">
						<h3>Trailer Link:  &nbsp; <input type="text" name="movie_trailer" placeholder="Enter movie trailer link here..." id="url" style="width:550px; font-size: 1.3rem; border: none;     background: transparent;" required></h3>

						<div class="movie_trailer_img">
							<iframe src="" id="frame" height="200" width="400" title="Movie Trailer Preview"></iframe>
							
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
