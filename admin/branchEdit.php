<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

$br_id = $_GET['id'];
	$branch_details = mysqli_query($connect, "select * from branch where branch_id = '".$br_id."' ");
	$branh_details = mysqli_query($connect, "select * from branch where branch_id = '".$br_id."' ");
	$screen_details = mysqli_query($connect, "select * from screening inner join movie on screening.movie_id = movie.movie_id where screening.branch_id = '".$_GET['br_id']."' ");

		$branch = mysqli_fetch_assoc($branch_details);

	  if (isset($_POST['update_branch'])) {

	  	
	  	// for ($i=0; $i < count($_POST['hall_capacity']) ; $i++) { 
	  	// 	echo $_POST['hall_capacity'][$i]."<br>".$_POST['hall_type'][$i]."<br>".$_POST['hall_no'][$i]."<br>".$_POST['hall_id'][$i]."<br>";
	  	// }
	  	// exit();

    $filename = $_FILES["branch_image"]["name"];
    $tempname = $_FILES["branch_image"]["tmp_name"];    
        $folder = "images/".$filename;

       // echo $_POST['branch_id']."<br>".$_POST['branch_name']."<br>".$_POST['branch_address']."<br>".$filename."'<br>'".$_POST['hall_id']."<br><br<br>".$_POST['hall_id']."'<br>'".$_POST['hall_num']."'<br>'".$_POST['hall_type']."'<br>'".$_POST['hall_capacity'];
       // exit();
  
        // Execute branch query
       mysqli_query($connect, "update branch set branch_id='".$_POST['branch_id']."', branch_name='".$_POST['branch_name']."', branch_address='".$_POST['branch_address']."', branch_image='".$filename."' where branch_id='".$br_id."' ");

        //Execute hall query
        	for ($i=0; $i < count($_POST['hall_capacity']) ; $i++) { 
	  		
	  		 mysqli_query($connect, "update hall set hall_no = '".$_POST['hall_no'][$i]."', hall_type = '".$_POST['hall_type'][$i]."', hall_capacity = '".$_POST['hall_capacity'][$i]."' where hall_id = '".$_POST['hall_id'][$i]."' ");
	  	}
	  	
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      header('location:branchList.php');
  }

    if(isset($_POST['delete_branch'])){
  	mysqli_query($connect, "delete from branch where branch_id = '".$br_id."' ");
  	header('location:branchList.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>branchEdit</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
						.content .main .box-account .image {
    display: flow-root;
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

		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				<script>
			// To preview movie poster
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory

    }
  };

/*
  $(document).ready(function(){
  $("#no_of_hall").change(function(){
  	var hall = "<tr><td><input type='text' name='hall_id' style='width:60px; font-size: 1.3rem; border: none;'required></td><td><input type='text' name='hall_num' style='width:60px; font-size: 1.3rem; border: none;'required></td><td><input type='text' name='hall_type' style='width:150px; font-size: 1.3rem; border: none;''  required></td><td><input type='text' name='hall_capacity' style='width:60px; font-size: 1.3rem; border: none;' required></td></tr>";
   	$('#halls').append(hall);
  });
});  */
</script>
		</style>
	</head>
	<body>
		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Edit Branch</h1>
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
				<li><a href="branchEdit.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
			<form method="post" enctype="multipart/form-data">
			<div class="content">
				<div class="button-bar-account">
					<button class="delete" type="submit" name="delete_branch">DELETE</button>
					<button type="reset">Reset Details</button>
					<button type="submit" name="update_branch">Save Changes</button>
				</div>
				<div class="main">
					<div class="box-account">
						<div class="left">
							<li>Branch ID:</li>
							<li>Branch Name:</li>
							<li>Address:</li>
							<li>No. of Halls:</li>
						</div>
						<div class="right">
							<li><input type="text" name="branch_id" style="width:550px; font-size: 1.3rem; border: none;" value="<?php echo $branch['branch_id']; ?>" readonly></li>
							<li><input type="text" name="branch_name" style="width:550px; font-size: 1.3rem; border: none;" value="<?php echo $branch['branch_name']; ?>" required></li>
							<li><input type="text" name="branch_address" style="width:550px; font-size: 1.3rem; border: none;" value="<?php echo $branch['branch_address']; ?>" required></li>
							<li><input type="text" name="no_of_hall" id="no_of_hall" style="width:550px; font-size: 1.3rem; border: none;" value="<?php echo $branch['no_of_halls']; ?>"readonly></li>
						</div>
						<div class="image">
							<img src="./images/<?php echo $branch['branch_image']; ?>" alt="branch_image" id="output" />
							<input type="file" name="branch_image" id="branch_image" hidden accept="image/*" onchange="loadFile(event)" >
							<label for="branch_image">Upload Image</label>
						</div>
					</div>
					<br>
					
					<div class="txn">
						<h3>Hall Information</h3>
						<table>
							<tr>
								<th>Hall ID</th>
								<th>Hall No</th>
								<th>Hall Type</th>
								<th>Capacity</th>
							</tr>
							<?php

								while($branh = mysqli_fetch_assoc($branh_details)){
			// echo $branh['hall_id']."<br>";
								$hall_details = mysqli_query($connect, "select * from hall where hall_id = '".$branh['hall_id']."' ");
								$hall = mysqli_fetch_assoc($hall_details);	
							?>

							<tr>
								<td><input type='text' name='hall_id[]' style='width:60px; font-size: 1.3rem; border: none;' value="<?php echo $hall['hall_id']; ?>" readonly></td>
								<td><input type='text' name='hall_no[]' style='width:60px; font-size: 1.3rem; border: none;'required value="<?php echo $hall['hall_no']; ?>"></td>
								<td><input type='text' name='hall_type[]' style='width:150px; font-size: 1.3rem; border: none;'  required value="<?php echo $hall['hall_type']; ?>"></td>
								<td><input type='text' name='hall_capacity[]' style='width:60px; font-size: 1.3rem; border: none;' required value="<?php echo $hall['hall_capacity']; ?>"></td>
							</tr>
						<?php
							}
						?>
						</table>
					</div>
					<br>
					<div class="txn">
						<h3>Screening History</h3>
						<table>
							<tr>
								<th>Screening ID</th>
								<th>Movie</th>
								<th>Date</th>
								<th>Time</th>
							</tr>
							<?php
								while ($screen_detail = mysqli_fetch_assoc($screen_details)) {
									
								
							?>
							<tr>
								<td><?php echo $screen_detail['screen_id']; ?></td>
								<td><?php echo $screen_detail['movie_name']; ?></td>
								<td><?php echo $screen_detail['screening_date']; ?></td>
								<td><?php echo $screen_detail['screening_time']; ?></td>
							</tr>
								<?php
									}
							?>							
						</table>
					</div>
				</form>
				</div>
			</div>
		</div>
	</body>
</html>
