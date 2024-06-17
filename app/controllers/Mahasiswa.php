<?php  

class Mahasiswa extends Controller{
  public function index() {
    $data['judul'] = 'Data Mahasiswa';
    $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }
  public function detail($id){
    $data ['judul'] = 'Detail Mahasiswa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    $this->view('templates/header',  $data);
    $this->view('mahasiswa/detail', $data);
    $this->view('templates/footer');
  }
  public function tambah(){ 

    if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
      Flasher::setFlash('berhasil ', 'ditambahkan', 'success');
      header('Location: '. BASEURL. '/mahasiswa');
      exit;

    }else{
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: '. BASEURL. '/mahasiswa');
      exit;
    }
  }
  public function hapus($id) {
    if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
        Flasher::setFlash('berhasil', 'dihapus', 'success');
    } else {
        Flasher::setFlash('gagal', 'dihapus', 'danger');
    }
    header('Location: ' . BASEURL . '/mahasiswa');
    exit;
  }
  public function getubah(){
  echo json_encode( $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
  }
  public function ubah(){
    if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0){
      Flasher::setFlash('berhasil ', 'diubah', 'success');
      header('Location: '. BASEURL. '/mahasiswa');
      exit;

    }else{
      Flasher::setFlash('gagal', 'diubah', 'danger');
      header('Location: '. BASEURL. '/mahasiswa');
      exit;
    }
  }
  // Controller Mahasiswa (misalnya Mahasiswa.php)
public function cari()
{
    $keyword = $_POST['keyword']; // Ambil keyword dari POST

    // Panggil model untuk melakukan pencarian
    $data['mahasiswa'] = $this->model('Mahasiswa_model')->cariMahasiswa($keyword);

    // Load view atau kirimkan data ke view dengan format JSON
    echo json_encode($data);
}

}
