<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Tagihan Air
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $pdam['id']; ?>">
                        <div class="form-group">
                            <label for="nopel">Nomor Meteran</label>
                            <input type="text" name="nopel" class="form-control" id="nopel" value="<?= $pdam['nopel']; ?>">
                            <small class="form-text text-danger"><?= form_error('nopel'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $pdam['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="bulan">Jurusan</label>
                            <select class="form-control" id="bulan" name="bulan">
                                <?php foreach( $bulan as $bln ) : ?>
                                    <?php if( $bln == $pdam['bulan'] ) : ?>
                                        <option value="<?= $bln; ?>" selected><?= $bln; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $bln; ?>"><?= $bln; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tagihan">Tagihan</label>
                            <input type="text" name="tagihan" class="form-control" id="tagihan" value="<?= $pdam['tagihan']; ?>">
                            <small class="form-text text-danger"><?= form_error('tagihan'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>