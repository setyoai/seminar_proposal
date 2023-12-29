<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Dosen Add Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url("user") ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>User</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="<?= site_url("user") ?>" method="post" autocomplete="off">
                            <div class="card-header">
                                <h4>Tambah Data User</h4>
                            </div>
                            <div class="card-body">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label>ID</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            </div>
                                            <select name="id_user" class="form-control" required>
                                                <option value="" hidden></option>
                                                <?php foreach ($tb_dosen as $key => $value) : ?>
                                                    <option value="<?= $value->id_dosen ?>"><?= $value->nidn_dosen ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="email" name="username_user" class="form-control" required autofocus>
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
                                            <input type="password" name="password_user" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Level User</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-cog"></i>
                                                </div>
                                            </div>
                                            <select name="level_userid" class="form-control" required>
                                                <option value="" hidden></option>
                                                <?php foreach ($tb_auth as $key => $value) : ?>
                                                    <option value="<?= $value->id_auth ?>"><?= $value->level_nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
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