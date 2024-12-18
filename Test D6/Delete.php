<?php 
    include_once "dbConnect.php";
    $masv = $_GET['masv'];
    $sql_del = "DELETE FROM `ket_qua` WHERE `masv` = '$masv'";
    $data_del = mysqli_query($con, $sql_del);
    if($data_del) {
        header('location:Search.php');
    }
?>