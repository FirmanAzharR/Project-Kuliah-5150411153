<?php 
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
else{
  include '../config/koneksi.php'; 
  $username = $_SESSION['username'];  
  $query=mysqli_query($koneksi,"SELECT id_user as id FROM user WHERE username='$username';");
  $dt=$query->fetch_assoc();
  $id=$dt['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    User
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="./assets/checkbox/dist/pretty-checkbox.min.css" rel="stylesheet" />
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/jquery/jquery.toast.js"></script>
  <script src="./assets/numerik/autoNumeric.js"></script>
  <script src="./assets/js/datejs/build/date.js"></script>
  <script src="./assets/js/datejs/build/date-id-ID.js"></script>
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <img src="./assets/img/brand/blue-brand.png" style="width: 200px;">
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg
                ">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="#" id="profil" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item" onclick="logout();">
              <i class="ni ni-user-run"></i>
              <span >Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <script type="text/javascript">
        function logout(){
          swal({
            title: 'Logout ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.value) {
              swal(
                'Berhasil',
                '',
                'success'
                ).then(function() {
                  window.location = "index.php?halaman=logout";
                });
              }
            })
        }
      </script>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <img src="./assets/img/brand/blue-brand.png">
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="index.php?halaman=dashboard&id=<?php echo $id; ?>">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=penitipan&id=<?php echo $id; ?>">
              <i class="ni ni-shop text-pink"></i> Penitipan Hewan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=transaksi&id=<?php echo $id; ?>">
              <i class="ni ni-bullet-list-67 text-orange"></i>Riwayat Transaksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=help">
              <i class="ni ni-bulb-61 text-success"></i>Bantuan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=about">
              <i class="ni ni-app text-primary"></i>About App
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link " href="index.php?halaman=logout">
              <i class="ni ni-button-power text-primary"></i>Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <input type="hidden" id="idhide" value="<?php echo $id ?>">
          <div id="load">
            <?php 
            if(!isset($_GET['halaman'])) {
              include 'dashboard.php';
            }
            else{
              if ($_GET['halaman']=="dashboard") {
                include 'dashboard.php';
              }
              elseif($_GET['halaman']=="logout"){
                include 'logout.php';
              }
              elseif($_GET['halaman']=="penitipan"){
                include 'penitipan.php';
              }
              elseif($_GET['halaman']=="transaksi"){
                include 'transaksi.php';
              }
              elseif($_GET['halaman']=="tampil_detail"){
                include 'proses/tampil_detail.php';
              }
              elseif($_GET['halaman']=="detail"){
                include 'detail_penitipan.php';
              }  
              elseif($_GET['halaman']=="help"){
                include 'help.php';
              }   
              elseif($_GET['halaman']=="about"){
                include 'about.php';
              }        
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#profil').on('click',function(){
        var id = $('#idhide').val();
        $.ajax({
          url:'profil.php',
          type:'post',
          data:'id='+id,
          success:function(result){
            $('#load').html(result);
          }
        })
      })
    });
  </script>

  <!--   Core   -->
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sweetalert2.all.min.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script>
    window.TrackJS &&
    TrackJS.install({
      token: "ee6fab19c5a04ac1a32a645abde4613a",
      application: "argon-dashboard-free"
    });
  </script>
</body>

</html>