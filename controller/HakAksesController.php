<?php
include_once 'class/HakAkses.php';

class HakAksesController
{
    private $hakAkses;

    public function __construct($conn)
    {
        $this->hakAkses = new HakAkses($conn);
    }

    public function tambahHakAkses($namaakses, $keterangan)
    {
        return $this->hakAkses->tambahHakAkses($namaakses, $keterangan);
    }

    public function ambilSemuaHakAkses()
    {
        return $this->hakAkses->ambilSemuaHakAkses();
    }

    public function ambilHakAksesById($idakses)
    {
        return $this->hakAkses->ambilHakAksesById($idakses);
    }

    public function updateHakAkses($idakses, $namaakses, $keterangan)
    {
        return $this->hakAkses->updateHakAkses($idakses, $namaakses, $keterangan);
    }

    public function hapusHakAkses($idakses)
    {
        return $this->hakAkses->hapusHakAkses($idakses);
    }
}
