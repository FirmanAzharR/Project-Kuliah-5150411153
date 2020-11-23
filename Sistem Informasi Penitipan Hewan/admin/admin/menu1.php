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
	<h4>Data Master</h4>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<div class="card" style="margin-top: 25px;height: 220px;background-color: #FF7700" id="ktg">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-paw fa-5x"></i></a><br>
							<hr>
							Kategori Hewan<br>
							<label style="font-weight: bold">Kelola Kategori</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-info" style="margin-top: 25px;height: 220px" id="jns">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-cat fa-5x"></i></a><br>
							<hr>
							Jenis Kategori Hewan<br>
							<label style="font-weight: bold">Kelola Jenis Hewan</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card" style="background-color: #ffb300;margin-top: 25px;height: 220px" id="mkn">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fas fa-bone fa-5x"></i></a><br>
							<hr>
							Makanan Hewan<br>
							<label style="font-weight: bold">Kelola Makanan Hewan</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-success" style="margin-top: 25px;height: 220px" id="obat">
				<div class="card-body">
					<center>
						<div class="icon">
							<a class="icon" href="#"><i class="fa fa-medkit fa-5x"></i></a>
							<hr>
							Obat <br>
							<label style="font-weight: bold">Kelola Obat Hewan</label>
							
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-danger" style="margin-top: 25px;height: 220px" id="vaksin">
				<div class="card-body">
					<center>
						<div class="icon">
							<a class="icon" href="#"><i class="fas fa-hospital fa-5x"></i></a>
							<hr>
							Vaksin Hewan <br>
							<label style="font-weight: bold">Kelola Vaksin Hewan</label>
							<div id="date" style="font-weight: bold;"></div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#ktg').click(function(){
				$('.konten').load('view/tampil_kategori.php');
			})

			$('#jns').click(function(){
				$('.konten').load('view/tampil_jenis.php');
			})

			$('#obat').click(function(){
				$('.konten').load('view/tampil_obat.php');
			})

			$('#vaksin').click(function(){
				$('.konten').load('view/tampil_vaksin.php');
			})

			$('#mkn').click(function(){
				$('.konten').load('view/tampil_makan.php');
			})

		})
	</script>