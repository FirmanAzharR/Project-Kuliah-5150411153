<?php include 'proses/class.php'; ?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h3>Prediksi Data</h3>
	<hr style="border: 1px solid #FFC400">
	<div class="alert alert-success">
		<div class="row">
			<div class="col-sm-3" style="border-right: 1px solid #d2d2; ">
				<div style="text-align: center;font-weight: bold;margin-top: 5px">
					Data yang digunakan
				</div>
			</div>
			<div class="col-lg-2">
				<div id="dt_latih" style="text-align: center;margin-top: 5px"></div>
			</div>
			<div class="col-lg-2">
				<div id="dt_uji" style="color: #DC3545;text-align: center;margin-top: 5px"></div>
			</div>
			<div class="col-lg-5">
				<?php $cek_data_latih = $data->cek_data_latih(); ?>
				<?php $cek_data_prediksi = $data->cek_data_prediksi(); ?>
				<center>
					<?php if ($cek_data_latih['cek_data']!=0 & $cek_data_prediksi['cek_data']!=0) { ?>
						<button type="button" class="btn btn-success" id="proses"><i class="fa fa-book"></i>&nbsp;Proses Prediksi</button>
					<?php } else {?>
						<button type="button" class="btn btn-success" disabled id="proses"><i class="fa fa-book"></i>&nbsp;Proses Prediksi</button>
					<?php } ?>
					<button type="button" id="manual" class="btn btn-info"><i class="fa fa-book"></i>&nbsp;Input Manual</button>
				</center>
			</div>

		</div>
	</div>
	<hr>

	<div class="card" style="border-radius: 0px" id="input">
		<div class="card-header" style="font-weight: bold">
			<button id="close" style="color: red;float: right"><i class="fa fa-close"></i></button>
			Input Data Prediksi
		</div>
		<div class="card-body" >
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="number" name="nim" class="form-control" autocomplete="off" placeholder="NIM">
						</div>
						<div class="input-group mb-3">
							<select id="jenkel" class="custom-select" id="inputGroupSelect02">
								<option selected disabled="">Jenis Kelamin</option>
								<option value="L">Laki - Laki</option>
								<option value="P">Perempuan</option>
							</select>
							<div class="input-group-append">
								<label class="input-group-text" for="inputGroupSelect02"><i class="	fa fa-venus-mars"></i></label>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" name="sks1" id="sks1" class="form-control" autocomplete="off" placeholder="SKS 1">
								</div>
								<div class="form-group">
									<input type="number" name="sks2" id="sks2" class="form-control" autocomplete="off" placeholder="SKS 2">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" name="sks3" id="sks3" class="form-control" autocomplete="off" placeholder="SKS 3">
								</div>
								<div class="form-group">
									<input type="number" name="sks4" id="sks4" class="form-control" autocomplete="off" placeholder="SKS 4">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" name="ipk1" id="ipk1" class="form-control" autocomplete="off" placeholder="IPS 1">
								</div>
								<div class="form-group">
									<input type="number" name="ipk2" id="ipk2" class="form-control" autocomplete="off" placeholder="IPS 2">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" name="ipk3" id="ipk3" class="form-control" autocomplete="off" placeholder="IPS 3">
								</div>
								<div class="form-group">
									<input type="number" name="ipk4" id="ipk4" class="form-control" autocomplete="off" placeholder="IPS 4">
								</div>
							</div>
						</div>						
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
						<a href="#" id="pred" class="btn btn-success btn-block"><i class="fa fa-recycle"></i>&nbsp;Proses</a>
					</div>
					<div class="col-sm-3">
						<a href="#" id="clear" class="btn btn-danger btn-block"><i class="fa fa-refresh"></i>&nbsp;Clear</a>
					</div>
				</div>
			</form>
			<hr>
			<div class="row" id="hasil">
				
			</div>
		</div>
	</div>
	<br id="br">
	<div class="card" style="border-radius: 0px">
		<div class="card-header" style="font-weight: bold"><i class="fa fa-eye"></i>&nbsp;Hasil Prediksi</div>
		<div class="card-body" id="konten"></div>
	</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function() {
		$('#input').hide();
		$('#br').hide();
	});

	$(document).ready(function() {
		$('#manual').on('click',function(){
			$('#input').show(200);
			$('#br').show(200);
		});

		$('#close').on('click',function(){
			$('#input').hide(200);
			$('#br').hide(200);	
		});

		$('#reset').on('click',function(){
			$('#input').hide(200);
			$('#br').hide(200);	
		});
	});

	$(document).ready(function() {
		var info1=$("#dt_latih");
		$.ajax({
			url:'info/info_dt_latih.php',
			success:function(hasil1) {
				info1.html(hasil1);
			}
		});
	});

	$(document).ready(function() {
		var info2=$("#dt_uji");
		$.ajax({
			url:'info/info_dt_prediksi.php',
			success:function(hasil2) {
				info2.html(hasil2);
			}
		});
	});

	$(document).ready(function() {
		var proses=$("#proses");
		var konten=$("#konten");
		proses.click(function(){
			$.ajax({
				url:'proses/proses_prediksi.php',
				success:function(hasil) {
					konten.html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){

		var target=$("#pred");
		target.on('click',function(){
			var jenkel = $('#jenkel').val();
			var sks1 = $('#sks1').val();
			var sks2 = $('#sks2').val();
			var sks3 = $('#sks3').val();
			var sks4 = $('#sks4').val();
			var ipk1 = $('#ipk1').val();
			var ipk2 = $('#ipk2').val();
			var ipk3 = $('#ipk3').val();
			var ipk4 = $('#ipk4').val();
			$.ajax({
				url:'proses/proses_prediksi2.php',
				type:'POST',
				data:'jenkel='+jenkel+'&sks1='+sks1+'&sks2='+sks2+'&sks3='+sks3+'&sks4='+sks4+'&ipk1='+ipk1+'&ipk2='+ipk2+'&ipk3='+ipk3+'&ipk4='+ipk4,
				success:function(hasil){
					$("#hasil").html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){

		var target=$("#clear");
		target.on('click',function(){
			var jenkel = $('#jenkel').val('');
			var sks1 = $('#sks1').val('');
			var sks2 = $('#sks2').val('');
			var sks3 = $('#sks3').val('');
			var sks4 = $('#sks4').val('');
			var ipk1 = $('#ipk1').val('');
			var ipk2 = $('#ipk2').val('');
			var ipk3 = $('#ipk3').val('');
			var ipk4 = $('#ipk4').val('');
		})
	});

</script>