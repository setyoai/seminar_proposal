<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Daftar Skripsi</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pendaftaran Skripsi</h1>
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
                <h4>Data Berkas Pendaftaran Skripsi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="table1">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>KRS</th>
                            <th>Slip Pembayaran</th>
                            <th>Transkrip Nilai</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tb_dafskripsi as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nim_dafskripsi ?></td>
                                <td><?= $value->nama_dafskripsi ?></td>
                                <td><?= $value->tanggal_dafskripsi ?></td>
                                <td><a href="<?= base_url('upload/' . $value->krs_dafskripsi) ?>" target="_blank">KRS</a></td>
                                <td><a href="<?= base_url('upload/' . $value->slippembayaran_dafskripsi) ?>" target="_blank">Slip Pembayaran</a></td>
                                <td><a href="<?= base_url('upload/' . $value->transkrip_dafskripsi) ?>" target="_blank">Transkrip Nilai</a></td>
                                <td>
                                    <?php
                                    $status = $value->status_dafskripsi;

                                    // Determine the appropriate badge class and text based on the status
                                    if ($status == 1) {
                                        $badge_class = 'badge-success';
                                        $badge_text = 'Diterima';
                                    } elseif ($status == 2) {
                                        $badge_class = 'badge-danger';
                                        $badge_text = 'Ditolak'; // Change this to your desired text for status 2
                                    } else {
                                        $badge_class = 'badge-warning';
                                        $badge_text = 'Menunggu';
                                    }
                                    ?>

                                    <!-- Display a badge with the determined class and text -->
                                    <span class="badge <?= $badge_class ?>"><?= $badge_text ?></span>
                                </td>

                                <td><?= $value->keterangan_dafskripsi ?></td>
                                <td>
                                    <a href="<?= site_url('dafskripsi/edit/' . $value->id_dafskripsi) ?>"
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

