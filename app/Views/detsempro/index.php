<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Hasil Seminar</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Hasil Seminar Proposal</h1>
<!--        <div class="section-header-button">-->
<!--            <a href="--><?php //= site_url("detsempro/new") ?><!--" class="btn btn-primary">Tambah </a>-->
<!--        </div>-->
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
                <h4>Data Peserta Hasil Seminar Proposal</h4>
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
                            <th>Hasil</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tb_detsempro as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nim_detsempro ?></td>
                                <td><?= $value->nama_detsempro?></td>
                                <td><?= $value->nama_ruangan?></td>
                                <td><?= $value->jam_sempro ?></td>
                                <td><?= $value->tanggal_sempro ?></td>
                                <td><?= $value->hasil_sempro?></td>
                                <td>
                                    <a href="<?= site_url('detsempro/' . $value->id_detsempro . '/edit') ?>"
                                       class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('detsempro/' . $value->id_detsempro) ?>" method="post"
                                          class="d-inline" id="del-<?= $value->id_detsempro ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger btn-sm"
                                                data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                data-confirm-yes="submitDel(<?= $value->id_detsempro ?>)">
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
