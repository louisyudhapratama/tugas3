<?php

class Suplier
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function tambahSuplier($namasuplier, $alamatsuplier, $idpengguna)
    {
        $sql = "INSERT INTO suplier (namasuplier, alamatsuplier, idpengguna) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $namasuplier, $alamatsuplier, $idpengguna);
        return $stmt->execute();
    }

    public function ambilSemuaSuplier()
    {
        $sql = "SELECT * FROM suplier";
        return $this->conn->query($sql);
    }

    public function ambilSuplierById($idsuplier)
    {
        $sql = "SELECT * FROM suplier WHERE idsuplier = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idsuplier);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateSuplier($idsuplier, $namasuplier, $alamatsuplier, $idpengguna)
    {
        $sql = "UPDATE suplier SET namasuplier=?, alamatsuplier=?, idpengguna=? WHERE idsuplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $namasuplier, $alamatsuplier, $idpengguna, $idsuplier);
        return $stmt->execute();
    }

    public function hapusSuplier($idsuplier)
    {
        $sql = "DELETE FROM suplier WHERE idsuplier=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idsuplier);
        return $stmt->execute();
    }
}
