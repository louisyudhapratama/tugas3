<?php

class HakAkses
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahHakAkses($namaakses, $keterangan)
    {
        $sql = "INSERT INTO hakakses (namaakses, keterangan) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $namaakses, $keterangan);
        return $stmt->execute();
    }

    public function ambilSemuaHakAkses()
    {
        $sql = "SELECT * FROM hakakses";
        return $this->conn->query($sql);
    }

    public function ambilHakAksesById($idakses)
    {
        $sql = "SELECT * FROM hakakses WHERE idakses = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idakses);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateHakAkses($idakses, $namaakses, $keterangan)
    {
        $sql = "UPDATE hakakses SET namaakses=?, keterangan=? WHERE idakses=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $namaakses, $keterangan, $idakses);
        return $stmt->execute();
    }

    public function hapusHakAkses($idakses)
    {
        $sql = "DELETE FROM hakakses WHERE idakses=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idakses);
        return $stmt->execute();
    }
}
