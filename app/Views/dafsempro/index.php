<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Daftar Seminar</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pendaftaran Seminar Proposal</h1>
        <div class="section-header-button">
            <a href="<?= site_url("dafsempro/new") ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissable show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissable show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Data Berkas Seminar Proposal</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="table1">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Transkrip</th>
                            <th>Pengesahan</th>
                            <th>Buku Bimbingan</th>
                            <th>KW Komputer</th>
                            <th>KW Inggris</th>
                            <th>KW Kewirausahaan</th>
                            <th>Slip</th>
                            <th>Plagiasi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tb_dafsempro as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a href="<?= base_url('upload/' . $value->transkrip_dafsempro) ?>" target="_blank"><?= $value->transkrip_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->pengesahan_dafsempro) ?>" target="_blank"><?= $value->pengesahan_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->bukubimbingan_dafsempro) ?>" target="_blank"><?= $value->bukubimbingan_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->kwkomputer_dafsempro) ?>" target="_blank"><?= $value->kwkomputer_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->kwinggris_dafsempro) ?>" target="_blank"><?= $value->kwinggris_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->kwkewirausahaan_dafsempro) ?>" target="_blank"><?= $value->kwkewirausahaan_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->slippembayaran_dafsempro) ?>" target="_blank"><?= $value->slippembayaran_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->plagiasi_dafsempro) ?>" target="_blank"><?= $value->plagiasi_dafsempro ?></a></td>
                                <td><a href="<?= base_url('upload/' . $value->tanggal_dafsempro) ?>" target="_blank"><?= $value->tanggal_dafsempro ?></a></td>
                                <td>
                                    <?php
                                    $status = $value->status_dafsempro;
                                    $badge_class = ($status == 1) ? 'badge-success' : 'badge-danger';
                                    $badge_text = ($status == 1) ? 'Diterima' : 'Ditolak';
                                    ?>
                                    <span class="badge <?= $badge_class ?>"><?= $badge_text ?></span>
                                </td>
                                <td><?= $value->ket_dafsempro ?></td>

                                <td>
                                    <a href="<?= site_url('dafsempro/edit/' . $value->id_dafsempro) ?>"
                                       class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

