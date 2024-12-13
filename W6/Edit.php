<?php 
include_once "dbConnect.php";

$student_ID = '';
$student_FName = '';
$DoB = '';
$sex = '';
$class_ID = '';
$phone = '';
$email = '';
$address = '';

// Kiểm tra nếu có tham số student_ID từ URL
if (isset($_GET['student_ID'])) {
    $student_ID = $_GET['student_ID'];

    // Lấy thông tin sinh viên từ cơ sở dữ liệu
    $sql_select = "SELECT * FROM student WHERE student_ID = '$student_ID'";
    $result_select = mysqli_query($con, $sql_select);

    if ($row = mysqli_fetch_assoc($result_select)) {
        $student_FName = $row['student_FName'];
        $DoB = $row['DoB'];
        $sex = $row['sex'];
        $class_ID = $row['class_ID'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
    } else {
        echo "<script>alert('Không tìm thấy sinh viên!'); window.location='List.php';</script>";
        exit();
    }
}

// Xử lý khi người dùng nhấn nút Lưu
if (isset($_POST['btnSave'])) {
    $student_ID = $_POST['txtStudent_ID'];
    $student_FName = $_POST['txtStudent_FName'];
    $DoB = $_POST['txtDoB'];
    $sex = $_POST['ddlSex'];
    $class_ID = $_POST['ddlClass_ID'];
    $phone = $_POST['txtPhone'];
    $email = $_POST['txtEmail'];
    $address = $_POST['txtAddress'];

    // Cập nhật thông tin sinh viên
    $sql_update = "UPDATE student 
                   SET student_FName = '$student_FName',
                       DoB = '$DoB',
                       sex = '$sex',
                       class_ID = '$class_ID',
                       phone = '$phone',
                       email = '$email',
                       address = '$address'
                   WHERE student_ID = '$student_ID'";

    $data = mysqli_query($con, $sql_update);

    if ($data) {
        echo "<script>alert('Cập nhật thông tin thành công!'); window.location='Search.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thông tin thất bại!')</script>";
    }
}

    $sql = "SELECT * FROM class";
    $class = mysqli_query($con, $sql);
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div class="form-inline" style="width:100%; padding:100px 350px">
            <label for="student_ID">MSV:</label>
            <input type="text" name="txtStudent_ID" class="form-control" value="<?php echo $student_ID; ?>" readonly>
            <label for="student_FName">Họ và tên</label>
            <input type="text" name="txtStudent_FName" class="form-control" value="<?php echo $student_FName; ?>" required>
            <label for="DoB">Ngày sinh:</label>
            <input type="date" name="txtDoB" class="form-control" value="<?php echo $DoB; ?>" required>
            <label for="sex">Giới tính:</label>
            <select name="ddlSex" class="form-control">
                <option value="Nam" <?php if($sex == 'Nam') echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if($sex == 'Nữ') echo 'selected'; ?>>Nữ</option>
            </select>
            <label for="class_ID">Lớp:</label>
            <select name="ddlClass_ID" class="form-control">
                <option value="">---Chọn lớp học---</option>
                <?php 
                if (isset($class) && mysqli_num_rows($class) > 0) {
                    while ($row = mysqli_fetch_assoc($class)) {
                ?>
                        <option value="<?php echo $row['class_ID']; ?>" <?php if($class_ID == $row['class_ID']) echo 'selected'; ?>>
                            <?php echo $row['class_name']; ?>
                        </option>
                <?php
                    }
                }
                ?>   
            </select>

            <label for="phone">SĐT:</label>
            <input type="text" name="txtPhone" class="form-control" value="<?php echo $phone; ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="txtEmail" class="form-control" value="<?php echo $email; ?>" required>
            <label for="address">Địa chỉ:</label>
            <input type="text" name="txtAddress" class="form-control" value="<?php echo $address; ?>" required>
            <br>
            <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
            <a href="Search.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
</body>
</html>
