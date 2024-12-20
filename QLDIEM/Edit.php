<?php 
    include_once "dbConnect.php";

    $id = '';
    $mamon = '';
    $tenmon = '';
    $sotinchi = '';
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql_select = "SELECT * FROM `mon_hoc` WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql_select);

        if ($row = mysqli_fetch_assoc($result)) {
            $mamon = $row['mamon'];
            $tenmon = $row['tenmon'];
            $sotinchi = $row['sotinchi'];
        } else {
            echo "<script>alert('Không tìm thấy sinh viên!'); window.location='Search.php';</script>";
        }
    } else {
        echo "<script>alert('Không có mã sinh viên!'); window.location='Search.php';</script>";
    }


    // Xử lý khi người dùng nhấn nút Lưu
    if (isset($_POST['btnEdit'])) {
        $id = $_POST['txtid'];
        $tenmon = $_POST['txttenmon'];
        $mamon = $_POST['txtmamon'];
        $sotinchi = $_POST['txtsotinchi'];
        // Cập nhật thông tin sinh viên
        $sql_update = "UPDATE `mon_hoc` SET tenmon = '$tenmon', mamon = '$mamon', sotinchi = '$sotinchi' WHERE id = '$id'";
        $data_update = mysqli_query($con, $sql_update);

        if ($data_update) {
            echo "<script>alert('Cập nhật thông tin thành công!'); window.location='Search.php';</script>";
        } else {
            echo "<script>alert('Cập nhật thông tin thất bại!')</script>";
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
    <title>Cập nhật</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="post" action="" style="width: 100%; padding: 100px 350px">
            <h3 style="text-align: center;">CẬP NHẬT THÔNG TIN</h3>
            <div class="form-inline">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="txtid" value="<?php echo $id;?>" readonly>
                <label for="mamon">Mã môn:</label>
                <input type="text" class="form-control" name="txtmamon" value="<?php echo $mamon;?>">
                <label for="tenmon">Tên môn:</label>
                <input type="text" class="form-control" name="txttenmon" value="<?php echo $tenmon;?>">
                <label for="sotinchi">Số tín chỉ:</label>
                <input type="number" class="form-control" name="txtsotinchi" value="<?php echo $sotinchi;?>">
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