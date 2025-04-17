<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kategori</title>
</head>
<body>
    <h2>Daftar Kategori Barang</h2>
    <a href="tambah_kategori.php">+ Tambah Kategori</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM kategori_barang");
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$data['id_kategori']}</td>
                <td>{$data['nama_kategori']}</td>
                <td><a href='hapus_kategori.php?id={$data['id_kategori']}'>Hapus</a></td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
