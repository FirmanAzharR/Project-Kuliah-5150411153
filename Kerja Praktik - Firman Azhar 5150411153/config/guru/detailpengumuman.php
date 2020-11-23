<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_pengumuman($_GET['id']); ?>
	<div class="card">
		<div class="card-header">
			<div style="font-size: 20px;font-weight: bold; color: #7A7A7D">
				<?php echo $select['judul'] ?>
			</div>
		</div>
		<div class="card-body">
			<center><img style="width: 300px" src="../admin/foto/<?php echo $select['img']?>" class="card-img-top img-thumbnail"></center>
			<div style="text-align: justify;margin-top: 20px;color: #7A7A7D">
				<?php echo $select['isi'] ?>
			</div>
		</div>
		<div class="card-footer">
			<?php echo $select['tgl'] ?>
		</div>
	</div>	
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
</script>
