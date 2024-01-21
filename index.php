<?php
include_once 'class/LabaRugi.php';
include 'controller/PenjualanPelangganController.php';
include 'koneksi.php';



$labaRugi = new LabaRugi($conn);
$penjualanPelangganController = new PenjualanPelangganController($conn);

$totalPembelian = $labaRugi->hitungTotalPembelian();
$totalPenjualan = $labaRugi->hitungTotalPenjualan();
$rugiLaba = $labaRugi->hitungRugiLaba();

$listPenjualan = $penjualanPelangganController->ambilSemuaPenjualan();

$rugiLabaByBarang = $labaRugi->labaRugiByBarang();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laporan Rugi Laba</title>
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

    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Laporan Rugi Laba dan Penjualan</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pembelian</h5>
                        <p class="card-text"><?php echo "Rp." . $totalPembelian; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Penjualan</h5>
                        <p class="card-text"><?php echo "Rp." . $totalPenjualan; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Rugi Laba</h5>
                        <p class="card-text display-4"><?php echo "Rp." . $rugiLaba; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <h2 class="mb-4">Laporan Rugi Laba berdasarkan Barang</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Rugi Laba</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $rugiLabaByBarang->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td>" . $row['hargabeli'] . "</td>";
                    echo "<td>" . $row['hargajual'] . "</td>";
                    echo "<td>" . $row['labarugi'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <hr class="my-4">

        <h2 class="mb-4">Laporan Penjualan</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $listPenjualan->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['idpenjualan'] . "</td>";
                    echo "<td>" . $row['namapelanggan'] . "</td>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['hargajual'] . "</td>";
                    echo "<td>" . $row['jumlahpenjualan'] . "</td>";
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