<?php 
echo "<pre>";

print_r($_POST['type']);
$type = $_POST['type'];

//to connect database
$connect = mysqli_connect("localhost","wha","asdf","sayar_test");

//sql just String
$sql = " INSERT INTO gender (gender) VALUES ('$type')";

//to run query 
$query = mysqli_query($connect,$sql);
var_dump($query);
if($query){
    header("Location:genderCreate.php");
}