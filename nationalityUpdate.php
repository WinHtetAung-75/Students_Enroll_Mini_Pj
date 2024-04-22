<?php
$id = $_POST['id'];
$nation = $_POST['nationality'];
$nation_code = $_POST['nation_code'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "UPDATE nationality SET nation = '$nation',nation_code = '$nation_code' WHERE id = $id";

$query = mysqli_query($connect, $sql);

var_dump($query);
if ($query) {
    header("Location:nationalityCreate.php");
}
