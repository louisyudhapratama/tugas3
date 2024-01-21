<?php

class Pengguna
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahPengguna($namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
    {
        $sql = "INSERT INTO pengguna (namapengguna, password, namadepan, namabelakang, nohp, alamat, idakses) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);
        return $stmt->execute();
    }

    public function ambilSemuaPengguna()
    {
        $sql = "SELECT pengguna.*, hakakses.namaakses FROM pengguna LEFT JOIN hakakses ON pengguna.idakses = hakakses.idakses";
        return $this->conn->query($sql);
    }

    public function ambilPenggunaById($idpengguna)
    {
        $sql = "SELECT * FROM pengguna WHERE idpengguna = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idpengguna);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updatePengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
    {
        $sql = "UPDATE pengguna 
                SET namapengguna=?, password=?, namadepan=?, namabelakang=?, nohp=?, alamat=?, idakses=? 
                WHERE idpengguna=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssii", $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses, $idpengguna);
        return $stmt->execute();
    }

    public function hapusPengguna($idpengguna)
    {
        $sql = "DELETE FROM pengguna WHERE idpengguna=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idpengguna);
        return $stmt->execute();
    }
}
