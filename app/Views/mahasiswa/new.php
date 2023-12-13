<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Mahasiswa Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?=site_url("mahasiswa")?>" class="btn"><i class ="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Mahasiswa</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Mahasiswa</h4>
                </div>
                <div class="card-body col-md-6">
                    <form action="<?= site_url("mahasiswa")?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim_mhs" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_mhs" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email_mhs" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat_mhs" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" name="nohp_mhs" class="form-control" required autofocus>
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