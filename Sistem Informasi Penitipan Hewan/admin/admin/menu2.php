<style type="text/css">
	.card {
		transition: all 0.3s;
		color: white;
		border-radius: 0px;

		border:none;
	}
	.card:hover {
		transition: all 0.7s;
		transform: scale(1.09);
		cursor: pointer;
	}

	.icon{
		opacity: 0.7;
		color: white;
	}
	.icon:hover{
		opacity: 1;
		color: white;
	}
	.text{
		opacity: 0.7;
		color: white;
	}
	.text:hover{
		opacity: 1;
		color: white;
	}
	.count{
		opacity: 0.7;
		font-weight: bold;
	}
	.count:hover{
		opacity: 1;
		font-weight: bold;
	}

</style>

<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px" class="konten">
	<h4>Data Transaksi</h4>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="card bg-info" style="margin-top: 25px;height: 220px;" id="tunda">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-tasks fa-5x"></i></a><br>
							<hr>
							Transaksi Hari ini<br>
							<label style="font-weight: bold">Transaksi Belum Diterima</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="margin-top: 25px;height: 220px;background-color: #FF7700" id="proses">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fas fa-sync fa-spin fa-5x"></i></a><br>
							<hr>
							Transaksi Dalam Proses<br>
							<label style="font-weight: bold">Transaksi Diterima</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-success" style="margin-top: 25px;height: 220px" id="selesai">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fas fa-cash-register fa-5x"></i></a><br>
							<hr>
							Transaksi Selesai<br>
							<label style="font-weight: bold">Transaksi Sukses</label>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-4">
			<div class="card bg-danger" style="margin-top: 25px;height: 220px;" id="batal">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-window-close fa-5x"></i></a><br>
							<hr>
							Transaksi Hari ini<br>
							<label style="font-weight: bold">Transaksi Dibatalkan</label>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tunda').click(function(){
				$('.konten').load('view/tampil_tunda.php');
			})

			$('#proses').click(function(){
				$('.konten').load('view/tampil_terima.php');
			})

			$('#selesai').click(function(){
				$('.konten').load('view/tampil_selesai.php');
			})

			$('#vaksin').click(function(){
				$('.konten').load('view/tampil_vaksin.php');
			})

			$('#batal').click(function(){
				$('.konten').load('view/tampil_batal.php');
			})

		})
	</script>