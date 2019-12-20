<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fun Florist - Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet"> 
</head>
<body background="gambar/bunga.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" style="font-family: 'Lobster', cursive;">
                <h1>Fun Florist</h1>
                <p class="text-description">
                    Disini menjual berbagai macam bouquet bunga yang menarik dan istimewa untuk orang terspesialmu.
                    <br>Selamat berbelanja ^^.
                </p>
            </div>
            <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi,"SELECT * FROM barang");
                while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px">
                    <div class="card" style="width: 18rem;">
                        <img src="admin/images/<?= $row['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_barang']; ?></h5>
                            <p class="card-text">
                                <?= substr($row['deskripsi'],0,50); ?>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="javascript:void(0);" class="btn btn-sm btn-block btn-info" data-toggle="modal" data-target="#modalBarang<?= $row['id_barang']; ?>">Read More</a>
                                <div class="modal fade" id="modalBarang<?= $row['id_barang'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_barang']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="admin/images/<?= $row['foto']; ?>" alt="" class="img-responsive img-fluid">
                                                <p>
                                                    <?= $row['deskripsi']; ?>
                                                </p>
                                                <span style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 1.2rem">Rp. <?= $row['harga']; ?></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <span style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 1.2rem">Rp. <?= $row['harga']; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php
                }
            ?>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function showModal(){
            $('#modalBarang').modal('show');
        }
    </script>
</body>
</html>