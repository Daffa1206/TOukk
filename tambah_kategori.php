<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Kategori Barang</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="" class="border p-4 rounded shadow">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
                <a href="index.php" button type="btn btn-primary ">Kembali</a>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $nama_kategori = $_POST['nama_kategori'];
            if (mysqli_query($conn, "INSERT INTO kategori_barang (nama_kategori) VALUES ('$nama_kategori')")) {
                echo "<div class='alert alert-success mt-3'>Kategori berhasil ditambahkan. <a href='index.php' class='btn btn-link'>Kembali</a></div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
