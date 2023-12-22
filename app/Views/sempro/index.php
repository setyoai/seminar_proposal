<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Seminar</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Penjadwalan Seminar Proposal</h1>
        <div class="section-header-button">
            <a href="<?= site_url("sempro/new") ?>" class="btn btn-primary">Add New</a>
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
                <h4>Data Peserta Seminar Proposal</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="table1">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Ketua Penguji</th>
                            <th>Penguji 1</th>
                            <th>Penguji 2</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tb_sempro as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nama_mhs ?></td>
                                <td><?= $value->nim_mhs ?></td>
                                <td><?= $value->nama_ruangan ?></td>
                                <td><?= $value->jam_sempro ?></td>
                                <td><?= $value->tanggal_sempro ?></td>
                                <td><?= $value->penguji1_sempro ?></td>
                                <td><?= $value->penguji2_sempro ?></td>
                                <td><?= $value->penguji3_sempro ?></td>
                                <td>
                                    <a href="<?= site_url('sempro/' . $value->id_sempro . '/edit') ?>"
                                       class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('sempro/' . $value->id_sempro) ?>" method="post"
                                          class="d-inline" id="del-<?= $value->id_sempro ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm"
                                                data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                data-confirm-yes="submitDel(<?= $value->id_sempro ?>)">
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
