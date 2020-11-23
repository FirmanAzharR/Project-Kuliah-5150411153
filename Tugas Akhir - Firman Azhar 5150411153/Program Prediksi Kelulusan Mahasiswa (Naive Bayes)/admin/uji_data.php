<?php include 'proses/class.php'; ?>
<div>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h3>Uji Data Latih</h3>
	<hr style="border: 1px solid #FFC400">
	<div class="alert alert-success">
		<div class="row">
			<div class="col-md-3" style="border-right: 1px solid #d2d2; ">
				<div style="text-align: center;font-weight: bold;margin-top: 5px">
					Data yang digunakan
				</div>
			</div>
			<div class="col-md-3">
				<div id="dt_latih" style="text-align: center;margin-top: 5px"></div>
			</div>
			<div class="col-md-3">
				<div id="dt_uji" style="color: #DC3545;text-align: center;margin-top: 5px"></div>
			</div>
			<div class="col-md-3">
				<?php $cek_data_latih = $data->cek_data_latih(); ?>
				<?php $cek_data_uji = $data->cek_data_uji(); ?>
				<center>
					<?php if ($cek_data_latih['cek_data']!=0 & $cek_data_uji['cek_data']!=0) { ?>
						<button type="button" class="btn btn-success" id="proses"><i class="fa fa-recycle"></i>&nbsp;Proses Pengujian</button>
					<?php } else {?>
						<button type="button" class="btn btn-success" disabled id="proses"><i class="fa fa-recycle"></i>&nbsp;Proses Pengujian</button>
					<?php } ?>
				</center>
			</div>
		</div>
	</div>
	<hr>
	<div class="card" style="border-radius: 0px">
		<div class="card-header" style="font-weight: bold"><i class="fa fa-eye"></i>&nbsp;Perhitungan Naive Bayes</div>
		<div class="card-body" id="konten"></div>
	</div>
</div>
</div>


<script type="text/javascript">
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
			url:'info/info_dt_uji.php',
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
				url:'proses/proses.php',
				success:function(hasil) {
					konten.html(hasil);
				}
			})
		})
	});

</script>