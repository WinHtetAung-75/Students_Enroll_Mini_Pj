<?php
print_r($_GET['id']);
$id = $_GET['id'];

//to connect database
$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

//sql statement
$sql = "DELETE FROM gender WHERE id = $id";

//to run query
$query = mysqli_query($connect,$sql);
var_dump($query);
if($query){
    header("Location:genderCreate.php");
}