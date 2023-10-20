<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Pembayaran Tagihan Air
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nopel">Nomor Meteran</label>
                            <input type="text" name="nopel" class="form-control" id="nopel">
                            <small class="form-text text-danger"><?= form_error('nopel'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" name="tagihan" class="form-control" id="tagihan">
                            <small class="form-text text-danger"><?= form_error('tagihan'); ?></small>
                        </div>
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Bayar</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>