<?php 
    $student_ID =$_GET['student_ID'];
    $con = mysqli_connect(hostname: 'localhost',username: 'root', password: '', database: 'w6');
    $sql = "DELETE FROM student WHERE student_ID = '$student_ID' ";
    $data = mysqli_query($con, $sql);
    if($data) {
        header("location:Search.php");
    }
?>