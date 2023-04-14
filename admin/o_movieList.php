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
		<title>o_movieList</title>
		<link rel="stylesheet" href="./styles/style.css" />
<style type="text/css">
  img.mv_img_list {
    width: 100px;
}
img.mv_tr_list {
    width: 400px;
    height: 85px;
}
a{
  text-decoration: none;
  color: white;
}
.mv_ed_btn{
  width: 5rem !important;
}
.\.button_m {
    float: right;
    text-align: right;
    margin: 5px 35px 10px 10px;
}
#tr_link{
	color: black;
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
				<li><a href="./account.php">Account</a></li>
				<li><a href="./screenList.php">Screening</a></li>
				<li><a href="./profile.php">My Profile</a></li>
				<li><a href="movieList.php?logout" title="LogOut">LOGOUT</a></li>
			</div>
			<div class="content">
            <div class=".button_m">
              <form method="post" action="#" style="display: inline;">
						
						<button type="submit" name="sort_movie">Sort By</button>

					</form>
              <button><a href="addMovie.php">New Movie</a></button>
            </div>
          <table>
            <tr>
              <th width="2%">No.</th>
              <th width="40%">Movie Info</th>
              <th width="40%">Trailer</th>
              <th width="5%"></th>
            </tr>
            <?php
            $count = 1;
              while($movie = mysqli_fetch_assoc($fetch_movies)){
                
             ?>
              <tr>
              <td><?php echo $count;?></td>
              <td><img src="images/<?php echo $movie['movie_poster']; ?>" class="mv_img_list" align="left"> Movie Name: <?php echo $movie['movie_name']; ?> <br>Duration: <?php echo $movie['movie_duration']; ?> <br> Publish Date: <?php echo $movie['movie_date']; ?> <br> Rating: <?php echo $movie['movie_rating']; ?></td>
              <td><a href="<?php echo $movie['movie_trailer']; ?>" id="tr_link"><?php echo $movie['movie_trailer']; ?></a></td>
              <td><button class="mv_ed_btn"><a href="movieEdit.php?id=<?php echo $movie['movie_id']; ?>">Edit</a></button></td>
            </tr>

             <?php  
             ++$count; 
              }
            ?>
           
          </table>
        </div>
		</div>
	</body>
</html>
