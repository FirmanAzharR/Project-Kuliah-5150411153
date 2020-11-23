<h3>Detail Penyakit</h3>
<hr>
<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM penyakit WHERE id_penyakit ='$id'");

$data = $select->fetch_assoc();

echo $data['nama_penyakit'];
echo "<br>";
echo "<br>";
echo $data['definisi'];

?>