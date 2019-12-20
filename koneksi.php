<?php
    $koneksi = mysqli_connect('localhost','root','','funthey');
    if(!$koneksi){
        echo "Koneksi database gagal";
    }
?>