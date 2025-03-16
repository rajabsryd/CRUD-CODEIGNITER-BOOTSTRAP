<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        <form method="post" action="<?= site_url('siswa/update/' . $siswa->id); ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $siswa->nama; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?= $siswa->alamat; ?></textarea>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" value="<?= $siswa->no_hp; ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>