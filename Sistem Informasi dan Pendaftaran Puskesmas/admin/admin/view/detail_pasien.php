<?php 

include '../../config/koneksi.php';

$norm = $_POST['norm'];

$query = mysqli_query($koneksi,"SELECT*FROM pasien WHERE no_rm = '$norm'");
$data = $query->fetch_assoc();

?>

<table class="table">
	<tbody>
		<tr>
			<td>No RM</td>
			<td><?php  echo 'RM00';echo $data['no_rm']; ?></td>
		</tr>
		<tr>
			<td>Tgl Daftar</td>
			<td><?php echo date('d F Y', strtotime($data['tanggal_daftar'])); ?></td>
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
			<td>Nama KK</td>
			<td><?php echo $data['nama_kk']; ?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td><?php echo $data['pekerjaan']; ?></td>
		</tr>
		<tr>
			<td>Almat</td>
			<td><?php echo $data['alamat']; ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><?php echo $data['tempat_lahir']; ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo date('d F Y', strtotime($data['tanggal_lahir']));  ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td><?php echo $data['agama']; ?></td>
		</tr>
	</tbody>
</table>

