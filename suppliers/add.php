
<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">
            Tambah Data Suppliers
        </div>

        <div class="col-4 mb-3">
            <a href="?m=suppliers&s=read"
               class="btn btn-primary float-end">
                Kembali
            </a>
        </div>

        <form action="?m=suppliers&s=save" method="post">
            <div class="mb-2">
                <input type="text" class="form-control"
                    name="name" placeholder="Nama Supplier"
                    required autofocus>
            </div>

            <div class="mb-2">
                <input type="text" class="form-control"
                    name="address" placeholder="Alamat">
            </div>

            <div class="mb-2">
                <input type="text" class="form-control"
                    name="phone" placeholder="Telepon">
            </div>

            <div class="mb-2">
                <input type="email" class="form-control"
                    name="email" placeholder="Email">
            </div>

            <div class="mb-2">
                <button type="reset" class="btn btn-danger btn-sm">
                    Reset
                </button>
                <button type="submit" name="simpan"
                    class="btn btn-primary btn-sm">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
