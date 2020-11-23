<?php 

$trx = $_GET['trx']; 
$usr = $_GET['id']; 

?>
<center>
	<img id="icon" src="" style="width: 60px"><br>
	<label style="color: white; font-weight: bold; font-size: 22px">Detail Penitipan Hewan</label><br>
	<label style="color: white; font-size: 16px">
		<input type="hidden" id="id" value="<?php echo $id ?>">
		<?php 
		$select = mysqli_query($koneksi,"SELECT*FROM transaksi WHERE id_user = $id ORDER BY(id_transaksi) DESC LIMIT 1");
		$x = $select->fetch_assoc();
		$jumlah_hari = mysqli_query($koneksi,"SELECT datediff(tgl_ambil,tgl_titip) as hari FROM transaksi WHERE id_user = $id ORDER BY(id_transaksi) DESC LIMIT 1");
		$y = $jumlah_hari->fetch_assoc();
		?>
		<?php echo date('d M Y', strtotime($x['tgl_titip']));?> &nbsp;-&nbsp; <?php echo date('d M Y', strtotime($x['tgl_ambil'])); ?>
	</label><br>
	<div style="color: white"><div id="kode_trans"></div>
	<input type="hidden" id="ambil" value="<?php echo $x['tgl_ambil']; ?>">
	<input type="hidden" id="titip" value="<?php echo $x['tgl_titip'];?>">
	<input type="hidden" id="jml" value="<?php echo $y['hari'];?>">
</center>
<br>
<div id="detail">
	<label style="color: white;">Kategori Peliharaan</label>
	<div class="form-group">
		<select class="form-control" id="kategori" style="color: #5D5D5D;">
			<option disabled selected>Pilih Kategori Peliharaan</option>
			<option value="1">Kucing</option>
			<option value="2">Anjing</option>
		</select>
	</div>
	<div id="detail_konten">
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//$('#sidenav-main').hide();
		$('#kode_trans').load('proses/auto_kode.php');
	});

	$(document).ready(function(){
		$('#kategori').on('change',function(){

			var ktg = $('#kategori').val();
			var jm_hari = $('#jml').val();
			var id_trx = '<?php echo $trx ?>';
			var id_usr = '<?php echo $usr ?>';
			var kode = $('#kode_trans').text();

			if (ktg==1) {

				$.ajax({
					url:'proses/jenis_peliharaan.php',
					type:'post',
					data:'ktg='+ktg+'&jml='+jm_hari+'&trx='+id_trx+'&usr='+id_usr+'&kode='+kode,
					success:function(response){
						var src1 = './assets/img/brand/cat.png';
						$("#icon").attr("src", src1);
						$('#detail_konten').html(response);
					}
				});

			}else{

				$.ajax({
					url:'proses/jenis_peliharaan2.php',
					type:'post',
					data:'ktg='+ktg+'&jml='+jm_hari+'&trx='+id_trx+'&usr='+id_usr+'&kode='+kode,
					success:function(response){
						var src1 = './assets/img/brand/dog.png';
						$("#icon").attr("src", src1);
						$('#detail_konten').html(response);
					}
				});

			}

		});
	});
</script>