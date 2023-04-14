<?php
require_once 'config.php';


if (isset($_POST['submit'])){
    $admin->login($_POST);
    
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>login</title>
		<link rel="stylesheet" href="./styles/style.css" />
		<style type="text/css">
			.draw-body {
    min-height: 87vh !important;
        display: list-item;
    /* grid-template-columns: 17% auto; */
}
.content .main .box {
        background-color: #e53c38;
    margin: 60px 100px 0px 140px;
    padding: 50px 50px 50px 50px;
    width: 80%;
    grid-template-columns: 100% auto;
    }
   input {
    border: none;
    height: 1.5rem;
    width: 100%;
    border-radius: 30px;

}
input {
    font-size: 32px;
    text-align: ce;
    padding: 25px;
}

input.lgbtn {
    width: 9%;
    height: 45px;
    font-size: 26px;
    color: white;
    background-color: #e53c38;
    margin: 15px 15px 35px 15px;
    border-radius: 15px;
    
    padding: 2px;
}
label{
	color: white;
	padding-right: 10px;
}

form{
	font-size: 32px;
	padding: 30px 130px 30px 130px;
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
				<h1>Login</h1>
			</div>
			<div class="date">
				<h2> <?php echo date("j F, Y, g:i A") ?></h2>
			</div>
		</div>
		<div class="draw-body">
			
			<div class="content">
				
				<div class="main">
					<div class="box">
						<form  method="post" >
  <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <label for="Username">Username:</label>
    <input  type="text" name="user_name" id="user_name"  placeholder="Enter your username" />
</div> <br>
 <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <label for="Password">Password:</label>
    <input  type="password" name="password" id="password"  placeholder="Enter your password" />
</div>
					</div>
					<div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <input type="submit" class="lgbtn"  type="submit" name="lgsubmit" value="Log In">
</div>
					
					</form>
					<?php 
					if(isset($_POST['lgsubmit'])){
						$username = $_POST['user_name'];
						$password = $_POST['password'];
						$SQL = "SELECT * FROM `users` WHERE ``='$username' AND`password`='$password' AND `role`=1";
						$data = mysqli_query($connect,$SQL);
                        
						$success = $data->num_rows;
						
						if($success>=1){
                            $_SESSION['loged'] = true;
                            $_SESSION['username'] = $data['user_name'];
							header("location: index.php");
						}
                        else{
                            echo " <script>
                            alert('Thông tin bạn nhập không chính xác !')
                        </script>";
                        

                        }

					}
					?>
				</div>
               
			</div>
		</div>
	</body>
</html>
