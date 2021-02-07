<!DOCTYPE html>
<html>
<head>
	<title>Event Registration </title>
	<link rel="stylesheet" type= "text/css" href ="css/style.css"/> 
</head>
<body>
	<h1>Event Registration</h1>
<div id="content"> 	
	<form action="upload.php" method="post" enctype="multipart/form-data"  >
    <p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="Name">
    </p>
    <p>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
    </p>
    <p>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
    </p>

    

    <p>
        <label for="category">category:</label>
    	<select name="category" id="category">
        <option value="cricket">cricket</option>
        <option value="football">football</option>
        <option value="tennis">tennis</option>
    </select>
    </p>

    <p>
     <input type="file" name="photo">	
    </p>

     

     <label for="featured" >Mark as Featured : </label>
     <input type="radio" id="yes" name="featured" value="1">
	<label for="featured">Yes</label>
	<input type="radio" id="no" name="featured" value="0">
	<label for="notfeatured">No</label><br>
	<br>

	<input type="submit" name="submit" value="Register">
	



	</form>
</div>

<br>
<button onclick="window.location.href='adminpanel.php'  ;">
      Go to main page
    </button>

</body>
</html>