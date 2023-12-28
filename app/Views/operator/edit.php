<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Main Menu Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url("operator") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Main Menu</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="<?= site_url('operator/update/' . $tb_dosen->id_dosen) ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                            <div class="card-header">
                                <h4>Edit Data Operator</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Nim Operator</label>
                                        <input type="text" name="nidn_dosen" value="<?= $tb_dosen->nidn_dosen ?>"
                                               class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Operator</label>
                                        <input type="text" name="nama_dosen" value="<?= $tb_dosen->nama_dosen ?>"
                                               class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat_dosen" value="<?= $tb_dosen->alamat_dosen ?>"
                                               class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="text" name="nohp_dosen" value="<?= $tb_dosen->nohp_dosen ?>"
                                               class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Operator</label>
                                        <input type="text" name="email_dosen" value="<?= $tb_dosen->email_dosen ?>"
                                               class="form-control" required autofocus>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Submit</i></button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>