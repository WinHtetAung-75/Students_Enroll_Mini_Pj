<?php
echo "<pre>";
print_r($_POST);

$id = $_POST['id'];
$name = $_POST['name'];
$gender_id = $_POST['gender'];
$nationality_id = $_POST['nationality'];
$date_of_birth = $_POST['date_of_birth'];
$pocket_money = $_POST['pocket_money'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "UPDATE students SET name = '$name',date_of_birth = '$date_of_birth',nationality_id = '$nationality_id',gender_id = '$gender_id',pocket_money = '$pocket_money' WHERE id = $id";

$query = mysqli_query($connect, $sql);
var_dump($query);
if ($query) {
    header("Location:studentsList.php");
}
