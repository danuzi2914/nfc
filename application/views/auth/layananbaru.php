<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Layanan Baru</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
               <h4>Masukan data layanan</h4>
               <br>
               <a role="button" class="btn btn-warning"  href="<?php echo base_url('auth/viewlayanan')?>"><i class="fas fa-undo"></i> Back</a>
               <div id="tambahuser" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                  </div>
                </div>
              </div>
            <div class="card-body">
          <div class="modal-body table-responsive">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?php echo base_url('auth/addlayanan ')?>" method="post">
                     <div class="form-group">
                      <label>Tambah Layanan *</label>
                      <input class="form-control" name="namalayanan" id="namalayanan" type="text" placeholder="Masukan Nama Layanan" autofocus>
                    </div><br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"></i> SAVE
                      </button>
                      <button type="reset" class="btn btn-warning">RESET</button>
                    </div>
                    </div>
                    </b>
                  </div>
                  </form>
        </div>                    
</div>
</div>
</div>
</div>

</div>