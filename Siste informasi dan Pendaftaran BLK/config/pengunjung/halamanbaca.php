<style type="text/css">
.hiden{
	display: none;
}
#baca{
	margin-top: 50px;
}
</style>
<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_berita($_GET['baca']); ?>
	<div class="container">
		<div class="card">
			<div class="card-header" id="baca">
				<div style="font-size: 25px;font-weight: bold; color: black">
					<?php echo $select['judul'] ?>
				</div>
			</div>
			<div class="card-body">
				<center><img style="width: 600px" src="berita_img/<?php echo $select['gambar']?>" class="card-img-top img-thumbnail"></center>
				<div style="margin-top: 20px;color: black">
					<?php echo $select['isi'] ?>
				</div>
			</div>
			<div class="card-footer">
				<?php echo $select['tgl'] ?>
			</div>
		</div>	
	</div>
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
</script>
