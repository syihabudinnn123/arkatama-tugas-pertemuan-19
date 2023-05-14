<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "arkatama_pertemuan_18");

$err = "";
$username = "";
$ingataku ="";

if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password =  $_COOKIE['cookie_passwowrd'];

    $sql1 = "select * from login where username = '$cookie_username'";
    $q1 = mysqli_query($sonn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;

    }
}
if(isset($_SESSION['$session_username'])){
    header("location:index.php");
    exit();
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = $_POST['ingataku'];

    if($username == '' or $password == ''){
        $err = "<li>Silahkan masukkan data</>";

    }else{
        $sql1 = "select * from login where username = '$username";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if($r1['username'] == ''){
            $err = '<li>Username $username tidak tersedia </li>';

        }elseif($r1['password'] != md5($password)){
            $err = '<li>password tidak sesuai </li>';

        } 

        if(empty($err)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if ($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = "$username";
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time, "/");
            }
            }
            header("location:index.php");

        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        label {
            display: block;
        }
    </style>
    <title>Halaman Login</title>
</head>
<body>
    <h1 class="text-center">Login</h1>
    <?php if($err){?>
        <div class="alert alert-danger col-sm-12" id="login-alert">
            <ul><?php echo $err ?></ul>
        </div>
        <?php } ?>
    <div class="container">
        <form method="POST" action="index.php" role="form">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name ="username" id="username" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="ingataku" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>    
        <button type="submit" name ="login" class="btn btn-primary">Login</button>
        </form>
    </div>
    
   
</body>
</html>