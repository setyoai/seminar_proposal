<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Tambah Dosem Pembimbing</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url("dosbing") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Dosem Pembimbing</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="<?= site_url('dosbing/update/' . $tb_dosbing->id_dosbing) ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                            <div class="card-header">
                                <h4>Edit Data Dosen</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>NIM</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="" value="<?= $tb_dosbing->nim_dafskripsi ?>"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="" value="<?= $tb_dosbing->nama_mhs ?>"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label>Dosen Pembimbing</label>
                                    <select name="dosen1_dosbing" class="form-control" required>
                                        <option selected value="" hidden>Pilih Dosen</option>
                                        <?php foreach ($tb_dosen as $key => $value) : ?>
                                            <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dosen Pendamping</label>
                                    <select name="dosen2_dosbing" class="form-control" required>
                                        <option selected value="" hidden>Pilih Dosen</option>
                                        <?php foreach ($tb_dosen as $key => $value) : ?>
                                            <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>