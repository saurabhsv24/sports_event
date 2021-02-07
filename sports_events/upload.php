<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$description = $_POST['description'];
	$date = $_POST['date'];
	$category = $_POST['category'];
	$file = $_FILES['photo'];
	$featured = $_POST['featured'];

	


$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

if($fileerror == 0){

	$destfile = 'upload/'.$filename;
	//echo "$destfile";
    move_uploaded_file($filepath, $destfile);

    $insertquery = " insert into tbl_events(Name, Description,date,category,image,featured ) values('$name','$description','$date','$category','$destfile','$featured') ";

    $query = mysqli_query($con,$insertquery);

    if($query){
    	echo "inserted";
    }else{
    	echo "not inserted";
    }

    header('location:admin.php');
}




}else{
	echo "no button has been clicked";
}



?>