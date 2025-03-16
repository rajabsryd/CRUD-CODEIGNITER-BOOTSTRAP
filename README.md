Modul Pemrograman Web Kelas XII
Modul ini membahas tentang pengembangan aplikasi web menggunakan CodeIgniter 3 dan Bootstrap. Modul ini dirancang untuk siswa kelas XII SMK yang ingin mempelajari cara membuat aplikasi web dengan operasi CRUD (Create, Read, Update, Delete) menggunakan framework CodeIgniter dan mempercantik tampilan dengan Bootstrap.

Daftar Isi
Tujuan Pembelajaran

Pendahuluan

Instalasi CodeIgniter 3

Menampilkan Data dari Database

Soal Esai

Soal Praktikum

Pertanyaan Refleksi

Penilaian

Tujuan Pembelajaran
Setelah mempelajari modul ini, diharapkan siswa dapat:

Menginstalasi CodeIgniter 3 dengan benar.

Menyiapkan proyek CodeIgniter 3 dan mengintegrasikan dengan Bootstrap.

Menampilkan data dari database menggunakan CodeIgniter.

Melakukan input, pengeditan, dan penghapusan data di database menggunakan CodeIgniter.

Pendahuluan
MVC (Model-View-Controller) adalah sebuah desain pattern atau arsitektur yang memisahkan dan mengelompokkan beberapa kode sesuai dengan tugas dan fungsinya.

Model: Biasanya digunakan untuk kode yang berhubungan dengan database, seperti menambah, mengedit, dan menghapus data.

View: Merupakan bagian di mana tampilan web atau aplikasi ditampilkan ke layar browser, seperti HTML, CSS, dan JavaScript.

Controller: Adalah bagian yang menghubungkan antara Model dan View. Controller juga biasanya digunakan untuk menaruh kode logika atau kode login.

Instalasi CodeIgniter 3
Persiapan
Pastikan XAMPP atau software web server lainnya sudah terinstal di komputer.

Download CodeIgniter 3 dari situs resminya: https://codeigniter.com/download.

Instalasi
Ekstrak file CodeIgniter yang telah didownload.

Pindahkan folder hasil ekstraksi ke dalam folder htdocs pada XAMPP (biasanya terletak di C:/xampp/htdocs/).

Ubah nama folder sesuai dengan nama proyek yang diinginkan (misalnya: ci-bootstrap).

Buka file application/config/config.php, ubah bagian:

php
Copy
$config['base_url'] = 'http://localhost/ci-bootstrap/';
Menghubungkan CodeIgniter dengan Database
Buka file application/config/database.php.

Atur konfigurasi koneksi database:

php
Copy
'default' => [
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
Menampilkan Data dari Database
Membuat Database dan Tabel
Buka phpMyAdmin melalui http://localhost/phpmyadmin.

Buat database baru dengan nama ci_database.

Buat tabel bernama siswa dengan struktur berikut:

Field	Type	Null	Key	Default	Extra
id	INT(11)	NO	PRI	NULL	AUTO_INCREMENT
nama	VARCHAR(100)	NO		NULL	
alamat	TEXT	NO		NULL	
no_hp	VARCHAR(15)	NO		NULL	
Membuat Model
Buat file bernama Siswa_model.php di folder application/models/ dengan isi:

php
Copy
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
Membuat Controller
Tambahkan fungsi baru untuk edit dan hapus di file Siswa.php:

php
Copy
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
Membuat View Edit Data (edit_siswa.php)
php
Copy
<form method="post" action="<?= site_url('siswa/update/'.$siswa->id); ?>">
    Nama: <input type="text" name="nama" value="<?= $siswa->nama; ?>">
    Alamat: <textarea name="alamat"><?= $siswa->alamat; ?></textarea>
    No HP: <input type="text" name="no_hp" value="<?= $siswa->no_hp; ?>">
    <button type="submit">Update</button>
</form>
Menambah Tombol Edit & Hapus di siswa_view.php
Tambahkan kolom baru:

html
Copy
<th>Aksi</th>
Run HTML
Tambahkan baris berikut di dalam <tbody>:

html
Copy
<td>
    <a href="<?= site_url('siswa/edit/'.$row->id); ?>" class="btn btn-warning">Edit</a>
    <a href="<?= site_url('siswa/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
</td>
Run HTML
Soal Esai
Jelaskan langkah-langkah instalasi CodeIgniter 3 di komputer lokal menggunakan XAMPP!

Pastikan XAMPP sudah terinstal.

Download CodeIgniter 3 dari situs resmi.

Ekstrak file CodeIgniter dan pindahkan ke folder htdocs di XAMPP.

Ubah nama folder sesuai dengan nama proyek.

Konfigurasi base_url di file config.php.

Mengapa kita perlu mengatur file config.php pada saat menginstal CodeIgniter 3? Jelaskan!

File config.php digunakan untuk mengatur konfigurasi dasar aplikasi, seperti base_url yang menentukan URL dasar aplikasi.

Bagaimana cara menghubungkan CodeIgniter 3 dengan database MySQL? Jelaskan langkah-langkahnya!

Buka file database.php di folder application/config/.

Atur konfigurasi koneksi database seperti hostname, username, password, dan nama database.

Jelaskan peran file Siswa_model.php dalam aplikasi CodeIgniter yang telah dibuat!

File Siswa_model.php berisi fungsi-fungsi yang berhubungan dengan operasi database seperti menampilkan, menambah, mengedit, dan menghapus data.

Bagaimana cara menampilkan data dari database menggunakan CodeIgniter? Jelaskan dengan menyertakan kode yang digunakan!

Gunakan fungsi get_all_siswa() di model untuk mengambil data dari database, lalu tampilkan data tersebut di view.

Jelaskan bagaimana proses input data ke database dilakukan dalam aplikasi CodeIgniter! Sertakan contoh kode yang relevan!

Proses input data dilakukan dengan menggunakan fungsi insert_siswa() di model. Contoh kode:

php
Copy
$data = [
    'nama' => $this->input->post('nama'),
    'alamat' => $this->input->post('alamat'),
    'no_hp' => $this->input->post('no_hp')
];
$this->Siswa_model->insert_siswa($data);
Bagaimana cara mengedit data yang sudah ada di database menggunakan CodeIgniter? Jelaskan dan sertakan contoh kodenya!

Proses edit data dilakukan dengan menggunakan fungsi update_siswa() di model. Contoh kode:

php
Copy
$data = [
    'nama' => $this->input->post('nama'),
    'alamat' => $this->input->post('alamat'),
    'no_hp' => $this->input->post('no_hp')
];
$this->Siswa_model->update_siswa($id, $data);
Jelaskan fungsi dari method delete_siswa() yang terdapat di file Siswa_model.php!

Method delete_siswa() digunakan untuk menghapus data dari database berdasarkan ID yang diberikan.

Bagaimana cara menampilkan tombol Edit dan Hapus pada tampilan data (siswa_view.php) menggunakan Bootstrap? Sertakan contoh kodenya!

Tambahkan tombol Edit dan Hapus di dalam tabel dengan menggunakan class Bootstrap. Contoh kode:

html
Copy
<td>
    <a href="<?= site_url('siswa/edit/'.$row->id); ?>" class="btn btn-warning">Edit</a>
    <a href="<?= site_url('siswa/hapus/'.$row->id); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
</td>
Run HTML
Mengapa penting untuk mengintegrasikan Bootstrap dengan CodeIgniter dalam pengembangan aplikasi web? Jelaskan pendapatmu!

Bootstrap membantu membuat tampilan aplikasi web lebih menarik dan responsif, sehingga meningkatkan pengalaman pengguna.

Soal Praktikum
Tujuan Praktikum:
Mahasiswa mampu menginstal dan mengkonfigurasi CodeIgniter 3, membuat aplikasi sederhana dengan Bootstrap, serta melakukan operasi CRUD (Create, Read, Update, Delete) pada database.

Langkah-Langkah Praktikum:
Instalasi CodeIgniter 3 dan Pengaturan Awal

Buat proyek baru dengan nama ci-bootstrap dan lakukan konfigurasi awal pada file config.php dan database.php.

Pastikan proyek dapat diakses melalui URL http://localhost/ci-bootstrap/.

Membuat Database dan Tabel

Buat database dengan nama ci_database dan tabel bernama siswa dengan kolom: id, nama, alamat, dan no_hp.

Masukkan minimal 5 data siswa melalui phpMyAdmin.

Membuat Model Siswa_model.php

Buat file Siswa_model.php di folder application/models/ yang dapat menampilkan, menambah, mengedit, dan menghapus data dari tabel siswa.

Membuat Controller Siswa.php

Buat controller bernama Siswa.php di folder application/controllers/.

Implementasikan fungsi index(), tambah(), simpan(), edit(), update(), dan hapus().

Membuat Tampilan (View) Menggunakan Bootstrap

Buat file siswa_view.php dan edit_siswa.php di folder application/views/.

Gunakan Bootstrap untuk membuat tampilan yang menarik pada tabel data siswa.

Tambahkan tombol Edit dan Hapus di setiap baris data siswa.

Pengujian Aplikasi

Jalankan aplikasi melalui URL http://localhost/ci-bootstrap/siswa.

Pastikan semua fitur dapat berjalan dengan baik, yaitu: menampilkan data, menambah data, mengedit data, dan menghapus data.

Presentasi Hasil Praktikum

Tampilkan hasil pekerjaan di depan kelas dan jelaskan setiap bagian yang telah dibuat.

Pertanyaan Refleksi
Mengapa kita perlu menggunakan Bootstrap dalam membuat tampilan aplikasi dengan CodeIgniter?

Bootstrap membantu membuat tampilan aplikasi lebih menarik dan responsif, sehingga meningkatkan pengalaman pengguna.

Bagaimana cara mengintegrasikan Bootstrap dengan CodeIgniter agar dapat digunakan di seluruh halaman aplikasi?

Bootstrap dapat diintegrasikan dengan cara menambahkan file CSS dan JS Bootstrap ke dalam folder assets dan memanggilnya di view.

Sebutkan keuntungan menggunakan arsitektur MVC (Model-View-Controller) pada CodeIgniter!

Memisahkan logika bisnis (Model), tampilan (View), dan kontrol (Controller) sehingga kode lebih terorganisir dan mudah dikelola.

Apa perbedaan antara model, controller, dan view di CodeIgniter?

Model: Berhubungan dengan database.

View: Menangani tampilan.

Controller: Menghubungkan Model dan View serta menangani logika aplikasi.

Jelaskan bagaimana proses routing bekerja di CodeIgniter!

Routing di CodeIgniter mengarahkan URL ke controller dan method yang sesuai. Routing dapat diatur di file routes.php.
