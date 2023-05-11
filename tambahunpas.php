<?php 
if(isset($_POST["submit"])){
    var_dump($_POST);

     //ambil data dari tiap elemen form 
    // $avatar = $_POST["avatar"];
    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $phone = $_POST["phone"];
    // $role = $_POST["role"];
    // $password = $_POST["password"];
    // $address = $_POST["address"];

    // //query insert data
    // $query = "INSERT INTO users VALUES ('$email', '$name', '$role', '$phone', '$address', '$password', '', '')";
    // mysqli_query ($conn, $query);

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <ul style="list-style-type:none";>
        <li>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap :</label>
                <input type="text" class="form-control" id="name" aria-describedby="" name="name" >
                <div id="" class=""></div>
            </div>
        </li>
        <li>
            <label for="role">Role :</label>
            <input type="text" name="role" id="role">
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="avatar">Avatar :</label>
            <input type="text" name="avatar" id="avatar">
        </li>
        <li>
            <label for="phone">Phone :</label>
            <input type="text" name="phone" id="phone">
        </li>
        
        <li>
            <button type="submit" name="submit">Tambah pengguna!</button>
        </li>
    </ul>
    </form>
    
</body>
</html>

