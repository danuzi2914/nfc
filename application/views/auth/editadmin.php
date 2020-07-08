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
              <?php foreach ($admin as $a) { ?>
              <form class="user" method="post" enctype="multipart/form-data" action="<?php echo base_url('auth/updateA')?>">
                  <div class="form-group">
                    <input class="form-control" name="id" value="<?php echo $a->id ?>" type="hidden">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?php echo $a->name ?>" autofocus>
                  <?= form_error ('name','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email ITB"  value="<?php echo $a->email ?>">
                  <?= form_error ('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nohp" name="nohp" placeholder="No HP atau Whatsapp"  value="<?php echo $a->nohp ?>">
                  <?= form_error ('nohp','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div><center>
                  <label><b>Upload Foto</b></label>
                  <input class="form-control" type="file" id="image" name="image" value="<?php echo $a->image ?>"></center>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Update Account
                </button>
                <br>
              </form>
               <?php } ?>
            </div>
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

         