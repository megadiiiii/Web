    <?php 
    include_once'dbConnect.php';
        $student_ID = '';
        $student_FName = '';
        $DoB = '';
        $sex = '';
        $class_ID = '';
        $phone = '';
        $email = '';
        $address = '';
    // Tạo câu lệnh sql lấy DL từ bảng class đưa vào mảng $class
    $sql="Select * From class";
    $class=mysqli_query($con,$sql);

    //Tìm kiếm 
    if(isset($_POST["btnSearch"])){
        $student_ID = $_POST["txtStudent_ID"];
        $student_FName = $_POST['txtStudent_FName'];
        $sex = $_POST['ddlSex'];
        $class_ID = $_POST['ddlClass_ID'];   
    }
        $sql1 = "SELECT student.*,class_name FROM student,class WHERE student.class_ID=class.class_ID and student_ID like '%$student_ID%' 
            and student_FName like '%$student_FName%' and sex like '%$sex%' and student.class_ID like '%$class_ID%'"; 
        $data = mysqli_query($con,$sql1);

    if(isset($_POST["btnAdd"])){
        header("location:./Add.php");
    }
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
            <form action="" method="post">
            <div class="form-group" style="width:100%; padding:100px 350px">
                    <label>Mã sinh viên</label>
                    <input type="text" class="form-control" name="txtStudent_ID" value="<?php echo $student_ID ?>">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" name="txtStudent_FName" value="<?php echo $student_FName ?>">
                    <label>Giới tính</label>
                    <select name="ddlSex" id="" class="form-control">
                        <option value="">--Chọn giới tính--</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <label for="">Lớp học</label>
                    <select name="ddlClass_ID" class="form-control" id="">
                        <option value="">--Chọn lớp học</option>
                        <?php 
                        if(isset($class)&&mysqli_num_rows($class)> 0){
                            while($row = mysqli_fetch_assoc($class)) {
                            
                        ?>
                        <option value="<?php echo $row['class_ID'] ?>">
                            <?php echo $row['class_name'] ?>
                        </option>
                        <?php  } }?>
                    </select>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary" name="btnSearch">Tìm kiếm</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary" name="btnAdd">Thêm mới</button>
                </div>
        
            </form>
        
            <table class="table table-bordered table-primary" border="1" style="width:100%">
                <thead style="text-align: center;">
                    <tr>
                        <th>STT</th>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if (isset($data) && mysqli_num_rows($data) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($data)) { 
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['student_ID']; ?></td>
                        <td><?php echo $row['student_FName']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['class_ID']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="Edit.php?student_ID=<?php echo $row['student_ID']; ?>">Sửa</a> &nbsp; &nbsp;
                            <a class="btn btn-primary" href="Delete.php?student_ID=<?php echo $row['student_ID']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                        </td>
                    </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='10'>Không tìm thấy dữ liệu</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>