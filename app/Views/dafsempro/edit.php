<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("dafsempro") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Pendaftaran </h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Pendaftaran Seminar</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('dafsempro/update/' . $tb_dafsempro->id_dafsempro) ?>" method="post"
                              autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="section-title">Select</div>
                            <div class="form-group">
                                <label>Choose One</label>
                                <select class="custom-select" name="status_dafsempro">
                                    <option selected>Select status</option>
                                    <option <?php echo $tb_dafsempro->status_dafsempro == '1' ? 'selected' : ''; ?>
                                            value="1">Diterima
                                    </option>
                                    <option <?php echo $tb_dafsempro->status_dafsempro == '2' ? 'selected' : ''; ?>
                                            value="2">Ditolak
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="section-title">Keterangan</div>
                                <textarea class="form-control"
                                          name="ket_dafsempro"><?= $tb_dafsempro->ket_dafsempro ?></textarea>
                            </div
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary mr-1" type="submit">Submit</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


