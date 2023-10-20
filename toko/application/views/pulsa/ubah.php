<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Pembelian
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $pulsa['id']; ?>">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" name="nomor" class="form-control" id="nomor" value="<?= $pulsa['nomor']; ?>">
                            <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $pulsa['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="provider">Provider</label>
                            <select class="form-control" id="provider" name="provider">
                                <?php foreach( $provider as $pr ) : ?>
                                    <?php if( $pr == $pulsa['provider'] ) : ?>
                                        <option value="<?= $pr; ?>" selected><?= $pr; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $pr; ?>"><?= $pr; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <select class="form-control" id="jumlah" name="jumlah">
                                <?php foreach( $jumlah as $jm ) : ?>
                                    <?php if( $jm == $pulsa['jumlah'] ) : ?>
                                        <option value="<?= $jm; ?>" selected><?= $jm; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jm; ?>"><?= $jm; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>