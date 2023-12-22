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

        <div class="card">
            <div class="card-header">
                <h4>Tambah Jadwal Seminar</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('sempro') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama *</label>
                        <select name="id_mhs" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($tb_mhs as $key => $value) : ?>
                                <option value="<?= $value->id_mhs ?>"><?= $value->nama_mhs ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ketua Penguji</label>
                        <input type="text" name="penguji1_sempro" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 1</label>
                        <input type="text" name="penguji2_sempro" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 2</label>
                        <input type="text" name="penguji3_sempro" class="form-control" required autofocus>
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
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Submit</i></button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
