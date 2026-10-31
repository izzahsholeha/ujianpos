
<?php
include_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supplier_id = (int) ($_POST['supplier_id'] ?? 0);
    $total = (float) ($_POST['total'] ?? 0);

    if ($supplier_id <= 0 || $total < 0) {
        exit("Data supplier atau total tidak valid.");
    }

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO sales (supplier_id, total) VALUES (?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "id", $supplier_id, $total);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ?m=sales");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses tidak valid.";
}
?>
