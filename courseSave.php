<?php
print_r($_POST);
$course_title = $_POST['course_title'];
$short = $_POST['short'];
$fee = $_POST['fee'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql  = "INSERT INTO courses (title,short,fee) VALUES ('$course_title','$short',$fee)";

$query = mysqli_query($connect, $sql);
var_dump($query);
if($query){
    header("Location:createCourse.php");
}
