<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Main Menu Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url("main_menu") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Main Menu</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Dosen</h4>
                </div>
                <div class="card-body col-md-6">
                    <form action="<?= site_url('main_menu/' . $tb_dosen->id_dosen) ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Nidn Dosen</label>
                            <input type="text" name="nidn_dosen" value="<?= $tb_dosen->nidn_dosen ?>"
                                   class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Nama Dosen</label>
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
                            <label>Email Dosen</label>
                            <input type="text" name="email_dosen" value="<?= $tb_dosen->email_dosen ?>"
                                   class="form-control" required autofocus>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Submit</i>
                            </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>