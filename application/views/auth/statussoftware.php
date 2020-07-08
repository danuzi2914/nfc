        <!-- Begin Page Content -->
     <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard    <small>Software</small></h1>
          </div>

          <!-- Content Row -->
                <div class="card-header bg-info text-light shadow h-100 py-2">
            <div class="col-md-12 text-center">
              <div class="callout callout-info">

        <?php
date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
echo $timestamp = date('l, d F Y');//Menampilkan Jam Sekarang
?>

<script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
<h1 id="timestamp" ></h1>

              </div>
            </div>
          </div><br>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-primary text-uppercase mb-2">WINDOWS</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l1; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-warning text-uppercase mb-1 bg-yellow">OFFICE</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l2; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

               <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-success text-uppercase mb-1">MINITAB</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l3; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-danger text-uppercase mb-1">WOLFRAM MATHEMATICA</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l4; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-primary text-uppercase mb-1">SAS</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l5; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-success text-uppercase mb-1">ESRI</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l6; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

           <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-danger text-uppercase mb-1">AUTOCAD</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $l7; ?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
      </div>
      <!-- End of Main Content -->
            <!-- End of Main Content -->
      <script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'ajax_timestamp.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script>