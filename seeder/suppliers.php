<?php
require_once __DIR__ . '/../koneksi.php';

// Hitung jumlah supplier yang sudah ada
$result = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM suppliers");
$data = mysqli_fetch_assoc($result);

$jumlah = (int) $data['jumlah'];

if ($jumlah >= 100) {
    exit("Data suppliers sudah mencapai 100. Tidak ada data yang ditambahkan.");
}

mysqli_begin_transaction($koneksi);

try {
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO suppliers (name, address, phone, email)
         VALUES (?, ?, ?, ?)"
    );

    for ($i = $jumlah + 1; $i <= 100; $i++) {
        $name = "Supplier Dummy " . str_pad($i, 3, "0", STR_PAD_LEFT);
        $address = "Jl. Contoh No. " . $i;
        $phone = "08123456" . str_pad($i, 4, "0", STR_PAD_LEFT);
        $email = "supplier" . $i . "@example.com";

        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $name,
            $address,
            $phone,
            $email
        );

        mysqli_stmt_execute($stmt);
    }

    mysqli_commit($koneksi);

    echo "Seeder berhasil! Total suppliers sekarang 100 data.";

} catch (Exception $e) {
    mysqli_rollback($koneksi);
    echo "Seeder gagal: " . $e->getMessage();
}
?>