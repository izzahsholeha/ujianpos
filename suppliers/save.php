
<?php
if (isset($_POST['simpan'])) {
    include_once "koneksi.php";

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO suppliers (name, address, phone, email)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $name,
        $address,
        $phone,
        $email
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ?m=suppliers&s=read");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
} else {
    echo "Jangan akses langsung ke file save.php";
}
?>
