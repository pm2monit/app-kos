<?= $this->extend("layout/layout") ?>

<?= $this->section("content") ?>
<div class="page-heading">
    <h3>Data Master Kamar</h3>
</div>

<div class="page-content">
  <section class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header">
          <div class="btn-group float-end" role="group">
            <?php // echo "<a href='" .site_url('dashboard/master/penghuni_add'). "' class='btn btn-primary float-right btn-flat'  id='Tambah'><i class='fa fa-plus fa-fw'></i> Tambah Data </a>"; ?>
            <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i>   <?= lang('App.new') ?></button>
          </div>
        </div>

        <div class="card-body">
        <table id="data_table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Kode pemilik</th>
                <th>Harga</th>
                <th>Harga semesteran</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Status isi</th>
                <th></th>
              </tr>
            </thead>
        </table>
        </div>

      </div>
    </div>
  </section>
</div>

      


  <?= $this->endSection() ?>
