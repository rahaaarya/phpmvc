<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <?= Flasher::flash() ?>
      <h1>Data Mahasiswa</h1>
      <div class="d-flex align-items-center mt-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary tombolTambahData me-2" data-bs-toggle="modal" data-bs-target="#formModal">
          Tambah Data +
        </button>
        <!-- Search form -->
        <form class="d-flex ms-auto" action="<?= BASEURL; ?>/mahasiswa/cari" method="POST">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Mahasiswa..." 
          name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
        </div>
        </form>
      </div>
      <!-- Tabel Data Mahasiswa -->
      <table class="table table-bordered table-striped mt-3">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data['mahasiswa'] as $mhs): ?>
              <tr>
                  <td><?= $mhs['nama']; ?></td>
                  <td>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary link-underline link-underline-opacity-0">Detail</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id'] ?>" class="badge text-bg-warning text-white link-underline tampilModalUbah link-underline-opacity-0"  data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                    <a href="#" class="badge text-bg-danger link-underline link-underline-opacity-0" onclick="confirmDelete('<?= $mhs['id'] ?>', '<?= $mhs['nama'] ?>')">Hapus</a>
                  </td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  function confirmDelete(id, name) {
    Swal.fire({
      title: 'Yakin anda ingin menghapus data ini?',
      text: `Anda tidak akan dapat mengembalikan data ${name} ini!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to the delete URL
        window.location.href = '<?= BASEURL; ?>/mahasiswa/hapus/' + id;
      }
    });
  }

  $(function () {
    $(".tampilModalUbah").on("click", function () {
      console.log("ok");
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/tambah" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label class="mt-2" for="nama">Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label class="mt-2" for="nim">NIM</label>
            <input type="number" class="form-control" placeholder="Masukkan NIM" id="nim" name="nim">
          </div>
          <div class="form-group">
            <label class="mt-2" for="email">Email</label>
            <input type="email" class="form-control" placeholder="Masukkan Email" id="email" name="email">
          </div>
          <div class="form-group">
            <label class="mt-2" for="jurusan">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option selected disabled>Jurusan</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
