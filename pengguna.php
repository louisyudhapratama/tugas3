<?php
include 'controller/PenggunaController.php';
include 'controller/HakAksesController.php';
include 'koneksi.php';


$penggunaController = new PenggunaController($conn);
$hakAksesController = new HakAksesController($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tambah"])) {
        $namapengguna = $_POST["namapengguna"];
        $password = $_POST["password"];
        $namadepan = $_POST["namadepan"];
        $namabelakang = $_POST["namabelakang"];
        $nohp = $_POST["nohp"];
        $alamat = $_POST["alamat"];
        $idakses = $_POST["idakses"];
        $penggunaController->tambahPengguna($namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);
    }

    if (isset($_POST["ubah"])) {
        $idpengguna = $_POST["idpengguna"];
        header("Location: update_pengguna.php?idpengguna=$idpengguna");
        exit();
    }

    if (isset($_POST["hapus"])) {
        $idpengguna = $_POST["idpengguna"];
        $penggunaController->hapusPengguna($idpengguna);
    }
}



$pengguna = $penggunaController->ambilSemuaPengguna();
$hakAkses = $hakAksesController->ambilSemuaHakAkses();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengguna</title>
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

        <h2>Data Pengguna</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-3">
            <div class="form-row-md-4">
                <input type="text" class="form-control mb-2" name="namapengguna" placeholder="Nama Pengguna" required>
                <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
                <input type="text" class="form-control mb-2" name="namadepan" placeholder="Nama Depan" required>
                <input type="text" class="form-control mb-2" name="namabelakang" placeholder="Nama Belakang" required>
                <input type="text" class="form-control mb-2" name="nohp" placeholder="No. HP" required>
                <input type="text" class="form-control mb-2" name="alamat" placeholder="Alamat" required>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="idakses">Hak Akses:</label>
                    <select class="form-control mb-2" name="idakses" id="idakses" required>
                        <?php
                        while ($row = $hakAkses->fetch_assoc()) {
                            echo "<option value='" . $row['idakses'] . "'>" . $row['namaakses'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row-md-4">
                <button type="submit" class="btn btn-primary" name="tambah">Tambah Pengguna</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Hak Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $pengguna->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['idpengguna'] . "</td>";
                    echo "<td>" . $row['namapengguna'] . "</td>";
                    echo "<td>" . $row['namadepan'] . "</td>";
                    echo "<td>" . $row['namabelakang'] . "</td>";
                    echo "<td>" . $row['nohp'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['namaakses'] . "</td>";
                    echo "<td>
                    <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='hidden' name='idpengguna' value='" . $row['idpengguna'] . "'>
                        <button type='submit' class='btn btn-warning btn-sm' name='ubah'>Ubah</button>
                        <button type='submit' class='btn btn-danger btn-sm' name='hapus' onclick=\"return confirm('Anda yakin ingin menghapus pengguna ini?');\">Hapus</button>
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