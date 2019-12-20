<?php
    session_start();
    include '../koneksi.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);
    if ($cek == 1) {
        $_SESSION['id_admin'] = $row['id_user'];
        header('location: home.php');
        exit();
    }else{
        header('location: index.php?pesan=login_gagal');
    }
?>