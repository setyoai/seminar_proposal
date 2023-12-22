<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Ruangan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Halaman Ruangan</h1>
            <div class="section-header-button">
                <a href="<?= site_url('ruangan/new') ?>" class="btn btn-primary">Add New</a>
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
                    <h4>Data Ruangan</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tbody>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($tb_ruangan as $key => $value) : ?>
                                <tr class="text-center">
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value->nama_ruangan ?></td>
                                    <td class="text-center" style="width:15%">
                                        <a href="<?= site_url('ruangan/edit/' . $value->id_ruangan) ?>"
                                           class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('ruangan/delete/' . $value->id_ruangan) ?>"
                                              method="post" class="d-inline"
                                              onsubmit="return confirm('Yakin hapus data?')">
                                            <?= csrf_field() ?>
                                            <button class="btn btn-danger btn-sm">
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