<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width = device-width, initial-scale = 1">
		<meta charset="utf-8">
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/style1.css">
	<style>
	* {box-sizing: border-box}
	body {font-family: Verdana, sans-serif; margin:0}
	.mySlides {display: none}
	img {vertical-align: middle;}

	/* Slideshow container */
	.slideshow-container {
	  max-width: 1000px;
	  position: relative;
	  margin: auto;
	}

	/* Next & previous buttons */
	.prev, .next {
	  cursor: pointer;
	  position: absolute;
	  top: 50%;
	  width: auto;
	  padding: 16px;
	  margin-top: -22px;
	  color: white;
	  font-weight: bold;
	  font-size: 18px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	  user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover, .next:hover {
	  background-color: rgba(0,0,0,0.8);
	}

	/* Caption text */
	.text {
	  color: #f2f2f2;
	  font-size: 15px;
	  padding: 8px 12px;
	  position: absolute;
	  bottom: 8px;
	  width: 100%;
	  text-align: center;
	}

	/* Number text (1/3 etc) */
	.numbertext {
	  color: #f2f2f2;
	  font-size: 12px;
	  padding: 8px 12px;
	  position: absolute;
	  top: 0;
	}

	/* The dots/bullets/indicators */
	.dot {
	  cursor: pointer;
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #bbb;
	  border-radius: 50%;
	  display: inline-block;
	  transition: background-color 0.6s ease;
	}

	.active, .dot:hover {
	  background-color: #717171;
	}

	/* Fading animation */
	.fade {
	  -webkit-animation-name: fade;
	  -webkit-animation-duration: 1.5s;
	  animation-name: fade;
	  animation-duration: 1.5s;
	}

	@-webkit-keyframes fade {
	  from {opacity: .4} 
	  to {opacity: 1}
	}

	@keyframes fade {
	  from {opacity: .4} 
	  to {opacity: 1}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
	  .prev, .next,.text {font-size: 11px}
	}
	</style>
</head>
<body>

		<header class="header">
        <a href="#default" class="logo" style="color:#FFC107" >Tosports.in</a>
        <div class="header-right">
        <a class="active" href="adminpanel.php">Home</a>
        <a href="featured.php">Featured Events</a>
        <a href="login.php">Login</a>
        <a href="admin.php">Add New Event</a>
        <form action="search.php" method="post">

        	<input type="text" name="id" placeholder="serch for events id">
        	<input type="submit" name="search" value=">>">
        	
        </form>
        </div>
        </header>


        <?php

			include 'dbcon.php';

			$featuredquery = " SELECT * FROM `tbl_events` WHERE featured=1";

			$fquery = mysqli_query($con,$featuredquery);

			$fresult = mysqli_fetch_array($fquery);

			while($fresult = mysqli_fetch_array($fquery)){

             ?>


	        <div class="slideshow-container">

			<div class="mySlides fade">
			  <div class="numbertext">1 / 3</div>
			  <img src="<?php echo $fresult['image']; ?>" style="width:100%">
			  <div class="text"><?php echo $fresult['Name']; ?></div>
			  <div class="text"><?php echo $fresult ['Description']; ?> </div>
			</div>


			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<br>

			
		 <?php
         }
		
		?>
			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span> 
			  <span class="dot" onclick="currentSlide(2)"></span> 
			  <span class="dot" onclick="currentSlide(3)"></span> 
			</div>
			
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		      slides[i].style.display = "none";  
		  }
		  for (i = 0; i < dots.length; i++) {
		      dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		}
	</script>
		         



        <div class="spacer"></div>
		
		<table class="table-fill">
			<thead>
				<tr><th class="text-left">sr.no</th>
					<th class="text-left">Event Name</th>
					<th class="text-left">Description</th>
					<th class="text-left">Date</th>
					<th class="text-left">category</th>
					<th class="text-left">image</th>
					<th class="text-left">Edit</th>
					<th class="text-left">Delete</th>
				</tr>
			</thead>
			<tbody class="table-hover">
			<?php

			include 'dbcon.php';

			$selectquery = "select * from tbl_events";

			$query = mysqli_query($con,$selectquery);

			$result = mysqli_fetch_array($query);

			while($result = mysqli_fetch_array($query)){
             ?>

              <tr>
              	<td> <?php echo $result['id']; ?> </td>
              	<td> <?php echo $result['Name']; ?> </td>
              	<td> <?php echo $result['Description']; ?> </td>
              	<td> <?php echo $result['date']; ?> </td>
              	<td> <?php echo $result['category']; ?> </td>
              	<td> <img src="<?php echo $result['image']; ?>" width = "100" height = "50">  </td>
              	<td><a href="updates.php?id=<?php echo $result['id']; ?>">edit </a></td>
              	<td><a href="delete.php?idth=<?php echo $result['id']; ?>">delete </a></td>
              </tr>
             <?php
			}



			?>


			</tbody>
		</table>


     <footer class="footer">
        <p>copyright@ToMovies.in</p>
        <div class="footer-right">
        <p><a href="logout.php"> logout</a></p>
        <p>design by:Saurabh Vernekar</p>
        </div>  
        </footer>
</body>
</html>