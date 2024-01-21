<?php

class Pembelian
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahPembelian($jumlahpembelian, $hargabeli, $idbarang, $idpengguna)
    {
        $sql = "INSERT INTO pembelian (jumlahpembelian, hargabeli, idbarang, idpengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("diii", $jumlahpembelian, $hargabeli, $idbarang, $idpengguna);
        return $stmt->execute();
    }

    public function ambilSemuaPembelian()
    {
        $sql = "SELECT pembelian.*, barang.namabarang FROM pembelian
                LEFT JOIN barang ON pembelian.idbarang = barang.idbarang";
        return $this->conn->query($sql);
    }

    public function ambilPembelianById($idpembelian)
    {
        $sql = "SELECT * FROM pembelian WHERE idpembelian = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idpembelian);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updatePembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang, $idpengguna)
    {
        $sql = "UPDATE pembelian SET jumlahpembelian=?, hargabeli=?, idbarang=?, idpengguna=? WHERE idpembelian=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("diiii", $jumlahpembelian, $hargabeli, $idbarang, $idpengguna, $idpembelian);
        return $stmt->execute();
    }

    public function hapusPembelian($idpembelian)
    {
        $sql = "DELETE FROM pembelian WHERE idpembelian=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idpembelian);
        return $stmt->execute();
    }
}
