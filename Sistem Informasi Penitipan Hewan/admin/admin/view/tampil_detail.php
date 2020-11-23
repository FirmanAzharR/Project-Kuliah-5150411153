<?php 

include '../../config/koneksi.php';
$id = $_POST['myData'];

$tampil = mysqli_query($koneksi,"SELECT*FROM `detail_transaksi` INNER JOIN transaksi ON `detail_transaksi`.`id_transaksi` = `transaksi`.`id_transaksi` INNER JOIN `kategori_hewan` ON `detail_transaksi`.`id_kategori` =  `kategori_hewan`.`id_kategori_hewan` WHERE transaksi.id_transaksi = $id ORDER BY(`detail_transaksi`.id_detail) ASC");
$dt = $tampil->fetch_assoc();

$jumlah_hari = mysqli_query($koneksi,"SELECT datediff(tgl_ambil,tgl_titip) as hari FROM transaksi WHERE id_transaksi = $id ORDER BY(id_transaksi) DESC LIMIT 1");
$y = $jumlah_hari->fetch_assoc();

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>

<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">

	<?php foreach ($tampil as $key => $value): ?>
		<label style="font-weight: bold">Kode Transaksi <?php echo $value['kode_trans'] ?></label><br>
		<table class="table table-stripped table-bordered myTable table-hover">
			<tbody>
				<tr>
					<td width="200px">Kategori</td>
					<td align="center"><?php echo $value['nama_kategori_hewan'] ?></td>
					<td align="center"><?php echo rupiah($value['harga'])  ?></td>
				</tr>
				<tr>
					<?php 
					$id_hewan = $value['id_jenis'];
					$query1=mysqli_query($koneksi,"SELECT nama_jenis_hewan FROM jenis_hewan WHERE id_jenis_hewan = $id_hewan"); 
					$jns=$query1->fetch_assoc();
					?>
					<td>Jenis</td>
					<td align="center"><?php echo $jns['nama_jenis_hewan']  ?></td>
					<td align="center">Rp.&nbsp;- </td>
				</tr>
				<tr>
					<td>Makanan</td>
					<?php 
					$id_mkn = $value['makanan'];
					if ($id_mkn!=0) {
						$query2=mysqli_query($koneksi,"SELECT keterangan, harga FROM makanan WHERE id_makanan = $id_mkn"); 
						$mkn=$query2->fetch_assoc();	
						?>
						<td align="center"><?php echo $mkn['keterangan']  ?></td>
						<td align="center">
							<?php echo rupiah($mkn['harga']) ?><br>
							x&nbsp;<?php echo $y['hari'] ?>&nbsp;Hari
						</td>
					<?php } else{ ?>
						<td align="center"><label><?php echo 'Bawa Sendiri' ?></label></td>
						<td align="center"><label>Rp.&nbsp;- </label></td>
					<?php } ?>
				</tr>
				<tr>
					<td colspan="3" style="font-weight: bold">Paket Grooming</td>
				</tr>
				<?php 
				echo '<tr>';
				$ukr = $value['ukuran_hewan'];
				$query3=mysqli_query($koneksi,"SELECT nama_ukuran, harga_ukuran FROM ukuran_hewan WHERE id_ukuran = $ukr"); 
				$size=$query3->fetch_assoc();
				if ($ukr!=0) {
					?>
					<td><label>Ukuran : </label></td>		
					<td align="center"><label><?php echo $size['nama_ukuran'] ?></label></td>		
					<td align="center"><label><?php echo rupiah($size['harga_ukuran']) ?></label></td>
				</tr>	
				<tr>
					<td><label>Obat : </label></td>		
					<td align="center"><label><?php
					$id_ktg = $value['id_kategori_hewan'];
					$a = mysqli_query($koneksi,"SELECT nama_obat FROM obat_peliharaan WHERE id_hewan=$id_ktg");
					foreach ($a as $key => $val) {
						echo "<i class='fas fa-check'></i>&nbsp;";
						echo $val['nama_obat'];
						echo "<br>";
					}
					?></label></td>		
					<td align="center"><label><?php echo rupiah($value['obat']) ?></label></td>
				</tr>
				<tr>
					<td><label>Vaksin : </label></td>		
					<td align="center"><label><?php
					$id_vksn = $value['vaksin'];

					if ($id_vksn==0) {
						echo "-";
					}else{

						$b = mysqli_query($koneksi,"SELECT nama_vaksin,harga FROM vaksin WHERE id_vaksin=$id_vksn");
						$vksn = $b->fetch_assoc();
						echo "<i class='fas fa-check'></i>&nbsp;";
						echo "<br>";
						echo $vksn['nama_vaksin'];

						echo "</label></td>";

					}
					?>
					<?php if ($id_vksn==0) { ?>
						<td align='center'><label>-</label></td>
					<?php } else{ ?>
						<?php 
						$b = mysqli_query($koneksi,"SELECT nama_vaksin,harga FROM vaksin WHERE id_vaksin=$id_vksn");
						$vksn = $b->fetch_assoc();
						?>
						<td align='center'><label><?php echo rupiah($vksn['harga']); ?></label></td>
					<?php } ?>
				</tr>
				<tr>
					<td>Jumlah Bayar :</td>
					<td></td>
					<td align="center"><?php echo rupiah($value['bayar']); ?></td>
				</tr>
			<?php } else {?>
				<tr>											
					<td align="center"><label>--</label></td>	
					<td align="center"><label>Tidak</label></td>	
					<td align="center"><label>--</label></td>	
				</tr>
				<tr>
					<td>Jumlah Bayar :</td>
					<td></td>
					<td  align="center"><?php echo rupiah($value['bayar']); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<center>
		<?php 
			$id_dt = $value['id_detail'];
			$img = mysqli_query($koneksi,"SELECT nama_gambar FROM gambar WHERE id_detail_trans='$id_dt'"); 
			$gbr = $img->fetch_assoc();
		?>
		<label>Gambar Hewan Peliharaan</label>
		<br>
		<img style="max-width: 300px" class="img img-responsive img-thumbnail" src="../../user/proses/upload/<?php echo $gbr['nama_gambar'] ?>">
	</center>
	<hr style="">
<?php endforeach ?>

</div>