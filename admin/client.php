
<?php

require_once 'config.php';


//Fetch movies from database...
$fetch_movies = mysqli_query($connect, "select * from movie");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>client</title>
</head>
<body>
	<table>
		<tr>
			<th>Movie name</th>
			<th>Movie date</th>
		</tr>
		<!--Movies List-->
	<?php
            $count = 1;
              while($movie = mysqli_fetch_assoc($fetch_movies)){
                
             ?>
             <tr>
              <td><?php echo $movie['movie_name']."<br>"; ?></td>
               <td><?php echo $movie['movie_date']."<br>"; ?></td>
           </tr>

           <?php }?>
	</table>

	

</body>
</html>