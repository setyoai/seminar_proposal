<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("sempro") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Sempro</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Sempro</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('sempro/' . $tb_sempro->id_sempro) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>NIM</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-id-badge"></i>
                                </div>
                            </div>
                            <input type="text" name="" value="<?= $tb_sempro->nim_sempro ?>" class="form-control" readonly>
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
                            <input type="text" name="" value="<?= $tb_sempro->nama_sempro ?>" class="form-control" readonly>
                        </div>
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
                        <input type="date" name="tanggal_sempro" value="<?= $tb_sempro->tanggal_sempro ?>"
                               class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" name="jam_sempro" value="<?= $tb_sempro->jam_sempro ?>" class="form-control"
                               required autofocus>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>




