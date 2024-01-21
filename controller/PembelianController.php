<?php
include_once 'class/Pembelian.php';

class PembelianController
{
    private $pembelian;

    public function __construct($conn)
    {
        $this->pembelian = new Pembelian($conn);
    }

    public function tambahPembelian($jumlahpembelian, $hargabeli, $idbarang, $idpengguna)
    {
        return $this->pembelian->tambahPembelian($jumlahpembelian, $hargabeli, $idbarang, $idpengguna);
    }

    public function ambilSemuaPembelian()
    {
        return $this->pembelian->ambilSemuaPembelian();
    }

    public function ambilPembelianById($idpembelian)
    {
        return $this->pembelian->ambilPembelianById($idpembelian);
    }

    public function updatePembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang, $idpengguna)
    {
        return $this->pembelian->updatePembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang, $idpengguna);
    }

    public function hapusPembelian($idpembelian)
    {
        return $this->pembelian->hapusPembelian($idpembelian);
    }
}
