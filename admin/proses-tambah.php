<?php
    include '../koneksi.php';
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $lokasi_file = $_FILES['foto']['tmp_name'];
    $tipe_file = $_FILES['foto']['type'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = "images/$nama_file";

    if (!empty($lokasi_file)) {
        move_uploaded_file($lokasi_file,$direktori);
        $query = mysqli_query($koneksi,"INSERT INTO barang (nama_barang,foto,harga,deskripsi) VALUES 
        ('$nama_barang','$nama_file','$harga','$deskripsi')");
        if ($query) {
            header('location: home.php?pesan=berhasil');
        }else{
            header('location: home.php?pesan=gagal');
        }
    }else{
        header('location: home.php?pesan=tauahgelap');
    }
?>