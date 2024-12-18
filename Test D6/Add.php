<?php 
    include_once "dbConnect.php";

    $id = '';
    $masv = '';
    $mamon = '';
    $hoten = '';
    $diem = '';
    
    if(isset($_POST['btnAdd'])) {
        $id = $_POST['txtid'];
        $masv = $_POST['txtmasv'];
        $mamon = $_POST['txtmamon'];
        $hoten = $_POST['txthoten'];
        $diem = $_POST['txtdiem'];

        // Primary Key Check
        $sql_check = "SELECT * FROM `ket_qua` WHERE `masv` = '$masv'";
        $result_check = mysqli_query($con, $sql_check);
        if(mysqli_num_rows($result_check) > 0) {
            echo "<script>alert('Trùng MSV! Vui lòng kiểm tra lại!')</script>";
        } else {
            $sql_insert = "INSERT INTO `ket_qua`(`id`, `masv`, `mamon`, `hoten`, `diem`) 
                            VALUES ('$id','$masv','$mamon','$hoten','$diem')";
            $data_insert = mysqli_query($con, $sql_insert);
        }
        
        if($data_insert) {
            echo "<script>alert('Thêm thông tin thành công!')</script>";
        } else {            
            echo "<script>alert('Thêm thông tin thất bại!')</script>";
        }
    }
    
    if(isset($_POST['btnBack'])) {
        header('location:Search.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm SV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="post" action="" style="width: 100%; padding: 100px 350px">
            <h3 style="text-align: center;">THÊM THÔNG TIN</h3>
            <div class="form-inline">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="txtid" value="<?php echo $id;?>">
                <label for="masv">Mã SV:</label>
                <input type="text" class="form-control" name="txtmasv" value="<?php echo $masv;?>">
                <label for="mamon">Mã môn:</label>
                <input type="text" class="form-control" name="txtmamon" value="<?php echo $mamon;?>">
                <label for="hoten">Họ tên:</label>
                <input type="text" class="form-control" name="txthoten" value="<?php echo $hoten;?>">
                <label for="diem">Điểm:</label>
                <input type="text" class="form-control" name="txtdiem" value="<?php echo $diem;?>">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnAdd">Thêm mới</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnBack">Quay lại</button>
            </div>
        </form>
    </div>
</body>
</html>