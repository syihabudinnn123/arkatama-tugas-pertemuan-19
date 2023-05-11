<?php 
$conn = mysqli_connect("localhost", "root", "", "arkatama_pertemuan_18");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $name = $data["name"];
    $role = $data["role"];
    $password = $data["password"];
    $email = $data["email"];
    $phone = $data["phone"];
    $address = $data["address"];

    // $avatar = uploud();
    // if ( !$avatar ){
    //     return false;
    // }

    $query = "INSERT INTO users (email, name, role, phone, address, password) VALUES ('$email', '$name', '$role', '$phone', '$address', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

// function uploud() {
//     $namaFile = $_FILES['avatar']['name'];
//     $ukuranFile = $_FILES['avatar']['size'];
//     $error = $_FILES['avatar']['error'];
//     $tmpName = $FILES['avatar']['tmp_name'];

//     if ($error === 4 ) {
//         echo '<script>
//                 alert("pilih gambar terlebih dahulu");
//                 </script>';
//                 return false;
//     }

//     //cek apakah yang diuploud adalah gambar 
//     $ekstensiAvatarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiAvatar = explode('', '$namaFile');
//     $ekstensiAvatar = strtolower(end($$ekstensiAvatar));
//     if( !in_array($ekstensiAvatar, $ekstensiAvatarValid)){
//         echo '<script>
//         alert("yang anda uploud bukan gambar!");
//         </script>';
//         return false;
//     }

//     //cek jika ukurannya terlalu besar 
//     if ( $ukuranFile > 1000000){
//         echo '<script>
//                 alert("ukuran gambar terlalu besar!");
//                 </script>';
//             return false;
//     }

//     //lolos pengecekan, gambar siap diuplod 
//     move_uplouded_file($tmpName, 'img/' . $namaFile);
//     return $namaFile;
// }


?>
