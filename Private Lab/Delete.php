<?php 
    include_once "dbConnect.php";
    $student_ID = $_GET['student_ID'];
    $sql_del = "DELETE FROM `student` WHERE `student_ID` = '$student_ID'";
    $data_del = mysqli_query($con, $sql_del);
    if($data_del) {
        header('location:Search.php');
    }
?>