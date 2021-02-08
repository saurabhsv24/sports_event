<!DOCTYPE html>
<html>
<head>
	<title> admin panel</title>
	<link rel="stylesheet" type= "text/css" href ="css/style.css"/> 
</head>
<body>
	<h1>Admin panel</h1>
<div id="content"> 	
	<form action="updates.php" method="post" enctype="multipart/form-data" >
            <?php

            include 'dbcon.php';

            $ids = $_GET['id'];

            $showquery = "select * from tbl_events where id={$ids} ";

            $showdata = mysqli_query($con,$showquery); 

            $arrdata = mysqli_fetch_array($showdata);

            if(isset($_POST['submit'])){

                $idupdate = $_GET['id'];

                $name = $_POST['name'];
                $description = $_POST['description'];
                $date = $_POST['date'];
                $category = $_POST['category'];
                $file = $_FILES['photo'];

                


            $filename = $file['name'];
            $filepath = $file['tmp_name'];
            $fileerror = $file['error'];

            if($fileerror == 0){

                $destfile = 'upload/'.$filename;
                //echo "$destfile";
                move_uploaded_file($filepath, $destfile);

                

                $updatequery = "update tbl_events set id=$id, name='$name', description='$description', date='$date',category='$category',photo='$destfile' where id = $idupdate ";

                $query = mysqli_query($con,$updatequery);

                if($query){
                    echo "data updated";
                }else{
                    echo "data not updated";
                }

                header('location:updates.php');
            }




            }else{
                echo "no button has been clicked";
            }



            ?>


    <p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="Name" value="<?php echo $arrdata['Name']; ?>">
    </p>
    <p>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo $arrdata['Description']; ?>">
    </p>
    <p>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?php echo $arrdata['date']; ?>">
    </p>

    

    <p>
        <label for="category">category:</label>
    	<select name="category" id="category" value="<?php echo $arrdata['category']; ?>">
        <option value="cricket">cricket</option>
        <option value="football">football</option>
        <option value="tennis">tennis</option>
    </select>
    </p>

    <p>
     <input type="file" name="photo" value="<?php echo $arrdata['image']; ?>">	
    </p>

     <input type="submit" name="submit" value="update">

	</form>
</div>

<br>
<button onclick="window.location.href='index.php'  ;">
      Go to main page
    </button>

</body>
</html>