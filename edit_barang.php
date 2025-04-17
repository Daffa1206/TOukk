<?php
include 'koneksi.php';

$id_barang = $_GET['id'];

// Ambil data barang berdasarkan ID
$query = "SELECT * FROM crudbarang WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];  // Pastikan form input id_kategori ada
    $jumlah_stok = $_POST['jumlah_stok'];
    $harga_barang = $_POST['harga_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    // Perbaiki query update tanpa komentar
    $update_query = "UPDATE crudbarang SET 
                        nama_barang = '$nama_barang',
                        id_kategori = '$id_kategori',
                        jumlah_stok = '$jumlah_stok',
                        harga_barang = '$harga_barang',
                        tanggal_masuk = '$tanggal_masuk'
                    WHERE id_barang = '$id_barang'";

    if (mysqli_query($conn, $update_query)) {
        echo "Data berhasil diperbarui.";
        header("Location: index.php"); // Redirect ke halaman index setelah update
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Barang</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang'] ?>" required>
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
                        // Menentukan kategori yang sudah dipilih
                        $selected = ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                        echo "<option value='{$kategori['id_kategori']}' {$selected}>{$kategori['nama_kategori']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_stok">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" class="form-control" value="<?= $data['jumlah_stok'] ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control" value="<?= $data['harga_barang'] ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?= $data['tanggal_masuk'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <a href="index.php">Kembali</a><br><br>
    </div>
</body>
</html>
