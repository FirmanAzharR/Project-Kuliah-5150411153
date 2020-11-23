<?php 

include '../../config/koneksi.php';
$id = $_POST['id_trx']; 

$query=mysqli_query($koneksi,"SELECT*FROM `detail_transaksi` INNER JOIN transaksi ON `detail_transaksi`.`id_transaksi` = `transaksi`.`id_transaksi` INNER JOIN `kategori_hewan` ON `detail_transaksi`.`id_kategori` =  `kategori_hewan`.`id_kategori_hewan` WHERE transaksi.id_transaksi = $id ORDER BY(`detail_transaksi`.id_detail) ASC");
$dt = $query->fetch_assoc();

$jumlah_hari = mysqli_query($koneksi,"SELECT datediff(tgl_ambil,tgl_titip) as hari FROM transaksi WHERE id_transaksi = $id ORDER BY(id_transaksi) DESC LIMIT 1");
$y = $jumlah_hari->fetch_assoc();


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<div id="header" style="text-align: center;color:white">
	<?php echo date('d M Y', strtotime($dt['tgl_titip'])); ?> &nbsp;-&nbsp;<?php echo date('d M Y', strtotime($dt['tgl_ambil'])); ?>
</div><br>
<?php foreach ($query as $key => $value): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-uppercase text-muted mb-0" style="padding-bottom: 15px">Kode Transaksi <?php echo $value['kode_trans'] ?></h5>
					<span class="h5 font-weight-bold mb-0">
						<table class="table">
							<tbody>
								<tr>
									<td><label>Kategori : </label></td>
									<td><label><?php echo $value['nama_kategori_hewan'] ?></label></td>
									<td><label><?php echo rupiah($value['harga'])  ?></label><label>x&nbsp;<?php echo $y['hari'] ?>&nbsp;Hari</label></td>

								</tr>
								<tr>
									<td><label>Jenis : </label></td>
									<?php 
									$id_hewan = $value['id_jenis'];
									$query1=mysqli_query($koneksi,"SELECT nama_jenis_hewan FROM jenis_hewan WHERE id_jenis_hewan = $id_hewan"); 
									$jns=$query1->fetch_assoc();
									?>
									<td><label><?php echo $jns['nama_jenis_hewan']  ?></label></td>
									<td><label>Rp.&nbsp;- </label></td>
								</tr>
								<tr>
									<td><label>Makanan : </label></td>
									<?php 
									$id_mkn = $value['makanan'];
									if ($id_mkn!=0) {
										$query2=mysqli_query($koneksi,"SELECT keterangan, harga FROM makanan WHERE id_makanan = $id_mkn"); 
										$mkn=$query2->fetch_assoc();	
										?>
										<td><label><?php echo $mkn['keterangan']  ?></label></td>
										<td>
											<label><?php echo rupiah($mkn['harga']) ?> </label>
											<label>x&nbsp;<?php echo $y['hari'] ?>&nbsp;Hari</label>
										</td>
									<?php } else{ ?>
										<td><label><?php echo 'Bawa Sendiri' ?></label></td>
										<td><label>Rp.&nbsp;- </label></td>
									<?php } ?>
								</tr>
								<tr style="font-weight: bold">
									<td>Paket Grooming:</td>
									<td></td>
									<td></td>
								</tr>
								<?php 
								echo '<tr>';
								$ukr = $value['ukuran_hewan'];
								$query3=mysqli_query($koneksi,"SELECT nama_ukuran, harga_ukuran FROM ukuran_hewan WHERE id_ukuran = $ukr"); 
								$size=$query3->fetch_assoc();
								if ($ukr!=0) {
									?>
									<td><label>Ukuran : </label></td>		
									<td><label><?php echo $size['nama_ukuran'] ?></label></td>		
									<td><label><?php echo rupiah($size['harga_ukuran']) ?></label></td>
								</tr>	
								<tr>
									<td><label>Obat : </label></td>		
									<td><label><?php
									$id_ktg = $value['id_kategori_hewan'];
									$a = mysqli_query($koneksi,"SELECT nama_obat FROM obat_peliharaan WHERE id_hewan=$id_ktg");
									foreach ($a as $key => $val) {
										echo "<i class='fas fa-check'></i>&nbsp;";
										echo $val['nama_obat'];
										echo "<br>";
									}
									?></label></td>		
									<td><label><?php echo rupiah($value['obat']) ?></label></td>
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
									<td><?php echo rupiah($value['bayar']) ?></td>
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
									<td><?php echo rupiah($value['bayar']) ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</span>
				<p class="mt-3 mb-0 text-muted text-sm">
					<span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
					<span class="text-nowrap">nota</span>
				</p>
			</div>
		</div>
	</div>
</div>
<hr>
<?php endforeach ?>

