<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Data Siswa</h3>
            </div>
            <div class="card-body">
                <a href="<?= site_url('siswa/tambah') ?>" class="btn btn-success mb-3">Tambah Data</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $row): ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->alamat ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td>
                                <a href="<?= site_url('siswa/edit/'.$row->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('siswa/hapus/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>