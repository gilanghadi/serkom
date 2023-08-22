<?php
$thispage = "hasil";
require "../init.php";
require "../database/conn.php";

$daftars = query("SELECT * FROM pendaftaran INNER JOIN beasiswa ON pendaftaran.beasiswa = beasiswa.id");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kampuskuaja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>

    <?php include '../pages/components/navbar.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col">
                    <h1 class="mb-4 text-center text-primary">List Pendaftar Beasiswa</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($daftars as $daftar) : ?>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="<?= BASEURLIN . $daftar['berkas'] ?>" alt="<?= $daftar['berkas'] ?>" class="img-fluid rounded-top">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize mb-3 fw-bold"><?= $daftar['nama'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $daftar['email'] ?></h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">+62 <?= $daftar['nomor_hp'] ?></h6>
                            <span>
                                <p class="card-text">Semester : <?= $daftar['semester'] ?> </p>
                            </span>
                            <span>
                                <p class="card-text">Dengan IPK Terakhir : <?= $daftar['ipk'] ?></p>
                            </span>
                            <p>Mengikuti Beasiswa : <?= $daftar['nama_beasiswa'] ?></p>
                            <p>Status :
                                <?php if (isset($daftar['status'])) : ?>
                                    <span class="bg-secondary rounded px-2 py-1 text-white">Belum Diverifikasi</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
</body>

</html>