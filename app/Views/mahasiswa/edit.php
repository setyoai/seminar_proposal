<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("mahasiswa") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Mahasiswa</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form action="<?= site_url('mahasiswa/update/' . $tb_mhs->id_mhs) ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="card-header">
                            <h4>Edit Data Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nim</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-id-badge"></i>
                                        </div>
                                    </div>
                                <input type="text" name="nidn_mhs" value="<?= $tb_mhs->nim_mhs ?>" class="form-control" required
                                       autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                <input type="password" name="nidn_mhs" value="" class="form-control">
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
                                    <input type="text" name="nama_mhs" value="<?= $tb_mhs->nama_mhs ?>" class="form-control"
                                       required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="email_mhs" value="<?= $tb_mhs->email_mhs ?>" class="form-control"
                                       required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="alamat_mhs" value="<?= $tb_mhs->alamat_mhs ?>" class="form-control"
                                       required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="nohp_mhs" value="<?= $tb_mhs->nohp_mhs ?>" class="form-control"
                                       required autofocus>
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


