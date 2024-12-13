
<?php $msv=$_GET['masv'];
include_once "./Connectdb1.php";

    // Tạo câu lệnh sql lấy DL từ bảng lophoc đưa vào mảng $lophoc
    $sql="Select * From Lophoc";
    $lophoc=mysqli_query($con,$sql);
    
    //Lưu DL vào bảng Sinhvien
    if(isset($_POST["btnLuu"])){

        $msv=$_POST['txtMasinhvien'];
        $ht= $_POST['txtHoten'];
        $ngs= $_POST['txtNgaysinh'];
        $gt=$_POST['ddlGioitinh'];
        $ml=$_POST['ddlLophoc'];
        $dt=$_POST['txtDienthoai'];
        $email=$_POST['txtEmail'];
        $dc=$_POST['txtDiachi'];
        //Tạo câu lệnh sql để chèn DL vào bảng Sinhvien
        $sql1="Insert into Sinhvien Values('$msv',N'$ht','$ngs','$gt','$ml','$dt','$email','$dc')";
        //Thực thi câu lệnh
        $kq=mysqli_query($con,$sql1);
        if($kq) {
            echo "<script>alert('Thêm mới thành công!')</script>";
        }
        else { echo "<script>alert('Thêm mới thất bại!')</script>"; }
    }
    if(isset($_POST["btnBack"])){
        header("location:./Danhsachsinhvien.php");
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="QLTHUVIEN/border.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="form-group" style="width: 90%; padding-left: 150px;">
        <?php 
        if(isset($data)&&mysqli_num_rows($data)> 0){
        ?>


                <label>Mã sinh viên</label>
                <input type="text" class="form-control" name="txtMasinhvien" value="<?php echo $r['Masinhvien'] ?>">
                <br><br>
                <label>Họ và tên</label>
                <input type="text" class="form-control" name="txtHoten" value="<?php echo $ht ?>">
                <br><br>
                <label>Giới tính</label>
                <select name="ddlGioitinh" id="">
                    <option value="">--Chọn giới tính--</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
                <br><br>
                <label for="">Lớp học</label>
                <select name="ddlLophoc" class="form-control" id="">
                    <option value="">--Chọn lớp học</option>
                    <?php 
                    if(isset($lophoc)&&mysqli_num_rows($lophoc)> 0){
                        while($row = mysqli_fetch_assoc($lophoc)) {
                        
                    ?>
                    <option value="<?php echo $row['Malop'] ?>">
                        <?php echo $row['Tenlop'] ?>
                    </option>
                    <?php  } }?>
                </select>
                <br><br>
    
                <button type="submit" class="btn btn-primary" name="btnTimkiem">Tìm kiếm</button>
                <br><br>
                <button type="submit" class="btn btn-primary" name="btnThemmoi">Thêm mới</button>
            </div>
       
        </form>
       
        <table class="table table-striped" border="1">
   <thead>
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
         <th></th>
      </tr>
   </thead>
   <tbody>
   

    <?php 
    if(isset($data)&& mysqli_num_rows($data > 0)) {
        $i=1;
        while($row = mysqli_fetch_assoc($data)) { 
    ?>
         
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $row['Masinhvien'] ?></td>
        <td><?php echo $row['Hoten'] ?></td>
        <td><?php echo $row['Ngaysinh'] ?></td>
        <td><?php echo $row['Gioitinh'] ?></td>
        <td><?php echo $row['Malop'] ?></td>
        <td><?php echo $row['Tenlop'] ?></td>
        <td><?php echo $row['Dienthoai'] ?></td>
        <td><?php echo $row['Email'] ?></td>
        <td><?php echo $row['Diachi'] ?></td>
        <td>
        <a href="">Sửa</a> &nbsp; &nbsp;
        <a href="">Xoá</a>
        </td>
    </tr>
      

        <?php
            }   
        }
        ?>
   </tbody>
</table>
    </div>
</body>
</html>
