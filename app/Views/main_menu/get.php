<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Main Menu</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Main Menu</h1>
    </div>

    <div class="section-body">
      
      <div class="card">
      <div class="card-header">
        <h4>Data Dosen</h4>
      </div>
    <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody>
              <tr>
                <th>#</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Handphone</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              <?php foreach ($tb_dosen as $key => $value) : ?> 
              <tr>
                <td><?=$key + 1?></td>
                <td><?=$value->nidn_dosen?></td>
                <td><?=$value->nama_dosen?></td>
                <td><?=$value->alamat_dosen?></td>
                <td><?=$value->nohp_dosen?></td>
                <td><?=$value->email_dosen?></td>
                <td>
                  <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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