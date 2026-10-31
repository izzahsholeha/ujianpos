
<?php
include_once "koneksi.php";

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    echo "ID supplier tidak valid.";
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM suppliers WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ?m=suppliers&s=read");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
