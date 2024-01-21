<?php
include 'controller/PenggunaController.php';
include 'controller/HakAksesController.php';
include 'koneksi.php';


$penggunaController = new PenggunaController($conn);
$hakAksesController = new HakAksesController($conn);

if (isset($_GET["idpengguna"])) {
    $idpengguna = $_GET["idpengguna"];
} else {
    header("Location: contoh_pengguna.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ubah"])) {
    $namapengguna = $_POST["namapengguna"];
    $password = $_POST["password"];
    $namadepan = $_POST["namadepan"];
    $namabelakang = $_POST["namabelakang"];
    $nohp = $_POST["nohp"];
    $alamat = $_POST["alamat"];
    $idakses = $_POST["idakses"];

    $penggunaController->updatePengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);
    header("Location: pengguna.php");
}

$dataPengguna = $penggunaController->ambilPenggunaById($idpengguna);
$hakAkses = $hakAksesController->ambilSemuaHakAkses();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pengguna</title>
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

        <h2>Update Pengguna</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="idpengguna" value="<?php echo $dataPengguna['idpengguna']; ?>">

            <div class="form-row">
                <div class="col">
                    <label for="namapengguna">Nama Pengguna:</label>
                    <input type="text" class="form-control" id="namapengguna" name="namapengguna" value="<?php echo $dataPengguna['namapengguna']; ?>" required>
                </div>
                <div class="col">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $dataPengguna['password']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="namadepan">Nama Depan:</label>
                    <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?php echo $dataPengguna['namadepan']; ?>" required>
                </div>
                <div class="col">
                    <label for="namabelakang">Nama Belakang:</label>
                    <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?php echo $dataPengguna['namabelakang']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="nohp">No. HP:</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $dataPengguna['nohp']; ?>" required>
                </div>
                <div class="col">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dataPengguna['alamat']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <label for="idakses">Hak Akses:</label>
                    <select class="form-control" name="idakses" id="idakses" required>
                        <?php
                        while ($row = $hakAkses->fetch_assoc()) {
                            $selected = ($row['idakses'] == $dataPengguna['idakses']) ? 'selected' : '';
                            echo "<option value='" . $row['idakses'] . "' $selected>" . $row['namaakses'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3" name="ubah">Update Pengguna</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>