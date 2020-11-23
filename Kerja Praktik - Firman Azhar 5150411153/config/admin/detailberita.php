<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_berita($_GET['id']); ?>
	<div class="card">
		<div class="card-header">
			<div style="font-size: 25px;font-weight: bold; color: black">
				<?php echo $select['judul'] ?>
			</div>
		</div>
		<div class="card-body text-dark" style="color: black">
			<center><img style="width: 600px" src="foto/<?php echo $select['img']?>" class="card-img-top img-thumbnail"></center>
			<div style="color: black">
				<p><?php echo $select['isi'] ?></p>
			</div>
		</div>
		<div class="card-footer">
			<?php echo $select['tgl'] ?>
		</div>
	</div>	

	<div style="margin-top: 20px" align="right">
		<a style="margin-right: 30px" href="index.php?halaman=berita" class="btn btn-danger" ><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
		<a data-toggle="popover" title="Edit" data-content="Edit Berita " href="index.php?halaman=editberita&id=<?php echo $_GET['id']; ?>" style="color: white; margin:1px" class="btn btn-warning" role="button" title="Edit"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
	</div>
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
</script>
