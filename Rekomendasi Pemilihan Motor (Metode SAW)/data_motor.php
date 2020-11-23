<?php include 'config/koneksi.php'; ?>

<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>

<style type="text/css">
	.imgs {
		float: left;
		width:  350px;
		height: 300px;
		object-fit: cover;
		padding: 20px;
	}
</style>

<div>
	<h3>Data Sepeda Motor</h3>
	<hr>
	<div align="center">
		<table >
			<?php
			$kolom = 3;    
			$i=1; 	

			// Cek apakah terdapat data page pada URL
			$page = (isset($_GET['page']))? (int)$_GET['page'] : 1;

			$limit = 6; // Jumlah data per halamannya

			// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
			$limit_start = ($page - 1) * $limit;

			// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
			$sql = mysqli_query($koneksi,"SELECT*FROM data_motor INNER JOIN spesifikasi_motor ON data_motor.kode_motor = spesifikasi_motor.kode_motor LIMIT ".$limit_start.",".$limit."");

			$no = $limit_start + 1;

			while ($data=mysqli_fetch_array($sql)) {
				if(($i) % $kolom== 1) {    
					echo'<tr>';			
				}?>
				<td>

					<div style="background-color: white" style="max-width: 200px; max-height:250px;">
						<div style="margin-right: 10px;margin-top: 10px">
							<div id="image" class="imgs">
								<center>
									<img class="img-responsive" src="admin/img/<?php echo $data['gambar']; ?>">
								</center>
							</div>
							<div style="margin: 10px" align="center">
								<label style="font-weight: bold"><?php echo $data['nama_motor'] ?></label>
								<br>
								<?php echo rupiah($data['harga']); ?>
							</div>
							<button class="btn btn-sm btn-primary btn-block" data-role='detail' data-id="<?php echo $data['kode_motor'] ?>"><i class="lnr lnr-pointer-right"></i>&nbsp;lihat</button>
						</div>
					</div>

				</td>
				<?php  
				if(($i) % $kolom == 0) {    
					echo'</tr>';				
				}
				$i++;
				$no++;
			}
			?>
		</table>
	</div>
</div>
<ul class="pagination">
	<!-- LINK FIRST AND PREV -->
	<?php
				if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
					?>
					<li class="disabled"><a href="#">First</a></li>
					<li class="disabled"><a href="#">&laquo;</a></li>
					<?php
				}else{ // Jika page bukan page ke 1
					$link_prev = ($page > 1)? $page - 1 : 1;
					?>
					<li><a href="index.php?halaman=data_motor&page=1">First</a></li>
					<li><a href="index.php?halaman=data_motor&page=<?php echo $link_prev; ?>">&laquo;</a></li>
					<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM data_motor");
				$get_jumlah = mysqli_fetch_array($sql2);
				
				$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
				$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($page == $i)? ' class="active"' : '';
					?>
					<li<?php echo $link_active; ?>><a href="index.php?halaman=data_motor&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php
				}
				?>
				
				<!-- LINK NEXT AND LAST -->
				<?php
				// Jika page sama dengan jumlah page, maka disable link NEXT nya
				// Artinya page tersebut adalah page terakhir 
				if($page == $jumlah_page){ // Jika page terakhir
					?>
					<li class="disabled"><a href="#">&raquo;</a></li>
					<li class="disabled"><a href="#">Last</a></li>
					<?php
				}else{ // Jika Bukan page terakhir
					$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
					?>
					<li><a href="index.php?halaman=data_motor&page=<?php echo $link_next; ?>">&raquo;</a></li>
					<li><a href="index.php?halaman=data_motor&page=<?php echo $jumlah_page; ?>">Last</a></li>
					<?php
				}
				?>
			</ul>


			<!-- modal -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Informasi Lengkap Motor</h4>
						</div>
						<div class="modal-body">

						</div>
					</div>
				</div>
			</div>


			<script type="text/javascript">
				$(document).ready(function(){
					$(document).on('click','button[data-role=detail]',function(){
						var kode = $(this).data('id');
						$.post('informasi_motor.php', { kode: kode },  function(data, status) {
							$('.modal-body').html(data);
							$('#myModal').modal('toggle');
						});
					})
				})
			</script>