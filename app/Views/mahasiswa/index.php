<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <title>Main Menu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-button">
                <a href="<?=site_url("main_menu/add")?>" class ="btn btn-primary">Add New</a>
            </div>
        </div>

        <?php if(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissable show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Success !</b>
                    <?= session()->getFlashdata('success')?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissable show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error')?>
                </div>
            </div>
        <?php endif; ?>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Data Mahasiswa</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($tb_mhs as $key => $value) : ?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td><?=$value->nim_mhs?></td>
                                    <td><?=$value->nama_mhs?></td>
                                    <td><?=$value->email_mhs?></td>
                                    <td><?=$value->alamat_mhs?></td>
                                    <td><?=$value->nohp_mhs?></td>
                                    <td><?=$value->status_mhs?></td>
                                    <td>
                                        <a href="<?=site_url('mahasiswa/edit/'.$value->id_mhs)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?=site_url('mahasiswa/'.$value->id_mhs)?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
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