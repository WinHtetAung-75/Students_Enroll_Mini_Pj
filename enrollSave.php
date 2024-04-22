<?php
print_r($_POST);

$student_id = $_POST['id'];
$batch_id = $_POST['batch'];

$connect = mysqli_connect("localhost", "wha", "asdf", "sayar_test");

$sql = "INSERT INTO enrollments (student_id,batch_id) VALUES ('$student_id','$batch_id')";

$query = mysqli_query($connect, $sql);

var_dump($query);
if ($query) {
    header("Location:enrollList.php");
}
