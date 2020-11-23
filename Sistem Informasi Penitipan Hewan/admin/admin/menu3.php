<?php 
include '../config/koneksi.php';

$tampil = mysqli_query($koneksi,'SELECT*FROM user');

?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">

	<h4>Data User</h4>
	<hr style="border: 1px solid #FFC400">
	<table class="table table-bordered table-stripped myTable table-responsive">
		<thead class="thead-light">
			<tr align="center">
				<th>No.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tampil as $key => $value): ?>
				<tr align="center" data-role="detail" data-id="<?php echo $value['id_user'];?>" id="<?php echo $value['id_user'];?>">
					<td><?php echo $key+1 ?></td>
					<td width="150px" data-target="nama"><?php echo $value['nama'] ?></td>
					<td data-target="alamat"><?php echo $value['alamat'] ?></td>
					<td data-target="telepon"><?php echo $value['no_telp'] ?></td>
					<td data-target="email"><?php echo $value['email'] ?></td>
					<td data-target="username"><?php echo $value['username'] ?></td>
					<td data-target="password"><?php echo $value['password'] ?></td>
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
				<h4 class="modal-title">Data User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input id="nama" type="text" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<textarea class="form-control" id="alamat">

					</textarea>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-phone"></i></span>
					</div>
					<input id="telepon" type="text" class="form-control" placeholder="Username">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
					</div>
					<input id="email" type="text" class="form-control" placeholder="Username">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input id="username" type="text" class="form-control" placeholder="Username">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-key"></i></span>
					</div>
					<input id="password" type="text" class="form-control" placeholder="Username">
				</div>
				<input id="user_id" type="hidden" class="form-control" placeholder="Username">
			</div>
			<div class="modal-footer">
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
			var id = $(this).data('id');
			var nama = $(this).children('td[data-target=nama]').text();
			var alamat = $(this).children('td[data-target=alamat]').text();
			var telepon = $(this).children('td[data-target=telepon]').text();
			var email = $(this).children('td[data-target=email]').text();
			var username = $(this).children('td[data-target=username]').text();
			var password = $(this).children('td[data-target=password]').text();

			$('#nama').val(nama);
			$('#alamat').val(alamat);
			$('#telepon').val(telepon);
			$('#email').val(email);
			$('#username').val(username);
			$('#password').val(password);
			$('#user_id').val(id);

			$('#myModal').modal('toggle');
			
		});

		$('#update').click(function(){
			var id=$('#user_id').val();
			var nama=$('#nama').val();
			var alamat=$('#alamat').val();
			var email=$('#email').val();
			var telepon=$('#telepon').val();
			var password=$('#password').val();
			var username=$('#username').val();
			$.ajax({
				url:'proses/update_user.php',
				type:'POST',
				data:'id='+id+'&nama='+nama+'&alamat='+alamat+'&telepon='+telepon+'&email='+email+'&username='+username+'&password='+password,
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
							$('#'+id).children('td[data-target=alamat]').text(alamat);
							$('#'+id).children('td[data-target=telepon]').text(telepon);
							$('#'+id).children('td[data-target=email]').text(email);
							$('#'+id).children('td[data-target=username]').text(username);
							$('#'+id).children('td[data-target=password]').text(password);
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
				url:'proses/delete_user.php',
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


	});

</script>