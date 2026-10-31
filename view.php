<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Data Suppliers</div>
        <div class="col-4 mb-2">
            <a href="?m=suppliers&s=tambah" class="btn btn-md btn-primary float-end">Tambah</a>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "koneksi.php";
                $sql = "SELECT * FROM suppliers";
                $result = mysqli_query($koneksi, $sql);
                if ($r = mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <td>' . $no . '</td>
                            <td>' . $r['name'] . '</td>
                            <td>' . $r['address'] . '</td>
                            <td>' . $r['phone'] . '</td>
                            <td>' . $r['email'] . '</td>
                                <a href="?m=suppliers&s=edit&id=' . $r['id'] . '" class="btn btn-sm btn-warning">Edit</a>
                                <a href="?m=suppliers&s=delete&id=' . $r['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin?\')">delete</a>
                            </td>
                          </tr>';
                        $no++;
                    }
                } else {
                    echo '<tr>
                        <td colspan="5" align="center">Tidak ada data</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>