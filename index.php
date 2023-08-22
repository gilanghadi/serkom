<?php
$thispage = "index";
require "./app/init.php";
require "./app/database/conn.php";

// process insert data pendaftaran
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $IPK = mysqli_real_escape_string($conn, $_POST['ipk']);
    $beasiswa = mysqli_real_escape_string($conn, $_POST['beasiswa']);
    $file = upload($_FILES['berkas']);

    // filter email
    function filter_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            echo "<script>alert('Bukan Email Valid!');window.location = 'index.php';</script>";
            return false;
        }
    }

    $query = mysqli_query($conn, "INSERT INTO pendaftaran VALUES('', '$nama', '$email', $nomor_hp, '$semester', $IPK, '$beasiswa', '$file', false)");
    if ($query) {
        Flash("success", "Pendaftaran Berhasil!, Tunggu Konfirmasi Selanjutnya.");
    }
}


// function upload file image
function upload($file)
{
    $nameFile = $file['name'];
    $size = $file['size'];
    $error = $file['error'];
    $tmpName = $file['tmp_name'];
    $ekstensi_diperbolehkan = ['jpg', 'jpeg', 'png'];


    $Separate = explode('.', $nameFile);
    $ekstensiFile = strtolower(end($Separate));

    if ($error === 4) {
        echo "<script>alert('Pilih File Terlebih Dahulu!');window.location = 'index.php';</script>";
        return false;
    }

    if (in_array($ekstensiFile, $ekstensi_diperbolehkan) === true) {
        if ($size < 15000000) {
            move_uploaded_file($tmpName, 'img/' . $nameFile);
            return 'img/' . $nameFile;
        } else {
            echo "<script>alert('Ukuran File Terlalu Besar!');window.location = 'index.php'</script>";
            return false;
        }
    } else {
        echo "<script>alert('Ekstensi File Harus JPG/JPEG/PNG!');window.location = 'index.php'</script>";
        return false;
    }
}


// flash message session
function Flash($type, $message)
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}


// query data beasiswa
$beasiswa = mysqli_query($conn, "SELECT * FROM beasiswa");

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

    <?php include './app/pages/components/navbar.php'; ?>

    <div class="container mt-4 pb-5">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <h1 class="mb-4 text-center text-primary">Daftar Calon Beasiswa</h1>
                    <div class="card">
                        <div class="card-header">Registrasi Mahasiswa</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="nama" class="form-label">Masukkan Nama</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="email" class="form-label">Masukkan Email</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                                    </div>
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <span class="pr-2">+62</span>
                                        <input type="number" class="form-control ms-2" id="nomor_hp" name="nomor_hp" required>
                                    </div>
                                </div>

                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="semester" class="form-label">Semester Saat Ini</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="semester" id="semester" class="form-select" required>
                                            <option value="none" selected disabled>Pilih Semester</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="ipk" class="form-label">IPK Terakhir</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="ipk" name="ipk" readonly required>
                                    </div>
                                </div>
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="beasiswa" class="form-label">Pilih Beasiswa</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="beasiswa" id="beasiswa" class="form-select">
                                            <option value="none" selected disabled>Pilih Beasiswa</option>
                                            <?php foreach ($beasiswa as $b) : ?>
                                                <option value="<?= $b['id'] ?>"><?= $b['nama_beasiswa'] ?></option>
                                            <?php endforeach; ?>
                                        </select required>
                                    </div>
                                </div>
                                <div class="row d-flex jusitfy-content-around align-items-center px-5 mb-4">
                                    <div class="col-lg-6">
                                        <label for="berkas" class="form-label">Upload Berkas Syarat</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="berkas" id="berkas" class="form-control" required>
                                    </div>
                                </div>
                                <div class="d-flex p-4 row">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <button class="btn btn-outline-primary mx-2" type="submit" name="submit" id="submit">Daftar</button>
                                        <button class="btn btn-outline-primary mx-1" type="reset" name="reset">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <?php if (isset($_SESSION['flash'])) : ?>
        <script type="text/javascript">
            Swal.fire(
                'success',
                '<?= $_SESSION['flash']['message'] ?>',
                'success'
            )
        </script>
    <?php endif; ?>
</body>

</html>