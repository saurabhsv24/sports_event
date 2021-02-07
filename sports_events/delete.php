<?php

include 'dbcon.php';

$id = $_GET['idth'];

$deletequery = " delete from tbl_events where id=$id ";

$query = mysqli_query($con,$deletequery);

header('location:adminpanel.php');


?>