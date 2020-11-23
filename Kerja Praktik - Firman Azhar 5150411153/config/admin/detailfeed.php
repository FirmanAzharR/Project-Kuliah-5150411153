<div style="padding: 25px" class="animated fadeIn">
	<h4>Feedback</h4>
	<hr>
	<?php $select=$data->detail_feed($_GET['id']); ?>
	<div class="card">
		<div class="card-body" style="background-color: #F0F0F0">
			<div style="font-size: 17px">Nama Pengirim :  <?php echo $select['nama_pengirim']; ?></div>
			<div style="font-size: 17px" >Email : <?php echo $select['email_pengirim'] ?></div>
			<hr>
			<div style="text-align: justify;margin-top: 20px;>
			<div style="font-size: 17px" >Subject : <?php echo $select['subject'] ?></div>
			<hr>
			<div style="font-size: 17px" >Pesan :</div>
			<?php echo $select['pesan'] ?>
		</div>
	</div>
	<div style="margin-top: 20px" align="right">
		<a style="margin-right: 30px" href="index.php?halaman=feedback" class="btn btn-danger" ><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
	</div>
</div>	

<script type="text/javascript">
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',});
	</script>