<?php 
    //Thêm header vào trang sửa
    include "Header.php";
    //B1:Kết nối đến database
    include "Connection.php";
    //Lấy giá trị id được truyền từ trang Home.php 
     $id=$_GET['id'];
     //Tim kiem theo id
    $sql1="select * from van_bang where id='$id'";
    $data=mysqli_query($con,$sql1);
    //Hiển thị mảng $data lên các điều khiển của trang web
    //B2: Tạo câu lệnh truy vấn
     if(isset($_POST['btnSua'])){
         $tl=$_POST['txtTenVB'];
         $mt=$_POST['txtSohieuVB'];
         $sql="update van_bang set tenvb='$tl' , sohieuvb='$mt' where id='$id'";
         $kq=mysqli_query($con,$sql);
         if($kq){
            echo '<script>alert("Sửa mới thành công")</script>';
            echo '<script>window.location.href = "Home.php";</script>';
            exit; // Thêm exit để dừng việc thực thi mã PHP sau khi chuyển hướng
         }
         else{
             echo '<script>alert("Sửa thất bại")</script>';
             echo '<script>window.location.href = "UpdateVB.php";</script>';
            exit; // Thêm exit để dừng việc thực thi mã PHP sau khi chuyển hướng
         }
       
     }
     //B3:Ngắt kết nối
     mysqli_close($con);
?>
 <div class="container-fluid col-md-6">
    
    <form action="" method="post">
    <caption>Cập nhật thông tin VB</caption>
        <table>
            <?php
                if(isset($data) && $data!=""):
                    while($row = mysqli_fetch_assoc($data)):
                        ?>
            <tr>
                <td>
                <label for="">ID</label>
                </td>
                <td>
                    <input type="text" name="txtid" class="form-control" value="<?php echo $row['id']?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                <label for="">Tên VB</label>
                </td>
                <td>
                    <input type="text" name="txtTenVB" class="form-control"value="<?php echo $row['tenvb']?>">
                </td>
            </tr>
            <tr>
                <td>
                <label for="">Số hiệu VB</label>
                </td>
                <td>
                    <input type="text" name="txtSohieuVB" class="form-control"value="<?php echo $row['sohieuvb']?>">
                </td>
            </tr>
           
            <tr>
                <td></td>
                <td><input type="submit" value="Sửa" name="btnSua"class="btn btn-success"></td>
            </tr> 
            <?php endwhile;?>
            <?php endif;?>   
        </table>
    </form>

</div>