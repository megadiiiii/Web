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
            <div class="form-inline" style="width:100%; padding:100px 400px">
                <label for="tenloai">MSV:</label>
                <input type="text" name="txtStudent_ID" class="form-control" value="<?php echo $student_ID; ?>" require>
                <label for="student_FName">Họ và tên</label>
                <input type="text" name="txtStudent_FName" class="form-control" value="<?php echo $student_FName; ?>" require>
                <label for="DoB">Ngày sinh:</label>
                <input type="date" name="txtDoB" class="form-control" value="<?php echo $DoB; ?>" require>
                <label for="DoB">Giới tính:</label>
                <select name="ddlSex" class="form-control" value="<?php echo $sex; ?>" >
                    <option value="">--- Chọn giới tính ---</option>
                    <option value="Nam"><?php if($sex == 'Nam') echo 'selected'?>Nam</option>
                    <option value="Nữ"><?php if($sex == 'Nữ') echo 'selected'?>Nữ</option>
                </select>
                <label for="DoB">Mã lớp:</label>
                <select name="ddlClass_ID" class="form-control" <?php echo $class_ID; ?>>
                    <option value="">--- Mã lớp ---</option>
                    <?php 
                        if(isset($class) && mysqli_num_rows($class)) {
                            while($row=mysqli_fetch_assoc($class)) {
                    ?>
                        <option value="<?php echo $row['class_ID'] ?>">
                            <?php echo $row['class_name'] ?>
                        </option>
                    <?php
                            }
                        }
                    ?>
                </select>

                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <button type="submit" class="btn btn-primary" name="btnSave">Cập nhật</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="btnBack">Quay lại</button>
            </div>
</body>
</html>