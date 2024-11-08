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
            <label class="Label" for="">Họ và tên</label>
            <input type="text" name="Name"placeholder="Test"> <br>
            <label class="Label" for="">Mật khẩu</label>
            <input type="password" name=txtPass placeholder="Test"> <br>
            <label class="Label" for="">Ngày sinh</label>
            <input type="date" name=txtDate placeholder="Test"><br>
            <label class="Label" for="">Số lượng</label>
            <input type="number" max = 10><br>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </div>

</body>
</html>