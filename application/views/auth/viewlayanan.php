<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Layanan Helpdesk</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
              <h1 class="h3 mb-0 800">Layanan</h1>
              <br>
               <p>Data Layanan yang telah terdaftar</p>
              <a role="button" class="btn btn-light"  href="<?php echo base_url('auth/Layananbaru')?>"><i class="fas fa-user-plus"></i> ADD DATA</a>
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
      <th scope="col">No</th>
      <th scope="col">Nama Layanan</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     foreach ($data as $b) {?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $b['namalayanan']; ?></td>
       <td style="width: 15%">
        <a href="<?php echo base_url('')?>auth/editL/<?php echo $b['layanan_id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('') ?>auth/deleteLayanan/<?php echo $b['layanan_id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i>  Delete</a>
      </td>
    </tr>
    <?php
     $no++;}
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

