<?php
session_start();
include('connection.php');
$id=$_POST['y'];
$status=$_POST['status'];
$sql= "UPDATE citytable set status='$status' WHERE city_id='$id'";
$res=mysqli_query($conn,$sql);
if($res){

        echo "<script> window.location='city.php';</script>";

    }
    else{
        echo "not inserted";
    }


?>