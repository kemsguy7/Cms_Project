<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="phpcms";
//Create the connection

$conn=mysqli_connect("localhost","root","", "$dbname");
if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
} else{
    echo "Connection Successful";
}

?>