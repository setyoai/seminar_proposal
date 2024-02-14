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
        <h1>Pendaftaran Skripsi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Cek Berkas Pendaftaran Skripsi</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('dafskripsi/update/' . $tb_dafskripsi->id_dafskripsi) ?>" method="post"
                              autocomplete="off">
                                <?= csrf_field() ?>
                                <h2 class="section-title mt-1">File </h2>
                                <div class="col-12" style="margin-bottom: 20px;">
                                    <h6 style="color: #718eef;">Kartu Hasil Studi</h6>
                                        <a href="<?= base_url('upload/' . $tb_dafskripsi->krs_dafskripsi) ?>" target="_blank">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="#6777ef" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
                                        </a>
                                </div>
                                <div class="col-12" style="margin-bottom: 20px;">
                                    <h6 style="color: #718eef;">Transkrip Nilai</h6>
                                        <a href="<?= base_url('upload/' . $tb_dafskripsi->transkrip_dafskripsi) ?>" target="_blank">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="#6777ef" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
                                        </a>
                                </div>
                            <div class="col-12">
                                <h6 style="color: #718eef;">Slip Pembayaran</h6>
                                <a href="<?= base_url('upload/' . $tb_dafskripsi->slippembayaran_dafskripsi) ?>" target="_blank">
                                    <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="#6777ef" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
                                </a>
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


