<?php 
include '../../config/koneksi.php'; 
$id = $_POST['myData'];
$qry = mysqli_query($koneksi,'SELECT*FROM transaksi WHERE id_user = "'.$id.'" ORDER BY(id_transaksi) DESC LIMIT 3;');

/*if ($qry->num_rows!=0) {
  $cek_terlambat = mysqli_query($koneksi,'SELECT datediff(CURDATE(),tgl_titip) as terlambat FROM transaksi;');
  $cek=$cek_terlambat->fetch_assoc();
  $x = $cek['terlambat'];
}else{
  $x = 0;
}*/

?>

<!--
<script type="text/javascript">
  //auto delete
  $(document).ready(function(){
   var x = '<?php echo $x; ?>';
   if (x!=0) {
    $.ajax({
      url:'proses/auto_delete.php',
      success:function(response){ 
      }
    })
  }
})
</script>
-->
<br>
<br>
<div class="row">
  <?php foreach ($qry as $key => $value): ?>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body trx" id="<?php echo $value['id_transaksi']; ?>">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-muted mb-0"><?php echo 'Transaksi pada :' ?></h5>
              <span class="h4 font-weight-bold mb-0">
                <div>
                  <?php echo date('d M Y', strtotime($value['tgl_titip'])); ?> &nbsp;-&nbsp; <?php echo date('d M Y', strtotime($value['tgl_ambil'])); ?> 
                </div>
              </span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                <i class="fas fa-calendar"></i>
              </div>
            </div>
          </div>
          <?php if ($value['status']==0) { ?>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
              <span class="text-nowrap">Menunggu Konfirmasi</span>
            </p>
          <?php }else if($value['status']==1){ ?>
           <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-primary mr-2"><i style="color:#62A12B " class="fas fa-sync"></i></span>
            <span class="text-nowrap">Dalam Proses</span>
          </p>
        <?php }else if($value['status']==2){ ?>
         <p class="mt-3 mb-0 text-muted text-sm">
          <span class="text-primary mr-2"><i style="color: red" class="fas fa-window-close"></i></span>
          <span class="text-nowrap">DiBatalkan</span>
        </p>
      <?php  }else{ ?>
       <p class="mt-3 mb-0 text-muted text-sm">
        <span class="text-primary mr-2"><i class="fas fa-arrow-up"></i></span>
        <span class="text-nowrap">Selesai</span>
      </p>
    <?php } ?>
  </div>
  <?php if ($value['status']==0): ?>
    <div class="card-footer">
      <span class="btn btn-danger btn-sm batal" id="<?php echo $value['id_transaksi']; ?>">Batalkan Penitipan</span>
    </div>
  <?php endif ?>
  <?php if ($value['status']==1): ?>
    <div class="card-footer"></div>
  <?php endif ?>
</div>
</div>
<?php endforeach ?>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $(".trx").click(function() {
    //alert("id : " + $(this).attr("id"));
    var id = $(this).attr("id");
    $.ajax({
      url:'proses/tampil_detail.php',
      type:'POST',
      data:'id_trx='+id,
      success:function(response){
        $.Toast.showToast({
          "title": "Load Data Detail Transaksi",
          "icon": "loading",
          "duration": 1200
        });
        setTimeout(function () {
          $('#riwayat').html(response);
        },1230); 
      }
    })
  });

    $('.batal').click(function(){
     Swal.fire({
      title: 'Batalkan Penitipan ?',
      text: "Anda akan membatalkan transaksi penitipan ini.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Batal !',
      cancelButtonText: 'Tidak !'
    }).then((result) => {
      if (result.value) {

        //start ajax
        var id = $(this).attr("id");
        $.ajax({
          url:'proses/batal_trx.php',
          type:'POST',
          data:'id_trx='+id,
          success:function(response){
            //console.log(response);
            if (response!='gagal') {
              Swal.fire({
                title: 'Penitipan Dibatalkan',
                text: "Transaksi Penitipan Berhasil Dibatalkan",
                type: 'success',
              }).then((result) => {
                if (result.value) {
                  location.reload();
                }
              })
            }else{
              Swal.fire(
                'Pembatalan Tidak Berhasil',
                'Pembatalan Transaski Penitipan Anda Gagal',
                'error'
                )
            }

          }

        })//end ajax

      }
    })
  })


  })

</script>
