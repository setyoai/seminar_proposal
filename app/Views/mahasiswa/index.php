<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Mahasiswa</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-button">
                <a href="<?= site_url("mahasiswa/new") ?>" class="btn btn-primary">Tambah Data</a>
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
                    <h4>Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="table1">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tb_mhs as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value->nim_mhs ?></td>
                                    <td><?= $value->nama_mhs ?></td>
                                    <td><?= $value->email_mhs ?></td>
                                    <td><?= $value->alamat_mhs ?></td>
                                    <td><?= $value->nohp_mhs ?></td>
                                    <td>
                                        <?php
                                        $status = $value->status_mhs;

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
                                    <td>
                                        <a href="<?= site_url('mahasiswa/edit/' . $value->id_mhs) ?>"
                                           class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('mahasiswa/delete/' . $value->id_mhs) ?>"
                                              method="post" class="d-inline" id="del-<?= $value->id_mhs ?>">
                                            <?= csrf_field() ?>
                                            <button class="btn btn-danger btn-sm"
                                                    data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                    data-confirm-yes="submitDel(<?= $value->id_mhs ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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