<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>

<title>Dashboard</title>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">

        <?php if (session('level_iduser') == 'Koordinator'): ?>

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <?= countData('tb_mahasiswa') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Dosen</h4>
                            </div>
                            <div class="card-body">
                                <?= countData('tb_dosen') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pendaftar Seminar</h4>
                            </div>
                            <div class="card-body">
                                <?= countData('tb_dafsempro') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Seminar Proposal</h4>
                            </div>
                            <div class="card-body">
                                <?= countData('tb_sempro') ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php elseif (session('level_iduser') == 'Operator'): ?>

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Seminar</h4>
                            </div>
                            <div class="card-body">
                                <?= countData('tb_dafsempro') ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php endif; ?>

    </div>
</section>

<?= $this->endSection() ?>