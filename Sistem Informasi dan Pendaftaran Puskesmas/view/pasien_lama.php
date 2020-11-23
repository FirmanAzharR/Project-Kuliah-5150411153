<?php   
include 'config/koneksi.php';
$cek = mysqli_query($koneksi,"SELECT status_antrian FROM status_antrian");
$antrian = $cek->fetch_assoc();

if ($antrian['status_antrian']=='Berjalan') {
  ?>
  <br>
  <br>
  <br>
  <div class="container" align="center">
    <div class="upper-section">
      <h2 align="center">Pendaftaran Pasien Lama</h2>
    </div>
    <br><br>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4">
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="panel" id="cek">
          <div class="panel-heading" style="background-color:#205E32;">
            <h3 align="center" style="color:white;">Cek Pendaftaran</h3>
          </div>
          <div class="panel-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <div class="text-left">
                  No. RM
                </div>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">RM00</span>
                  <input type="number" class="form-control" id="rm" name="rm" placeholder="Nomor RM Anda" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="text-left">
                  Tanggal Lahir
                </div>
                <div class='input-group date tgl' data-date="" data-date-format="yyyy-mm-dd">
                  <input type='date'id='tgllhr' name="tgl_lahir" class="form-control tanggal" aria-describedby="img-addon" placeholder="yyyy-mm-dd" required>
                  <span class="input-group-addon" id="img-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <br>
              <button type="button" class="form-control btn" id="cekregistrasi" style="background-color:#205E32; color:white;" name="cek_pendaftaran">Cek</button>
            </div>
          </form>
        </div>
        <br>
      <br>
      <br>
      <br>
      </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('#cekregistrasi').click(function(){
          var norm = $('#rm').val();
          var tgl = $('#tgllhr').val();
          $.ajax({
            url:'process/cek_pasien_lama.php',
            type:'POST',
            data:{norm:norm,tgl:tgl},
            success:function(response){
              if (response==1) {

                swal({
                  title: "Anda Masih Memiliki Antrian!",
                  text: "No RM :"+norm+" Masih Memiliki Antrian",
                  icon: "warning",
                  button: "Oke",
                });
              }
              else if(response==2){
                swal({
                  title: "Anda Belum Terdaftar Sebagai Pasien",
                  text: "Silahkan Melakukan Pendaftaran Pasien Baru",
                  icon: "error",
                  button: "Oke",
                });
              }
              else{

                $.post('view/daftar_pasien_lama.php',{ myData: norm },function(data, status) {
                  $('#konten').html(data);
                });
              }          
            }
          })
        })
      });
    </script>

  <?php } else{?>
    <div class="panel">
      <div class="panel-heading" style="background-color:#205E32;">
        <h3 align="center" style="color:white;">Informasi Pendaftaran Pasien Berobat Puskesmas Bansari</h3>
      </div>
      <div class="panel-body">
        Mohon maaf untuk pendaftaran pasien berobat puskesmas bansari untuk saat ini sedang ditutup.
      </div>
    </div>
  <?php } ?>

