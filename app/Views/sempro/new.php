<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Seminar Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("sempro") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Seminar Proposal</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form action="<?= site_url('sempro') ?>" method="post" autocomplete="off">
                        <div class="card-header">
                            <h4>Tambah Jadwal Seminar</h4>
                        </div>
                        <div class="card-body">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <select name="id_dafsempro" class="form-control" required>
                                    <option value="" hidden></option>
                                    <?php foreach ($tb_dafsempro as $key => $value) : ?>
                                        <option value="<?= $value->id_dafskripsi ?>"><?= $value->id_dafskirpsi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ketua Penguji</label>
                                <select name="penguji1_sempro" class="form-control" required>
                                    <option value="" hidden></option>
                                    <?php foreach ($tb_dosen as $key => $value) : ?>
                                        <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dosen Pembimbing 1</label>
                                <select name="penguji2_sempro" class="form-control" required>
                                    <option value="" hidden></option>
                                    <?php foreach ($tb_dosen as $key => $value) : ?>
                                        <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dosen Pembimbing 2</label>
                                <select name="penguji3_sempro" class="form-control" required>
                                    <option value="" hidden></option>
                                    <?php foreach ($tb_dosen as $key => $value) : ?>
                                        <option value="<?= $value->id_dosen ?>"><?= $value->nama_dosen ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ruangan *</label>
                                <select name="id_ruangan" class="form-control" required>
                                    <option value="" hidden></option>
                                    <?php foreach ($tb_ruangan as $key => $value) : ?>
                                        <option value="<?= $value->id_ruangan ?>"><?= $value->nama_ruangan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal_sempro" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="time" name="jam_sempro" class="form-control" required autofocus>
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
