<?php 
    ini_set('display_errors', 1);
    include 'config/koneksi.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Diagnosa Mangga</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Bootstrap 4.5-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/front-icon.jpg" alt="" /></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home"><i class="fas fa-home"></i>&nbsp;Beranda</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience"><i class="fas fa-question"></i>&nbsp;Petunjuk</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education"><i class="fas fa-briefcase-medical"></i>&nbsp;Diagnosa</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills"><i class="fas fa-book"></i>&nbsp;Info Penyakit</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests"><i class="fas fa-info"></i>&nbsp;Tentang</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="home">
            <div class="resume-section-content">
                <div style="margin-bottom: 50px">
                    <img src="assets/img/header.png" class="img-fluid" alt="Responsive image">
                </div>
<!--                 <h2 class="mb-0">
                    Sistem Pakar Diagnosa
                    <span class="text-primary">Hama & Penyakit Buah Mangga Mangga</span>
                </h2>
                <div class="subheading mb-5">
                    Dengan Menggunakan Metode Certainty Factor  
                    <a href="#">diagnosamangga.xyz</a>
                </div>
                <p class="lead mb-5" align="justify">
                    Sistem ini merupakan sistem diagnosa penyakit mangga berdasarkan gejala - gejala yang bersangkutan dengan penyakit mangga. perhitungan diagnosa berdasarkan nilai dari pakar yang dihitung dengan metode centainty factor.
                </p> -->
                <div class="social-icons">
                    <!-- GANTI ALAMAT + ICON -->
                    <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">

        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">

        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">

        </section>
        <section class="resume-section" id="detail_penyakit_x">

        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section" id="interests">

        </section>
        <hr class="m-0" />
    
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $('#experience').load('page/petunjuk.php');

            $('#education').load('page/diagnosa.php');

            $('#skills').load('page/infopenyakit.php');

            $('#interests').load('page/tentang.php');
        })

    </script>

</body>
</html>
