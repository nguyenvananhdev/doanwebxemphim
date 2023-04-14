<?php
require_once 'config.php';


$admin->check_login();

if (isset($_GET['logout'])) {   
    $admin->logout();
}

  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['add_branch'])) {

  	 // for ($i=0; $i <5 ; $i++) { 
  	 // 	echo $_POST['hall_id'][$i]."<br>";
  	 // 	echo $_POST['hall_num'][$i]."<br>";
  	 // 	echo $_POST['hall_type'][$i]."<br>";
  	 // 	echo $_POST['hall_capacity'][$i]."<br>";
  	 // }
  	 // exit();

    $filename = $_FILES["branch_image"]["name"];
    $tempname = $_FILES["branch_image"]["tmp_name"];    
        $folder = "images/".$filename;

     //   echo $_POST['branch_id']."<br>".$_POST['branch_name']."<br>".$_POST['branch_address']."<br>".$filename."'<br>'".$_POST['hall_id']."<br><br<br>".$_POST['hall_id']."'<br>'".$_POST['hall_num']."'<br>'".$_POST['hall_type']."'<br>'".$_POST['hall_capacity'];
       // exit();
  for ($i=0; $i <5 ; $i++) { 
  		if ($_POST['hall_type'][$i] != "") {
        // Execute branch query
        mysqli_query($connect, "insert into branch (branch_id, branch_name, branch_address, branch_image, hall_id, no_of_halls) values('".$_POST['branch_id']."', '".$_POST['branch_name']."', '".$_POST['branch_address']."', '".$filename."', '".$_POST['hall_id'][$i]."', '".$_POST['no_of_hall']."') ");

      
      
        //Execute hall query
       mysqli_query($connect, "insert into hall (hall_id, hall_no, hall_type, hall_capacity) values('".$_POST['hall_id'][$i]."', '".$_POST['hall_num'][$i]."', '".$_POST['hall_type'][$i]."', '".$_POST['hall_capacity'][$i]."') ");
       			}
       } 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      header('location:branchList.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>addBranch</title>
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
button#add_hall_row_btn {
    width: 55px;
    height: 25px;
    font-size: 16px;
}

.draw-body .content .button-bar-account {
    grid-template-columns: 83% 16% auto;
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
});   */
</script>

	</head>
	<body>
		<div class="navbar">
			<div class="logo">
				<h1>CFTv</h1>
				<p>IMMERSIVE EXPERIENCE</p>
			</div>
			<div class="heading">
				<h1>Add New Branch</h1>
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
				<li><a href="addBranch.php?logout" title="Log Out">LOGOUT</a></li>
			</div>
		<form method="post" enctype="multipart/form-data" action="#">
			<div class="content">
				<div class="button-bar-account">
				
					<button type="reset">Reset Details</button>
					<button type="submit" name="add_branch">Add Branch</button>
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
							<li><input type="text" name="branch_id" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter branch id here..." required></li>
							<li><input type="text" name="branch_name" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter branch name here..." required></li>
							<li><input type="text" name="branch_address" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter branch address here..." required></li>
							<li><input type="number" name="no_of_hall" id="no_of_hall" style="width:550px; font-size: 1.3rem; border: none;" placeholder="Enter no. of halls here..." required min="1" max="5"> </li>
							
						</div>
						<div class="image">
							<img src="./images/user.png" alt="branch_image" id="output" />
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
								<th>Hall No.</th>
								<th>Hall Type</th>
								<th>Capacity</th>
							</tr>
			<?php
					$get_last_hall_id = mysqli_query($connect,"select * from hall order by h_id desc");
					$last_hall_id = mysqli_fetch_assoc($get_last_hall_id);
					$next_id =  $last_hall_id['h_id'] + 1;
					$nextFifth = $last_hall_id['h_id'] + 5;
					//echo $nextFive;
				for ($i=$next_id; $i <=$nextFifth ; $i++) { 
			?>
			<tr>
								<td><input type='text' name='hall_id[]' style='width:60px; font-size: 1.3rem; border: none;' value="<?php echo $i; ?>" readonly></td>
								<td><input type='text' name='hall_num[]' style='width:60px; font-size: 1.3rem; border: none;'></td>
								<td><input type='text' name='hall_type[]' style='width:150px; font-size: 1.3rem; border: none;' ></td>
								<td><input type='text' name='hall_capacity[]' style='width:60px; font-size: 1.3rem; border: none;' value="69" readonly></td>
							</tr>
			<?php					
				}
			?>
													
							<tr>
							<div id="halls">
								
							</div>
						</tr>
							
						</table>
					</div>
				</div>
			</div>
		</form>
		</div>
	</body>
</html>
