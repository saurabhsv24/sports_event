<!DOCTYPE html>
<html>
<head>
	<title>search result</title>
	<link rel="stylesheet" type= "text/css" href ="css/style1.css"> 
</head>
<body>

	<header class="header">
        <a href="#default" class="logo" style="color:#FFC107" >Tosports.in</a>
        <div class="header-right">
        <a class="active" href="display.php">Home</a>
        <a href="featured.php">Featured Events</a>
        <a href="login.php">Login</a>
        
        </div>
        </header>

 <div class="spacer"></div>
		
		<table class="table-fill">
			<thead>
				<tr><th class="text-left">sr.no</th>
					<th class="text-left">Event Name</th>
					<th class="text-left">Description</th>
					<th class="text-left">Date</th>
					<th class="text-left">category</th>
					<th class="text-left">image</th>
					
				</tr>
			</thead>
		<tbody class="table-hover">	
		<?php

		include 'dbcon.php';


		if(isset($_POST['search'])){

			$id = $_POST['id'];

			$searchquery = "SELECT * FROM tbl_events WHERE id='$id'   ";
			$query = mysqli_query($con,$searchquery);

					

					while($row = mysqli_fetch_array($query))
		    {
		       ?>
		       		
		       		<tr>
		              	<td> <?php echo $row['id']; ?> </td>
		              	<td> <?php echo $row['Name']; ?> </td>
		              	<td> <?php echo $row['Description']; ?> </td>
		              	<td> <?php echo $row['date']; ?> </td>
		              	<td> <?php echo $row['category']; ?> </td>
		              	<td> <img src="<?php echo $row['image']; ?>" width = "100" height = "50">  </td>
		        </tr>

		      <?php


    }

   
} 
?>

 
</body>
</html>


