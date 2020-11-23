<div style="padding: 30px">
  <br>
  <h2 align="center">Kontak Kami</h2>
  <br>
  <div class="row">
    <div class="col-sm-6 col-xs-12 col-md-6">
      <div class="panel">
        <div class="panel-heading" style="background-color:#205E32;">
          <h3 align="center" style="color:white;">Kontak Kami</h3>
        </div>
        <div class="panel-body">
          <table>
           <tr>
             <td>
               <h4>
                 <span class="fa fa-location-arrow"> Puskesmas Bansari,  Jl.Raya Bansari-Mojosari, Bansari</span>
               </h4>
             </td>
           </tr>
           <tr>
             <td>
               <h4>
                 <span class="fa fa-clock-o"> Pendaftaran : Senin - Kamis 07:30-12:00 WIB</span>
               </h4>
             </td>
           </tr>
           <tr>
             <td>
               <h4>
                 <span class="fa fa-clock-o"> Pendaftaran : Jumat 07:30-10:00 WIB</span>
               </h4>
             </td>
           </tr>
           <tr>
             <td>
               <h4>
                 <span class="fa fa-clock-o"> Pendaftaran : Sabtu 07:30-11:00 WIB</span>
               </h4>
             </td>
           </tr>
           <tr>
             <td>
               <h4>
                 Layanan Telepon
               </h4>
               <span class="fa fa-phone">  0293 (596925)</span>
             </td>
           </tr>
         </table>

       </div>
     </div>
   </div>
   <div class="col-sm-6 col-xs-12 col-md-6">
    <div class="panel">
      <div class="panel-heading" style="background-color:#205E32;">
        <h3 align="center" style="color:white;">Kritik dan Saran</h3>
      </div>
      <div class="panel-body">
        <form class="form-group" action="" method="post" id="form-data">
          Nama
          <br>
          <input type="text" id="nama_pengirim" placeholder="Nama" class="form-control" required oninvalid="this.setCustomValidity('Kolom ini harus diisi')" oninput="setCustomValidity('')">
          <br>
          Email
          <br>
          <input type="email" id="email_pengirim" autocomplete="email" placeholder="alamatemail@domain.com" class="form-control" required>
          <br>
          Isi Pesan
          <br>
          <textarea class="form-control" id="pesan_pengirim" rows="8" cols="40" placeholder="Isi Pesan" required oninvalid="this.setCustomValidity('Kolom ini harus diisi')" oninput="setCustomValidity('')"></textarea>
          <br>
          <button type="button" class="form-control btn" style="background-color:#205E32; color:white;" id="tambah_pengaduan">Kirim Pesan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tambah_pengaduan').click(function(){
      var nama = $('#nama_pengirim').val();
      var  email = $('#email_pengirim').val();
      var  isi = $('#pesan_pengirim').val();
      if(nama==''||email==''||isi==''){
        swal({
          title: "Input Kosong",
          text: "Silahkan lengkapi kritik dan saran anda",
          icon: "warning",
        });
      }else{
        $.ajax({
          url:'process/kritik_saran.php',
          type:'POST',
          data:{nama:nama,email:email,isi:isi},
          success:function(response){
            document.getElementById("form-data").reset();
            swal({
              title: "Pesan Terkirim",
              text: "Terimakasih atas kritik dan saran anda",
              icon: "success",
            });
          },
          error:function(){
            swal({
              title: "Gagal mengirim kritik dan saran",
              text: "kesalahan jaringan atau sistem",
              icon: "error",
            });
          }
        })
      }
    })
  })
</script>
</div>