<?php
include_once "koneksi.php";

$supplier = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM suppliers");
$data_supplier = mysqli_fetch_assoc($supplier);

$sales = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM sales");
$data_sales = mysqli_fetch_assoc($sales);

$total = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM sales");
$data_total = mysqli_fetch_assoc($total);
?>

<div class="container mt-4">
    <h2>Dashboard POS</h2>
    <p>Selamat datang di Aplikasi Point of Sale.</p>

    <div class="row mt-4">

        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Supplier</h5>
                    <h2><?= $data_supplier['jumlah']; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Transaksi</h5>
                    <h2><?= $data_sales['jumlah']; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Total Penjualan</h5>
                    <h2>Rp <?= number_format($data_total['jumlah'] ?? 0, 0, ',', '.'); ?></h2>
                </div>
            </div>
        </div>

    </div>
</div>