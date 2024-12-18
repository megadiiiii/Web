<?php 
    include "header.php";
    include "Connection.php";
    $sql="select * from van_bang";
    $data=mysqli_query($con,$sql);
    //Tìm kiếm dữ liệu
    $tenvb='';
    $sohieuvb='';
    if(isset($_POST['btntimkiem'])){
        $tenvb=$_POST['txtTenVB'];
        $sohieuvb=$_POST['txtSohieuVB'];
        $sql1="select * from van_bang where tenvb like N'%$tenvb%' and sohieuvb like N'%$sohieuvb%'";
        $data=mysqli_query($con,$sql1);
    }  
?>
<div class="container-fluid col-md-6">
    <div class="row">
    <div style="margin-top: 125px;">
    <a href="InsertVB.php" ><button type="button" class="btn btn-success">Thêm văn bằng</button></a>
    </div>
    <div style="margin-bottom: 20px;">
    <form action="" method="post">
    <table>
        <tr>
            <td style="text-align: center;padding:20px" ><label for="">Tên VB</label><input class="inputvb" type="text" name="txtTenVB" id="" value="<?= $tenvb?>"></td>
         </tr>
        <tr>
            <td><label for="">Số hiệu VB</label><input type="text"name="txtSohieuVB" id="" value="<?= $sohieuvb?>"></td>
        </tr>
        <tr>
            <td style="text-align: center;"><button name="btntimkiem" class="btn btn-danger" >Tìm kiếm</button></td>
        </tr>    
    </table>
              
    </form>
    </div>
    </div>
</div>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên văn bằng</th>
      <th scope="col">Số hiệu văn bằng</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if(isset($data) && $data!=""):
        while($row=mysqli_fetch_assoc($data)):    
    ?>
    
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['tenvb']?></td>
      <td><?php echo $row['sohieuvb']?></td>
      <td><a href="UpdateVB.php?id=<?php echo $row['id']?>">Sửa</a>
            <a href="DeleteVB.php?id=<?php echo $row['id']?>">Xóa</a>
    </td>
    </tr>
 
    <?php endwhile;?>
    <?php endif;?>
  </tbody>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>