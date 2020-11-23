
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
				<button type="button" id="start" class="btn btn-success">Mulai Antrian</button>
				<button type="button" id="stop" class="btn btn-danger">Berhenti</button>
			<?php }elseif($result['tanggal_mulai']==$date_now & $result['status_antrian']=='Berhenti'){ ?>
				<button type="button" id="start" class="btn btn-success">Mulai Antrian</button>
				<button type="button" id="stop" class="btn btn-danger" disabled>Berhenti</button>
			<?php }else{?>
				<?php $update = mysqli_query($koneksi,"update status_antrian set no_antrian=0; "); ?>
				<button type="button" id="start" class="btn btn-success">Mulai Antrian</button>
				<button type="button" id="stop" class="btn btn-danger" disabled>Berhenti</button>
			<?php } ?>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Buka Antrian</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<h3>BP UMUM</h3>
						<hr>
						<?php 
						$dokter_umum = mysqli_query($koneksi,"SELECT*FROM dokter WHERE id_loket='bpumum' AND status='0'");
						$cek_x=$dokter_umum->num_rows;
						$dokter_gigi = mysqli_query($koneksi,"SELECT*FROM dokter WHERE id_loket='bpgigi' AND status='0'");
						$cek_y=$dokter_gigi->num_rows;
						?>

						<?php if ($cek_x==0){ ?>
							Dokter Bertugas dan Antrian Sedang Berjalan
						<?php }else{ ?>
							<?php foreach ($dokter_umum as $key => $value): ?>
								<input type="checkbox" class="get_value_umum" value="<?php echo $value['id_dokter'] ?>"/>
								<label><?php echo $value['nama_dokter'] ?></label>
								<br>
							<?php endforeach ?>
						<?php } ?>
						<hr>
						<?php if ($cek_x==0){ ?>
							<button type="button" class="btn btn-success btn-sm" id="tombol-bpumum" disabled>Mulai BP Umum</button>
						<?php }else{ ?>
							<button type="button" class="btn btn-success btn-sm" id="tombol-bpumum">Mulai BP Umum</button>
						<?php } ?>

					</div>
					<div class="col-md-6">
						<h3>BP GIGI</h3>
						<hr>
						<?php if ($cek_y==0){ ?>
							Dokter Bertugas dan Antrian Sedang Berjalan
						<?php }else{ ?>
							<?php foreach ($dokter_gigi as $key => $value): ?>
								<input type="checkbox" class="get_value_gigi" value="<?php echo $value['id_dokter'] ?>"/>
								<label><?php echo $value['nama_dokter'] ?></label>
								<br>
							<?php endforeach ?>
						<?php } ?>
						<hr>
						<?php if ($cek_y==0){ ?>
							<button type="button" class="btn btn-success btn-sm" id="tombol-bpgigi" disabled>Mulai BP Umum</button>
						<?php }else{ ?>
							<button type="button" class="btn btn-success btn-sm" id="tombol-bpgigi">Mulai BP Gigi</button>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
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
				$('#myModal').modal('toggle');
			})

			$('#tombol-bpumum').click(function(){
				var dokter_umum = [];
				var status_antrian = 'bpumum';
				$('.get_value_umum').each(function(){
					if($(this).is(":checked"))
					{
						dokter_umum.push($(this).val());
					}
				});
				dokter_umum = dokter_umum.toString();
				$.ajax({
					url:"proses/buka_antrian.php",
					method:"POST",
					data:{dokter_umum:dokter_umum, status_antrian:status_antrian},
					success:function(data){
						swal("Antrian Dibuka", "Antrian BP Umum Berjalan", "success");
					}
				});
			});

			$('#tombol-bpgigi').click(function(){
				var dokter_gigi = [];
				var status_antrian = 'bpgigi';
				$('.get_value_gigi').each(function(){
					if($(this).is(":checked"))
					{
						dokter_gigi.push($(this).val());
					}
				});
				dokter_gigi = dokter_gigi.toString();
				$.ajax({
					url:"proses/buka_antrian.php",
					method:"POST",
					data:{dokter_gigi:dokter_gigi, status_antrian:status_antrian},
					success:function(data){
						swal("Antrian Dibuka", "Antrian BP Gigi Berjalan", "success");
					}
				});
			});


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