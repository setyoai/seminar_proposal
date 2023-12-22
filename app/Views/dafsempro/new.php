<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Seminar Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("dafsempro") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Seminar Proposal</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Tambah Jadwal Seminar</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('dafsempro') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Ketua Penguji</label>
                        <input type="file" name="transkrip_dafsempro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 1</label>
                        <input type="file" name="pengesahan_dafsempro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 2</label>
                        <input type="file" name="bukubimbingan_dafsempro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="file" name="kwkomputer_dafsempro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status_dafsempro">Choose One</label>
                        <select name="status_dafsempro" id="status_dafsempro" class="custom-select">
                            <option value="" selected disabled>Select status</option>
                            <option value="1">Diterima</option>
                            <option value="2">Ditolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ket_dafsempro" class="section-title">Keterangan</label>
                        <textarea id="ket_dafsempro" name="ket_dafsempro" class="form-control"></textarea>
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
