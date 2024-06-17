<div class="container mt-5">
    <div class="card mx-auto" style="width: 24rem;">
      <div class="card-body text-center">
        <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mhs']['nim']; ?></h6>
        <p class="card-text"><?= $data['mhs']['email']; ?></p>
        <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-primary mt-3">Kembali</a>
      </div>
    </div>
  </div>