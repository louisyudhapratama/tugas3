<?php

class LabaRugi
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function hitungTotalPembelian()
    {
        $total_pembelian = "SELECT SUM(jumlahpembelian * hargabeli) AS total_pembelian FROM pembelian";
        $resulttotal_pembelian = $this->conn->query($total_pembelian);
        $rowtotal_pembelian = $resulttotal_pembelian->fetch_assoc();

        return $rowtotal_pembelian['total_pembelian'];
    }

    public function hitungTotalPenjualan()
    {
        $total_penjualan = "SELECT SUM(jumlahpenjualan) AS total_penjualan FROM penjualan";
        $resulttotal_penjualan = $this->conn->query($total_penjualan);
        $rowtotal_penjualan = $resulttotal_penjualan->fetch_assoc();

        return $rowtotal_penjualan['total_penjualan'];
    }

    public function hitungRugiLaba()
    {
        $totalPembelian = $this->hitungTotalPembelian();
        $totalPenjualan = $this->hitungTotalPenjualan();

        return $totalPenjualan - $totalPembelian;
    }

    public function labaRugiByBarang()
    {
        $sql = "SELECT b.namabarang,p.hargabeli,j.hargajual,(j.hargajual * pl.qty - p.hargabeli * p.jumlahpembelian) AS labarugi
        FROM pelanggan pl JOIN barang b ON pl.idbarang = b.idbarang LEFT JOIN
        pembelian p ON pl.idbarang = p.idbarang LEFT JOIN penjualan j ON pl.idpelanggan = j.idpelanggan";
        return $this->conn->query($sql);
    }
}
