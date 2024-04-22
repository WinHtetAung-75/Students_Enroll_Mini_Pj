<?php
echo "<pre>";
print_r($_POST);

$name = $_POST['name'];
$course_id = $_POST['course_id'];
$student_limit = $_POST['student_limit'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$is_register_open = isset($_POST['is_register_open']) ? $_POST['is_register_open'] : 0;

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "INSERT INTO batches (name,course_id,start_date,start_time,end_time,is_register_open,student_limit) VALUES ('$name','$course_id','$start_date','$start_time','$end_time','$is_register_open','$student_limit')";

$query = mysqli_query($connect, $sql);
var_dump($query);
if($query){
    header("Location:batchCreate.php");
}