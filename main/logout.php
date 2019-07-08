<?php
session_start();
include('connection.php');


$re=session_destroy();

if($re){
	header('location:login.php');

}




?>