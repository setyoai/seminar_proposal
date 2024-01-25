<?php
// Create an array to store user IDs that are already used
$usedUserIds = [$tb_sempro->dosen1_sempro, $tb_sempro->dosen2_sempro];
?>

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
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form action="<?= site_url('sempro/' . $tb_sempro->id_sempro) ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="card-header">
                            <h4>Edit Data Sempro</h4>
                        </div>
                        <div class="card-body">
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <select name="penguji1_sempro" class="form-control" required>
                                        <option value="" hidden></option>
                                        <?php foreach ($tb_user as $key => $value) : ?>
                                            <?php
                                            $isUsed = in_array($value->id_dosen, $usedUserIds);
                                            $isOperator = $value->level_userid === 'Operator';
                                            if (!$isUsed && !$isOperator) :
                                                ?>
                                                <option value="<?= $value->id_dosen ?>"><?= $value->nama_user ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Anggota Penguji 1</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="penguji2_sempro" value="<?= $tb_sempro->dosen1_sempro ?>" class="form-control" readonly>
                                    <input type="text" name="" value="<?= esc($dosbingModel->getDosenNameById($tb_sempro->dosen1_sempro)) ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Anggota Penguji 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="penguji3_sempro" value="<?= $tb_sempro->dosen2_sempro ?>" class="form-control" readonly>
                                    <input type="text" name="" value="<?= esc($dosbingModel->getDosenNameById($tb_sempro->dosen2_sempro)) ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                    <select name="nama_ruanganid" class="form-control" required>
                                        <option value="" hidden></option>
                                        <?php foreach ($tb_ruangan as $value) : ?>
                                            <option value="<?= $value->id_ruangan ?>" <?= ($tb_sempro->nama_ruanganid == $value->id_ruangan) ? 'selected' : '' ?>>
                                                <?= $value->nama_ruangan?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="date" name="tanggal_sempro" value="<?= $tb_sempro->tanggal_sempro ?>"
                                           class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jam</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <select name="jam_sempro" class="form-control" required autofocus>
                                        <option value="" hidden>Select a time</option>
                                        <?php
                                        $timeIntervals = ['08:00','09:00','10:00','11:00','12:00','13:00','14.00','15.00'];
                                        foreach ($timeIntervals as $interval) :
                                            ?>
                                            <option value="<?= $interval ?>" <?= ($tb_sempro->jam_sempro == $interval) ? 'selected' : '' ?>>
                                                <?= $interval ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <?php if (session()->has('errors')) : ?>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                        <?php foreach (session('errors') as $error) : ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
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