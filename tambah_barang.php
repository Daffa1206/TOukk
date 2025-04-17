<?php
include 'koneksi.php';

// Ambil data dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];  // Pastikan form input id_kategori ada
    $jumlah_stok = $_POST['jumlah_stok'];
    $harga_barang = $_POST['harga_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    // Insert data barang
    $query = "INSERT INTO crudbarang (nama_barang, id_kategori, jumlah_stok, harga_barang, tanggal_masuk) 
              VALUES ('$nama_barang', '$id_kategori', '$jumlah_stok', '$harga_barang', '$tanggal_masuk')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan.";
        header("Location: index.php"); // Redirect ke halaman index setelah insert
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Barang</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori Barang</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <?php
                    // Ambil semua kategori dari tabel kategori_barang
                    $kategori_query = "SELECT * FROM kategori_barang";
                    $kategori_result = mysqli_query($conn, $kategori_query);
                    while ($kategori = mysqli_fetch_assoc($kategori_result)) {
                        echo "<option value='{$kategori['id_kategori']}'>{$kategori['nama_kategori']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_stok">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
            </div>
            <a href="index.php" class="btn btn-primary ">Kembali</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</body>
</html>
