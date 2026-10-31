<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h3>Data Suppliers</h3>
            <a href="?m=suppliers&s=add" class="btn btn-primary">
                Tambah
            </a>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "koneksi.php";

                $sql = "SELECT * FROM suppliers";
                $result = mysqli_query($koneksi, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $no = 1;

                    while ($r = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>$no</td>
                            <td>" . htmlspecialchars($r['name']) . "</td>
                            <td>" . htmlspecialchars($r['address']) . "</td>
                            <td>" . htmlspecialchars($r['phone']) . "</td>
                            <td>" . htmlspecialchars($r['email']) . "</td>
                            <td>
                                <a href='?m=suppliers&s=edit&id=" . $r['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='?m=suppliers&s=delete&id=" . $r['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus supplier ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr>
                        <td colspan='6' class='text-center'>Tidak ada data</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>