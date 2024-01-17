<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("dafskripsi") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Pendaftaran Skripsi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Pendaftaran Skripsi</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('dafskripsi/update/' . $tb_dafskripsi->id_dafskripsi) ?>" method="post"
                              autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="section-title">File Kartu Hasil Studi</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="krs_dafskripsi"
                                       id="customFile">
                                <label class="custom-file-label"
                                       for="customFile"><?= $tb_dafskripsi->krs_dafskripsi ?></label>
                            </div>
                            <div class="section-title">File Transkrip</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="transkrip_dafskripsi" id="customFile">
                                <label class="custom-file-label"
                                       for="customFile"><?= $tb_dafskripsi->transkrip_dafskripsi ?></label>
                            </div>
                            <div class="section-title">File Slip Pembayaran</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="slip_dafskripsi"
                                       id="customFile">
                                <label class="custom-file-label"
                                       for="customFile"><?= $tb_dafskripsi->slip_dafskripsi ?></label>
                            </div>
                            <div class="section-title">Select</div>
                            <div class="form-group">
                                <label>Choose One</label>
                                <select class="custom-select" name="status_dafskripsi">
                                    <option selected>Select status</option>
                                    <option <?php echo $tb_dafskripsi->status_dafskripsi == '1' ? 'selected' : ''; ?>
                                            value="1">Diterima
                                    </option>
                                    <option <?php echo $tb_dafskripsi->status_dafskripsi == '2' ? 'selected' : ''; ?>
                                            value="2">Ditolak
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="section-title">Keterangan</div>
                                <textarea class="form-control"
                                          name="keterangan_dafskripsi"><?= $tb_dafskripsi->keterangan_dafskripsi ?></textarea>
                            </div
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary mr-1" type="submit">Simpan</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


