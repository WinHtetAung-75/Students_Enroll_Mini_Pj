<?php
print_r($_GET);
$id = $_GET['id'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "DELETE FROM courses WHERE id = $id";

$query = mysqli_query($connect, $sql);
var_dump($query);
if ($query) {
    header("Location:courseCreate.php");
}
