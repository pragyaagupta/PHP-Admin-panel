<?php
session_start();

include('connection.php');
$title=$_POST['c'];
$image=$_POST['d'];

if(!empty($_FILES['image']['name'])){
		$img_name=$_FILES['image']['name'];
		$tmp_name=$_FILES['image']['tmp_name'];
		$path='images/'.$image;
		move_uploaded_file($tmp_name,$path);
		
	}
$id=$_POST['e'];

	
	$sql1="UPDATE categorytable SET title='$title', image='$path' WHERE id=$id";
	$res1=mysqli_query($conn,$sql1);
	if($res1){
		header('location:tablee1.php');
	}
	else{
		echo "not inserted";
	}


?>