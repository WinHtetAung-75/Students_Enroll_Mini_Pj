<?php
echo "<pre>";
print_r($_POST);

$name = $_POST['name'];
$gender_id = $_POST['gender'];
$nationality_id = $_POST['nationality'];
$date_of_birth = $_POST['date_of_birth'];
$pocket_money = $_POST['pocket_money'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "INSERT INTO students (name,date_of_birth,nationality_id,gender_id,pocket_money) VALUES ('$name','$date_of_birth','$nationality_id','$gender_id','$pocket_money')";

$query = mysqli_query($connect, $sql);
var_dump($query);
if ($query) {
    header("Location:studentCreate.php");
}
