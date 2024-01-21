<?php

class Barang
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahBarang($namabarang, $satuan, $idsuplier, $idpengguna)
    {
        $sql = "INSERT INTO barang (namabarang, satuan, idsuplier, idpengguna) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $namabarang, $satuan, $idsuplier, $idpengguna);
        return $stmt->execute();
    }

    public function ambilSemuaBarang()
    {
        $sql = "SELECT barang.*, suplier.namasuplier FROM barang
                LEFT JOIN suplier ON barang.idsuplier = suplier.idsuplier";
        return $this->conn->query($sql);
    }

    public function ambilBarangById($idbarang)
    {
        $sql = "SELECT * FROM barang WHERE idbarang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idbarang);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateBarang($idbarang, $namabarang, $satuan, $idsuplier, $idpengguna)
    {
        $sql = "UPDATE barang SET namabarang=?, satuan=?, idsuplier=?, idpengguna=? WHERE idbarang=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiii", $namabarang, $satuan, $idsuplier, $idpengguna, $idbarang);
        return $stmt->execute();
    }

    public function hapusBarang($idbarang)
    {
        $sql = "DELETE FROM barang WHERE idbarang=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idbarang);
        return $stmt->execute();
    }
}
