<?php 
    include "Header.php";
    include "Connection.php";
    $id = ""; // Khởi tạo giá trị mặc định cho id
    $tenvb = ""; // Khởi tạo giá trị mặc định cho tenvb
    $sohieuvb = ""; // Khởi tạo giá trị mặc định cho sohieuvb

    if(isset($_POST['btnluu'])){
        $id=$_POST['txtid'];
        $tenvb=$_POST['txttenvb'];
        $sohieuvb=$_POST['txtsohieu'];
        $sql="select count(*) from van_bang where id='$id'";
        $kq=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($kq);
        if($row[0] > 0){ // Kiểm tra nếu ID đã tồn tại
            echo '<script>alert("Văn bằng đã tồn tại")</script>';
            $id = $_POST['txtid']; // Lấy giá trị đã nhập cho ID
            $tenvb = $_POST['txttenvb']; // Lấy giá trị đã nhập cho Tên văn bằng
            $sohieuvb = $_POST['txtsohieu']; // Lấy giá trị đã nhập cho Số hiệu văn bằng
        }
        else{
            $sql="insert van_bang values('$id',N'$tenvb',N'$sohieuvb')";
            $kq=mysqli_query($con,$sql);
            if($kq==true){
                echo '<script>alert("Thêm mới thành công")</script>';
                echo '<script>window.location.href = "Home.php";</script>';
                exit; // Thêm exit để dừng việc thực thi mã PHP sau khi chuyển hướng
            }else{
                echo '<script>alert("Thêm mới không thành công")</script>';
                echo '<script>window.location.href = "Home.php";</script>';
                exit; // Thêm exit để dừng việc thực thi mã PHP sau khi chuyển hướng
            }
        }
    } 
   
    mysqli_close($con);
?>
<div class="container-fluid col-md-6">
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" value="<?= $id?>" autofocus> 
    <!-- Sử dụng thuộc tính autofocus để tập trung vào ô input ID -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tên văn bằng</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttenvb" value="<?= $tenvb?>">
  </div>
  <div class="form-group form-check">
    <label for="exampleInputEmail1">Số hiệu văn bằng</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtsohieu" value="<?= $sohieuvb?>">
  </div>
  <button type="submit" class="btn btn-primary" name="btnluu">Lưu</button>
</form>
</div>
