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
			<td><?php echo $data['no_rm']; ?></td>
		</tr>
		<tr>
			<td>Tgl Daftar</td>
			<td><?php echo $data['tanggal_daftar']; ?></td>
		</tr>
		<tr>
			<td>Nama Pasien</td>
			<td><input type="text" id="nama" autocomplete="off" class="form-control" value="<?php echo $data['nama_pasien']; ?>"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select class="form-control" id="jenkel">
					<option value="L" <?php if ($data['jenis_kelamin']=='L') {
						echo "selected";
					} ?>
					>Laki-Laki</option>
					<option value="P" <?php if ($data['jenis_kelamin']=='P') {
						echo "selected";
					} ?>
					>Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama KK</td>
			<td><input type="text" id="nama_kk" autocomplete="off" class="form-control" value="<?php echo $data['nama_kk']; ?>"></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>
				<input type="text" id="pekerjaan" autocomplete="off" class="form-control" value="<?php echo $data['pekerjaan']; ?>">
			</td>
		</tr>
		<tr>
			<td>Almat</td>
			<td>
				<input type="text" id="alamat" autocomplete="off" class="form-control" value="<?php echo $data['alamat']; ?>">
			</td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>
				<input type="text" id="tempat_lahir" autocomplete="off" class="form-control" value="<?php echo $data['tempat_lahir']; ?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>
				<input type="date" id="tanggal_lahir" autocomplete="off" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>">
			</td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>
				<select class="form-control" id="agama">
					<option value="islam" <?php if ($data['agama']=='islam') {
						echo "selected";
					} ?>
					>Islam</option>
					<option value="kristen" <?php if ($data['agama']=='kristen') {
						echo "selected";
					} ?>
					>Kristen</option>
					<option value="katolik" <?php if ($data['agama']=='katolik') {
						echo "selected";
					} ?>
					>Katolik</option>
					<option value="hindu" <?php if ($data['agama']=='hindu') {
						echo "selected";
					} ?>
					>Hindu</option>
					<option value="budha" <?php if ($data['agama']=='budha') {
						echo "selected";
					} ?>
					>Budha</option>
				</select>
			</td>
		</tr>
	</tbody>
</table>
<hr>
<div align="right">
	<button class="btn btn-success btn-sm" id="update">Update</button>
	<button class="btn btn-danger btn-sm" id="batal">Batal</button>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$('#batal').click(function(){
			$('#myModal').modal('toggle');
		});

		$('#update').click(function(){
			var rm = '<?php echo $norm ?>';
			var nama = $('#nama').val();
			var jenkel = $('#jenkel').val();
			var nama_kk = $('#nama_kk').val();
			var pekerjaan = $('#pekerjaan').val();
			var alamat = $('#alamat').val();
			var tempat_lahir = $('#tempat_lahir').val();
			var tanggal_lahir = $('#tanggal_lahir').val();
			var agama = $('#agama').val();
			$.ajax({
				url:'proses/edit_pasien.php',
				type:'POST',
				data:{rm:rm,nama:nama,jenkel:jenkel,kk:nama_kk,pekerjaan:pekerjaan,alamat:alamat,tempat:tempat_lahir,tgl:tanggal_lahir,agama:agama},
				success:function(msg){
					// console.log(msg);
					if (msg=='berhasil') {
						location.reload(true);
					}else{
						alert('update gagal');
					}
				}
			})
		});


	})
</script>

