<?php
include 'controller/BarangController.php';
include 'koneksi.php';

$barangController = new BarangController($conn);

$barang = $barangController->ambilSemuaBarang();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus"])) {
    $idbarang = $_POST["idbarang"];
    $barangController->hapusBarang($idbarang);
    header("Location: list_barang.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Sistem Inventori</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="list_barang.php">List Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_suplier.php">List Suplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengguna.php">List Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hakakses.php">List Hak Akses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_pembelian.php">List Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_penjualan.php">Tambah Penjualan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-5">
            <h2 class="col">List Barang</h2>
            <a href="tambah_barang.php" class="btn btn-primary col-md-4" name="tambah">Tambah Barang</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Suplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $barang->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['idbarang'] . "</td>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td>" . $row['satuan'] . "</td>";
                    echo "<td>" . $row['namasuplier'] . "</td>";
                    echo "<td>
                        <a href='update_barang.php?idbarang=" . $row['idbarang'] . "' class='btn btn-warning btn-sm'>Ubah</a>
                        <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' style='display: inline-block;'>
                            <input type='hidden' name='idbarang' value='" . $row['idbarang'] . "'>
                            <button type='submit' class='btn btn-danger btn-sm' name='hapus' onclick=\"return confirm('Anda yakin ingin menghapus barang ini?');\">Hapus</button>
                        </form>
                      </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>