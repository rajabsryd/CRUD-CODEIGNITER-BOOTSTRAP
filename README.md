# Modul Pemrograman Web Kelas XII

Modul ini membahas tentang pengembangan aplikasi web menggunakan CodeIgniter 3 dan Bootstrap. Modul ini dirancang untuk siswa kelas XII SMK yang ingin mempelajari cara membuat aplikasi web dengan operasi CRUD (Create, Read, Update, Delete) menggunakan framework CodeIgniter dan mempercantik tampilan dengan Bootstrap.

## Daftar Isi
- **Tujuan Pembelajaran**
- **Pendahuluan**
- **Instalasi CodeIgniter 3**
- **Menampilkan Data dari Database**
- **Soal Esai dan Jawaban**
- **Soal Praktikum**
- **Pertanyaan Refleksi**
- **Penilaian**

## Tujuan Pembelajaran
Setelah mempelajari modul ini, diharapkan siswa dapat:
- Menginstalasi CodeIgniter 3 dengan benar.
- Menyiapkan proyek CodeIgniter 3 dan mengintegrasikan dengan Bootstrap.
- Menampilkan data dari database menggunakan CodeIgniter.
- Melakukan input, pengeditan, dan penghapusan data di database menggunakan CodeIgniter.

## Pendahuluan
**MVC (Model-View-Controller)** adalah sebuah desain pattern atau arsitektur yang memisahkan dan mengelompokkan beberapa kode sesuai dengan tugas dan fungsinya:
- **Model**: Berhubungan dengan database, seperti menambah, mengedit, dan menghapus data.
- **View**: Bagian tampilan web atau aplikasi, seperti HTML, CSS, dan JavaScript.
- **Controller**: Menghubungkan Model dan View, serta menangani logika aplikasi.

## Instalasi CodeIgniter 3
### 1. Persiapan
Pastikan XAMPP atau software web server lainnya sudah terinstal di komputer.
- **Download CodeIgniter 3** dari [situs resmi](https://codeigniter.com/download).
- **Ekstrak** file ke dalam folder `htdocs` pada XAMPP.
- **Ubah nama folder** sesuai proyek, misalnya: `ci-bootstrap`.
- **Konfigurasi base_url** di `application/config/config.php`:
  ```php
  $config['base_url'] = 'http://localhost/ci-bootstrap/';
  ```

### 2. Konfigurasi Database
- Buka file `application/config/database.php` dan atur koneksi database:
  ```php
  $db['default'] = array(
      'hostname' => 'localhost',
      'username' => 'root',
      'password' => '',
      'database' => 'ci_database',
      'dbdriver' => 'mysqli',
  );
  ```

## Menampilkan Data dari Database
### 1. Membuat Database dan Tabel
Buka phpMyAdmin dan buat database baru dengan nama `ci_database`, lalu buat tabel `siswa`:
```sql
CREATE TABLE siswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(15) NOT NULL
);
```

### 2. Model (Siswa_model.php)
```php
class Siswa_model extends CI_Model {
    public function get_all_siswa() {
        return $this->db->get('siswa')->result();
    }
    public function insert_siswa($data) {
        return $this->db->insert('siswa', $data);
    }
    public function update_siswa($id, $data) {
        return $this->db->where('id', $id)->update('siswa', $data);
    }
    public function delete_siswa($id) {
        return $this->db->where('id', $id)->delete('siswa');
    }
}
```

### 3. Controller (Siswa.php)
```php
class Siswa extends CI_Controller {
    public function index() {
        $this->load->model('Siswa_model');
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        $this->load->view('siswa_view', $data);
    }
    public function tambah() {
        $this->load->view('tambah_siswa');
    }
    public function simpan() {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        ];
        $this->load->model('Siswa_model');
        $this->Siswa_model->insert_siswa($data);
        redirect('siswa');
    }
}
```

### 4. View (siswa_view.php)
```php
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswa as $row): ?>
        <tr>
            <td><?= $row->nama; ?></td>
            <td><?= $row->alamat; ?></td>
            <td><?= $row->no_hp; ?></td>
            <td>
                <a href="<?= site_url('siswa/edit/'.$row->id); ?>" class="btn btn-warning">Edit</a>
                <a href="<?= site_url('siswa/hapus/'.$row->id); ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
```

## Kesimpulan
Proyek ini merupakan implementasi CRUD sederhana menggunakan CodeIgniter 3 dengan Bootstrap. Dengan arsitektur MVC, pengembangan aplikasi menjadi lebih terstruktur dan mudah dikelola.

## Lisensi
Proyek ini dibuat untuk tujuan pembelajaran dan bebas digunakan serta dimodifikasi sesuai kebutuhan.

---
*Dibuat berdasarkan materi dari Modul Pemrograman Web Kelas XII SMK Muhammadiyah 3 Tangerang Selatan.*
