<?php 

include 'function.php';
$users = query("select * from users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class='text-center'>Daftar Pengguna</h1>

    <a href="tambah.php">Tambah daftar pengguna</a>
    <br><br>

    <table class='table'>
        <tr class='text-center'>
            <th>#</th>
            <th>Aksi</th>
            <th>Avatar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $users as $row) : ?>
        <tr class='text-center'>
            <td><?= $i; ?></td>
            <td>
                <a href=""><button type="button" class="btn btn-primary">Detail</button></a>
                <a href=""><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="hapus.php?id=<?=$row["id"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
            <td><img src="<?=$row["avatar"]; ?>" width="50" alt=""></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["phone"]; ?></td>
            <td><?= $row["role"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
</div>    
</body>
</html>

