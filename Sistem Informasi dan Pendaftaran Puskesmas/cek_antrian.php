<?php include 'config/koneksi.php'; ?>
<div id="konten" style="margin-top: 50px;padding: 20px">
  <br><br>
  <h2 align="center">ANTRIAN</h2>
  <br>
  <br>
  <div class="row">
    <div class="col-md-4">
      <center>
        <div class="panel">
          <div class="panel-heading" style="background-color:#205E32;">
            <h2 align="center" style="color:white;">Cek Status Antrian</h2>
          </div>
          <div class="panel-body">
            <div class="row" id="cekantrian">
              <div>
                <form>
                  <br><br>
                  <div class="form-group">
                    <div class="text-left">
                      Silahkan masukkan No. RM Anda
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">RM00</span>
                      <input type="number" class="form-control" id="rm" name="rm" placeholder="Nomor RM Anda" aria-describedby="basic-addon1">
                    </div>
                    <br>
                    <br>
                    <br>
                    <a href="#" type="buttton" class="btn btn-success" id="cek"><i class="fa fa-check"></i> Cek</a>
                    <a href="index.php?halaman=lupa_rm" type="buttton" class="btn btn-danger" id="lupa">Lupa No RM</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </center>
    </div>
    <div class="col-md-4">
      <center>
        <div class="panel">
          <div class="panel-heading" style="background-color:#205E32;">
            <h2 align="center" style="color:white;">Antrian BP Umum</h2>
          </div>
          <div class="panel-body">
            Antrian saat ini
            <div class="row" id="cekantrian">
              <?php 
              $bpumum = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND status='Selesai' ORDER BY(no_antrian) DESC LIMIT 1");
             
              $jml = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum'");
              $jml2 = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum'  AND status='Belum Selesai' OR status='Tunda'");
              
              $total = $jml->num_rows;
              
              $sisa = $jml2->num_rows;
              $cek1 = $bpumum->num_rows;
              $x1 = $bpumum->fetch_assoc();
              ?>
              <label style="font-size: 100px" id="antrian_sekarang">
                <?php 
                if($cek1==0){
                  echo 0;
                }else{
                  echo $x1['no_antrian'];
                }
                echo "<br>";
	echo "<div style='font-size:15px'>
	<label>Jumlah antrian :  $total </label>
	<br>
	<label>Sisa antrian : $sisa </label>
	</div>";
                ?>
              </label>
              <center>
                <button type="button" class="form-control btn" style="background-color:#205E32; color:white;margin-bottom: 7px" id="refresh"><i class="fa fa-refresh"></i> Refresh</button>
              </center>
            </div>
          </div>
        </div>
      </center>
    </div>
    <div class="col-md-4">
      <center>
        <div class="panel">
          <div class="panel-heading" style="background-color:#205E32;">
            <h2 align="center" style="color:white;">Antrian BP Gigi</h2>
          </div>
          <div class="panel-body">
            Antrian saat ini
            <div class="row" id="cekantrian">
              <?php 
              $bpgigi = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND status='Selesai' ORDER BY(no_antrian) DESC LIMIT 1");
              
              $jml_g = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi'");
              $jml2_g = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi'  AND status='Belum Selesai' OR status='Tunda'");
              
              $total_g = $jml_g->num_rows;
              
              $sisa_g = $jml2_g->num_rows;
              
              $cek = $bpgigi->num_rows;
              $x = $bpgigi->fetch_assoc();
              ?>
              <label style="font-size: 100px" id="antrian_sekarang2">
                <?php 
                if($cek==0){
                  echo 0;
                }else{
                  echo $x['no_antrian'];
                }
                 echo "<br>";
	echo "<div style='font-size:15px'>
	<label>Jumlah antrian :  $total_g </label>
	<br>
	<label>Sisa antrian : $sisa_g </label>
	</div>";
                ?>
              </label>
              <center>
                <button type="button" class="form-control btn" style="background-color:#205E32; color:white;margin-bottom: 7px" id="refresh2"><i class="fa fa-refresh"></i> Refresh</button>
              </center>
            </div>
          </div>
        </div>
      </center>
    </div>
  </div>
  <br><br>
  <br><br>
  <br><br>
</div>
</div>

<script>
  $(document).ready(function(){ 
    $('input').attr("autocomplete","off");

    $('#refresh').click(function(e){
      var tujuan = 'bpumum';
      $.post('process/antrian_sekarang.php',{ tujuan:tujuan },function(data, status) {
        $('#antrian_sekarang').html(data);
      });
    });

    $('#refresh2').click(function(e){
      var tujuan = 'bpgigi';
      $.post('process/antrian_sekarang.php',{ tujuan:tujuan },function(data, status) {
        $('#antrian_sekarang2').html(data);
      });
    });


    //cek
    $('#cek').click(function(){
      var norm = $('#rm').val();
      $.ajax({
        url:'process/cek_rm.php',
        type:'POST',
        data:{norm:norm},
        success:function(response){
          if (response=="ada") {

            $.post('view/status_antrian.php',{ norm:norm },function(data, status) {
              $('#konten').html(data);
            });

          }
          else if(response=="tidak"){
            swal({
              title: "Anda Belum Registrasi Pasien Berobat",
              text: "Silahkan Melakukan Pendaftaran Terlebih Dahulu",
              icon: "warning",
              button: "Oke",
            });
          }        
        }
      })
    })

  })
</script>
