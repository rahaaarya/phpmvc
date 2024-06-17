 <!-- jQuery from CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <!-- Bootstrap JS from BASEURL -->
    <script src="<?= BASEURL; ?>/js/bootstrap.js" crossorigin="anonymous"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Your custom script -->
    <script src="<?= BASEURL; ?>/js/script.js"></script>

    <!-- Dalam bagian head atau footer view Anda -->
<script>
$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        var keyword = $(this).val(); // Ambil nilai keyword dari input

        $.ajax({
            url: '<?= BASEURL; ?>/mahasiswa/cari',
            type: 'post',
            data: {keyword: keyword},
            dataType: 'json',
            success: function(response) {
                var rows = '';
                $.each(response.mahasiswa, function(index, mahasiswa) {
                    rows += '<tr>';
                    rows += '<td>' + mahasiswa.nama + '</td>';
                    rows += '<td>';
                    rows += '<a href="<?= BASEURL; ?>/mahasiswa/detail/' + mahasiswa.id + '" class="badge text-bg-primary link-underline link-underline-opacity-0">Detail</a>';
                    rows += '<a href="<?= BASEURL; ?>/mahasiswa/ubah/' + mahasiswa.id + '" class="badge text-bg-warning text-white link-underline tampilModalUbah link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#formModal" data-id="' + mahasiswa.id + '">Ubah</a>';
                    rows += '<a href="#" class="badge text-bg-danger link-underline link-underline-opacity-0" onclick="confirmDelete(\'' + mahasiswa.id + '\', \'' + mahasiswa.nama + '\')">Hapus</a>';
                    rows += '</td>';
                    rows += '</tr>';
                });

                // Masukkan data ke dalam tabel
                $('tbody').html(rows);
            }
        });
    });
});
</script>

</body>
</html>