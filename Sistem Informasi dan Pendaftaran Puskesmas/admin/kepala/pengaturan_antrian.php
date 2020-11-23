
<?php include '../config/koneksi.php' ?>
<h3>Pengaturan Antrian</h3>
<hr>
<div id="konten">
	<div class="panel">
		<div class="panel-header">
			
		</div>
		<div class="panel-body">
			<?php 
			$cek = mysqli_query($koneksi,'SELECT tanggal_mulai,status_antrian FROM status_antrian WHERE loket_antrian="bpumum"');
			$result = $cek->fetch_assoc();
			$date_now = date("Y-m-d");
			?>
			<?php if ($result['tanggal_mulai']==$date_now & $result['status_antrian']=='Berjalan'){ ?>
				<button type="button" id="start" disabled class="btn btn-success">Mulai Antrian</button>
				<button type="button" id="stop" class="btn btn-danger">Berhenti</button>
			<?php }else{ ?>
				<?php $update = mysqli_query($koneksi,"update status_antrian set no_antrian=0; "); ?>
				<button type="button" id="start" class="btn btn-success">Mulai Antrian</button>
				<button type="button" id="stop" class="btn btn-danger" disabled>Berhenti</button>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#pemanggil').addClass("active");
		$('#pemanggil').attr("aria-expanded","true");
		$('#subPages').addClass("collapse in");
		$('#subPages').attr("aria-expanded","true");
		$('#pengaturan').addClass("active");
			//$('#konten').load('view/tampil_data_pasien.php');


			$('#start').click(function(){
				$.ajax({
					url : 'proses/buka_antrian.php',
					success:function(response){
						swal({
							title: "Antrian Dibuka",
							text: "Antrian Loket Dibuka",
							icon: "success",
						})
						$('#start').prop('disabled',true);
						$('#stop').prop('disabled',false);
					},
					error:function(response){
						swal("Antrian Dibuka", "Gagal Buka Antrian", "error");
					}
				})
			})


			$('#stop').click(function(){
				$.ajax({
					url : 'proses/tutup_antrian.php',
					success:function(response){
						swal("Antrian Ditutup", "Antrian Loket Telah Berhenti", "success");
						$('#stop').prop('disabled',true);
						$('#start').prop('disabled',false);
					},
					error:function(response){
						swal("Antrian Dibuka", "Gagal Tutup Antrian", "error");
					}
				})
			})
			
		});
	</script>