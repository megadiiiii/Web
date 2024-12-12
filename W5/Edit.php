<?php 
    include_once 'dbConnect.php';
    if(isset($_POST['btnSave'])) {
        // Get data from attribute to variable
        $Ten = $_POST['txtTen'];
        $ID = $_POST['txtID'];
        $Nam = $_POST['txtNam'];
        $NXB = $_POST['txtNXB'];
        //Primary Key Check
        $sql = "SELECT * FROM test WHERE ID = '$ID' ";
        $data = mysqli_query($con, $sql);
        if(mysqli_num_rows($data)>0) {
            echo "<script>alert('Trùng mã sách')</script>";
        } else {            
            //Create command to add data into table
            $sql = "INSERT INTO `test`(`Ten`, `ID`, `Nam`, `NXB`) VALUES ('$Ten','$ID','$Nam','$NXB')";
            //SQL Excute 
            $data = mysqli_query($con, $sql);
            if($data) {
                header("location:List.php")
            } else echo "<script>alert('Sửa thông tin thất bại')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <?php 
                if(isset($data) && mysqli_num_rows($data > 0)) {
                    while($row = mysqli_fetch_array($data)) {
            ?>

            <label for="tenloai">Tên:</label>
            <input type="Ten" name="txtTen" id="Tensach" class="form-control" readonly>
            <label for="ID">ID</label>
            <input type="text" name="txtID" id="ID" class="form-control">
            <label for="tenloai">Năm:</label>
            <input type="Nam" name="txtNam" id="Nam" class="form-control">
            <label for="tenloai">NXB:</label>
            <input type="NXB" name="txtNXB" id="NXB" class="form-control">
            <?php 
                    }
                }
            ?>
</body>
</html>