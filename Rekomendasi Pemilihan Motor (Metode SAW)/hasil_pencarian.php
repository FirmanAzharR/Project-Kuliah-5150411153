<?php 
include 'config/koneksi.php';
$search = $_POST['pencarian'];

$sql = mysqli_query($koneksi,"SELECT*FROM `data_motor` WHERE nama_motor LIKE '%$search%'");
$cek = $sql->num_rows;

$kolom = 3;    
$i=1; 	

?>

<table class="table">
	<?php if ($cek>0){ ?>
	
	<h3> Hasil Pencarian</h3>
	<?php
	while ($data=mysqli_fetch_array($sql)) {
		if(($i) % $kolom== 1) {    
			echo'<tr>';			
		}?>
		<td>
			<div class="panel" style="margin:20px">
				<div class="panel-body">
					<br>
					<div style="overflow: hidden; padding: 0; max-width: 450px;">
						<img class="img-responsive" style="max-height: 250px; display: block; margin: auto; width: 80%;" src="admin/img/<?php echo $data['gambar']; ?>">
					</div>
					<br>
					<div align="justify">
						<table class="table">
							<tr>
								<td>Nama Motor :</td>
								<td><?php echo $data['nama_motor'] ?></td>
							</tr>
						</table>
						<button class="btn btn-sm btn-primary btn-block" data-role='detail' data-id="<?php echo $data['kode_motor'] ?>"><i class="lnr lnr-pointer-right"></i>&nbsp;lihat</button>
					</div>
				</div>
			</div>
		</td>
		<?php  
		if(($i) % $kolom == 0) {    
			echo'</tr>';				
		}
		$i++;
	}?>
</table>

<?php }else{ ?>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="error_page/css/style.css" />
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>4<span></span>4</h1>
			</div>
			<h2>Oops! Pencarian Tidak Ditemukan</h2>
			<p>Maaf Pencarian Kata Kunci Anda Tidak Ditemukan</p>
			<a href="index.php?halaman=home">Kembali Ke Halaman Utama</a>
		</div>
	</div>

<!-- 	<script type="text/javascript">
		$(document).ready(function(){
			window.location.replace("error_page/index.html");
		})
	</script> -->
	

	<?php } ?>