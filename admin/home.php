<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fun Florist - Admin</title>
</head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
    session_start();
    include '../koneksi.php';
    $id_user = $_SESSION['id_admin'];
    $query = mysqli_query($koneksi,"SELECT * FROM users WHERE id_user='$id_user'");
    $row = mysqli_fetch_assoc($query);
?>
    <div class="container">
        <a href="logout.php" class="btn btn-sm btn-danger" style="margin-top: 7px" data-toggle="tooltip" data-placement="top" title="Logout From <?= $row['nama']; ?>">
            <i class="fa fa-user"></i>
            Logout
        </a>
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Tambah Data</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"></div>
                </div>  
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" action="proses-tambah.php" method="POST" enctype="multipart/form-data">
                        
                        <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == 'berhasil') {
                                    echo '<div id="signupalert" class="alert alert-success">
                                            <p>Berhasil: data berhasil di tambahkan!</p>
                                            <span></span>
                                        </div>';
                                }elseif ($_GET['pesan'] == 'gagal') {
                                    echo '<div id="signupalert" class="alert alert-danger">
                                            <p>Error: Tau ah gelap!</p>
                                            <span></span>
                                        </div>';
                                }elseif ($_GET['pesan'] == 'tauahgelap') {
                                    echo '<div id="signupalert" class="alert alert-danger">
                                            <p>Error: Tau ah gelap!</p>
                                            <span></span>
                                        </div>';
                                }
                            }
                        ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Produk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_barang" placeholder="Masukan nama produk">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto Produk</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Harga Produk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="harga" placeholder="Masukan harga produk">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Deskripsi Produk</label>
                            <div class="col-md-9">
                                <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                            
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-fbsignup" type="submit" class="btn btn-primary" onclick="saveBtn(this)"><i class="fa fa-upload"></i> Simpan</button>
                            </div>                                           
                                
                        </div>
                        
                    </form>
                </div>
            </div>
         </div>
         
         <!-- TABLE -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <!-- <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    $q = mysqli_query($koneksi,"SELECT * FROM barang");
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($q)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $r['nama_barang']; ?></td>
                        <td><img src="images/<?= $r['foto']; ?>" alt="" srcset="" width="100px" height="100px"></td>
                        <td>Rp. <?= $r['harga']; ?></td>
                        <td><?= $r['deskripsi']; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        function saveBtn(res){
            res.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading';
        }
    </script>
</html>