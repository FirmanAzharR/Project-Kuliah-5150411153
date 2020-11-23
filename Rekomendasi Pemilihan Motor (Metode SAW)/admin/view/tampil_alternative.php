<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th style="text-align: center">No</th>
			<th style="text-align: center">Kode Motor</th>
			<th style="text-align: center">Nama Motor</th>
			<th style="text-align: center">Gambar</th>
			<th style="text-align: center">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM data_motor") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr style="text-align: center" id="<?php echo $value['kode_motor'] ?>">
				<td><?php echo $key+1; ?></td>
				<td data-target='kode_motor'><?php echo $value['kode_motor'] ?></td>
				<td data-target='nama_motor'><?php echo $value['nama_motor'] ?></td>
				<td data-target='gambar'><img style="width: 70px" src="img/<?php echo $value['gambar']; ?>"></td>
				<td>
					<button id="<?php echo $value['kode_motor']; ?>" data-role="detail" data-id="<?php echo $value['kode_motor'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>

					<button id="<?php echo $value['kode_motor']; ?>" class="btn btn-sm btn-warning" data-role="edit" data-id="<?php echo $value['kode_motor'] ?>"><i class="fa fa-edit"></i></button>

					<button id="<?php echo $value['kode_motor']; ?>" data-role="delete" data-id="<?php echo $value['kode_motor'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
		$('.myTable').DataTable();
	});
</script>