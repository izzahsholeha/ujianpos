<?php
include_once "koneksi.php";

if (isset($_POST['update'])) {

    $id = (int) $_POST['id'];
    $supplier_id = (int) $_POST['supplier_id'];
    $total = (float) $_POST['total'];

    $sql = "UPDATE sales
            SET supplier_id = ?, total = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "idi",
        $supplier_id,
        $total,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ?m=sales");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }

} else {
    echo "Akses tidak valid.";
}
?>