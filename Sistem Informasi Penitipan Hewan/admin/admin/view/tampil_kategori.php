<?php 
include '../../config/koneksi.php';

$tampil = mysqli_query($koneksi,'SELECT*FROM kategori_hewan');
$kucing = mysqli_query($koneksi,'SELECT*FROM ukuran_hewan WHERE id_peliharaan=1');
$anjing = mysqli_query($koneksi,'SELECT*FROM ukuran_hewan WHERE id_peliharaan=2');

$kandang = mysqli_query($koneksi,'SELECT total,sisa FROM stok_kandang WHERE nama="kucing"');
$stok = $kandang->fetch_assoc(); 

$kandang2 = mysqli_query($koneksi,'SELECT total,sisa FROM stok_kandang WHERE nama="anjing"');
$stok2 = $kandang2->fetch_assoc(); 


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">

	<div class="row">
		<div class="col-md-6">
			<h4>Data Kategori</h4>
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
				<th>Harga Penitipan (Per Hari)</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tampil as $key => $value): ?>
				<tr align="center" data-role="detail" data-id="<?php echo $value['id_kategori_hewan'];?>" id="<?php echo $value['id_kategori_hewan'];?>">
					<td width="70px"><?php echo $key+1 ?></td>
					<td width="400px" data-target="nama"><?php echo $value['nama_kategori_hewan'] ?></td>
					<td data-target="harga"><?php echo $value['harga']?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<hr>

	<div class="row">
		<div class="col-md-4">
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr align="center">
						<th colspan="3">
							Kandang
						</th>
					</tr>
				</thead>
				<thead class="thead-light">
					<tr align="center">
						<th>
							Nama
						</th>
						<th>
							Total
						</th>
						<th>
							Sisa
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Kucing</td>
						<td align="center" id="pakai"><?php echo $stok['total'];?></td>
						<td align="center" id="pakai"><?php echo $stok['sisa'];?></td>
					</tr>
					<tr>
						<td>Anjing</td>
						<td align="center" id="stk"><?php echo $stok2['total']; ?></td>
						<td align="center" id="stk"><?php echo $stok2['sisa']; ?></td>
					</tr>
				</tbody>
			</table>
			<button class="btn btn-sm btn-primary btn-block kandang">Update Stok</button>
		</div>

		<!--Kucing-->
		<div class="col-md-4">
			<table class="table table-bordered table-hover">
				<thead class="thead-light">
					<tr align="center">
						<th>Ukuran</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kucing as $key => $value): ?>
						<tr align="center" data-role="kucing" data-id_k="<?php echo $value['id_ukuran'];?>" id="<?php echo $value['id_ukuran'];?>">
							<td width="400px" data-target="nm-k"><?php echo $value['nama_ukuran'] ?></td>
							<td data-target="harga-k" id="<?php echo $value['id_ukuran'];?>"><?php echo $value['harga_ukuran']?></td>
						</tr>
					<?php endforeach ?>					
				</tbody>
			</table>
			<span class="btn btn-sm btn-success btn-block">Ukuran Kucing</span>
		</div>

		<!--ajg-->
		<div class="col-md-4">
			<table class="table table-bordered table-hover">
				<thead class="thead-light">
					<tr align="center">
						<th>Ukuran</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($anjing as $key => $value): ?>
						<tr align="center" data-role="anjing" data-id="<?php echo $value['id_ukuran'];?>" id="<?php echo $value['id_ukuran'];?>">
							<td width="400px" data-target="nm-a"><?php echo $value['nama_ukuran'] ?></td>
							<td data-target="hrg-a"><?php echo $value['harga_ukuran']?></td>
						</tr>
					<?php endforeach ?>					
				</tbody>
			</table>
			<span class="btn btn-sm btn-success btn-block">Ukuran Anjing</span>
		</div>
	</div>

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
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input id="nama" type="text" class="form-control" placeholder="Nama Kategori Hewan">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-bitcoin"></i></span>
					</div>
					<input id="harga" type="text" class="form-control" placeholder="Harga">
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


<!-- stok-->
<div class="modal fade" id="modal-kandang">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Total Kandang</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post" action="proses/update_kandang.php">
					<label>Kucing</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-cube"></i></span>
						</div>
						<input name="jml_kucing" type="number" class="form-control" placeholder="Total Stok">
						<input type="submit" value="kucing" name="kucing" class="btn btn-success btn-primary">
					</div>
				</form>
					<label>Anjing</label>
					<form method="post" action="proses/update_kandang.php">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-cube"></i></span>
						</div>
						<input name="jml_anjing" type="number" class="form-control" placeholder="Total Stok">
						<input type="submit" value="anjing" name="anjing" class="btn btn-success btn-primary">
					</div>
				</form>
				<div id="ntf">
					
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ukuran kucing-->
<div class="modal fade" id="modal-kucing">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Harga Ukuran Kucing</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="nm-k"><i class="fas fa-cat"></i>&nbsp;</span>
					</div>
					<input type="number" class="form-control" id="harga-k" value="">
				</div>	
				<input type="hidden" id="id-k" value="">
				<div id="ntf">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="update-kucing">Update</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>


<!-- ukuran ajg-->
<div class="modal fade" id="modal-ajg">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Harga Ukuran Anjing</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="nm-a"><i class="fas fa-cat"></i>&nbsp;</span>
					</div>
					<input type="number" class="form-control" id="harga-a" value="">
				</div>	
				<input type="hidden" id="id-a" value="">
				<div id="ntf">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="update-ajg">Update</button>
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

		$('.kandang').click(function(){
			var ttl = $('#total').text();
			var pakai = $('#pakai').text();
			$('#jml').val(ttl);
			$('#pakai-m').val(pakai);
			$('#modal-kandang').modal('toggle');
		})

		$(document).on('click','tr[data-role=detail]',function(){
			
			$('#delete').show();
			$('#update').show();
			$('#simpan').hide();

			var id = $(this).data('id');
			var nama = $(this).children('td[data-target=nama]').text();
			var harga = $(this).children('td[data-target=harga]').text();

			$('#user_id').val(id);
			$('#nama').val(nama);
			$('#harga').val(harga);
			$('#myModal').modal('toggle');
			
		});


		$(document).on('click','tr[data-role=kucing]',function(){
			
			var id = $(this).data('id_k');
			var harga = $(this).children('td[data-target=harga-k]').text();
			var nm_k = $(this).children('td[data-target=nm-k]').text();

			$('#id-k').val(id);
			$('#harga-k').val(harga);
			$('#nm-k').text(nm_k);
			$('#modal-kucing').modal('toggle');
			
		});

		$('#update-kucing').click(function(){
			var id=$('#id-k').val();
			var nama=$('#nm-k').text();
			var harga=$('#harga-k').val();
			$.ajax({
				url:'proses/update_ukuran.php',
				type:'POST',
				data:'id='+id+'&harga='+harga,
				success:function(response){
					console.log(response);
					if (response=='berhasil') {
						swal({
							title: "Update Berhasil",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('#myModal').modal('toggle');
							$('.modal-backdrop').remove();
							$(document.body).removeClass("modal-open");	
							$('#modal-kucing').modal('toggle');
							$('.konten').load('view/tampil_kategori.php');							
							

						})

					}else{
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

		$(document).on('click','tr[data-role=anjing]',function(){
			
			var id = $(this).data('id');
			var harga = $(this).children('td[data-target=hrg-a]').text();
			var nm_a = $(this).children('td[data-target=nm-a]').text();

			$('#id-a').val(id);
			$('#harga-a').val(harga);
			$('#nm-a').text(nm_a);
			$('#modal-ajg').modal('toggle');
			
		});

		$('#update-ajg').click(function(){
			var id=$('#id-a').val();
			var nama=$('#nm-a').text();
			var harga=$('#harga-a').val();
			$.ajax({
				url:'proses/update_ukuran.php',
				type:'POST',
				data:'id='+id+'&harga='+harga,
				success:function(response){
					console.log(response);
					if (response=='berhasil') {
						swal({
							title: "Update Berhasil",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('#'+id).children('td[data-target=nm-a]').text(nama);
							$('#'+id).children('td[data-target=hrg-a]').text(harga);
							$('#modal-ajg').modal('toggle');

						})

					}else{
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

		$('#update').click(function(){
			var id=$('#user_id').val();
			var nama=$('#nama').val();
			var harga=$('#harga').val();
			$.ajax({
				url:'proses/update_ktg.php',
				type:'POST',
				data:'id='+id+'&nama='+nama+'&harga='+harga,
				success:function(response){
					console.log(response);
					if (response=='berhasil') {
						swal({
							title: "Update Berhasil",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('#'+id).children('td[data-target=nama]').text(nama);
							$('#'+id).children('td[data-target=harga]').text(harga);
							$('#myModal').modal('toggle');

						})

					}else{
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
				url:'proses/delete_ktg.php',
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
			var nm = $('#nama').val();
			var hrg = $('#harga').val();

			$.ajax({
				url:'proses/tambah_ktg.php',
				type:'POST',
				data:'nama='+nm+'&harga='+hrg,
				success:function(response){
					if (response=='berhasil') {
						swal({
							title: "Tersimpan",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							$('.konten').load('view/tampil_kategori.php');
							$('#myModal').modal('toggle');
							$('.modal-backdrop').remove();
							$(document.body).removeClass("modal-open");			

						})

					}else{
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