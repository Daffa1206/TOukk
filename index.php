<?php
// koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tryoutukk";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!-- index.php -->
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    
    <h2>Data Barang</h2>
    <a href="tambah_barang.php" class="btn btn-success mb-3">+ Tambah Data</a>
    <a href="kategori.php" class="btn btn-info mb-3 ml-2">Lihat Kategori</a>
    <form method="GET" class="form-inline mb-3">
        <input type="text" name="search_barang" class="form-control mr-2" placeholder="Cari Nama Barang..." value="<?= isset($_GET['search_barang']) ? $_GET['search_barang'] : '' ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah Stok</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $search = isset($_GET['search_barang']) ? $_GET['search_barang'] : '';
        $query = "SELECT b.*, k.nama_kategori FROM crudbarang b JOIN kategori_barang k ON b.id_kategori = k.id_kategori WHERE b.nama_barang LIKE '%$search%'";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$data['id_barang']}</td>
                <td>{$data['nama_barang']}</td>
                <td>{$data['nama_kategori']}</td>
                <td>{$data['jumlah_stok']}</td>
                <td>{$data['harga_barang']}</td>
                <td>{$data['tanggal_masuk']}</td>
                <td>
                    <a href='edit_barang.php?id={$data['id_barang']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_barang.php?id={$data['id_barang']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>