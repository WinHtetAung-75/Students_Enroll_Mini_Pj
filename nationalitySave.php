<?php
print_r($_POST);
$nation = $_POST['nationality'];
$nation_code = $_POST['nation_code'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = " INSERT INTO nationality (nation,nation_code) VALUES ('$nation','$nation_code')";

$query = mysqli_query($connect, $sql);

var_dump($query);
if ($query) {
    header("Location:nationalityCreate.php");
}
