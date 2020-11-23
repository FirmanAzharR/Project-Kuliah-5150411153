<div style="padding: 30px">
  <br>
  <h2 align="center">Tentang Kami</h2>
  <br>
  <div class="content-section">
    <div class="row">
      <div class="col-sm-6 col-xs-12 col-md-6">
        <div class="panel">
          <div class="panel-heading" style="background-color:#205E32;">
            <h3 align="center" style="color:white;">Pelayanan</h3>
          </div>
          <div class="panel-body">
            Puskesmas Bansari melayani masyarakat umum, rawat jalan, persalinan dan konsultasi kesehatan.
          </div>
        </div>
        <div class="panel">
          <div class="panel-heading" style="background-color:#205E32;">
            <h3 align="center" style="color:white;">Peta Lokasi</h3>
          </div>
          <div class="panel-body">
            <div class="img-responsive " id="map" style="width:950px;height:400px;background:blue"></div>
            <script>
              function initMap() {
                var uluru = {lat: -7.2879301, lng: 110.0643493};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 18,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1_gITArwIVC44sFBgF-ILu9WJle5DhsQ&callback&callback=initMap">
          </script>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <!-- accordion -->
      <div class="accordion accordion-1 panel-group" >
        <div class="panel panel-default" >
          <div class="panel-heading" style="background-color:#205E32;color: white">
            <h4 class="panel-title about-header active-heading" align="center"> <a data-toggle="collapse" data-parent=".accordion-1" href="#collapseThree-5"> Profil Puskesmas Bansari</a> </h4>
          </div>
          <div id="collapseThree-5" class="panel-collapse collapse in">
            <div class="panel-body">
              <img class="img-fluid img-thumbnail" src="assets/img/puskesmas.jpg" alt="Puskesmas Bansari">
              <br>
              <br>
              Puskesmas Bansari merupakan salah satu Puskesmas di Kecamatan bansari yang secara geografis terletak pada posisi strategis, yaitu di Jl. raya bansari-mojosari , <br><br>
              Wilayah kerja Puskesmas Bansari meliputi 6 desa yaitu desa Bansari, Desa mojosari, Desa candisari, Desa Campuranom, Desa Mranggen, Desa Purborejo.<br><br>
              Wilayah Puskesmas Bansari mempunyai perbatasan sebagai berikut :<br>
              <ol>
                <li>Sebelah barat dengan Desa Bansari.</li>
                <li>Sebelah Selatan dengan  Desa Balesari.</li>
                <li>Sebelah Timur dengan Desa Campuranom</li>
                <li>Sebelah Utara dengan Desa Bansari</li>
              </ol>
              <br>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title about-header"> <a data-toggle="collapse" data-parent=".accordion-1" href="#collapseOne-1"> Motto Pelayanan </a> </h4>
          </div>
          <div id="collapseOne-1" class="panel-collapse collapse">
            <div class="panel-body">
              Kesehatan Dan Kepuasan Anda Adalah Kebahagiaan Kami
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title about-header"> <a data-toggle="collapse" data-parent=".accordion-1" href="#collapseTwo-2"> Visi </a> </h4>
          </div>
          <div id="collapseTwo-2" class="panel-collapse collapse">
            <div class="panel-body">
              Menuju Masyarakat Bansari Yang Sehat
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title about-header"> <a data-toggle="collapse" data-parent=".accordion-1" href="#collapseThree-3"> Misi </a> </h4>
          </div>
          <div id="collapseThree-3" class="panel-collapse collapse">
            <div class="panel-body">
              <ol>
                <li>Memberikan pelayanan kesehatan dasar yang optimal.</li><br>
                <li>Meningkatkan profesionalisme  dalam pelayanan kesehatan..</li><br>
                <li>Mendorong pemberdayaan masyarakat untuk hidup sehat</li><br>
                <li>Dalam mengemban misi tersebut diatas diperlukan adanya komitmen bersama untuk selalu berusaha meningkatkan kepuasan pelanggan dengan melakukan perbaikan mutu secara berkesinambungan.</li><br>

              </ol>

            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title about-header"> <a data-toggle="collapse" data-parent=".accordion-1" href="#collapseThree-4"> Budaya Kerja dan Nilai Organisasi </a> </h4>
          </div>
          <div id="collapseThree-4" class="panel-collapse collapse">
            <div class="panel-body">
              <ol>
                <li>"BANSARI"</li>
                <li>Bersemangat</li>
                <li>Akuntanbel</li>
                <li>Nyaman</li>
                <li>Solid</li>
                <li>Amanah</li>
                <li>Ramah</li>
                <li>ikhlas</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>