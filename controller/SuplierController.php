<?php
include_once 'class/Suplier.php';

class SuplierController
{
    private $suplier;

    public function __construct($conn)
    {
        $this->suplier = new Suplier($conn);
    }

    public function tambahSuplier($namasuplier, $alamatsuplier, $idpengguna)
    {
        return $this->suplier->tambahSuplier($namasuplier, $alamatsuplier, $idpengguna);
    }

    public function ambilSemuaSuplier()
    {
        return $this->suplier->ambilSemuaSuplier();
    }

    public function ambilSuplierById($idsuplier)
    {
        return $this->suplier->ambilSuplierById($idsuplier);
    }

    public function updateSuplier($idsuplier, $namasuplier, $alamatsuplier, $idpengguna)
    {
        return $this->suplier->updateSuplier($idsuplier, $namasuplier, $alamatsuplier, $idpengguna);
    }

    public function hapusSuplier($idsuplier)
    {
        return $this->suplier->hapusSuplier($idsuplier);
    }
}
