<!-- Begin modal-->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title" style="text-decoration: underline;">Peraturan Ujian !!</h4>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				1. Berdoa sebelum memulai ujian. <br>
				2. Ujian ini berbatas waktu. <br>
				3. Simpan jawaban sebelum batas waktu berakhir. <br>
				4. Jika jawaban belum disimpan sampai batas waktu maka nilai 0. <br>
				<center><label style="font-weight: bold;">"&nbsp;Semoga Berhasil&nbsp;"</label></center><hr>
				<center><button type="button" id="x" class="btn btn-success">Mulai</button></center>
			</div>
		</div>
	</div>
</div>
<!-- end modal-->

<?php 
error_reporting(0);
$id=$_SESSION['peserta'];

$id_kejuruan=$data->select_peserta($id);
$x=$id_kejuruan['kejuruan'];

if ($select['nilai']=="") {
	$waktu=5400;
	$_SESSION['time']=$waktu;
}
?>
<div style="margin-left: 15px;margin-right: 15px;color: black">
	<div class="row">
		<div class="col-md-9">
			<h4>Soal Ujian</h4>
			<?php //echo $x; ?>
		</div>
		<div class="col-md-3">
			<div style="padding: 0px; font-size: 20px; float: right;font-weight: bold">
				<div id="countdown"></div>
			</div>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div>
		<?php $select=$data->check_test($id); ?>
		<?php if ($select['nilai']!=""){ ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div style="margin-top: 30px;padding: 30px;" class="alert alert-info" role="alert" >
						<label style="text-align: center">
							<i class="fa fa-check-circle" style="font-size:48px;color:#4A8AF4"></i><br>
							Anda sudah mengikuti Test
							<label style="font-weight: bold">Score : <?php echo $select['nilai']; ?></label>
							<hr>
							<label style="font-weight: bold">Untuk informasi selanjutnya silahkan lihat pada halaman Pengumuman pada website kami.</label>
						</label>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		<?php } else{ ?>
			<form method="post" id="answer" name="answer">
				<table class="table table-bordered table-hover" id="myTable">
					<thead style="text-align: center;" class="thead-light">
						<th>No</th>
						<th>Soal</th>
					</thead>
					<tbody>
						<?php $peserta=$data->tampil_soal_jurusan($x); ?>
						<?php foreach ($peserta as $key => $value): ?>
							<tr>
								<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
								<td style="text-align: justify; width: 600px">
									<?php echo $value['soal']; ?>
									<input type="hidden" name="id_soal[]" value="<?php echo $value['id_soal'] ?>">
									<input type="hidden" name="id_peserta[]" value="<?php echo $id?>">
									<br>
									<label><input class="ans" type="radio" name="pilih[<?php echo $value['id_soal'] ?>]" value="a" oninvalid="this.setCustomValidity('Pilih Jawaban')">&nbsp;<span style="font-weight: bold">A.</span>&nbsp;<?php echo $value['a']; ?></label>
									<br>
									<label><input class="ans" type="radio" name="pilih[<?php echo $value['id_soal'] ?>]" value="b">&nbsp;<span style="font-weight: bold">B.</span>&nbsp;<?php echo $value['b']; ?></label>
									<br>
									<label><input class="ans" type="radio" name="pilih[<?php echo $value['id_soal'] ?>]" value="c">&nbsp;<span style="font-weight: bold">C.</span>&nbsp;<?php echo $value['c']; ?></label>
									<br>
									<label><input class="ans" type="radio" name="pilih[<?php echo $value['id_soal'] ?>]" value="d">&nbsp;<span style="font-weight: bold">D.</span>&nbsp;<?php echo $value['d']; ?></label>
								</td>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<hr>
			<center><button data-toggle="confirmation" data-title="Yakin Simpan Jawaban ?" title="Simpan Jawaban" data-popout="true" data-singleton="true" class="btn btn-success" name="simpan" id="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button></center>
			<?php 
			$data->hasil_ujian($id); 
			?>
		</form>
	<?php } ?>

</div>
<!--end of warper-->
</div>
<script src="timer/jquery.plugin.js"></script>
<script src="timer/jquery.countdown.js"></script>

<script type="text/javascript">
	var value = '<?php echo $select['nilai']; ?>';
	$(document).ready(function(){
		if (value=="") {
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('#myModal').modal('show'); 
		}
		else{

		}
	})
</script>


<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable({
			"iDisplayLength": 10
		});
	} );
</script>

<script type="text/javascript">
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',});
	</script>

	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover({
				placement : 'top',
				trigger : 'hover'
			});
		});
	</script>




	<script type="text/javascript">

		function waktuHabis(){
			//alert("Waktu anda habis!!!");
			//document.answer.submit();
			var id_peserta = '<?php echo $id ?>';
			//var pilihan = $(".ans:checked").val();
			//var id_soal = $('input:hidden.id_soal').serialize();
			$.ajax({
				method:'POST',
				url:'save_on_timeout.php',
				data:'peserta='+id_peserta,// + '&pilihan='+pilihan + '&soal='+id_soal,
				success:function(hasil){
					Swal.fire(
						'Ujian Berakhir',
						'Waktu Ujian Telah Habis',
						'error'
						).then(function() {
									window.location = "index.php?halaman=dashboard";
								});
				}

			});
		}	

		function hampirHabis(periods){
			if($.countdown.periodsToSeconds(periods) == 10){
				$(this).css({color:"red"});
			}
		}

		$(document).ready(function(){
			var sisa_waktu =  <?php echo $_SESSION['time'] ?>;
			var TimeOut = sisa_waktu;
			$("#x").on("click",function(){

				$('#l').prop('disabled', true);

				$('#z').click(function(e) {
					e.preventDefault();
				});

				$('#d').click(function(e) {
					e.preventDefault();
				});

				$('#myModal').modal('toggle');
				$("#countdown").countdown({
					until: TimeOut,
					compact:true,
					onExpiry:waktuHabis,
					onTick: hampirHabis
				});
			});
		})

	</script>