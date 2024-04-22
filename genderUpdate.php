<?php
print_r($_POST);
$id = $_POST['id'];
$gender = $_POST['type'];

//to connect database
$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "UPDATE gender SET gender='$gender' WHERE id = $id";

//to run the query
$query = mysqli_query($connect, $sql);

var_dump($query);
if ($query) {
    header("Location:genderCreate.php");
}
