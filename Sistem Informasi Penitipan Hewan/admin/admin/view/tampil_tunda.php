<?php 
include '../../config/koneksi.php';

$tampil = mysqli_query($koneksi,'SELECT*FROM transaksi INNER JOIN user ON transaksi.`id_user`=user.`id_user` WHERE transaksi.`status`=0;');

$ktg = mysqli_query($koneksi,'SELECT*FROM kategori_hewan');

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h4>Data Transaksi Belum Dikonfirmasi</h4>
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
				<h4 class="modal-title"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div id="load_detail">
					
				</div>
				<input id="tr_id" type="hidden" class="form-control" placeholder="Username">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="konfirm"><i class="fas fa-check"></i>&nbsp;Terima</button>
				<button type="button" class="btn btn-danger" id="delete"><i class="fas fa-times"></i>&nbsp;Batal</button>
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


		$('#konfirm').click(function(){
			Swal.fire({
				title: 'Konfirmasi Penitipan ?',
				text: "Anda akan menerima transaksi penitipan ini.",
				type: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Terima !',
				cancelButtonText: 'Tidak !'
			}).then((result) => {
				if (result.value) {

					var id_tr = $('#tr_id').val();
					$.ajax({
						url:'proses/terima_trx.php',
						type:'POST',
						data:'id='+id_tr,
						success:function(response){
							if (response=='berhasil') {
								
								Swal.fire({
									title: 'Konfirmasi Sukses',
									text: 'Transaksi Penitipan Berhasil Dikonfirmasi',
									type: 'success',
								}).then((result) => {
									if (result.value) {
										$('.konten').load('view/tampil_tunda.php');
										$('#myModal').modal('toggle');
										$('.modal-backdrop').remove();
										$(document.body).removeClass("modal-open");	
									}
								})
							}
							else if (response=='tanggal'){
								Swal.fire(
									'Harus Konfirmasi Pada Tanggal Penitipan',
									'Transaski Penitipan Anda Belum Bisa Diterima',
									'warning'
									)
							}
							else{
								Swal.fire(
									'Konfirmasi Gagal',
									'Konfirmasi Transaski Penitipan Anda Gagal',
									'error'
									)
							}
						}

					})

				}
			})

		})


		$('#delete').click(function(){
			Swal.fire({
				title: 'Batalkan Transaksi Penitipan ?',
				text: "Anda akan membatalkan transaksi penitipan ini.",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Y, Batal !',
				cancelButtonText: 'Tidak !'
			}).then((result) => {
				if (result.value) {

					var id_tr = $('#tr_id').val();
					$.ajax({
						url:'proses/delete_trx.php',
						type:'POST',
						data:'id='+id_tr,
						success:function(response){
							if (response=='berhasil') {
								
								Swal.fire({
									title: 'Batal Transaksi Sukses',
									text: 'Transaksi Penitipan Berhasil Dibatalkan',
									type: 'success',
								}).then((result) => {
									if (result.value) {
										$('#'+id_tr).remove();
										$('#myModal').modal('toggle');									
									}
								})
							}
							else{
								Swal.fire(
									'Batal Transaksi Gagagl',
									'Hapus Transaski Penitipan Anda Gagal',
									'error'
									)
							}
						}

					})

				}
			})

		})

	})//end jq	

</script>