<?php 

include '../../config/koneksi.php';

$tampil = mysqli_query($koneksi,'SELECT*FROM transaksi INNER JOIN user ON transaksi.`id_user`=user.`id_user` WHERE transaksi.`status`=1 AND transaksi.`status_ambil`=1;');

$ktg = mysqli_query($koneksi,'SELECT*FROM kategori_hewan');

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">

	<div class="row">
		<div class="col-md-6">
			<h4>Data Transaksi Sukses</h4>
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
				<th>Nama Pelanggan</th>
				<th>Telepon</th>
				<th>Tgl Titip</th>
				<th>Tgl Ambil</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tampil as $key => $value): ?>
				<tr align="center" data-role="detail" data-id="<?php echo $value['id_transaksi'];?>" id="<?php echo $value['id_transaksi'];?>">
					<td width="70px"><?php echo $key+1 ?></td>
					<td width="200px" data-target="nama"><?php echo $value['nama'];?></td>
					<td data-target="telepon"><?php echo $value['no_telp']?></td>
					<td data-target="titip"><?php echo date('d M Y', strtotime($value['tgl_titip']));?></td>
					<td data-target="ambil"><?php echo date('d M Y', strtotime($value['tgl_ambil']));?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>

<!-- MODAL-->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Transaski Penitipan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<input id="tr_id" type="hidden" class="form-control" placeholder="Username">
				<div id="load_detail">
					
				</div>
			</div>
			<div class="modal-footer">
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

			var id = $(this).data('id');
			var nama = $(this).children('td[data-target=nama]').text();

			$('#tr_id').val(id);
			$.post('view/tampil_detail.php',   // url
			   { myData: id }, // data to be submit
			   function(data, status) {// success callback
			   	$('#load_detail').html(data);
			   	//console.log('myid='+id);
			   });
			$('.modal-title').html('Detail Transaski Penitipan '+nama);
			$('#myModal').modal('toggle');
			
		});
	});

</script>