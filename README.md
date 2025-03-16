# CRUD-CODEIGNITER-BOOTSTRAP
Fundamental CRUD Code igniter 3
Tujuan Pembelajaran Setelah mempelajari modul ini, diharapkan siswa dapat:

Menginstalasi CodeIgniter 3 dengan benar.

Menyiapkan proyek CodeIgniter 3 dan mengintegrasikan dengan Bootstrap.

Menampilkan data dari database menggunakan CodeIgniter.

Melakukan input, pengeditan, dan penghapusan data di database menggunakan CodeIgniter.

📌 Fundamental CRUD CodeIgniter 3
Proyek ini adalah implementasi CRUD (Create, Read, Update, Delete) menggunakan CodeIgniter 3. Proyek ini akan membantu Anda memahami dasar-dasar CodeIgniter 3, termasuk instalasi, koneksi database, dan manipulasi data melalui model, controller, dan view.

🚀 Fitur
✔ Menampilkan data siswa dari database ✔ Menambahkan siswa baru ✔ Mengedit data siswa ✔ Menghapus data siswa

🔧 Instalasi CodeIgniter 3 dan Persiapan
1️⃣ Persiapan
Pastikan XAMPP atau software web server lainnya sudah terinstal di komputer.
Download CodeIgniter 3 dari situs resminya: CodeIgniter 3 Download
2️⃣ Instalasi CodeIgniter 3
Ekstrak file CodeIgniter yang telah didownload.
Pindahkan folder hasil ekstraksi ke dalam folder htdocs pada XAMPP (C:/xampp/htdocs/).
Ubah nama folder sesuai dengan nama proyek yang diinginkan (misalnya: ci-bootstrap).
Edit file application/config/config.php, ubah baris berikut:
$config['base_url'] = 'http://localhost/ci-bootstrap/';
3️⃣ Menghubungkan CodeIgniter dengan Database
Buka file application/config/database.php.
Atur konfigurasi koneksi database:
$db['default'] = [
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ci_database',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => [],
    'save_queries' => TRUE
];
📂 Menampilkan Data dari Database
1️⃣ Membuat Database dan Tabel
Buka phpMyAdmin melalui http://localhost/phpmyadmin.
Buat database baru dengan nama ci_database.
Buat tabel siswa dengan struktur berikut:
CREATE TABLE siswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(15) NOT NULL
);
2️⃣ Membuat Model
Buat file Siswa_model.php di folder application/models/ dengan isi berikut:

<?php
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
?>
3️⃣ Membuat Controller
Tambahkan fungsi baru untuk edit dan hapus di file Siswa.php:

public function edit($id) {
    $this->load->model('Siswa_model');
    $data['siswa'] = $this->Siswa_model->get_all_siswa();
    $this->load->view('edit_siswa', $data);
}

public function update($id) {
    $this->load->model('Siswa_model');
    $data = [
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp')
    ];
    $this->Siswa_model->update_siswa($id, $data);
    redirect('siswa');
}

public function hapus($id) {
    $this->load->model('Siswa_model');
    $this->Siswa_model->delete_siswa($id);
    redirect('siswa');
}
4️⃣ Membuat View Edit Data (edit_siswa.php)
<form method="post" action="<?= site_url('siswa/update/'.$siswa->id); ?>">
    Nama: <input type="text" name="nama" value="<?= $siswa->nama; ?>">
    Alamat: <textarea name="alamat"> <?= $siswa->alamat; ?></textarea>
    No HP: <input type="text" name="no_hp" value="<?= $siswa->no_hp; ?>">
    <button type="submit">Update</button>
</form>
5️⃣ Menambah Tombol Edit & Hapus di siswa_view.php
Tambahkan kolom baru:

<th>Aksi</th>
Tambahkan baris berikut di dalam <tbody>:

<td>
    <a href="<?= site_url('siswa/edit/'.$row->id); ?>" class="btn btn-warning">Edit</a>
    <a href="<?= site_url('siswa/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
</td>
✅ Fitur edit dan hapus data telah berhasil ditambahkan! 🎉

📌 Soal Esai dan Jawaban Fundamental CRUD CodeIgniter 3
1. Jelaskan langkah-langkah instalasi CodeIgniter 3 di komputer lokal menggunakan XAMPP!
Jawaban:
Untuk menginstal CodeIgniter 3 di komputer lokal menggunakan XAMPP, ikuti langkah-langkah berikut:

Pastikan XAMPP sudah terinstal di komputer.
Download CodeIgniter 3 dari situs resminya: https://codeigniter.com/download.
Ekstrak file CodeIgniter yang telah didownload.
Pindahkan folder hasil ekstraksi ke dalam folder htdocs di XAMPP (C:/xampp/htdocs/).
Ubah nama folder sesuai dengan proyek yang diinginkan (misalnya: ci-bootstrap).
Konfigurasi base_url dengan mengedit file application/config/config.php:
$config['base_url'] = 'http://localhost/ci-bootstrap/';
Jalankan XAMPP, lalu buka browser dan akses http://localhost/ci-bootstrap/.
Jika halaman default CodeIgniter muncul, instalasi berhasil! 🎉
2. Mengapa kita perlu mengatur file config.php pada saat menginstal CodeIgniter 3? Jelaskan!
Jawaban:
File config.php sangat penting dalam konfigurasi CodeIgniter 3 karena berfungsi untuk:

Menentukan base_url agar aplikasi dapat diakses dengan benar melalui browser.
Mengatur session, cookie, dan keamanan aplikasi.
Menyesuaikan preferensi karakter dan bahasa untuk proyek. Tanpa konfigurasi yang benar di config.php, CodeIgniter tidak akan bisa berjalan sesuai harapan.
3. Bagaimana cara menghubungkan CodeIgniter 3 dengan database MySQL? Jelaskan langkah-langkahnya!
Jawaban:
Untuk menghubungkan CodeIgniter 3 dengan MySQL, lakukan langkah-langkah berikut:

Buka file application/config/database.php.
Sesuaikan konfigurasi koneksi database, contoh:
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ci_database',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci'
);
Pastikan database ci_database telah dibuat di phpMyAdmin.
Sekarang CodeIgniter sudah terhubung dengan database!
4. Jelaskan peran file Siswa_model.php dalam aplikasi CodeIgniter yang telah dibuat!
Jawaban:
File Siswa_model.php adalah model dalam CodeIgniter yang bertanggung jawab untuk berinteraksi dengan database. Peran utamanya adalah:

Mengambil data siswa dari database (SELECT)
Menambahkan data siswa (INSERT)
Memperbarui data siswa (UPDATE)
Menghapus data siswa (DELETE)
Tanpa model ini, kita harus menulis query SQL di controller, yang membuat kode sulit dipelihara.

5. Bagaimana cara menampilkan data dari database menggunakan CodeIgniter? Jelaskan dengan menyertakan kode yang digunakan!
Jawaban:
Langkah-langkah menampilkan data:

Buat fungsi di Model Siswa_model.php
public function get_all_siswa() {
    return $this->db->get('siswa')->result();
}
Buat Controller Siswa.php
public function index() {
    $this->load->model('Siswa_model');
    $data['siswa'] = $this->Siswa_model->get_all_siswa();
    $this->load->view('siswa_view', $data);
}
Buat View siswa_view.php untuk menampilkan data
<table>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
    </tr>
    <?php foreach ($siswa as $row): ?>
    <tr>
        <td><?= $row->nama; ?></td>
        <td><?= $row->alamat; ?></td>
        <td><?= $row->no_hp; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
Sekarang data siswa sudah bisa ditampilkan! 🎉
6. Jelaskan bagaimana proses input data ke database dilakukan dalam aplikasi CodeIgniter! Sertakan contoh kode yang relevan!
Jawaban:
Untuk input data:

Buat fungsi di Model
public function insert_siswa($data) {
    return $this->db->insert('siswa', $data);
}
Buat fungsi di Controller untuk menangani input
public function tambah() {
    $data = [
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp')
    ];
    $this->Siswa_model->insert_siswa($data);
    redirect('siswa');
}
Buat Form di View (tambah_siswa.php)
<form method="post" action="<?= site_url('siswa/tambah'); ?>">
    Nama: <input type="text" name="nama">
    Alamat: <textarea name="alamat"></textarea>
    No HP: <input type="text" name="no_hp">
    <button type="submit">Tambah</button>
</form>
Sekarang, pengguna bisa menambahkan data ke database! ✅
7. Bagaimana cara mengedit data yang sudah ada di database menggunakan CodeIgniter? Jelaskan dan sertakan contoh kodenya!
 ```php
	 public function update_siswa($id, $data) {
    $data = [
        'nama'   => htmlspecialchars($data['nama']),
        'alamat' => htmlspecialchars($data['alamat']),
        'no_hp'  => htmlspecialchars($data['no_hp'])
    ];
    $this->db->where('id', $id);
    $this->db->update('siswa', $data);
    return $this->db->affected_rows(); // Mengembalikan jumlah baris yang berubah
}

---

## **8.	Jelaskan fungsi dari method delete_siswa() yang terdapat di file Siswa_model.php!**
  ```php
 public function delete_siswa($id) {
 // Validasi input tidak dilakukan, sebaiknya pastikan $id adalah angka yang valid

 $this->db->where('id', $id); // Menentukan siswa yang akan dihapus berdasarkan ID

 // Tidak ada pengecekan apakah ID tersebut ada di database sebelum penghapusan

 $this->db->delete('siswa'); // Menghapus data siswa dari tabel 'siswa'

 // Mengembalikan jumlah baris yang terpengaruh, namun tidak ada error handling jika query gagal
 return $this->db->affected_rows();
}

9. Bagaimana cara menampilkan tombol Edit dan Hapus pada tampilan data (siswa_view.php) menggunakan Bootstrap? Sertakan contoh kodenya!
	<a class="btn btn-warning p-2" href="<?= base_url('siswa/edit/'.$row['id']); ?>">Edit</a>  
		<!-- Menggunakan tombol dengan class 'btn btn-warning' untuk tampilan tombol edit -->
		<!-- Menentukan URL menuju halaman edit siswa berdasarkan ID siswa -->
		<!-- Tidak ada validasi atau sanitasi pada $row['id'], sebaiknya pastikan ID valid sebelum digunakan dalam URL -->
		<!-- Jika $row['id'] tidak tersedia atau NULL, bisa menyebabkan error atau URL yang tidak valid -->
10. Mengapa penting untuk mengintegrasikan Bootstrap dengan CodeIgniter dalam pengembangan aplikasi web? Jelaskan pendapatmu!
*penting dikarenakan keterkaitan keduanya itu agar dapat membuat website lebih menarik dan dapat berjalan dengan semestinya, codeigniter sebagai backend dalam aplikasi, sedangkan bootstrap sebagai frontend/tampilan dari aplikasi tersebut agar mudah dipahami user dan memiliki tampilan yang rapih
