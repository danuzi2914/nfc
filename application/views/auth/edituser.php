<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
              <h1 class="h3 mb-0 800">ADD DATA</h1>
              <br>
               <p>Masukan data customer dengan kartu RFID (KTM/KIP)</p>
              <a role="button" class="btn btn-warning"  href="<?php echo base_url('auth/user')?>"><i class="fas fa-undo"></i> Back</a>
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
                  <?php foreach ($user as $u) { ?>
                  <form action="<?php echo base_url('auth/updateU')?>" method="post">
                    <div class="form-group">
                      <input class="form-control" name="user_id" value="<?php echo $u->user_id ?>" type="hidden">
                      <b><label>SCAN KIP/KTM *</label>
                      <input class="form-control form-control-user" name="uid" value="<?php echo $u->uid ?>" id="uid" autofocus placeholder="TAP KARTU RFID KTM/KIP">
                    </div><br>
                     <div class="form-group">
                      <label>NIM/NIP *</label>
                      <input class="form-control" name="nimnip" value="<?php echo $u->nimnip ?>" id="nimnip" type="text" placeholder="Masukan NIP DOSEN/TENDIK atau NIM MAHASISWA">
                    </div><br>
                     <div class="form-group">
                      <label>NAME *</label>
                      <input class="form-control" name="name" value="<?php echo $u->name ?>" id="name" type="text" placeholder="Masukan Nama Lengkap">
                    </div><br>
                     <div class="form-group">
                      <label>NO.HP *</label>
                      <input class="form-control" name="nohp" value="<?php echo $u->nohp ?>" id="nohp" type="text" placeholder="Masukan No.HP / Whatsapp">
                    </div><br>
                     <div class="form-group">
                      <label>TYPE USER *</label>
                      <select name="typeuser" class="form-control" value="<?php echo $u->typeuser ?>">
                        <option value=""> - Silahkan Pilih -</option>
                        <option value="1" <?=set_value('typeuser') == 1 ? "selected" : null ?>>  DOSEN </option>
                        <option value="2" <?=set_value('typeuser') == 2 ? "selected" : null ?>>  TENDIK </option>
                        <option value="3" <?=set_value('typeuser') == 3 ? "selected" : null ?>>  MAHASISWA </option>
                      </select><br>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"></i> SAVE
                      </button>
                      <button type="reset" class="btn btn-warning">RESET</button>
                    </div>
                    </div>
                    </b>
                  </form>
                    <?php } ?>
                </div>
                
              </div>
              
            </div>
</div>
</div>
</div>
</div>
