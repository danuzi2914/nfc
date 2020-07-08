<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Admin</h1>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-4 bg-info text-white">
              <h1 class="h3 mb-0 800">Administrator</h1>
              <br>
               <p>Data Admin yang telah terdaftar</p>
              <a role="button" class="btn btn-light"  href="<?php echo base_url('auth/registration')?>"><i class="fas fa-user-plus"></i> ADD DATA</a>
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
      <th scope="col">NAMA</th>
      <th scope="col">EMAIL</th>
      <th scope="col">NO.HP</th>
      <th scope="col">PHOTO</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     foreach ($data as $b) {?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $b['name']; ?></td>
      <td><?php echo $b['email']; ?></td>
      <td><?php echo $b['nohp']; ?></td>
      <td>
        <img src="<?php echo base_url('./assets/img/'); ?><?php echo $b['image'];?>" ></td> 
      <td style="width: 15%">
        <a href="<?php echo base_url('')?>auth/editA/<?php echo $b['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('') ?>auth/deleteAdmin/<?php echo $b['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i>  Delete</a>
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

