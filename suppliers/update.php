
<?php
if (isset($_POST['update'])) {
    include_once "koneksi.php";

    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE suppliers
         SET name = ?, address = ?, phone = ?, email = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $name,
        $address,
        $phone,
        $email,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ?m=suppliers&s=read");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
} else {
    echo "Jangan akses langsung ke file update.php";
}
?>
