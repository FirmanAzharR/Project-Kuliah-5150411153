<?php 

include '../../config/koneksi.php';

$id = $_POST['id'];

$query = mysqli_query($koneksi,"SELECT*FROM kritik_saran WHERE id_pengaduan = '$id'");
$data = $query->fetch_assoc();

?>

<input readonly class="form-control" type="text" value="<?php echo $data['nama'] ?>"><br>
<input readonly class="form-control" type="text" value="<?php echo $data['email'] ?>"><br>
<textarea class="form-control" readonly>
	<?php echo $data['isi_aduan']?>
</textarea>


