<?php
include 'controller/HakAksesController.php';
include 'koneksi.php';

$hakAksesController = new HakAksesController($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ubah"])) {
    $idakses = $_POST["idakses"];
    $namaakses = $_POST["namaakses"];
    $keterangan = $_POST["keterangan"];
    $hakAksesController->updateHakAkses($idakses, $namaakses, $keterangan);
    header("Location: hakakses.php");
}

if (isset($_GET["idakses"])) {
    $idakses = $_GET["idakses"];
    $dataHakAkses = $hakAksesController->ambilHakAksesById($idakses);
} else {
    header("Location: hakakses.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hak Akses</title>
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

        <h2>Update Hak Akses</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <input type="hidden" name="idakses" value="<?php echo $dataHakAkses['idakses']; ?>">
                <label for="namaakses">Nama Akses:</label>
                <input type="text" class="form-control" id="namaakses" name="namaakses" value="<?php echo $dataHakAkses['namaakses']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $dataHakAkses['keterangan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah Hak Akses</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>

<?php
$conn->close();
?>