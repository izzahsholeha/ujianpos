
<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Data Sales</div>

        <div class="col-4 mb-2">
            <a href="?m=sales&s=add" class="btn btn-md btn-primary float-end">
                Tambah
            </a>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include_once "koneksi.php";

                $sql = "SELECT sales.*, suppliers.name AS nama_supplier
                        FROM sales
                        INNER JOIN suppliers
                        ON sales.supplier_id = suppliers.id";

                $result = mysqli_query($koneksi, $sql);

                if (!$result) {
                    die("Query gagal: " . mysqli_error($koneksi));
                }

                if (mysqli_num_rows($result) > 0) {
                    $no = 1;

                    while ($r = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <td>' . $no . '</td>
                            <td>' . htmlspecialchars($r['nama_supplier']) . '</td>
                            <td>Rp '.number_format($r['total'], 0, ',', '.').'</td>
                            <td>
                                <a href="?m=sales&s=edit&id=' . $r['id'] . '" class="btn btn-sm btn-warning">Edit</a>

                                <a href="?m=sales&s=delete&id=' . $r['id'] . '" class="btn btn-sm btn-danger"
                                onclick="return confirm(\'Apakah anda yakin?\')">Hapus</a>
                            </td>
                        </tr>';

                        $no++;
                    }
                } else {
                    echo '<tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
