<?php
$thisPage = "beasiswa";
require "../init.php";
require "../database/conn.php";

// query status beasiswa
$beasiswaAkademik = mysqli_query($conn, "SELECT * FROM beasiswa WHERE status = 'akademik'");
$beasiswaNonAkademik = mysqli_query($conn, "SELECT * FROM beasiswa WHERE status != 'akademik'");

$status = [];
$countBeasiswaAkademik = mysqli_num_rows($beasiswaAkademik);
$countBeasiswaNonAkademik = mysqli_num_rows($beasiswaNonAkademik);
$statusBeasiswa = mysqli_query($conn, "SELECT DISTINCT status FROM beasiswa");
foreach ($statusBeasiswa as $beasiswa) :
    $status[] = $beasiswa['status'];
endforeach;
$count = [$countBeasiswaAkademik, $countBeasiswaNonAkademik];
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <?php include '../pages/components/navbar.php'; ?>

    <div class="container mt-4 pb-5">
        <div class="mb-5 pb-5">
            <canvas id="myChart"></canvas>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <h5 class="mb-4 text-center text-primary">Daftar Beasiswa Akademik</h1>
                        <div class="accordion accordion-flush px-2" id="accordionFlushExample">
                            <?php foreach ($beasiswaAkademik as $akademik) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?= $akademik['id'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <?= $akademik['nama_beasiswa'] ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-<?= $akademik['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="p-3">
                                            <?= $akademik['syarat'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="mb-4 text-center text-primary">Daftar Beasiswa Non Akademik</h1>
                        <div class="accordion accordion-flush px-2" id="accordionFlushExample">
                            <?php foreach ($beasiswaNonAkademik as $non_akademik) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?= $non_akademik['id'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <?= $non_akademik['nama_beasiswa'] ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-<?= $non_akademik['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="p-3">
                                            <?= $non_akademik['syarat'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script>
        const ctx = $('#myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($status) ?>,
                datasets: [{
                    label: '# banyak beasiswa tersedia',
                    data: <?= json_encode($count) ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>