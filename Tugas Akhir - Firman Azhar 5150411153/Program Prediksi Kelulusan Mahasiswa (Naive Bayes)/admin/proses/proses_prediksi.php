<style type="text/css">
	.colorgraph {
		height: 5px;
		border-top: 0;
		background: #c4e17f;
		border-radius: 5px;
		background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
		background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	}
</style>

<?php include 'class.php' ?>
<?php 
$prob_l_terlambat = $data->prob_l_terlambat();
$prob_l_tepat = $data->prob_l_tepat();
$prob_p_tepat = $data->prob_p_tepat(); 
$prob_p_terlambat = $data->prob_p_terlambat(); 
?>


<div class="row">
    <div class="col-md-3">
	</div>
	<div class="col-md-6">
		<center><label class="btn btn-sm btn-info isDisabled"><i class="fa fa-check"></i>&nbsp;Grafik Perbandingan Prediksi</label></center><br>
		<div style="width:auto;margin: 0px auto;">
			<canvas id="myChart"></canvas>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
<hr class="colorgraph">
<center>
	<label style="font-weight: bold;font-size: 16px">Tabel Data Hasil Perhitungan</label><br>
</center>
<br>
<table class="table table-responsive table-hover table-bordered table-striped" id="mytable">
	<thead align="center" class="bg-light">
		<th>No.</th>
		<th>NIM</th>
		<th>JENKEL</th>
		<th>SKS1</th>
		<th>SKS2</th>
		<th>SKS3</th>
		<th>SKS4</th>
		<th>IPK1</th>
		<th>IPK2</th>
		<th>IPK3</th>
		<th>IPK4</th>
		<th>TEPAT</th>
		<th>TERLAMBAT</th>
		<th>PRED</th>
	</thead>
	<tbody align="center">
		<?php 
		
		    $uji = $data->hitung_data_prediksi();
		
		    $total_ipk1 = 0;
		    $total_ipk2 = 0;
		    $total_ipk3 = 0;
		    $total_ipk4 = 0;
		    
		    			$total_sk1 = 0;
						$total_sk2 = 0;
						$total_sk3 = 0;
						$total_sk4 = 0;
		    
		$total_ipk1_t = 0;
		$total_ipk2_t = 0;
		$total_ipk3_t = 0;
		$total_ipk4_t = 0;
		
		                $total_sk1_t = 0;
						$total_sk2_t = 0;
						$total_sk3_t = 0;
						$total_sk4_t = 0;
		    
		?>
		<?php $jml_tepat=0; $jml_terlambat=0; ?>
		<?php foreach ($uji as $key => $value) :?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['nim'] ?></td>
				<td><?php echo $value['jenkel'] ?></td>
				<td><?php echo $value['sks1'] ?></td>
				<td><?php echo $value['sks2'] ?></td>
				<td><?php echo $value['sks3'] ?></td>
				<td><?php echo $value['sks4'] ?></td>
				<td><?php echo $value['ipk1'] ?></td>
				<td><?php echo $value['ipk2'] ?></td>
				<td><?php echo $value['ipk3'] ?></td>
				<td><?php echo $value['ipk4'] ?></td>
				<td>
					<?php if ($value['jenkel']=='L') {
						$hasil = $value['prob_tepat']*$prob_l_tepat*100;
						echo $hasil;
					}else{
						$hasil = $value['prob_tepat']*$prob_p_tepat*100;
						echo $hasil;
					} ?>

				</td>
				<td>
					<?php if ($value['jenkel']=='L') {
						$hasil = $value['prob_terlambat']*$prob_l_terlambat*100;
						echo $hasil;
					}else{
						$hasil = $value['prob_terlambat']*$prob_p_terlambat*100;
						echo $hasil;
					} ?>
				</td>
				<td>
					<?php 
					if ($value['prob_tepat']>$value['prob_terlambat']) {
						echo "TEPAT";
						$jml_tepat++;

						$ip1[$key] = $value['ipk1'];
						$ip2[$key] = $value['ipk2'];
						$ip3[$key] = $value['ipk3'];
						$ip4[$key] = $value['ipk4'];

						$total_ipk1 = $ip1[$key]+$total_ipk1;
						$total_ipk2 = $ip2[$key]+$total_ipk2;
						$total_ipk3 = $ip3[$key]+$total_ipk3;
						$total_ipk4 = $ip4[$key]+$total_ipk4;
						
						
						//sks
						
						$sk1[$key] = $value['sks1'];
						$sk2[$key] = $value['sks2'];
						$sk3[$key] = $value['sks3'];
						$sk4[$key] = $value['sks4'];

						$total_sk1 = $sk1[$key]+$total_sk1;
						$total_sk2 = $sk2[$key]+$total_sk2;
						$total_sk3 = $sk3[$key]+$total_sk3;
						$total_sk4 = $sk4[$key]+$total_sk4;
						
					}else{
						echo "TERLAMBAT";
						$jml_terlambat++;
						
						
						$ip1_t[$key] = $value['ipk1'];
						$ip2_t[$key] = $value['ipk2'];
						$ip3_t[$key] = $value['ipk3'];
						$ip4_t[$key] = $value['ipk4'];

						$total_ipk1_t = $ip1_t[$key]+$total_ipk1_t;
						$total_ipk2_t = $ip2_t[$key]+$total_ipk2_t;
						$total_ipk3_t = $ip3_t[$key]+$total_ipk3_t;
						$total_ipk4_t = $ip4_t[$key]+$total_ipk4_t;
						
						
						$sk1_t[$key] = $value['sks1'];
						$sk2_t[$key] = $value['sks2'];
						$sk3_t[$key] = $value['sks3'];
						$sk4_t[$key] = $value['sks4'];

						$total_sk1_t = $sk1_t[$key]+$total_sk1_t;
						$total_sk2_t = $sk2_t[$key]+$total_sk2_t;
						$total_sk3_t = $sk3_t[$key]+$total_sk3_t;
						$total_sk4_t = $sk4_t[$key]+$total_sk4_t;
					} 
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<hr>
<div class="row">
	<div class="col-md-6">
		<label style="font-weight: bold; font-style: italic;">Jumlah Tepat = <?php echo $jml_tepat ?></label><br>

<label>Rata - Rata IPK1 = <?php echo $rata = $total_ipk1/$jml_tepat; ?></label><br>

<label>Rata - Rata IPK2 = <?php echo $rata = $total_ipk2/$jml_tepat; ?></label><br>

<label>Rata - Rata IPK3 = <?php echo $rata = $total_ipk3/$jml_tepat; ?></label><br>

<label>Rata - Rata IPK4 = <?php echo $rata = $total_ipk4/$jml_tepat; ?></label><br>
<hr>
<label>Rata - Rata SKS1 = <?php echo $rata = $total_sk1/$jml_tepat; ?></label>
<br>
<label>Rata - Rata SKS2 = <?php echo $rata = $total_sk2/$jml_tepat; ?></label>
<br>
<label>Rata - Rata SKS3 = <?php echo $rata = $total_sk3/$jml_tepat; ?></label>
<br>
<label>Rata - Rata SKS4 = <?php echo $rata = $total_sk4/$jml_tepat; ?></label>
</div>
<div class="col-md-6">
	<label style="font-weight: bold; font-style: italic;">Jumlah Terlambat = <?php echo $jml_terlambat ?></label><br>
	
<label>Rata - Rata IPK1 = <?php echo $rata = $total_ipk1_t/$jml_terlambat; ?></label><br>

<label>Rata - Rata IPK2 = <?php echo $rata = $total_ipk2_t/$jml_terlambat; ?></label><br>

<label>Rata - Rata IPK3 = <?php echo $rata = $total_ipk3_t/$jml_terlambat; ?></label><br>

<label>Rata - Rata IPK4 = <?php echo $rata = $total_ipk4_t/$jml_terlambat;; ?></label><br>
<hr>
<label>Rata - Rata SKS1 = <?php echo $rata = $total_sk1_t/$jml_terlambat; ?></label>
<br>
<label>Rata - Rata SKS2 = <?php echo $rata = $total_sk2_t/$jml_terlambat; ?></label>
<br>
<label>Rata - Rata SKS3 = <?php echo $rata = $total_sk3_t/$jml_terlambat; ?></label>
<br>
<label>Rata - Rata SKS4 = <?php echo $rata = $total_sk4_t/$jml_terlambat; ?></label>
</div>

</div>
<hr>

<script>
	$(document).ready( function () {
		$('#mytable').DataTable();
	});
</script>

<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Tepat", "Terlambat"],
			datasets: [{
				label: 'Prediksi Tepat',
				data: [
				<?php 
				$tepat = $jml_tepat;
				echo $tepat;
				?>, 
				<?php 
				$terlambat = $jml_terlambat;
				echo $terlambat;
				?>
				],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)'
				],
				borderColor: [
				'rgba(255,99,132,1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>