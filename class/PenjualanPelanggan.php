<?php

class PenjualanPelanggan
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahPenjualanPelanggan($hargajual, $qty, $idbarang, $tanggalpesan, $namapelanggan, $idpengguna)
    {
        $this->conn->autocommit(false);

        $sql2 = "INSERT INTO pelanggan (namapelanggan, idbarang, qty, tanggalpesan, idpengguna) VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bind_param("siiis", $namapelanggan, $idbarang, $qty, $tanggalpesan, $idpengguna);
        $result2 = $stmt2->execute();

        $jumlahpenjualan = $hargajual * $qty;
        $idpelanggan = $this->conn->insert_id;

        $sql1 = "INSERT INTO penjualan (jumlahpenjualan, hargajual, idpelanggan, idpengguna) VALUES (?, ?, ?, ?)";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->bind_param("diii", $jumlahpenjualan, $hargajual, $idpelanggan, $idpengguna);

        $result1 = $stmt1->execute();

        if ($result1 && $result2) {
            $this->conn->commit();
            $this->conn->autocommit(true);
            return true;
        } else {
            $this->conn->rollback();
            $this->conn->autocommit(true);
            return false;
        }
    }

    public function ambilSemuaPenjualan()
    {
        $sql = "SELECT p.idpenjualan, p.jumlahpenjualan, p.hargajual, pl.namapelanggan, b.namabarang, pl.qty
        FROM penjualan p JOIN pelanggan pl ON p.idpelanggan = pl.idpelanggan
        JOIN barang b ON pl.idbarang = b.idbarang";
        return $this->conn->query($sql);
    }
}
