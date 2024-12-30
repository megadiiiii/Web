<?php 
    include_once "dbConnect.php";

    $id = '';
    $masv = '';
    $mamon = '';
    $hoten = '';
    $diem = '';
    
    if (isset($_GET['masv'])) {
        $masv = $_GET['masv'];

        $sql_select = "SELECT * FROM `ket_qua` WHERE `masv` = '$masv'";
        $result = mysqli_query($con, $sql_select);

        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $mamon = $row['mamon'];
            $hoten = $row['hoten'];
            $diem = $row['diem'];
        } else {
            echo "<script>alert('Không tìm thấy sinh viên!'); window.location='Search.php';</script>";
        }
    } else {
        echo "<script>alert('Không có mã sinh viên!'); window.location='Search.php';</script>";
    }


    // Xử lý khi người dùng nhấn nút Lưu
    if (isset($_POST['btnEdit'])) {
        $id = $_POST['txtid'];
        $masv = $_POST['txtmasv'];
        $mamon = $_POST['txtmamon'];
        $hoten = $_POST['txthoten'];
        $diem = $_POST['txtdiem'];
        // Cập nhật thông tin sinh viên
        $sql_update = "UPDATE `ket_qua` SET id = '$id', mamon = '$mamon', hoten = '$hoten', diem = '$diem' WHERE masv = '$masv'";
        $data_update = mysqli_query($con, $sql_update);

        if ($data_update) {
            echo "<script>alert('Cập nhật thông tin thành công!'); window.location='Search.php';</script>";
        } else {
            echo "<script>alert('Cập nhật thông tin thất bại!')</script>";
        }
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
            <h3 style="text-align: center;">CẬP NHẬT THÔNG TIN</h3>
            <div class="form-inline">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="txtid" value="<?php echo $id;?>">
                <label for="masv">Mã SV:</label>
                <input type="text" class="form-control" name="txtmasv" value="<?php echo $masv;?>" readonly>
                <label for="mamon">Mã môn:</label>
                <input type="text" class="form-control" name="txtmamon" value="<?php echo $mamon;?>">
                <label for="hoten">Họ tên:</label>
                <input type="text" class="form-control" name="txthoten" value="<?php echo $hoten;?>">
                <label for="diem">Điểm:</label>
                <input type="text" class="form-control" name="txtdiem" value="<?php echo $diem;?>">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnEdit">Cập nhật</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnBack">Quay lại</button>
                
            </div>
        </form>
    </div>
</body>
</html>