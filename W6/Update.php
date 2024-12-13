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

if (isset($_POST['btnSave'])) {
    $student_ID = $_POST['txtStudent_ID'];
    $student_FName = $_POST['txtStudent_FName'];
    $DoB = $_POST['txtDoB'];
    $sex = $_POST['ddlSex'];
    $class_ID = $_POST['ddlClass_ID'];
    $phone = $_POST['txtPhone'];
    $email = $_POST['txtEmail'];
    $address = $_POST['txtAddress'];

    // Kiểm tra trùng lặp student_ID
    $sql_check = "SELECT * FROM `student` WHERE `student_ID` = '$student_ID'";
    $result_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Mã sinh viên đã tồn tại! Vui lòng nhập mã khác.')</script>";
    } else {
        // Chèn dữ liệu vào bảng student
        $sql_insert = "INSERT INTO `student`(`student_ID`, `student_FName`, `DoB`, `sex`, `class_ID`, `phone`, `email`, `address`) 
                       VALUES ('$student_ID', '$student_FName', '$DoB', '$sex', '$class_ID', '$phone', '$email', '$address')";

        $data = mysqli_query($con, $sql_insert);

        if ($data) {
            echo "<script>alert('Thêm thông tin thành công!')</script>";
        } else {
            echo "<script>alert('Thêm thông tin thất bại!')</script>";
        }
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
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
            <form method="post" action="">
            <div class="form-inline" style="width:100%; padding:100px 500px">
                <label for="tenloai">MSV:</label>
                <input type="text" name="txtStudent_ID" class="form-control" value="<?php echo $student_ID; ?>" require>
                <label for="student_FName">Họ và tên</label>
                <input type="text" name="txtStudent_FName" class="form-control" value="<?php echo $student_FName; ?>" require>
                <label for="DoB">Ngày sinh:</label>
                <input type="date" name="txtDoB" class="form-control" value="<?php echo $DoB; ?>" require>
                <label for="sex">Giới tính:</label>
                <select name="ddlSex" class="form-control">
                    <option value="Nam" <?php if($sex=='Nam') echo 'selected' ?>>Nam</option>
                    <option value="Nữ" <?php if($sex=='Nữ') echo 'selected' ?>>Nữ</option>
                </select>
                <label for="class_ID">Lớp:</label>
                <select name="ddlClass_ID" class="form-control">
                    <option value="">---Chọn lớp học---</option>
                 <?php 
                    if(isset($class)&&mysqli_num_rows($class)>0){
                        while($row=mysqli_fetch_assoc($class)){
                 ?>
                            <option value="<?php echo $row['class_ID'] ?>" <?php if($class_ID==$row['class_ID']) echo 'selected' ?>>
                                <?php echo $row['class_name'] ?>
                            </option>
                 <?php
                        }
                    }
                 ?>   
                </select>

                <label for="phone">SĐT:</label>
                <input type="text" name="txtPhone"class="form-control <?php echo $phone; ?>" require>
                <label for="email">Email:</label>
                <input type="email" name="txtEmail"class="form-control" <?php echo $email; ?>" require>
                <label for="address">Địa chỉ:</label>
                <input type="text" name="txtAddress"class="form-control" <?php echo $address; ?>" require>
                <br>
                &nbsp;&nbsp;&emsp;&emsp;
                <button type="submit" class="btn btn-primary" name="btnSave">Cập nhật</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnBack">Quay lại</button>
            </div>
    </body>
    </html>