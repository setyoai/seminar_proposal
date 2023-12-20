<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Edit Data</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?=site_url("sempro")?>" class="btn"><i class ="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Sempro</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Sempro</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('sempro/'.$tb_sempro->id_sempro)?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Nama  *</label>
                        <select name="id_mhs" class="form-control" required disabled>
                            <option value="" hidden></option>
                            <?php foreach ($tb_mhs as $key => $value) : ?>
                                <option value="<?=$value->id_mhs?>" <?=$tb_sempro->id_mhs == $value->id_mhs ?
                                    'selected' : null ?>><?=$value->nama_mhs?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ketua Penguji</label>
                        <input type="text" name="penguji_sempro" value="<?=$tb_sempro->penguji1_sempro?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 1</label>
                        <input type="text" name="penguji2_sempro" value="<?=$tb_sempro->penguji2_sempro?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Dosen Pembimbing 2</label>
                        <input type="text" name="penguji3_sempro" value="<?=$tb_sempro->penguji3_sempro?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Nama  *</label>
                        <select name="id_ruangan" class="form-control" required disabled>
                            <option value="" hidden></option>
                            <?php foreach ($tb_ruangan as $key => $value) : ?>
                                <option value="<?=$value->id_ruangan?>" <?=$tb_sempro->id_ruangan == $value->id_ruangan ?
                                    'selected' : null ?>><?=$value->nama_ruangan?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal_sempro" value="<?=$tb_sempro->tanggal_sempro?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" name="jam_sempro" value="<?=$tb_sempro->jam_sempro?>" class="form-control" required autofocus>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Submit</i></button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>




