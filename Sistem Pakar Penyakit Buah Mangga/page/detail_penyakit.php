<?php include '../config/koneksi.php'; ?>
<?php 
	$id = $_POST['id'];
	$penyakit = mysqli_query($koneksi,"SELECT nama_penyakit,definisi FROM penyakit WHERE id_penyakit='".$id."'"); 
	$data = $penyakit->fetch_assoc();
?>
<div class="resume-section-content">
	<h2 class="mb-5">Detail Penyakit <?php echo $data['nama_penyakit']; ?></h2>
	<p class="lead mb-5" align="justify"><?php echo $data['definisi']; ?></p>
</div>