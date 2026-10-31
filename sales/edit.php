<?php
include_once "koneksi.php";

$id = (int) ($_GET['id'] ?? 0);

$sql = "SELECT * FROM sales WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$r = mysqli_fetch_assoc($result);

if (!$r) {
    echo "Data sales tidak ditemukan.";
    return;
}

$supplier_id = $r['supplier_id'];
$total = $r['total'];

$suppliers = mysqli_query($koneksi, "SELECT * FROM suppliers");
?>

<div class="card">
    <div class="card-header">
        <h4>Edit Data Sales</h4>
    </div>

    <div class="card-body">
        <form action="?m=sales&s=update" method="POST">

            <input type="hidden" name="id" value="<?= $r['id']; ?>">

            <div class="mb-3">
                <label class="form-label">Nama Supplier</label>
                <select name="supplier_id" class="form-select" required>
                    <?php while ($s = mysqli_fetch_assoc($suppliers)) { ?>
                        <option value="<?= $s['id']; ?>"
                            <?= ($s['id'] == $supplier_id) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($s['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Total</label>
                <input type="number" name="total"
                    class="form-control"
                    value="<?= htmlspecialchars($total); ?>"
                    min="0" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">
                Update
            </button>

            <a href="?m=sales" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>