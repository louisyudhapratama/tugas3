<?php
include_once 'class/Pengguna.php';

class PenggunaController
{
    private $pengguna;

    public function __construct($conn)
    {
        $this->pengguna = new Pengguna($conn);
    }

    public function tambahPengguna($namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
    {
        return $this->pengguna->tambahPengguna($namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);
    }

    public function ambilSemuaPengguna()
    {
        return $this->pengguna->ambilSemuaPengguna();
    }

    public function ambilPenggunaById($idpengguna)
    {
        return $this->pengguna->ambilPenggunaById($idpengguna);
    }

    public function updatePengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
    {
        return $this->pengguna->updatePengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);
    }

    public function hapusPengguna($idpengguna)
    {
        return $this->pengguna->hapusPengguna($idpengguna);
    }
}
