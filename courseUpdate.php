<?php
print_r($_POST);
$id = $_POST['id'];
$title = $_POST['course_title'];
$short = $_POST['short'];
$fee = $_POST['fee'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "UPDATE courses SET title = '$title',short = '$short',fee = $fee WHERE id = $id";

$query = mysqli_query($connect, $sql);
var_dump($query);
if ($query) {
    header("Location:courseCreate.php");
}
