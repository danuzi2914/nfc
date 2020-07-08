<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LAYANAN</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
              <h1 class="h3 mb-0 800">ADD DATA</h1>
              <br>
               <p>Masukan data layanan dengan kartu RFID (KTM/KIP)</p>
              <a role="button" class="btn btn-warning"  href="<?php echo base_url('auth/layananmasuk')?>"><i class="fas fa-undo"></i> Back</a>
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
                        <form action="<?php echo base_url('auth/inputdatalayanan')?>" onkeyup="changedata ()" method="post">
                    <div class="form-group">
                      <b><label>SCAN KIP/KTM *</label>
                      <input class="form-control form-control-user" name="uid" id="uid" autofocus placeholder="TAP KARTU RFID KTM/KIP">
                    </div><br>
                     <div class="form-group">
                      <label>NIM/NIP *</label>
                      <input class="form-control" name="nimnip" id="nimnip" type="text" readonly>
                    </div><br>
                     <div class="form-group">
                      <label>NAME *</label>
                      <input class="form-control" name="name" id="name" type="text" readonly>
                    </div><br>
                     <div class="form-group">
                      <label>NO.HP *</label>
                      <input class="form-control" name="nohp" id="nohp" type="text" readonly>
                    </div><br>
                     <div class="form-group">
                      <label>LAYANAN *</label>
                      <select name="namalayanan" class="form-control">
                        <option value=""> - Silahkan Pilih -</option>
                              <option value="1" <?=set_value('namalayanan') == 1 ? "selected" : null ?>>Layanan instalasi dan aktivasi Windows</option>
                              <option value="2" <?=set_value('namalayanan') == 2 ? "selected" : null ?>>Layanan instalasi dan aktivasi Office</option>
                              <option value="3" <?=set_value('namalayanan') == 3 ? "selected" : null ?>>Layanan instalasi dan aktivasi Minitab</option>
                              <option value="4" <?=set_value('namalayanan') == 4 ? "selected" : null ?>>Layanan instalasi dan aktivasi Wolfram</option>
                              <option value="5" <?=set_value('namalayanan') == 5 ? "selected" : null ?>>Layanan instalasi dan aktivasi SAS</option>
                              <option value="6" <?=set_value('namalayanan') == 6 ? "selected" : null ?>>Layanan instalasi dan aktivasi ESRI</option>
                              <option value="7" <?=set_value('namalayanan') == 7 ? "selected" : null ?>>Layanan instalasi dan aktivasi Autocad</option>
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
                  </div>
                  </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
  function changedata(){
    var uid = $('#uid').val();
    var link='<?php echo base_url()?>index.php/auth/getData/'+uid;
    $.ajax({
        type : "GET",
        url  : link,
        dataType : "JSON",
        async:true,
        success: function(success){
          for(var i=0; i<success.length; i++)
          {
          var data = success[i];
            document.getElementById('nimnip').value=data.nimnip;
            document.getElementById('name').value=data.name;
            document.getElementById('nohp').value=data.nohp;
          }
          // $.each(data,function(uid,nimnip,name,nohp){
          //   $('[name="nimnip"]').val(data.nimnip);
          //   $('[name="name"]').val(data.name);
          //   $('[name="nohp"]').val(data.nohp);
          // });
        }
      });
  }
</script>
