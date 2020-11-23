<?php 
include 'class.php';

$datkot = $apiongkir->update_kota($_POST['id']);
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<option disabled selected>Pilih Kota/Kabupaten</option>
<?php foreach ($datkot as $key => $value): ?>
	<option value="<?php echo $value['city_id']; ?>" nama_kota="<?php echo $value['city_name']; ?>"><?php echo $value['type'] ?>&nbsp;<?php echo $value['city_name']; ?></option>
<?php endforeach ?>