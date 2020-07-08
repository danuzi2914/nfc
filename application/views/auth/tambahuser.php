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
                  <form action="<?php echo base_url('auth/adduser')?>" method="post">
                    <div class="form-group">
                      <b><label>SCAN KIP/KTM *</label>
                      <input class="form-control form-control-user" name="uid" value="<?=set_value('uid')?>" id="uid" autofocus placeholder="TAP KARTU RFID KTM/KIP">
                    </div><br>
                     <div class="form-group">
                      <label>NIM/NIP *</label>
                      <input class="form-control" name="nimnip" value="<?=set_value('nimnip')?>" id="nimnip" type="text" placeholder="Masukan NIP DOSEN/TENDIK atau NIM MAHASISWA">
                    </div><br>
                     <div class="form-group">
                      <label>NAME *</label>
                      <input class="form-control" name="name" value="<?=set_value('name')?>" id="name" type="text" placeholder="Masukan Nama Lengkap">
                    </div><br>
                     <div class="form-group">
                      <label>NO.HP *</label>
                      <input class="form-control" name="nohp" value="<?=set_value('nohp')?>" id="nohp" type="text" placeholder="Masukan No.HP / Whatsapp">
                    </div><br>
                     <div class="form-group">
                      <label>TYPE USER *</label>
                      <select name="typeuser" class="form-control">
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
                  
                </div>
                
              </div>
              
            </div>

<!-- <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <label class="control-label" for="nm_software" class="col-sm-2">SCAN KTM/KIP</label>
                            <input class="form-control form-control-user" name="nm_software" id="nm_software" autofocus placeholder="TAP KARTU RFID KTM/KIP"><br>
                            <label class="control-label" for="nm_software">NIM</label>
                            <input type="text" name="nm_software" class="form-control" id="nm_software" required=""><br>
                            <label class="control-label" for="nm_software">NAMA</label>
                            <input type="text" name="nm_software" class="form-control" id="nm_software" required=""><br>
                            <label class="control-label" for="nm_software">NO.HP</label>
                            <input type="text" name="nm_software" class="form-control" id="nm_software" required=""><br>
                            <label class="control-label" for="nm_software">LAYANAN</label>
                            <select name="layanan" class="form-control">
                              <option value="">- Silahkan Pilih -</option>
                              <option value="">Layanan instalasi dan aktivasi Windows</option>
                              <option value="">Layanan instalasi dan aktivasi Office</option>
                              <option value="">Layanan instalasi dan aktivasi Minitab</option>
                              <option value="">Layanan instalasi dan aktivasi Wolfram</option>
                              <option value="">Layanan instalasi dan aktivasi SAS</option>
                              <option value="">Layanan instalasi dan aktivasi AutoCad</option>
                            </select>
                            <br>
                            <br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan"><i class="fas fa-plus-square"></i> SIMPAN</button>
                          </div>
                        </div> 
                        </div>
                      </form> -->
</div>
</div>
</div>
</div>
