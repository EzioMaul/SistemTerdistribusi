<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Pembelian
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pulsa['nomor']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pulsa['nama']; ?></h6>
                    <p class="card-text"><?= $pulsa['provider']; ?></p>
                    <p class="card-text"><?= $pulsa['jumlah']; ?></p>
                    <a href="<?= base_url(); ?>pulsa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>