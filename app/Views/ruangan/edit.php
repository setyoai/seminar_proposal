<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("ruangan") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Ruangan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form action="<?= site_url('ruangan/update/' . $tb_ruangan->id_ruangan) ?>" method="post"
                          autocomplete="off">
                        <div class="card-header">
                            <h4>Edit Data Ruangan</h4>
                        </div>
                        <div class="card-body">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Nama Ruangan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                <input type="text" name="nama_ruangan" value="<?= $tb_ruangan->nama_ruangan ?>"
                                       class="form-control" required autofocus>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>
</section>
<?= $this->endSection() ?>



