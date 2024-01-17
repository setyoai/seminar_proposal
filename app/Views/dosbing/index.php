<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Pembagian Dosen</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Pembagian Dosen Pembimbing</h1>
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
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nolecturer-tab" data-toggle="tab" href="#nolecturer"
                               role="tab" aria-controls="nolecturer" aria-selected="true">Belum Dapat Dosbing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lecturer-tab" data-toggle="tab" href="#lecturer"
                               role="tab" aria-controls="lecturer" aria-selected="false">Sudah Dapat Dosbing</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nolecturer" role="tabpanel" aria-labelledby="nolecturer-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="table1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($tb_dosbing as $key => $value) : ?>
                                            <?php if ($value->dosen1_dosbing == null) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value->nim_dafskripsi ?></td>
                                                <td><?= $value->nama_mhs ?></td>
                                                <td>
                                                    <a href="<?= site_url('dosbing/edit/' . $value->id_dosbing) ?>"
                                                       class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lecturer" role="tabpanel" aria-labelledby="lecturer-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="table2">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Dosen Utama</th>
                                        <th>Dosen Pendamping</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($tb_dosbing as $key => $value) : ?>
                                        <?php if ($value->dosen1_dosbing !== null) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value->nim_dafskripsi ?></td>
                                                <td><?= $value->nama_mhs ?></td>
                                                <td><?= $value->nama_dosen1 ?></td>
                                                <td><?= $value->nama_dosen2 ?></td>
                                                <td>
                                                    <a href="<?= site_url('dosbing/edit/' . $value->id_dosbing) ?>"
                                                       class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="<?= site_url('dosbing/delete/' . $value->id_dosbing) ?>" method="post"
                                                          class="d-inline" id="del-<?= $value->id_dosbing ?>">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm"
                                                                data-confirm="Hapus Data?|Apakah Anda yakin?"
                                                                data-confirm-yes="submitDel(<?= $value->id_dosbing ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>