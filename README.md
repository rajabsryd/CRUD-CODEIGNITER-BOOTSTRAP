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
# Soal Esai dan Jawaban

1. **Jelaskan langkah-langkah instalasi CodeIgniter 3 di komputer lokal menggunakan XAMPP!**
   - Pastikan XAMPP sudah terinstal di komputer.
   - Download CodeIgniter 3 dari situs resmi.
   - Ekstrak file CodeIgniter dan pindahkan ke folder `htdocs` di XAMPP.
   - Ubah nama folder sesuai dengan proyek yang diinginkan.
   - Konfigurasi `base_url` di file `config.php`.
   - Atur koneksi database di file `database.php`.
   - Jalankan server dengan XAMPP dan akses melalui browser.

2. **Mengapa kita perlu mengatur file `config.php` pada saat menginstal CodeIgniter 3? Jelaskan!**
   - File `config.php` digunakan untuk menentukan pengaturan dasar aplikasi.
   - `base_url` perlu disesuaikan agar aplikasi dapat berjalan dengan benar di localhost atau server.
   - Konfigurasi lain seperti enkripsi, sesi, dan cookie juga diatur di file ini.

3. **Bagaimana cara menghubungkan CodeIgniter 3 dengan database MySQL?**
   - Buka file `application/config/database.php`.
   - Atur parameter koneksi seperti hostname, username, password, dan database.
   - Contoh konfigurasi:
     ```php
     $db['default'] = array(
         'hostname' => 'localhost',
         'username' => 'root',
         'password' => '',
         'database' => 'ci_database',
         'dbdriver' => 'mysqli',
     );
     ```
   - Simpan file dan pastikan database tersedia di phpMyAdmin.

4. **Jelaskan peran file `Siswa_model.php` dalam aplikasi CodeIgniter yang telah dibuat!**
   - `Siswa_model.php` berisi fungsi yang berhubungan dengan database.
   - Fungsi dalam model ini digunakan untuk mengambil, menambah, mengedit, dan menghapus data siswa.
   - Model ini memastikan pemisahan logika database dari controller dan view.

5. **Bagaimana cara menampilkan data dari database menggunakan CodeIgniter? Jelaskan dengan menyertakan kode yang digunakan!**
   - Buat model untuk mengambil data dari database:
     ```php
     class Siswa_model extends CI_Model {
         public function get_all_siswa() {
             return $this->db->get('siswa')->result();
         }
     }
     ```
   - Panggil model di controller:
     ```php
     class Siswa extends CI_Controller {
         public function index() {
             $this->load->model('Siswa_model');
             $data['siswa'] = $this->Siswa_model->get_all_siswa();
             $this->load->view('siswa_view', $data);
         }
     }
     ```
   - Tampilkan data di view:
     ```php
     <?php foreach ($siswa as $row): ?>
         <tr>
             <td><?= $row->nama; ?></td>
             <td><?= $row->alamat; ?></td>
             <td><?= $row->no_hp; ?></td>
         </tr>
     <?php endforeach; ?>
     ```

6. **Jelaskan bagaimana proses input data ke database dilakukan dalam aplikasi CodeIgniter! Sertakan contoh kode yang relevan!**
   - Buat fungsi di model untuk menambahkan data:
     ```php
     public function insert_siswa($data) {
         return $this->db->insert('siswa', $data);
     }
     ```
   - Buat fungsi di controller untuk menangani input:
     ```php
     public function simpan() {
         $data = [
             'nama' => $this->input->post('nama'),
             'alamat' => $this->input->post('alamat'),
             'no_hp' => $this->input->post('no_hp')
         ];
         $this->Siswa_model->insert_siswa($data);
         redirect('siswa');
     }
     ```

7. **Bagaimana cara mengedit data yang sudah ada di database menggunakan CodeIgniter? Jelaskan dan sertakan contoh kodenya!**
   - Buat fungsi di model untuk mengupdate data:
     ```php
     public function update_siswa($id, $data) {
         return $this->db->where('id', $id)->update('siswa', $data);
     }
     ```
   - Buat fungsi di controller:
     ```php
     public function update($id) {
         $data = [
             'nama' => $this->input->post('nama'),
             'alamat' => $this->input->post('alamat'),
             'no_hp' => $this->input->post('no_hp')
         ];
         $this->Siswa_model->update_siswa($id, $data);
         redirect('siswa');
     }
     ```

8. **Jelaskan fungsi dari method `delete_siswa()` yang terdapat di file `Siswa_model.php`!**
   - Method `delete_siswa()` digunakan untuk menghapus data siswa berdasarkan ID yang diberikan.
   - Contoh kode:
     ```php
     public function delete_siswa($id) {
         return $this->db->where('id', $id)->delete('siswa');
     }
     ```

9. **Bagaimana cara menampilkan tombol Edit dan Hapus pada tampilan data (`siswa_view.php`) menggunakan Bootstrap? Sertakan contoh kodenya!**
   - Tambahkan tombol Edit dan Hapus dalam tabel:
     ```php
     <td>
         <a href="<?= site_url('siswa/edit/'.$row->id); ?>" class="btn btn-warning">Edit</a>
         <a href="<?= site_url('siswa/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
     </td>
     ```

10. **Mengapa penting untuk mengintegrasikan Bootstrap dengan CodeIgniter dalam pengembangan aplikasi web? Jelaskan pendapatmu!**
    - Bootstrap membantu membuat tampilan aplikasi lebih menarik dan responsif.
    - Mempermudah pembuatan UI dengan komponen siap pakai.
    - Memastikan tampilan web yang konsisten di berbagai perangkat.

---

## Kesimpulan
Proyek ini merupakan implementasi CRUD sederhana menggunakan CodeIgniter 3 dengan Bootstrap. Dengan arsitektur MVC, pengembangan aplikasi menjadi lebih terstruktur dan mudah dikelola.

## Lisensi
Proyek ini dibuat untuk tujuan pembelajaran dan bebas digunakan serta dimodifikasi sesuai kebutuhan.

---
*Dibuat berdasarkan materi dari Modul Pemrograman Web Kelas XII SMK Muhammadiyah 3 Tangerang Selatan.*
