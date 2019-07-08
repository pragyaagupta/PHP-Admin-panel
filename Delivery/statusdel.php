<?php
session_start();
include('connection.php');
$id=$_POST['y'];
$status=$_POST['status'];
$sql= "UPDATE deliverytable set status='$status' WHERE id='$id'";
$res=mysqli_query($conn,$sql);
if($res){

        echo "<script> window.location='deliveryt.php';</script>";

    }
    else{
        echo "not inserted";
    }


?>