<?php 

include '../../config/koneksi.php';

$norm = $_POST['norm'];

$query = mysqli_query($koneksi,"SELECT*FROM pasien_berobat WHERE no_rm = '$norm'");
$data = $query->fetch_assoc();

?>

<table class="table">
	<tbody>
		<tr>
			<td>No RM</td>
			<td><?php echo $data['no_rm']; ?></td>
		</tr>
		<tr>
			<td>Tgl Berobat</td>
			<td><?php echo $data['tanggal_berobat']; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td><?php echo $data['nama_pasien']; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><?php echo $data['jenis_kelamin']; ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><?php echo $data['tempat_lahir']; ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo $data['tanggal_lahir']; ?></td>
		</tr>
		<tr>
			<td>Jenis Pasien</td>
			<td><?php echo $data['jenis_pasien']; ?></td>
		</tr>
		<tr>
			<td>No Jaminan</td>
			<td><?php echo $data['no_jaminan']; ?></td>
		</tr>
		<tr>
			<td>Tujuan</td>
			<td><?php echo $data['tujuan']; ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $data['status']; ?></td>
		</tr>
	</tbody>
</table>

