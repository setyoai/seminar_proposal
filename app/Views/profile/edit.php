<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Main Menu Add Data</title>
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
                        <form action="<?= site_url('user/update/' . $tb_user->id_user) ?>" method="post"
                              autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="card-header">
                                <h4>Edit Data User</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password"
                                           role="tab" aria-controls="password" aria-selected="false">Update Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username_user"
                                                   value="<?= $tb_user->username_user ?>"
                                                   class="form-control" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Level User</label>
                                            <select name="level_userid" class="form-control" required>
                                                <option value="" hidden></option>
                                                <?php foreach ($tb_auth as $value) : ?>
                                                    <option value="<?= $value->id_auth ?>" <?= ($tb_user->level_userid == $value->id_auth) ? 'selected' : '' ?>>
                                                        <?= $value->level_nama ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="password" role="tabpanel"
                                         aria-labelledby="password-tab">
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="password" name="newpassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi Password</label>
                                            <input type="password" name="conpassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Submit</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>