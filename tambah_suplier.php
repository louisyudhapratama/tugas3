<?php
include 'controller/SuplierController.php';
include 'koneksi.php';

$suplierController = new SuplierController($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    $namasuplier = $_POST["namasuplier"];
    $alamatsuplier = $_POST["alamatsuplier"];

    $suplierController->tambahSuplier($namasuplier, $alamatsuplier, '1');
    header("Location: list_suplier.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Suplier</title>
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

        <h2>Tambah Suplier</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="namasuplier">Nama Suplier:</label>
                    <input type="text" class="form-control" id="namasuplier" name="namasuplier" required>
                </div>
                <div class="col-md-6">
                    <label for="alamatsuplier">Alamat Suplier:</label>
                    <input type="text" class="form-control" id="alamatsuplier" name="alamatsuplier" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="tambah">Tambah Suplier</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>