<?php 
    if(isset ($_POST['btnUpload'])) {
        if(isset($_FILES['file_upload'])) {
            $filename='./W4/Resource/' .basename($_FILES['file_upload']['name']);
            // Save Files
            move_uploaded_file($_FILES['file_upload']['tmp_name'], $filename);
            echo 'Upload thành công';
        }
        else echo 'Upload thất bại như Bảo Đinh';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Level Menu</title>
    <link rel="stylesheet" href="Search.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <nav class="container">
                <a class="logo" href="" id="">
                    <img src="./Resource/logo.png" alt="ATVNCG" width="">
                </a>
            <ul class="main">
                <li><a href="">About</a></li>
                <li><a href="">Sample</a>
                    <ul class="sub">
                        <li><a href="">Drop 1.1</a></li>
                        <li><a href="">Drop 1.2</a></li>
                        <li><a href="">Drop 1.3</a></li>
                        <li><a href="">Drop 1.4</a></li>
                    </ul>
                </li>
                <li><a href="">Soundbank</a>
                <ul class="sub">
                        <li><a href="http://localhost/Web/" target="blank">Drop 2.1</a></li>
                        <li><a href="background.png">Drop 2.2</a></li>
                        <li><a href="logo.png">Drop 2.3</a></li>
                        <li><a href="Lab_menu.css">Drop 2.4</a></li>
                    </ul>
                </li>
                <li><a href="">VSTs</a></li>
                <li><a href="">Project</a></li>
            </ul>
            </nav>
        </div>
    </div>
    <div class="body">
        <div class="left_nav">

        </div>
        
        <div class="content">
            <form action="" method="post" enctpype="multipart/form-data">
                <input type="file" name="file-upload" id="">
                <input type="submit" value="Upload File" name="btnUpload">
            </form>
        </div>
        
        <div class="right_nav">
            
        </div>
    </div>
        <footer>

        </footer>
        <script src="Lab_menu.js"></script>
</body>
</html>