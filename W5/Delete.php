<?php 
    $ID=$_GET['ID'];
    $con = mysqli_connect(hostname: 'localhost',username: 'root', password: '', database: 'w5_test');
    $sql = "DELETE FROM Test WHERE ID = '$ID' ";
    $data = mysqli_query($con, $sql);
    if($data) {
        header("location:List.php");
    }
?>