<div style="margin-left: 15px;margin-right: 15px">
	<?php $data=$data->select_berita($_GET['id']); ?>
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Detail Berita</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<div class="card">
			<div class="card-header">
			</div>
			<div class="card-body">
				<h4 style="text-align: center;"><?php echo $data['judul'] ?></h4>
				<center><img src="../../berita_img/<?php echo $data['gambar'] ?>" class="img-thumbnail" style="width: 250px"></center>
				<p style="text-align: justify;"><?php echo $data['isi'] ?></p>
			</div>
		</div>
	</div>	
	<!--end of warper-->
</div>
