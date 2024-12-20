<?php 
    include_once "dbConnect.php";
    $id = $_GET['id'];
    $sql_del = "DELETE FROM `mon_hoc` WHERE `id` = '$id'";
    $data_del = mysqli_query($con, $sql_del);
    if($data_del) {
        header('location:Search.php');
    }
?>