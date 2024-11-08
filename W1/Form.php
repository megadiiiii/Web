<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="Form.css">
</head>
<body>
    <div class="Text" align="center">
        <form action="" method="get">
            <label class="Label" for="">Họ và tên</label> <br>
            <input type="text" name="Name"placeholder="Test"> <br>
            <label class="Label" for="">Mật khẩu</label> <br>
            <input type="password" name=txtPass placeholder="Test"> <br>
            <label class="Label" for="">Ngày sinh</label> <br>
            <input type="date" name=txtDate placeholder="Test"><br>
            <label class="Label" for="">Số lượng</label> <br>
            <input type="number" max = 10><br>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
            <br>
            <label class="Label" for="">Phép toán</label> <br>
            <input type="checkbox" name="" id="" >Cộng
            <input type="checkbox" name="" id="" >Trừ 
            <input type="checkbox" name="" id="" >Nhân
            <input type="checkbox" name="" id="" >Chia <br>

            <label class="Label" for="">Phép toán</label> <br>
            <input type="radio" name="" id="" >Cộng
            <input type="checkbox" name="" id="" >Trừ 
            <input type="checkbox" name="" id="" >Nhân
            <input type="checkbox" name="" id="" >Chia
        </form>
    </div>

</body>
</html>