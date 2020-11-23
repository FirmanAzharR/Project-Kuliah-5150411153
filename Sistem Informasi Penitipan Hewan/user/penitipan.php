<?php
$id=$_GET['id'];
$qry = mysqli_query($koneksi,"SELECT*FROM stok_kandang WHERE nama='kucing';");
$dt = $qry->fetch_assoc();
$qry1 = mysqli_query($koneksi,"SELECT*FROM stok_kandang WHERE nama='anjing';");
$dt1 = $qry1->fetch_assoc();

$stok_kucing = $dt['sisa'];
$stok_anjing = $dt1['sisa'];
?>

<div class="container" style="padding-left:60px;padding-right: 60px ">
  <?php if($stok_kucing>0||$stok_anjing>0){?>
    <center>
      <label style="color: white; font-weight: bold; font-size: 22px">Transaksi Penitipan Hewan</label>
    </center>
    <center>
      <div class="alert alert-primary" role="alert">
        Stok Kandang Kucing Masih Tersedia : <label style="font-weight: bold"><?php echo $stok_kucing; ?></label> Buah
        <br>
        Stok Kandang Anjing Masih Tersedia : <label style="font-weight: bold"><?php echo $stok_anjing; ?></label> Buah
      </div>
    </center> 
    <div id="konten">
      <br>
      <div id="waktu">
        <span class="start">7:30 am</span> - 
        <span class="end">10:30 pm</span>
        <span id="display"></span>
      </div>
      <div id="transaksi" class="open">
        <input type="hidden" id="id" value="<?php echo $id ?>">
        <label style="color: white;">Tanggal Penitipan</label>
        <div class="form-group">
          <input type="date" class="form-control" id="tgl_titip" autocomplete="off">
        </div>
        <label style="color: white;">Tanggal Pengambilan</label>
        <div class="form-group">
          <input type="date" class="form-control" id="tgl_ambil" autocomplete="off">
        </div>
        <button class="btn btn-icon btn-3 btn-success" id="lanjut" type="button">
          <span class="btn-inner--icon"><i class="ni ni-user-run"></i></span>
          <span class="btn-inner--text">Lanjutkan Transaksi</span>
        </button>
        <br>
        <br>
        <center>
          <div id="notif"></div>
        </center> 
      </div>
      <div class="closed" align="center">
        <div class="alert alert-warning" role="alert">
          <h4 style="color: white">Penitipan buka jam : 07.30 AM - 09.30 PM</h4>
        </div>
      </div>
    </div>
  <?php }elseif($stok_kucing==0&$stok_kucing==0) { ?>
    <br><br><br><br>
    <center>
      <div class="alert alert-danger" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-bag-17"></i></span>
        <span class="alert-inner--text"><strong id="total">Mohon Maaf Untuk Saat ini Stok Kandang Kucing dan Anjing Habis</strong></span>
      </div>
    </center>
    <div lass="closed">
      <div class="alert alert-warnig" role="alert">
        <label style="color: white">Penitipan buka jam : 07.30 AM - 09.30PM</label>
      </div>
    </div>
  <?php } ?>

  <center>
    <div class="alert alert-warning" role="alert">
      <label style="font-weight: bold; font-style: italic">Keterangan</label>
      <label style="font-style: italic">Transaksi Penitipan akan dibatalkan apabila anda tidak datang ke Toko Griya Satwa pada tanggal penitipan.</label>
    </center> 
  </div>


  <script type="text/javascript">
    $(document).ready(function(){

      $('#waktu').hide();

      $('#lanjut').on('click',function(){
        var titip = $('#tgl_titip').val(); 
        var ambil = $('#tgl_ambil').val();
        $('#titip').val(titip);
        var id = $('#id').val();
        $.ajax({
          url:'proses/simpan_transaksi.php',
          type:'post',
          data:'tgl_titip='+titip+'&id='+id+'&tgl_ambil='+ambil,
          success:function(response){

            if (response!=0) {
              window.location.href= 'index.php?halaman=detail&id='+id+'&trx='+response;
            } else if (response=='gagal'){
              swal({
                title: 'Transaksi Gagal',
                type: 'error',
                showConfirmButton: true,
              });  
            } else{
              $('#notif').html(response);  
            }

          }
        })
      })
    })
  </script>

  <script type="text/javascript">
    var da = new Date();
    document.getElementById("display").innerHTML = da.toDateString();

    var x = document.getElementsByClassName("start")[0].innerText;
    var z = document.getElementsByClassName("end")[0].innerText;

    var startTime = Date.parseExact(x, "h:mm tt");
    var endTime = Date.parseExact(z, "h:mm tt");

    if (da.between(startTime, endTime)){
      $(".open").show();
      $(".closed").hide();
    }
    else {  
      $(".closed").show();
      $(".open").hide();
    }
  </script>