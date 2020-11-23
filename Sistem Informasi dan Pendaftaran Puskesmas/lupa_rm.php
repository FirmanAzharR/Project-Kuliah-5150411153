<div id="konten" style="margin-top: 100px;padding: 20px">
  <div class="container" align="center">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel">
        <div class="panel-heading" style="background-color:#205E32;">
          <h2 align="center" style="color:white;">Cek Nomor RM</h2>
        </div>
        <div class="panel-body">
          <br>
          <div class="row" id="cekantrian">
            <div class="form-group">
              Nama Lengkap
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap"><br>
              Tanggal Lahir
              <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" placeholder="">
              <br>
              <input type="text" align="center" readonly class="form-control" name="result" id="result" placeholder="Hasil Nomor RM"><br>
              <button type="buttton" class="btn btn-success" id="cek"><i class="fa fa-check"></i> Cek</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<script>
  $(document).ready(function(){ 
    $('input').attr("autocomplete","off");

    //cek
    $('#cek').click(function(){
      var nama = $('#nama').val();
      var tgl = $('#tgl_lhr').val();
        
        if(nama==''||tgl==''){
            swal({
					title:'Silahkan Lengkapi Inputan',
					text:'nama lengkap atau tanggal kosong',
					icon:'warning'
				})
        }else{
                    $.ajax({
          url:'process/lupa_norm.php',
          type:'POST',
          data:{nama:nama,tgl:tgl},
          success:function(response){
            if (response!="tidak") {
              $('#result').val(response);
            }
            else{
              swal({
                title: "Anda Belum Registrasi Pasien Berobat",
                text: "Silahkan Melakukan Pendaftaran Terlebih Dahulu",
                icon: "warning",
                button: "Oke",
              });
            }        
          }
        })
            
        }
    
    })

  })
</script>
