<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th style="text-align: center">No</th>
			<th style="text-align: center">Kode Nilai Kriteria</th>
			<th style="text-align: center">Kode Kriteria</th>
			<th style="text-align: center">Nama Kriteria</th>
			<th style="text-align: center">Crips</th>
			<th style="text-align: center">Nilai</th>
			<th style="text-align: center">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr style="text-align: center" id="<?php echo $value['kode_nilai_kriteria']?>">
				<td><?php echo $key+1; ?></td>
				<td data-target="kode_nilai"><?php echo $value['kode_nilai_kriteria'] ?></td>
				<td data-target="kode_kriteria"><?php echo $value['kode_kriteria'] ?></td>
				<td data-target="nama_kriteria"><?php echo $value['nama_kriteria'] ?></td>
				<td data-target="crips">
					<?php 
						// if ($value['kode_nilai_kriteria']=='NK22') {
						// 	echo "<=";
						// }
						// if ($value['kode_nilai_kriteria']=='NK23') {
						// 	echo "<=";
						// }
						// if ($value['kode_nilai_kriteria']=='NK24') {
						// 	echo "<=";
						// }
						// if ($value['kode_nilai_kriteria']=='NK25') {
						// 	echo "<=";
						// }
						// if ($value['kode_nilai_kriteria']=='NK26') {
						// 	echo ">=";
						// }
					?>
					<?php echo $value['crips']; ?>
					
				</td>
				<td data-target="nilai"><?php echo $value['nilai']; ?></td>
				<td><button type="button" class="btn btn-sm btn-success" id="<?php echo $value['kode_nilai_kriteria']; ?>" data-role="edit" data-id="<?php echo $value['kode_nilai_kriteria'] ?>">Edit</button></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
		$('.myTable').DataTable();
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','button[data-role=edit]',function(){
			var id = $(this).data('id');
			var kode_kriteria = $('#'+id).children('td[data-target=kode_kriteria]').text();
			var crips = $('#'+id).children('td[data-target=crips]').text();
			var nilai = $('#'+id).children('td[data-target=nilai]').text();
			
			$('#kode_nilai_kriteria').val(id);
			$('#kriteria').val(kode_kriteria);
			$('#crips').val(crips);
			$('#nilai').val(nilai);
			$('#myModal').modal('toggle');
		});

		$('#simpan').click(function(){

			var kode_nilai = $('#kode_nilai_kriteria').val();
			var kode_kriteria = $('#kriteria').val();
			var nama_kriteria = $('#kriteria option:selected').attr('nama_kriteria');
			var crips = $('#crips').val();
			var nilai = $('#nilai').val();

			$.ajax({
				url:'proses/update_nilai_kriteria.php',
				type:'post',
				data:{kode:kode_nilai,kriteria:kode_kriteria,crips:crips,nilai:nilai},
				success:function(response){
					if (response!='fail') {
						$('#'+kode_nilai).children('td[data-target=kode_kriteria]').text(kode_kriteria);
						$('#'+kode_nilai).children('td[data-target=nama_kriteria]').text(nama_kriteria);
						$('#'+kode_nilai).children('td[data-target=crips]').text(crips);
						$('#'+kode_nilai).children('td[data-target=nilai]').text(nilai);
						swal({
							title: "Nilai Kriteria Updated",
							text: "Data akun Terupdate",
							icon: "success",
							button: "OK!",
						}).then((value) => {
							$('#myModal').modal('toggle');
						});
					}else{
						swal({
							title: "Nilai Kriteria not Updated",
							text: "Data Kriteria Gagal Diupdate",
							icon: "error",
						});
					}
				}
			})
		})
	});

</script>