<?php
include_once 'class/PenjualanPelanggan.php';

class PenjualanPelangganController
{
    private $penjualanPelanggan;

    public function __construct($conn)
    {
        $this->penjualanPelanggan = new PenjualanPelanggan($conn);
    }

    public function tambahPenjualanPelanggan($hargajual, $qty, $idbarang, $tanggalpesan, $namapelanggan, $idpengguna)
    {
        return $this->penjualanPelanggan->tambahPenjualanPelanggan($hargajual, $qty, $idbarang, $tanggalpesan, $namapelanggan, $idpengguna);
    }

    public function ambilSemuaPenjualan()
    {
        return $this->penjualanPelanggan->ambilSemuaPenjualan();
    }
}
