<?php
$servername="localhost";
$username="root";
$password="";
$database="phpTraining";

$conn=mysqli_connect($servername,$username,$password,$database);
//$conn=mysqli_connect("localhost","root","","phpTraining");
if(!$conn){

echo "not connected";
}
?>