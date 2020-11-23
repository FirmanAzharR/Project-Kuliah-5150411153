<?php include 'class.php' ?>
<style type="text/css">
	.isDisabled {
  cursor: not-allowed;
  pointer-events: none;
  color: white;
}
</style>

<div id="non-numerik" class="row">
	<div class="col-md-6" style="border-right: 1px solid #D2D2">
		<label style="font-style: italic;font-weight: bold">Data Perhitungan</label>
		<hr>

		<label style="" class="btn btn-sm btn-info isDisabled"><i class="fa fa-check"></i>&nbsp;Probabilitas Tepat /  Terlambat</label><br>
		<label style="font-style: italic;">Jumlah Tepat = </label>
		<?php echo $jml_tepat = $data->total_tepat(); ?><br>
		<label style="font-style: italic;">Prob. Tepat [ jml tepat / total data ] = </label> 
		<?php 
			$kons = 1;
			$prob_tepat = $data->prob_prior_tepat(); 
			echo number_format($prob_tepat,6);
		?>
		
		<br>

		<label style="font-style: italic;">Jumlah Terlambat = </label>
		<?php echo $jml_terlambat = $data->total_terlambat(); ?><br>
		<label style="font-style: italic;">Prob. Terlambat [ jml Terlambat / total data ] = </label> 
		<?php 
			$prob_terlambat = $data->prob_prior_terlambat(); 
			echo number_format($prob_terlambat,6);
		?>
	</div>

	<div class="col-md-6">
		<label style="font-style: italic;">Total Data Mahasiswa = </label>
		<?php echo $total = $data->total_data(); ?>

		<hr>

		<label style="" class="btn btn-sm btn-info isDisabled"><i class="fa fa-check"></i>&nbsp;Probabilitas Jenis Kelamin</label><br>
		<label style="font-style: italic;">Laki - Laki</label><br>
		<label style="font-style: italic;">Jml 'L' Tepat = </label>
		<?php echo $jml_l_tepat = $data->total_l_tepat(); ?>
		&nbsp;|&nbsp;
		<label style="font-style: italic;">Jml 'L' Terlambat = </label>
		<?php echo $jml_l_terlambat = $data->total_l_terlambat(); ?>
		<br>
		<label style="font-style: italic;">Prob. 'L' Tepat [ 'L' tepat / total tepat ] = </label> 
		<?php 
			$prob_l_tepat = $data->prob_l_tepat(); 
			echo number_format($prob_l_tepat,6);
		?>
		<br>
		<label style="font-style: italic;">Prob. 'L' Terlambat [ 'L' terlambat / total terlambat ] = </label> 
		<?php 
			$prob_l_terlambat = $data->prob_l_terlambat(); 
			echo number_format($prob_l_terlambat,6);
		?>

		<br>
		<br>

		<label style="font-style: italic;">Perempuan</label><br>
		<label style="font-style: italic;">Jml 'P' Tepat = </label>
		<?php echo $jml_p_tepat = $data->total_p_tepat(); ?>
		&nbsp;|&nbsp;
		<label style="font-style: italic;">Jml 'P' Terlambat = </label>
		<?php echo $jml_p_terlambat = $data->total_p_terlambat(); ?>
		<br>
		<label style="font-style: italic;">Prob. 'P' Tepat [ 'P' tepat / total tepat ] = </label> 
		<?php 
			$prob_p_tepat = $data->prob_p_tepat(); 
			echo number_format($prob_p_tepat,6);
		?>
		<br>
		<label style="font-style: italic;">Prob. 'P' Terlambat [ 'P' terlambat / total terlambat ] = </label> 
		<?php 
			$prob_p_terlambat = $data->prob_p_terlambat(); 
			echo number_format($prob_p_terlambat,6);
		?>
	</div>
</div>
<div>
	<hr>

	<?php 
		$sks_tepat=$data->mean_sks_tepat(); 
		$sks_terlambat=$data->mean_sks_terlambat(); 
		$ex_sdev_tepat = $data->ex_hitung_sdev_tepat();
		$ex_sdev_terlambat = $data->ex_hitung_sdev_terlambat();
		$std_dev_sks1_tepat=$data->std_dev_sks1_tepat();
		$std_dev_sks1_terlambat=$data->std_dev_sks1_terlambat();
		$std_dev_sks2_tepat=$data->std_dev_sks2_tepat();
		$std_dev_sks2_terlambat=$data->std_dev_sks2_terlambat();
		$std_dev_sks3_tepat=$data->std_dev_sks3_tepat();
		$std_dev_sks3_terlambat=$data->std_dev_sks3_terlambat();
		$std_dev_sks4_tepat=$data->std_dev_sks4_tepat();
		$std_dev_sks4_terlambat=$data->std_dev_sks4_terlambat();
	?>

	<div class="row" id="mean">
		<div class="col-md-6" style="border-right: 1px solid #D2D2">
			<label style="background:#F5A200 " class="btn btn-sm isDisabled"><i class="fa fa-check"></i>&nbsp;Mean Data Numerik SKS</label><br>
			<label style="font-style: italic;">Rumus Mean : </label>&nbsp;<img style="width: 130px" src="image/rumus_mean.png"><br><br>

			<label style="font-style: italic;">Mean SKS1['tepat'] = </label> <?php echo $kons; echo "/"; echo $jml_tepat; echo " x "; echo $sks_tepat['jum_sks1']; echo " = "; echo number_format($sks_tepat['mean_sks1_tepat'],6); ?><br>
			<label style="font-style: italic;">Mean SKS1['terlambat'] = </label> <?php echo $kons; echo "/"; echo $jml_terlambat; echo " x "; echo $sks_terlambat['jum_sks1'];echo " = "; echo number_format($sks_terlambat['mean_sks1_terlambat'],6); ?>
		</div>
		<div class="col-md-6">
			<label class="btn btn-sm btn-success isDisabled"><i class="fa fa-check"></i>&nbsp;Standar Deviasi Data Numerik SKS</label><br>
			<label style="font-style: italic;">Rumus Standar Deviasi : </label>&nbsp;<img style="width: 150px" src="image/std.png"><br><br>

			<label style="font-style: italic;">S.Dev SKS1['tepat'] = </label> <?php echo "SQRT( "; echo $kons; echo "/";echo "( "; echo $jml_tepat; echo "-"; echo $kons; echo " )"; echo " x "; echo number_format($ex_sdev_tepat,6);  echo " )"; echo " = "; echo number_format($std_dev_sks1_tepat,6); ?><br>
			<label style="font-style: italic;">S.Dev SKS1['terlambat'] = </label> <?php echo "SQRT( "; echo $kons; echo "/";echo "( "; echo $jml_terlambat; echo "-"; echo $kons; echo " )"; echo " x "; echo number_format($ex_sdev_terlambat,6);  echo " )"; echo " = "; echo number_format($std_dev_sks1_terlambat,6); ?>
		</div>
	</div>
	<br>
	<table class="table table-striped table-hover table-bordered table-responsive">
		<thead align="center" class="bg-light">
			<th></th>
			<th colspan="2">SKS1</th>
			<th colspan="2">SKS2</th>
			<th colspan="2">SKS3</th>
			<th colspan="2">SKS4</th>
		</thead>
		<tbody>
			<tr align="center">
				<td></td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
			</tr>
			<tr align="center">
				<td width="40">Mean</td>
				<td><?php echo number_format($sks_tepat['mean_sks1_tepat'],6); ?></td>
				<td><?php echo number_format($sks_terlambat['mean_sks1_terlambat'],6); ?></td>
				<td><?php echo number_format($sks_tepat['mean_sks2_tepat'],6); ?></td>
				<td><?php echo number_format($sks_terlambat['mean_sks2_terlambat'],6); ?></td>
				<td><?php echo number_format($sks_tepat['mean_sks3_tepat'],6); ?></td>
				<td><?php echo number_format($sks_terlambat['mean_sks3_terlambat'],6); ?></td>
				<td><?php echo number_format($sks_tepat['mean_sks4_tepat'],6); ?></td>
				<td><?php echo number_format($sks_terlambat['mean_sks4_terlambat'],6); ?></td>
			</tr>
			<tr align="center">
				<td width="40">Std.Dev</td>
				<td>
					<?php 
						echo number_format($std_dev_sks1_tepat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks1_terlambat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks2_tepat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks2_terlambat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks3_tepat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks3_terlambat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks4_tepat,6);
					?>
				</td>
				<td>
					<?php 
						echo number_format($std_dev_sks4_terlambat,6)
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<hr>
	<?php  
		$ipk_tepat=$data->mean_ipk_tepat(); 
		$ipk_terlambat=$data->mean_ipk_terlambat();
		$std_dev_ipk1_tepat=$data->std_dev_ipk1_tepat();
		$std_dev_ipk2_tepat=$data->std_dev_ipk2_tepat();
		$std_dev_ipk3_tepat=$data->std_dev_ipk3_tepat();
		$std_dev_ipk4_tepat=$data->std_dev_ipk4_tepat();
		$std_dev_ipk1_terlambat=$data->std_dev_ipk1_terlambat();
		$std_dev_ipk2_terlambat=$data->std_dev_ipk2_terlambat();
		$std_dev_ipk3_terlambat=$data->std_dev_ipk3_terlambat();
		$std_dev_ipk4_terlambat=$data->std_dev_ipk4_terlambat();
		$ex_sdev_ipk_tepat = $data->ex_hitung_sdev_ipk_tepat();
		$ex_sdev_ipk_terlambat = $data->ex_hitung_sdev_ipk_terlambat();
	?>
	<div class="row">
		<div class="col-md-6" style="border-right: 1px solid #D2D2">
			<label style="background:#F5A200 " class="btn btn-sm isDisabled"><i class="fa fa-check"></i>&nbsp;Mean Data Numerik IPK</label><br>

			<label style="font-style: italic;">Mean IPK1['tepat'] = </label> <?php echo $kons; echo "/"; echo $jml_tepat; echo " x "; echo $ipk_tepat['jum_ipk1']; echo " = "; echo number_format($ipk_tepat['mean_ipk1_tepat'],6); ?><br>
			<label style="font-style: italic;">Mean IPK1['terlambat'] = </label> <?php echo $kons; echo "/"; echo $jml_terlambat; echo " x "; echo $ipk_terlambat['jum_ipk1'];echo " = "; echo number_format($ipk_terlambat['mean_ipk1_terlambat'],6); ?>
		</div>
		<div class="col-md-6">
			<label class="btn btn-sm btn-success isDisabled"><i class="fa fa-check"></i>&nbsp;Standar Deviasi Data Numerik IPK</label><br>

			<label style="font-style: italic;">S.Dev IPK1['tepat'] = </label> <?php echo "SQRT( "; echo $kons; echo "/"; echo "( ";echo $jml_tepat; echo "-"; echo $kons; echo " )"; echo " x "; echo number_format($ex_sdev_ipk_tepat,6);  echo " )"; echo " = "; echo number_format($std_dev_ipk1_tepat,6); ?><br>
			<label style="font-style: italic;">S.Dev IPK1['terlambat'] = </label> <?php echo "SQRT( "; echo $kons; echo "/"; echo "( ";;echo $jml_terlambat; echo "-"; echo $kons; echo " )"; echo " x "; echo number_format($ex_sdev_ipk_terlambat,6);  echo " )"; echo " = "; echo number_format($std_dev_ipk1_terlambat,6); ?>
		</div>
	</div>
	<br>
	<table class="table table-striped table-hover table-bordered table-responsive">
		<thead align="center" class="bg-light">
			<th></th>
			<th colspan="2">IPK1</th>
			<th colspan="2">IPK2</th>
			<th colspan="2">IPK3</th>
			<th colspan="2">IPK4</th>
		</thead>
		<tbody>
			<tr align="center">
				<td></td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
				<td width="120px">Tepat</td>
				<td width="120px">Terlambat</td>
			</tr>
			<tr align="center">
				<td width="40">Mean</td>
				<td><?php echo number_format($ipk_tepat['mean_ipk1_tepat'],6); ?></td>
				<td><?php echo number_format($ipk_terlambat['mean_ipk1_terlambat'],6); ?></td>
				<td><?php echo number_format($ipk_tepat['mean_ipk2_tepat'],6); ?></td>
				<td><?php echo number_format($ipk_terlambat['mean_ipk2_terlambat'],6); ?></td>
				<td><?php echo number_format($ipk_tepat['mean_ipk3_tepat'],6); ?></td>
				<td><?php echo number_format($ipk_terlambat['mean_ipk3_terlambat'],6); ?></td>
				<td><?php echo number_format($ipk_tepat['mean_ipk4_tepat'],6); ?></td>
				<td><?php echo number_format($ipk_terlambat['mean_ipk4_terlambat'],6); ?></td>
			</tr>
			<tr align="center">
				<td width="40">Std.Dev</td>
				<td><?php echo number_format($std_dev_ipk1_tepat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk1_terlambat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk2_tepat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk2_terlambat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk3_tepat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk3_terlambat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk4_tepat,6); ?></td>
				<td><?php echo number_format($std_dev_ipk4_terlambat,6); ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<hr>
	<label class="btn btn-sm btn-danger isDisabled"><i class="fa fa-check"></i>&nbsp;Hitung Data Uji</label><br>

	<label id="hasil" style="font-style: italic">Probabilitas Data Kontinu Dengan Rumus Densitas Gauss :</label><br>
		</label>&nbsp;<img style="width: 250px" src="image/probabilitas.png">
	<br><br><br>
	<table class="table table-responsive table-hover table-bordered table-striped" id="myTable">
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
			<th>KET</th>
			<th>Skor Tepat</th>
			<th>Skor Terlambat</th>
			<th>PRED</th>
		</thead>
		<tbody align="center">
			<?php 
				$tp=0;
				$fp=0;
				$tn=0;
				$fn=0;
			?>
			<?php $uji = $data->hitung_data_uji() ?>
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
				<td><?php echo $value['keterangan'] ?></td>
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
						echo number_format($hasil,6);
					}else{
						$hasil = $value['prob_terlambat']*$prob_p_terlambat*100;
						echo number_format($hasil,6);
					} ?>
				</td>
				<td>
					<?php 
						if ($value['prob_tepat']>$value['prob_terlambat']) {
							echo $hasil="TEPAT";
						}else{
							echo $hasil="TERLAMBAT";
						} 
					?>
				</td>
			</tr>
			<?php 
				if ($hasil=='TEPAT') {
					if ($hasil==$value['keterangan']) {
						$tp+=1;
					}
					if ($hasil!=$value['keterangan']) {
						$fn+=1;
					}
				}

				if ($hasil=='TERLAMBAT') {
					if ($hasil!=$value['keterangan']) {
						$tn+=1;
					}
					if ($hasil==$value['keterangan']) {
						$fp+=1;
					}
				}
			?>
			<?php endforeach ?>
		</tbody>
	</table>
	<br>
	<hr>
	<div class="row">
		<div class="col-md-5" style="border-right: 1px solid #D2D2D2">
		<label class="btn btn-sm btn-danger isDisabled"><i class="fa fa-check"></i>&nbsp;Hitung Akurasi, Precision, Recall</label><br>
		<label style="font-style: italic;">Rumus Precision : </label>&nbsp;<img style="width: 170px" src="image/precision.png"><br><br>
		<label style="font-style: italic;">Recall Mean : </label>&nbsp;<img style="width: 150px" src="image/recall.png"><br><br>
		<label style="font-style: italic;">Rumus Akurasi : </label>&nbsp;<img style="width:270px" src="image/akurasii.png"><br><br>
		</div>
		<div class="col-md-7">
		<label class="btn btn-sm btn-warning isDisabled"><i class="fa fa-check"></i>&nbsp;Tabel Akurasi, Precision, Recall</label><br>
		<table class="table table-striped table-bordered table-hover table-responsive">
		<thead align="center" class="bg-light">
			<th></th>
			<th>true TEPAT</th>
			<th>true TERLAMBAT</th>
			<th>Class Precision</th>
		</thead>
		<tbody>
			<tr align="center">
				<td>Prediksi Tepat</td>
				<td><?php echo $tp; ?></td>
				<td><?php echo $fn; ?></td>
				<td><?php $prec = ($tp/($tp+$fn))*100; echo number_format($prec,2); ?> %</td>
			</tr>
			<tr align="center">
				<td>Prediks Terlambat</td>
				<td><?php echo $tn; ?></td>
				<td><?php echo $fp; ?></td>
				<td><?php $prec1 = ($fp/($tn+$fp))*100; echo number_format($prec1,2); ?> %</td>
			</tr>
			<tr align="center">
				<td>Class Recall</td>
				<td><?php $recal = $tp/($tp+$tn)*100;echo  number_format($recal,2); ?> %</td>
				<td><?php $recal1 = $fp/($fp+$fn)*100;echo number_format($recal1,2); ?> %</td>
				<td></td>
			</tr>
		</tbody>
		</table>
		<label style="font-style: italic; font-weight: bold">Akurasi = <?php $akurasi = ($tp+$fp)/($tp+$fn+$tn+$fp)*100; echo number_format($akurasi,2); ?> %</label>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

<a href="#tetap" class="float" id="menu-share">
	<i class="my-float"><label style="margin-top: 9px">Menu</label></i>
</a>
<ul class="a">
	<li class="b"><a href="#non-numerik" class="c">
		<i class="my-float">Non Numerik</i>
	</a></li>
	<li class="b"><a href="#mean" class="c">
		<i class="my-float">S.Dev & Mean</i>
	</a></li>
	<li class="b"><a href="#hasil" class="c">
		<i class="my-float">Hasil Uji</i>
	</a></li>
</ul>