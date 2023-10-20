<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Tagihan Air
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pdam['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pdam['nopel']; ?></h6>
                    <p class="card-text"><?= $pdam['bulan']; ?></p>
                    <p class="card-text"><?= $pdam['tagihan']; ?></p>
                    <a href="<?= base_url(); ?>pdam" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>