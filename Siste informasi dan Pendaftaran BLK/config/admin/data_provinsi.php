<?php 
include 'class.php';
$datprov = $apiongkir->update_provinsi();
?>

<option disabled selected>Pilih Provinsi</option>
<?php foreach ($datprov as $key => $value): ?>
	<?php echo "<option value='".$value['province_id']."'"?> 
	<?php 
	if ($value['province_id']==$_POST['id']) {
		echo "selected";
	}?> <?php echo "nama='".$value['province']."'>"; ?><?php echo $value['province']; ?></option>
<?php endforeach?>