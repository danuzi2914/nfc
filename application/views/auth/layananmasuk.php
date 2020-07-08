<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Layanan Masuk</h1>
  </div>
<!-- <div class="card shadow mb-4">
            <div class="card-header py-4">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-square"></i> TAMBAH</button>   
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#report"><i class="fas fa-file-alt"></i> REPORT</button>
           <div id="tambah" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                        <h4 class="modal-title" align="align-items-center"><b>FORM Layanan</b></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                  
                      <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label class="control-label" for="nm_software">SCAN KTM/KIP</label>
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
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-body">
          <div class="modal-body table-responsive"> -->
<!-- Begin Page Content -->
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
              <h1 class="h3 mb-0 800">Layanan</h1>
              <br>
               <p>Data layanan yang sudah terdaftar</p>
              <a role="button" class="btn btn-light"  href="<?php echo base_url('auth/tambahlayanan')?>"><i class="fas fa-user-plus"></i> ADD DATA</a>
                <a role="button" class="btn btn-warning"  href="<?php echo base_url('auth/pdf')?>"><i class="fas fa-print"></i> LAPORAN</a>
               <div id="tambahuser" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                  </div>
                </div>
              </div>
            <div class="card-body">
          <div class="modal-body table-responsive">
<table class="table table-bordered table-striped" id="dataTable" style="width: 100%">
<thead class="thead-light">
    <tr>
      <th scope="col"><center>#</th>
      <th scope="col"><center>UID</th>
      <th scope="col"><center>NIM/NIP</th>
      <th scope="col"><center>NAMA</th>
      <th scope="col"><center>NO.HP</th>
      <th scope="col"><center>LAYANAN</th>
      <th scope="col"><center>WAKTU</th>
      <th scope="col"><center>STATUS</th>
      <th scope="col"><center>AKSI</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $no = 1;
    foreach ($data as $b) { ?>
      <tr>
        <td><?php echo $no; ?>.</td>
        <td><center><?php echo $b['uid'];?></td>
        <td><center><?php echo $b['nimnip'];?></td>
        <td><?php echo $b['name'];?></td>
        <td><center><?php echo $b['nohp'];?></td>
        <td><?php echo $b['namalayanan'];?></td>
        <td><center><?php echo $b['wkt_layanan'];?></td>
      <?php 
      if ($b['status']== 0) { ?>
         <td align="center"><span class="btn-sm badge-info">New</span></td> <?php }

      else if ($b['status']== 1) { ?>
         <td align="center"><span class="btn-sm badge-warning">In Progres</span></td> <?php } 
      else if ($b['status']== 2) { ?>
         <td align="center"><span class="btn-sm badge-success">Resolved</span></td> <?php } 
      else if ($b['status']== 3) { ?>
         <td align="center"><span class="btn-sm badge-danger">Closed</span></td> <?php } ?>
           <td style="width: 12%">
        <a onclick="gantisatus('<?php echo $b['t_layanan_id'];?>')" class="btn btn-primary btn-sm text-white"><i class="fa fa-wrench"></i>  Aksi</a>
        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
    
       

       <!--  <center><select name="status" class="form-control"> -->
   <!--      <option>  Pilih Aksi </option>
        <option style="width: 22%" value="1" <?=set_value('status') == 1 ? "selected" : null ?> >  In Progres  </option>
        <option value="2" <?=set_value('status') == 2 ? "selected" : null ?> >  Resolved  </option>
        <option value="3" <?=set_value('status') == 3 ? "selected" : null ?> >  Closed  </option>
        </select></center></td> -->
        <!-- <div class="btn-group" role="group">
          <button id="status" type="button" class="btn btn-primary" data-toggle="modal" aria-haspopup="true" aria-expanded="false" onchange="changedata ()" method="post" data-target="#exampleModalLong" >Aksi</button>
          <div class="dropdown-menu" aria-labelledby="status"> -->
       <!--      <a  class="dropdown-item" name="status" href="<?php echo base_url('auth/inputdatalayanan')?>" ><i class="btn-sm badge-warning">In Progress</a></i>  
          <a  class="dropdown-item"><i class="btn-sm badge-success">  Resolve</a></i>
          <a  class="dropdown-item"><i class="btn-sm badge-danger">  Closed</a></i> -->
          </div>
        
      </div>
    </div></td>
    </tr>
    <?php
     $no++;
      }
     ?>
 
  </tbody>
</table>
<div class="box">
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
</div>
</div>
</div>
</div>
</div> 
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?php echo base_url('auth/prosesStatus') ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">AKSI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <center><select name="status" class="form-control">
        
        <option>  Pilih Aksi </option>
        <option style="width: 22%" value="1" <?=set_value('status') == 1 ? "selected" : null ?> >  In Progres  </option>
        <option value="2" <?=set_value('status') == 2 ? "selected" : null ?> >  Resolved  </option>
        <option value="3" <?=set_value('status') == 3 ? "selected" : null ?> >  Closed  </option>
        </select></center></td>
      <input type="hidden" id="idhidden" name="idhidden">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
     
      </div>
    </div>
     </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var lid;
  function gantisatus(id){
    
    $('#exampleModalLong').modal('show');
    document.getElementById("idhidden").value=id;
  }
</script>