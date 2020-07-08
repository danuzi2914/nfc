<div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Admin</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
               <h4>Masukan data staf</h4>
               <br>
               <a role="button" class="btn btn-warning"  href="<?php echo base_url('auth/admin')?>"><i class="fas fa-undo"></i> Back</a>
             </div>
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg">
            <div class="p-4">
              <div class="text-center">
                
              </div>
              <form class="user" method="post" enctype="multipart/form-data" action="<?php echo base_url('auth/daftar')?>">
                  <div class="form-group">
                    <input type="text" class="form-control " id="name" name="name" placeholder="Full Name" value="<?= set_value ('name');?>" autofocus>
                  <?= form_error ('name','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                <div class="form-group">
                  <input type="email" class="form-control " id="email" name="email" placeholder="Email ITB" value="<?= set_value ('email');?>">
                  <?= form_error ('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No HP atau Whatsapp" value="<?= set_value ('nohp');?>">
                  <?= form_error ('nohp','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control " id="password1" name="password1" placeholder="Password">
                    <?= form_error ('password1','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control " id="password2"  name="password2" placeholder="Repeat Password">
                  </div><br>
                </div>

                <div class="custom-file">
                  <label class="custom-file-label" for="image"><b>Upload Foto</b></label>
                  <input type="file" class="custom-file-input " id="image">
                </div>
                <br><br><!-- <center>
                  <label><b>Upload Foto</b></label>
                  <input class="form-control" type="file" id="image" name="image"></center>
                </div> -->
                <button type="submit" class="btn btn-success  btn-block">
                  Register Account
                </button>
                <br>
              </form>
            </div>
          </div>
        </div>

        
      
  <!-- Begin Page Content -->
<!--  -->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){

    $('#submit').submit(function(e){
      e.preventDefault();
      $.ajax({
        url:'<?php echo base_url()?>index.php/auth/proses_upload',
        type:"post",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(data){
          alert("upload image berhasil");
        }
      })
    })
  })
</script>

         