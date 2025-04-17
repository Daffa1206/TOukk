<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_barang WHERE id_kategori=$id"));

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    mysqli_query($conn, "UPDATE kategori_barang SET nama_kategori='$nama_kategori' WHERE id_kategori=$id");
    echo "<div class='alert alert-success mt-3'>Kategori berhasil diupdate. <a href='kategori.php'>Kembali</a></div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Edit Kategori</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-warning">Update Kategori</button>
            <a href="kategori.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
