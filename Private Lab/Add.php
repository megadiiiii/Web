<?php 
    include_once "dbConnect.php";

    $student_ID = '';
    $student_FName = '';
    $DoB = '';
    $sex = '';
    $class_ID = '';
    $phone = '';
    $address = '';
    $email = '';
    
    if(isset($_POST['btnAdd'])) {
        $student_ID = $_POST['txtID'];
        $student_FName = $_POST['txtStudent_FName'];
        $DoB = $_POST['txtDoB'];
        $sex = $_POST['ddlSex'];
        $class_ID = $_POST['ddlClass_ID'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        $email = $_POST['txtEmail'];

        //Primary Key Check
        $sql_check = "SELECT * FROM `student` WHERE `student_ID` = '$student_ID'";
        $result_check = mysqli_query($con, $sql_check);

        if(mysqli_num_rows($result_check) > 0) {
            echo "<script>alert('Trùng MSV! Vui lòng kiểm tra lại!')</script>";
        } else {
            $sql_insert = "INSERT INTO `student`(`student_ID`, `student_FName`, `DoB`, `sex`, `class_ID`, `phone`, `address`, `email`) 
                            VALUES ('$student_ID','$student_FName','$DoB','$sex','$class_ID','$phone','$address','$email')";
            $data_insert = mysqli_query($con, $sql_insert);
        }

        if ($data_insert) {
            echo "<script>alert('Thêm thông tin thành công!')</script>";
        } else {
            echo "<script>alert('Thêm thông tin thất bại!')</script>";
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
    <title>Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <form method="post" action="" style="width: 100%; padding: 100px 350px">
            <div class="form-inline">
                <label for="ID">MSV:</label>
                <input type="text" class="form-control" name="txtID" value="<?php echo $student_ID;?>">
                <label for="student_FName">Họ và tên:</label>
                <input type="text" class="form-control" name="txtStudent_FName" value="<?php echo $student_FName;?>">
                <label for="DoB">Ngày, tháng, năm sinh:</label>
                <input type="date" class="form-control" name="txtDoB" value="<?php echo $DoB; ?>">
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
                <input type="text" class="form-control" name="txtPhone" value="<?php echo $phone; ?>">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" name="txtAddress" value="<?php echo $address; ?>">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="txtEmail" value="<?php echo $email; ?>">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnAdd">Thêm mới</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnBack">Quay lại</button>
            </div>
        </form>
    </div>
</body>
</html>