<?php 
    include_once "dbConnect.php";

    $id = '';
    $mamon = '';
    $tenmon = '';
    $sotinchi = '';
    
    if(isset($_POST['btnSearch'])) {
        $id = $_POST['txtid'];
        $tenmon = $_POST['txttenmon'];
        $mamon = $_POST['txtmamon'];
        $sotinchi = $_POST['txtsotinchi'];
    }        
        // Search SQL
        $sql_search = "SELECT * FROM `mon_hoc` WHERE `id` LIKE '%$id%' 
                                                AND `mamon` LIKE '%$mamon%'        
                                                AND `tenmon` LIKE '%$tenmon%'        
                                                AND `sotinchi` LIKE '%$sotinchi%'";
        $data_search = mysqli_query($con, $sql_search);

    if(isset($_POST['btnAdd'])) {
        header('location:Add.php');
    }

    mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form method="post" action="" style="width: 100%; padding: 50px 350px">
            <h3 style="text-align: center;">TÌM KIẾM</h3>
            <div class="form-inline">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="txtid" value="<?php echo $id;?>">
                <label for="mamon">Mã môn:</label>
                <input type="text" class="form-control" name="txtmamon" value="<?php echo $mamon;?>">
                <label for="tenmon">Tên môn:</label>
                <input type="text" class="form-control" name="txttenmon" value="<?php echo $tenmon;?>">
                <label for="sotinchi">Số tín chỉ:</label>
                <input type="number" class="form-control" name="txtsotinchi" value="<?php echo $sotinchi;?>">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnSearch">Tìm kiếm</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnAdd">Thêm mới</button>
            </div>
        </form>
        
        <h3 style="text-align: center;">DANH SÁCH</h3>
        <table class="table table-bordered table-hover table-striped" border="1" style="width:100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>  
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Số tín chỉ</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (isset($data_search) && mysqli_num_rows($data_search) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_array($data_search)) {
            ?>
                <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['mamon'] ?></td>
                        <td><?php echo $row['tenmon'] ?></td>
                        <td><?php echo $row['sotinchi'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="Edit.php?id=<?php echo $row['id']; ?>">Cập nhật</a> &nbsp; &nbsp;
                            <a class="btn btn-danger" href="Delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                        </td>
                </tr>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>Không tìm thấy dữ liệu</td></tr>";
                }
            ?>
        </tbody>
    </div>
</body>
</html>