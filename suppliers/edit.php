
<?php
include_once "koneksi.php";

$id = (int) ($_GET['id'] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT * FROM suppliers WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$r = mysqli_fetch_assoc($result);

if (!$r) {
    echo "Data supplier tidak ditemukan.";
    return;
}
?>

<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Edit Data Suppliers</div>

        <div class="col-4 mb-3">
            <a href="?m=suppliers&s=read"
               class="btn btn-primary float-end">Kembali</a>
        </div>

        <form action="?m=suppliers&s=update" method="post">
            <div class="mb-2">
                <input type="text" class="form-control"
                    name="name"
                    value="<?= htmlspecialchars($r['name']); ?>"
                    placeholder="Nama Supplier" required>
            </div>

            <div class="mb-2">
                <input type="text" class="form-control"
                    name="address"
                    value="<?= htmlspecialchars($r['address']); ?>"
                    placeholder="Alamat">
            </div>

            <div class="mb-2">
                <input type="text" class="form-control"
                    name="phone"
                    value="<?= htmlspecialchars($r['phone']); ?>"
                    placeholder="Telepon">
            </div>

            <div class="mb-2">
                <input type="email" class="form-control"
                    name="email"
                    value="<?= htmlspecialchars($r['email']); ?>"
                    placeholder="Email">
            </div>

            <div class="mb-2">
                <input type="hidden" name="id" value="<?= $r['id']; ?>">
                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                <button type="submit" name="update"
                    class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
