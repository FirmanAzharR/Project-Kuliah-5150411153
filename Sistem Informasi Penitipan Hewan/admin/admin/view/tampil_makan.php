<?php 
include '../../config/koneksi.php';

$tampil = mysqli_query($koneksi,'SELECT kategori_hewan.nama_kategori_hewan,makanan.keterangan,makanan.harga,makanan.id_makanan FROM makanan INNER JOIN kategori_hewan ON makanan.id_kategori_hewan=kategori_hewan.id_kategori_hewan');
$ktg = mysqli_query($koneksi,'SELECT*FROM kategori_hewan');

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">

	<div class="row">
		<div class="col-md-6">
			<h4>Data Makanan</h4>
		</div>
		<div class="col-md-6">
			<button id="add" class="btn btn-sm btn-primary" style="float: right"><i class="fas fa-plus"></i></button>
		</div>
	</div>
	<hr style="border: 1px solid #FFC400">
	<table class="table table-bordered table-stripped myTable table-hover">
		<thead class="thead-light">
			<tr align="center">
				<th>No.</th>
				<th>Nama Kategori</th>
				<th>Keterangan</th>
				<th>Harga Penitipan (Per Hari)</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tampil as $key => $value): ?>
				<tr align="center" data-role="detail" data-id="<?php echo $value['id_makanan'];?>" id="<?php echo $value['id_makanan'];?>">
					<td width="70px"><?php echo $key+1 ?></td>
					<td width="200px" data-target="nama"><?php echo $value['nama_kategori_hewan'] ?></td>
					<td data-target="ket"><?php echo $value['keterangan']?></td>
					<td data-target="harga"><?php echo $value['harga']?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>


<!-- MODAL-->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Kategori</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<select id="ktg" name="ktg"  class="form-control" aria-label="ktg" aria-describedby="basic-addon1">
						<option value="" disabled selected>Pilih Kategori Hewan</option>
						<?php foreach ($ktg as $key => $value): ?>
							<option id_ktg="<?php echo $value['id_kategori_hewan'] ?>" value="<?php echo $value['nama_kategori_hewan'] ?>"><?php echo $value['nama_kategori_hewan'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
					</div>
					<input id="keterangan" type="text" class="form-control" placeholder="Keterangan">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
					</div>
					<input id="hrg" type="text" class="form-control" placeholder="Harga">
				</div>
				<input id="user_id" type="hidden" class="form-control" placeholder="Username">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="simpan">Simpan</button>
				<button type="button" class="btn btn-success" id="update">Update</button>
				<button type="button" class="btn btn-danger" id="delete">Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready( function () {
		$('.myTable').DataTable();
	});

	$(document).ready( function () {
		$(document).on('click','tr[data-role=detail]',function(){

			$('#delete').show();
			$('#update').show();
			$('#simpan').hide();

			var id = $(this).data('id');
			var ktg = $(this).children('td[data-target=nama]').text();
			var ket = $(this).children('td[data-target=ket]').text();
			var harga = $(this).children('td[data-target=harga]').text();

			$('#user_id').val(id);
			$("#ktg").val(ktg);
			$('#keterangan').val(ket);
			$('#hrg').val(harga);
			$('#myModal').modal('toggle');
			
		});

		$('#update').click(function(){
			var id=$('#user_id').val();
			var ktg=$( "#ktg option:selected" ).attr('id_ktg');
			var nm_ktg=$("#ktg").val();
			var ket=$('#keterangan').val();
			var hrg=$('#hrg').val();
			$.ajax({
				url:'proses/update_mkn.php',
				type:'POST',
				data:'id='+id+'&ktg='+ktg+'&ket='+ket+'&hrg='+hrg,
				success:function(response){
					if (response=='berhasil') {
						swal({
							title: "Update Berhasil",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('#'+id).children('td[data-target=nama]').text(nm_ktg);
							$('#'+id).children('td[data-target=ket]').text(ket);
							$('#'+id).children('td[data-target=harga]').text(hrg);
							$('#myModal').modal('toggle');

						})
					}else{
						console.log(response);
						swal({
							title: "Update Gagal",
							type: "error",
							timer: 1500,
							showConfirmButton: false,
						})
					}
				}
			})
		});


		$('#delete').click(function(){
			var id=$('#user_id').val();
			$.ajax({
				url:'proses/delete_mkn.php',
				type:'POST',
				data:'id='+id,
				success:function(response){
					if (response=='berhasil') {
						swal({
							title: "Hapus Berhasil",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('#'+id).remove();
							$('#myModal').modal('toggle');
							
						})

					}else{
						console.log(id);
						swal({
							title: "Hapus Gagal",
							type: "error",
							timer: 1500,
							showConfirmButton: false,
						})
					}
				}
			})
		});

		$('#simpan').click(function(){
			var id_ktg = $( "#ktg option:selected" ).attr('id_ktg');
			var nm = $('#keterangan').val();
			var hrg = $('#hrg').val();

			$.ajax({
				url:'proses/tambah_mkn.php',
				type:'POST',
				data:'ktg='+id_ktg+'&ket='+nm+'&harga='+hrg,
				success:function(response){
					if (response=='berhasil') {
						swal({
							title: "Tersimpan",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('.konten').load('view/tampil_makan.php');
							$('#myModal').modal('toggle');
							$('.modal-backdrop').remove();
							$(document.body).removeClass("modal-open");			
												
						})

					}else{
						console.log(response);
						swal({
							title: "Simpan Gagal",
							type: "error",
							timer: 1500,
							showConfirmButton: false,
						})
					}
				}
			})
		});

		$('#add').click(function(){
			$('#update').hide();
			$('#simpan').show();
			$('#delete').hide();
			$('#nama').val('');
			$('#harga').val('');
			$('#myModal').modal('toggle');

		})


	});

</script>