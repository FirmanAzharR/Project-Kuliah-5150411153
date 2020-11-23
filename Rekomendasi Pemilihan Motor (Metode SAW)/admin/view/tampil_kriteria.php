<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th style="text-align: center">No</th>
			<th style="text-align: center">Kode Kriteria</th>
			<th style="text-align: center">Nama Kriteria</th>
			<th style="text-align: center">Atribut</th>
			<th style="text-align: center">Bobot</th>
			<th style="text-align: center">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM data_kriteria") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr style="text-align: center" id="<?php echo $value['kode_kriteria']  ?>">
				<td><?php echo $key+1; ?></td>
				<td data-target="kode_kriteria"><?php echo $value['kode_kriteria']; ?></td>
				<td data-target="nama_kriteria"><?php echo $value['nama_kriteria'] ?></td>
				<td data-target="atribut"><?php echo $value['atribut']; ?></td>
				<td data-target="bobot"><?php echo $value['bobot']; ?></td>
				<td><button type="button" id="<?php echo $value['kode_kriteria']; ?>" data-role="edit" data-id="<?php echo $value['kode_kriteria'] ?>" class="btn btn-sm btn-warning">Edit</button></td>
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
			var nama_kriteria = $('#'+id).children('td[data-target=nama_kriteria]').text();
			var atribut = $('#'+id).children('td[data-target=atribut]').text();
			var bobot = $('#'+id).children('td[data-target=bobot]').text();
			
			$('#kode_kriteria').val(id);
			$('#nama_kriteria').val(nama_kriteria);
			$('#atribut').val(atribut);
			$('#bobot').val(bobot);
			$('#myModal').modal('toggle');
		});

		$('#simpan').click(function(){

			var kode = $('#kode_kriteria').val();
			var nama = $('#nama_kriteria').val();
			var atribut = $('#atribut').val();
			var bobot = $('#bobot').val();

			$.ajax({
				url:'proses/update_kriteria.php',
				type:'post',
				data:{kode:kode,nama:nama,atribut:atribut,bobot:bobot},
				success:function(response){
					if (response!='fail') {
						$('#'+kode).children('td[data-target=kode_kriteria]').text(kode);
						$('#'+kode).children('td[data-target=nama_kriteria]').text(nama);
						$('#'+kode).children('td[data-target=atribut]').text(atribut);
						$('#'+kode).children('td[data-target=bobot]').text(bobot);
						swal({
							title: "Kriteria Updated",
							text: "Data akun Terupdate",
							icon: "success",
							button: "OK!",
						}).then((value) => {
							$('#myModal').modal('toggle');
						});
					}else{
						swal({
							title: "Kriteria not Updated",
							text: "Data Kriteria Gagal Diupdate",
							icon: "error",
						});
					}
				}
			})
		})
	});

</script>