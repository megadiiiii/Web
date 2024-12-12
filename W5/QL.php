<?php 
    // Step 1: Connect DB
    $con=mysqli_connect(hostname: 'localhost',username: 'root', password: '', database: 'W5_Test');
    // Step 2: Create structure to get data from table
    $sql="SELECT * FROM Test";
    $data=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Ten</th>
            <th>ID</th>
            <th>Nam</th>
            <th>NXB</th>
        </tr>
        <?php 
            if(isset($data)&&mysqli_fetch_row(result: $data)>0) {
                $i = 0;
                while ($row = mysqli_fetch_assoc(result: $data)) {
        ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['Ten'] ?></td>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['Nam'] ?></td>
                <td><?php echo $row['NXB'] ?></td>
                <td><a href="">Sửa</a></td>
                <td><a href="">Xoá</a></td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>