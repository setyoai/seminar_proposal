<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Add Dosen</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url("dosen") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Dosen</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url("dosen") ?>" method="post" autocomplete="off">
                            <div class="card-header">
                                <h4>Tambah Data Dosen</h4>
                            </div>
                            <div class="card-body">
                                    <?= csrf_field() ?>

                                <input type="hidden" name="username_user" value="<?= esc($data['nidn_dosen'] ?? '') ?>">
                                <input type="hidden" name="password_user" value="12345">
                                <input type="hidden" name="level_userid" value="Dosen">
                                    <div class="form-group">
                                        <label>NIDN</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="nidn_dosen" class="form-control">
                                            <div class="invalid-feedback">
                                                <?=$validation->getError('nidn_dosen')?>
                                            </div>
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
                                            <input type="text" name="nama_dosen" class="form-control">
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
                                            <input type="text" name="alamat_dosen" class="form-control">
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
                                            <input type="text" name="nohp_dosen" class="form-control">
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
                                            <input type="email" name="email_dosen" class="form-control">
                                        </div>
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