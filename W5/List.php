<?php
$con = mysqli_connect(hostname: 'localhost',username: 'root', password: '', database: 'w5_test');
$sql = "Select * From Test";
$data = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../custom.css">
    <title>Document</title>
</head>

<body>
    <table class="table table-striped table-light" style="width:100%; padding:100px 350px">
        <thead>
            <tr>
                <th class="test">STT</th>
                <th>Ten</th>
                <th>ID</th>
                <th>Nam</th>
                <th>NXB</th>
                <th>Chức năng</th>
            </tr>
        </thead>
            <tbody>
                <?php
                if (isset($data) && mysqli_fetch_row($data) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['Ten'] ?></td>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['Nam'] ?></td>
                            <td><?php echo $row['NXB'] ?></td>
                            <td colspan="2">
                                <a href="Edit.php?ID=<?php echo $row['ID'] ?>">Sửa</a>
                                <a href="Delete.php?ID=<?php echo $row['ID'] ?>">Xoá</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                
            </tbody>
        </th>
    </table>
</body>

</html>