<?php
session_start();
include('connection.php');
$id=$_POST['y'];
$status=$_POST['status'];
$sql= "UPDATE localitytable set status='$status' WHERE l_id='$id'";
$res=mysqli_query($conn,$sql);
if($res){

        echo "<script> window.location='locality.php';</script>";

    }
    else{
        echo "not inserted";
    }


?>