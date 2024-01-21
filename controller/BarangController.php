<?php
include_once 'class/Barang.php';

class BarangController
{
    private $barang;

    public function __construct($conn)
    {
        $this->barang = new Barang($conn);
    }

    public function tambahBarang($namabarang, $satuan, $idsuplier, $idpengguna)
    {
        return $this->barang->tambahBarang($namabarang, $satuan, $idsuplier, $idpengguna);
    }

    public function ambilSemuaBarang()
    {
        return $this->barang->ambilSemuaBarang();
    }

    public function ambilBarangById($idbarang)
    {
        return $this->barang->ambilBarangById($idbarang);
    }

    public function updateBarang($idbarang, $namabarang, $satuan, $idsuplier, $idpengguna)
    {
        return $this->barang->updateBarang($idbarang, $namabarang, $satuan, $idsuplier, $idpengguna);
    }

    public function hapusBarang($idbarang)
    {
        return $this->barang->hapusBarang($idbarang);
    }
}
