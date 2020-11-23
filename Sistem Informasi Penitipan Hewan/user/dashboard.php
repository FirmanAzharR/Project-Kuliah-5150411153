<h1 style="color: white; margin-top: 0px">Dashboard</h1><hr>
<div class="row">
  <div class="col-md-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Nama</h5>
            <span class="h2 font-weight-bold mb-0">
              <?php 
              $username = $_SESSION['username'];
              $query = mysqli_query($koneksi,'SELECT*FROM user WHERE username = "'.$username.'";');
              $user = $query->fetch_assoc();
              $id = $user['id_user']; 
              echo $user['nama']; 
              ?>
            </span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-muted text-sm">
          <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
          <span class="text-nowrap">Login Sebagai Pengguna</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Jam</h5>
            <span class="h2 font-weight-bold mb-0">
              <div class="clock"></div>
            </span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
              <i class="fas fa-clock"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-muted text-sm">
          <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
          <span class="text-nowrap">(UTC+07:00) Jakarta</span>
        </p>
      </div>
    </div>
  </div>

</div>

<div class="row" style="margin-top: 25px ">
    <div class="col-md-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Tanggal</h5>
            <span class="h2 font-weight-bold mb-0">
              <div id="date"></div>
            </span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
              <i class="fas fa-calendar"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-muted text-sm">
          <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
          <span class="text-nowrap">Sekarang</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Transaksi Terakhir</h5>
            <span class="h2 font-weight-bold mb-0">
              <?php 
              $query2 = mysqli_query($koneksi,'SELECT*FROM transaksi WHERE id_user = "'.$id.'" ORDER BY(id_transaksi) DESC LIMIT 1;');
              $tr = $query2->fetch_assoc();
              if ($query2->num_rows == 0) {
                echo "Belum Ada Transaksi";
              }else{
               echo date('d M Y', strtotime($tr['tgl_titip'])); ?> &nbsp;-&nbsp; <?php echo date('d M Y', strtotime($tr['tgl_ambil']));
             }
             ?>
           </span>
         </div>
         <div class="col-auto">
          <div class="icon icon-shape bg-info text-white rounded-circle shadow">
            <i class="fas fa-tasks"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-muted text-sm">
        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
        <span class="text-nowrap">History</span>
      </p>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  function clock() {// We create a new Date object and assign it to a variable called "time".
  var time = new Date(),

    // Access the "getHours" method on the Date object with the dot accessor.
    hours = time.getHours(),
    
    // Access the "getMinutes" method with the dot accessor.
    minutes = time.getMinutes(),
    
    
    seconds = time.getSeconds();

    document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

    function harold(standIn) {
      if (standIn < 10) {
        standIn = '0' + standIn
      }
      return standIn;
    }
  }
  setInterval(clock, 1000);
</script>

<script type='text/javascript'>
  <!--
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'Jul', 'August', 'September', 'October', 'November', 'December'];
    var myDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    document.getElementById("date").innerHTML=(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
//-->
</script>