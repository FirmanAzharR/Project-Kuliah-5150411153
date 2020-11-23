<?php 
include 'class.php';
$datkot = $apiongkir->update_kota($_POST['id_prov']);
?>

<option disabled selected>Pilih Kota/Kabupaten</option>
<?php foreach ($datkot as $key => $value): ?>
	<?php echo "<option value='".$value['city_id']."'"?> 
	<?php 
	if ($value['city_id']==$_POST['id_kota']) {
		echo "selected";
	}?> <?php echo "nama_kota='".$value['city_name']."'>"; ?><?php echo $value['city_name']; ?></option>
<?php endforeach?>