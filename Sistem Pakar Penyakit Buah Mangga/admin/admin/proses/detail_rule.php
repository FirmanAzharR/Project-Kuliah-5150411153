<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM rule INNER JOIN penyakit ON rule.id_penyakit=penyakit.id_penyakit WHERE rule.id_rule ='$id'");
$data = $select->fetch_assoc();

echo "Nama Rule = ";
echo $data['nama_rule'];
echo "<br>";
echo "Nama Penyakit = ";
echo $data['nama_penyakit'];
echo "<br>";
echo "Nilai CF Pakar = ";
echo $data['cf_pakar'];
?>