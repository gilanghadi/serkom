<div class="container p-3">
    <div class="d-flex">
        <a href="<?= BASEURL . 'beasiswa.php' ?>" class="text-decoration-none p-2 p-2 flex-grow-1 border rounded-1 justify-content-center d-flex <?= $thisPage === "beasiswa" ? "bg-primary text-white shadow" : "" ?>">
            <div class="">
                Pilih Beasiswa
            </div>
        </a>
        <a href="<?= BASEURLIN; ?>" class="text-decoration-none p-2 border rounded-1 <?= $thisPage === "index" ? "bg-primary text-white shadow" : "" ?>">
            <div class="">
                Daftar
            </div>
        </a>
        <a href="<?= BASEURL . 'hasil.php' ?>" class="text-decoration-none p-2 border rounded-1 <?= $thisPage === "hasil" ? "bg-primary text-white shadow" : "" ?>">
            <div class="">
                Hasil
            </div>
        </a>
    </div>
    <hr style="border-width: 3px">
</div>