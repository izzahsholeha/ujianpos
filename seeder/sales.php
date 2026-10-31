<?php
require_once __DIR__ . '/../koneksi.php';

// Hitung jumlah sales yang sudah ada
$result = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM sales");
$data = mysqli_fetch_assoc($result);

$jumlah = (int) $data['jumlah'];

// Ambil ID supplier yang tersedia
$resultSupplier = mysqli_query($koneksi, "SELECT id FROM suppliers");

$supplierIds = [];

while ($row = mysqli_fetch_assoc($resultSupplier)) {
    $supplierIds[] = (int) $row['id'];
}

if (count($supplierIds) === 0) {
    exit("Tidak ada supplier. Jalankan suppliers.php terlebih dahulu.");
}

if ($jumlah >= 200) {
    exit("Data sales sudah mencapai 200. Tidak ada data yang ditambahkan.");
}

mysqli_begin_transaction($koneksi);

try {
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO sales (supplier_id, total) VALUES (?, ?)"
    );

    for ($i = $jumlah + 1; $i <= 200; $i++) {
        $supplier_id = $supplierIds[array_rand($supplierIds)];
        $total = random_int(10000, 500000);

        mysqli_stmt_bind_param(
            $stmt,
            "ii",
            $supplier_id,
            $total
        );

        mysqli_stmt_execute($stmt);
    }

    mysqli_commit($koneksi);

    echo "Seeder berhasil! Total sales sekarang 200 data.";

} catch (Throwable $e) {
    mysqli_rollback($koneksi);
    echo "Seeder gagal: " . $e->getMessage();
}
?>