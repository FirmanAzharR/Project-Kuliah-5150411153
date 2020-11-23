<?php $id = $_GET['id']; ?>
<center>
	<label style="color: white; font-weight: bold; font-size: 22px">Riwayat Transaksi</label>
</center>

<div id="riwayat"></div>

<script type="text/javascript">

	$(document).ready(function(){
		var id = '<?php echo $id ?>';

		$.post('proses/riwayat_trx.php',   // url
			   { myData: id }, // data to be submit
			   function(data, status) {// success callback
			   	$('#riwayat').html(data);
			   	//console.log('myid='+id);
			   });

	})

</script>
