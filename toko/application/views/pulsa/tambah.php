<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Pembelian
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" name="nomor" class="form-control" id="nomor">
                            <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="provider">Provider</label>
                            <select class="form-control" id="provider" name="provider">
                                <option value="Telkomsel">Telkomsel</option>
                                <option value="IM3">IM3</option>
                                <option value="XL">XL</option>
                                <option value="Smartfren">Smartfren</option>
                                <option value="3">3</option>
                                <option value="Axis">Axis</option>
                                <option value="By.U">By.U</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <select class="form-control" id="jumlah" name="jumlah">
                                <option value="5000">5000</option>
                                <option value="10000">10000</option>
                                <option value="20000">20000</option>
                                <option value="50000">50000</option>
                                <option value="100000">100000</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>