 <?php 
 session_start();
 if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Prediksi Kelulusan TI UTY</title>
  <link rel="shortcut icon" href="../assets/img/doc.png">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="../assets/css/float.css" rel="stylesheet">
  <link href="../assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/sweetalert2.all.min.js"></script>
  <script src="../assets/js/Chart.js"></script>

</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style="border-right:2px solid  #ffc400;" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="../assets/img/logo.png" width="23px" style="margin-right: 10px">Teknik Informatika</div>
      <div class="list-group list-group-flush">
        <a href="index.php?halaman=dashboard" class="list-group-item list-group-item-action menu "><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
        <a href="index.php?halaman=datamhs" class="list-group-item list-group-item-action menu"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Kelola Data Mahasiswa</a>
        <a href="index.php?halaman=ujidata" class="list-group-item list-group-item-action menu"><i class="fa fa-database"></i>&nbsp;&nbsp;Naive Bayes</a>
        <!--<a href="index.php?halaman=ujidata2" class="list-group-item list-group-item-action menu"><i class="fa fa-database"></i>&nbsp;&nbsp;K-Nearest Neighbor</a>-->
        <a href="index.php?halaman=prediksi" class="list-group-item list-group-item-action menu"><i class="fa fa-graduation-cap"></i>&nbsp;Prediksi Kelulusan</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn" style="background-color: #0d47a1;color: white" id="menu-toggle"><i class="fa fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?halaman=profil"><i class="fa fa-user-circle-o"></i>&nbsp;Profil</a>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item btn btn-danger" onclick="logout();"><i class="fa fa-sign-out"></i>&nbsp;Logout</button>
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
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div style="padding: 15px">
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
            elseif($_GET['halaman']=="datamhs"){
              include 'data_mhs.php';
            }
            elseif($_GET['halaman']=="ujidata"){
              include 'uji_data.php';
            }
            elseif($_GET['halaman']=="ujidata2"){
              include 'uji_data2.php';
            }
            elseif($_GET['halaman']=="prediksi"){
              include 'prediksi.php';
            }
            elseif($_GET['halaman']=="profil"){
              include 'profil.php';
            }
            
          }
          ?>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <style type="text/css">
    @media screen and (max-width: 600px) {
  .col {
    width: 100%;
  }
}
  </style>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script src="../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
</body>

</html>
