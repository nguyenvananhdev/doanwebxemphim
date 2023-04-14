<?php
require_once 'config.php';

if(isset($_POST["branch_id"])){ 
    // Fetch hall data based on the specific location
 	$fetch_branchId = mysqli_query($connect, "select * from branch where br_id = '".$_POST["branch_id"]."' ");
 	$fetch_branch = mysqli_fetch_assoc($fetch_branchId);

 	$fetch_halls = mysqli_query($connect, "select * from branch where branch_id = '".$fetch_branch['branch_id']."' ");
 	while ($fetch_hall = mysqli_fetch_assoc($fetch_halls)){
 		 echo '<option value="'.$fetch_hall['hall_id'].'">'.$fetch_hall['hall_id'].'</option>'; 
 	}
}

if(isset($_POST["branchEdit_id"])){ 
    // Fetch hall data based on the specific location
 	$fetch_branchId = mysqli_query($connect, "select * from branch where br_id = '".$_POST["branchEdit_id"]."' ");
 	$fetch_branch = mysqli_fetch_assoc($fetch_branchId);

 	$fetch_halls = mysqli_query($connect, "select * from branch where branch_id = '".$fetch_branch['branch_id']."' ");
 	while ($fetch_hall = mysqli_fetch_assoc($fetch_halls)){
 		 echo '<option value="'.$fetch_hall['hall_id'].'">'.$fetch_hall['hall_id'].'</option>'; 
 	}
}



?>