<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_pengumuman($_GET['id']); ?>
	<div class="card">
		<div class="card-header">
			<div style="font-size: 20px;font-weight: bold; color: #7A7A7D">
				<?php echo $select['judul'] ?>
			</div>
		</div>
		<div class="card-body">
			<center><img style="width: 300px" src="foto/<?php echo $select['img']?>" class="card-img-top img-thumbnail"></center>
			<div style="text-align: justify;margin-top: 20px;color: #7A7A7D">
				<?php echo $select['isi'] ?>
			</div>
		</div>
		<div class="card-footer">
			<?php echo $select['tgl'] ?>
		</div>
	</div>	

	<div style="margin-top: 20px" align="right">
		<a style="margin-right: 30px" href="index.php?halaman=pengumuman" class="btn btn-danger" ><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
		<?php if ($_SESSION['hak_akses']=='admin'): ?>
		<a data-toggle="popover" title="Edit" data-content="Edit Pengumuman " href="index.php?halaman=editpengumuman&id=<?php echo $_GET['id']; ?>" style="color: white; margin:1px" class="btn btn-warning" role="button" title="Edit"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
	<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
</script>
