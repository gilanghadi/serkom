<?php
require "../init.php";
require "../database/conn.php";

$beasiswa = mysqli_query($conn, "SELECT * FROM beasiswa");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kampuskuaja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <?php include '../pages/components/navbar.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 text-center">Daftar Beasiswa Tersedia</h1>
                    <ul class="list-group">
                        <?php foreach ($beasiswa as $b) : ?>
                            <li class="list-group-item"><?= $b['nama_beasiswa'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#semester').change(function() {
                $('#ipk').val(3);
                if ($('#ipk').val() < 3) {
                    $('#beasiswa').attr("disabled", true);
                    $('#berkas').attr("disabled", true);
                    $('#submit').attr("disabled", true);
                }
            })
        })
    </script>
</body>

</html>