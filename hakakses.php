<?php
include 'controller/HakAksesController.php';
include 'koneksi.php';

$hakAksesController = new HakAksesController($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tambah"])) {
        $namaakses = $_POST["namaakses"];
        $keterangan = $_POST["keterangan"];
        $hakAksesController->tambahHakAkses($namaakses, $keterangan);
    }

    if (isset($_POST["ubah"])) {
        $idakses = $_POST["idakses"];
        header("Location: update_hakakses.php?idakses=$idakses");
        exit();
    }

    if (isset($_POST["hapus"])) {
        $idakses = $_POST["idakses"];
        $hakAksesController->hapusHakAkses($idakses);
    }
}

$hakakses = $hakAksesController->ambilSemuaHakAkses();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Hak Akses</title>
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

        <h2>Data Hak Akses</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-3">
            <div class="form-row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="namaakses" placeholder="Nama Akses" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah Hak Akses</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Akses</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $hakakses->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['idakses'] . "</td>";
                    echo "<td>" . $row['namaakses'] . "</td>";
                    echo "<td>" . $row['keterangan'] . "</td>";
                    echo "<td>
                        <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                            <input type='hidden' name='idakses' value='" . $row['idakses'] . "'>
                            <button type='submit' class='btn btn-warning btn-sm' name='ubah'>Ubah</button>
                            <button type='submit' class='btn btn-danger btn-sm' name='hapus' onclick=\"return confirm('Anda yakin ingin menghapus hak akses ini?');\">Hapus</button>
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

<?php
$conn->close();
?>