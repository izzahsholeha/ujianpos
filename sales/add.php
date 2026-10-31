
<?php
include_once "koneksi.php";

$sql = "SELECT * FROM suppliers";
$result = mysqli_query($koneksi, $sql);
?>

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Sales</h4>
    </div>

    <div class="card-body">

      <form action="?m=sales&s=save" method="POST">

            <div class="mb-3">
                <label class="form-label">Nama Supplier</label>

                <select name="supplier_id" class="form-select" required>
                    <option value="">-- Pilih Supplier --</option>

                    <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?= $r['id']; ?>">
                            <?= htmlspecialchars($r['name']); ?>
                        </option>
                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Total</label>

                <input type="number"
                    name="total"
                    class="form-control"
                    placeholder="Masukkan total penjualan"
                    min="0"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="?m=sales" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>
