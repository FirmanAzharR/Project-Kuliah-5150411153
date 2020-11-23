<?php
session_start();
$con = new mysqli("localhost","root","","blk");

class pendaftar{
	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

	function login($usr,$pass,$kode)
	{
		error_reporting(0);
		$query1=$this->koneksi->query("SELECT*FROM admin WHERE email='$usr' AND password='$pass' AND kode='$kode'");
		$admin=$query1->num_rows;

		$query2=$this->koneksi->query("SELECT*FROM data_peserta WHERE email='$usr' AND password='$pass' AND kode='$kode'");
		$peserta=$query2->num_rows;

		$query3=$this->koneksi->query("SELECT*FROM pegawai WHERE email='$usr' AND password='$pass' AND kode='$kode'");
		$pegawai=$query3->num_rows;

		if($admin==1){
			$akun=$query1->fetch_assoc();
			$_SESSION['admin'] = $akun['id'];
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Login Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href= 'config/admin/index.php';
						},1230); 
						</script>";	}
		elseif($peserta==1){
		
			$akun=$query2->fetch_assoc();
			$_SESSION['peserta'] = $akun['id_peserta'];
			$_SESSION['kejuruan'] = $akun['kejuruan'];
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Login Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href= 'config/peserta/index.php';
						},1230); 
						</script>";			

			}
			elseif($pegawai==1){
		
			$akun=$query3->fetch_assoc();
			$_SESSION['pegawai'] = $akun['id_pegawai'];
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Login Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href= 'config/pegawai/index.php';
						},1230); 
						</script>";			

			}
			else{
				echo "<script>setTimeout(function () { 
				swal({
					title: 'Login Gagal',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href=index.php';
						},1230); 
						</script>";	
			}

	}


	function berita_home(){
		$select=$this->koneksi->query("SELECT*FROM `data_berita` ORDER BY tgl DESC LIMIT 1");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function berita_side(){
		$select=$this->koneksi->query("SELECT*FROM `data_berita` ORDER BY tgl ASC LIMIT 2");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	
	//TEST

	function hasil_ujian($id){
		if (isset($_POST['simpan'])) {
			$pilihan = $_POST["pilih"];
			$id_soal=$_POST['id_soal'];
			$count=count($id_soal);
			$score = 0;
			$benar = 0;
			$salah = 0;
			$kosong = 0;

			for ($i=0; $i < $count; $i++) { 
				$nomor = $id_soal[$i]; // id nomor soal

			// jika user tidak memilih jawaban
			if(empty($pilihan[$nomor])){
				$kosong++;
			} else {
				// jika memilih
				$jawaban = $pilihan[$nomor];

				// cocokan jawaban dengan yang ada didatabase
				$sql= $this->koneksi->query("SELECT * FROM data_soal WHERE id_soal='$nomor' AND jawab='$jawaban'")or die (mysqli_error($koneksi));

				$cek = $sql->num_rows;

				//simpan jawaban
				$sql="INSERT INTO hasil_test(id_peserta, id_soal,jawaban) VALUES ('".$_POST['id_peserta'][$i]."','".$_POST['id_soal'][$i]."','".$jawaban."')";
				$this->koneksi->query($sql);

				if($cek){
					// jika jawaban cocok (benar)
					$benar++;

				} else {
					// jika salah
					$salah++;
				}
				//hitung nilai
				$hasil=100/$count*$benar;

			}
		}

		$this->koneksi->query("INSERT INTO skor(id_peserta,nilai) VALUES('$id',$hasil)");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Selesai',
					text: 'Jawaban Telah Tersimpan',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.href= 'index.php?halaman=soal';
						},1230); 
						</script>";

	}


}

function autosave($id){
	$hasil=0;
	$this->koneksi->query("INSERT INTO skor(id_peserta,nilai) VALUES('$id',$hasil)")or die (mysqli_error($koneksi));
}

	function check_test($id){
		$select=$this->koneksi->query("SELECT nilai FROM skor WHERE id_peserta='$id'");
		$x=$select->fetch_assoc();
		return $x;
	}

	function select_id($id){
		$select=$this->koneksi->query("SELECT*FROM data_peserta WHERE id_peserta='$id'");
		$x=$select->fetch_assoc();
		return $x;
	}

	function select_pegawai($id){
		$select=$this->koneksi->query("SELECT*FROM pegawai WHERE id_pegawai='$id'");
		$x=$select->fetch_assoc();
		return $x;
	}

	//SOAL

	function tampil_soal(){
		$select=$this->koneksi->query("SELECT*FROM data_soal");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}


	function tampil_soal_jurusan($id){
		$select=$this->koneksi->query("SELECT*FROM data_soal WHERE id_kejuruan='$id' ORDER BY RAND()");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_soal($id){
		$select=$this->koneksi->query("SELECT*FROM data_soal WHERE id_soal='$id';");
		$data=$select->fetch_assoc();	
		return $data;
	}

	function detail_berita($id){
		$select=$this->koneksi->query("SELECT*FROM data_berita WHERE id_berita='$id';");
		$data=$select->fetch_assoc();	
		return $data;
	}

	function delete_soal($id){
		$this->koneksi->query("DELETE FROM data_soal WHERE id_soal='$id';");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=soal');
						},1230); 
						</script>";
	}

	function edit_soal($id,$kj,$soal,$a,$b,$c,$d,$jawab){
		$this->koneksi->query("UPDATE data_soal SET soal='$soal',id_kejuruan='$kj',a='$a',b='$b',c='$c',d='$d',jawab='$jawab' WHERE id_soal='$id'");
				echo "<script>setTimeout(function () { 
				swal({
					title: 'Tersimpan',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=soal');
						},1230); 
						</script>";
	}

	function tambah_soal($kejuruan,$soal,$a,$b,$c,$d,$jawab){

		$cek = $this->koneksi->query("SELECT soal FROM data_soal WHERE soal='$soal' AND id_kejuruan='$kejuruan';");
		if ($cek->num_rows>0) {
				echo "<script>setTimeout(function () { 
				swal({
					title: 'Soal Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=soal');
						},1230); 
						</script>";
		}
		else{
			$this->koneksi->query("INSERT INTO data_soal(id_kejuruan,soal,a,b,c,d,jawab) VALUES('$kejuruan','$soal','$a','$b','$c','$d','$jawab')")or die(mysqli_error($this->koneksi));
							echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=soal');
						},1230); 
						</script>";

		}
	}
	///END
	
	//DELETE PESERTA
	function delete_peserta($id){
		$cek=$this->koneksi->query("SELECT id_peserta from skor where id_peserta=$id");
		$hasil=$cek->num_rows;
		if ($hasil>=1) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Data Masih Digunakan',
					type: 'warning',
					showConfirmButton: false,
					timer: 1400,
					});  
					},10); 
					</script>";
			echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=dtpeserta');
						},1230); 
						</script>";
		}else{
			$data_lama = $this->select_peserta($id); 
			$foto_lama = $data_lama['foto'];
			$file_lama = $data_lama['file'];

			if(file_exists("../../foto/$foto_lama")){
				unlink("../../foto/$foto_lama");
			}

			if(file_exists("../../file/$file_lama")){
				unlink("../../file/$file_lama");
			}

			$this->koneksi->query("DELETE FROM data_peserta WHERE id_peserta='$id'")or die(mysqli_error($this->koneksi));

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Data Berhasil Dihapus',
					type: 'success',
					showConfirmButton: false,
					timer: 1400,
					});  
					},10); 
					</script>";
			echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=dtpeserta');
						},1230); 
						</script>";

		}
	}

	//UPDATE PESERTA////
		
	function update_datadiri($id,$ktp,$nama,$jk,$tempat,$tgl,$alamat,$id_prov,$prov,$id_kota,$kota,$telp,$email,$agama,$foto,$pass){

		$nama_foto=$foto['name'];
		$lokasi_foto=$foto['tmp_name'];
		if(!empty($lokasi_foto)){
			$data_lama = $this->select_peserta($id); 
			$foto_lama = $data_lama['foto'];
			if(file_exists("../../foto/$foto_lama")){
				unlink("../../foto/$foto_lama");
			}
			
		move_uploaded_file($lokasi_foto,"../../foto/$nama_foto");

		$this->koneksi->query("UPDATE data_peserta SET no_ktp='$ktp',nama_peserta='$nama',jenkel='$jk',tempat='$tempat',tanggal='$tgl',alamat='$alamat',id_provinsi='$id_prov',provinsi='$prov',id_kota='$id_kota',kota='$kota',telepon='$telp',email='$email',agama='$agama',foto='$nama_foto',password='$pass' WHERE id_peserta='$id'");

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editpeserta&id=$id');
						},1230); 
						</script>";
					}
					else{
						$this->koneksi->query("UPDATE data_peserta SET no_ktp='$ktp',nama_peserta='$nama',jenkel='$jk',tempat='$tempat',tanggal='$tgl',alamat='$alamat',id_provinsi='$id_prov',provinsi='$prov',id_kota='$id_kota',kota='$kota',telepon='$telp',email='$email',agama='$agama',password='$pass' WHERE id_peserta='$id'");

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editpeserta&id=$id');
						},1230); 
						</script>";
					}
		
	}

	function update_pendaftaran($id,$kejuruan,$sub,$prog){
		$this->koneksi->query("UPDATE data_peserta SET kejuruan='$kejuruan',sub='$sub',program='$prog' WHERE id_peserta='$id'");

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editpeserta&id=$id');
						},1230); 
						</script>";
	}

	function update_pendidikan($id,$pendidikan,$jurusan,$sekolah,$foto){

		$nama_foto=$foto['name'];
		$lokasi_foto=$foto['tmp_name'];
		if(!empty($lokasi_foto)){
			$data_lama = $this->select_peserta($id); 
			$foto_lama = $data_lama['foto'];
			if(file_exists("../../file/$foto_lama")){
				unlink("../../file/$foto_lama");
			}
			
		move_uploaded_file($lokasi_foto,"../../file/$nama_foto");

		$this->koneksi->query("UPDATE data_peserta SET pendidikan='$pendidikan',jurusan='$jurusan',asal_sekolah='$sekolah',file='$nama_foto' WHERE id_peserta='$id'");

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editpeserta&id=$id');
						},1230); 
						</script>";
					}
					else{
						$this->koneksi->query("UPDATE data_peserta SET pendidikan='$pendidikan',jurusan='$jurusan',asal_sekolah='$sekolah' WHERE id_peserta='$id'");

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editpeserta&id=$id');
						},1230); 
						</script>";
					}
		
	}

	///////  END  ////////////

	function profil_admin($id){
		$select = $this->koneksi->query("SELECT*FROM admin WHERE id='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}

	function select_feedback($id){
		$select = $this->koneksi->query("SELECT*FROM feedback WHERE id='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}


	function data_feedback(){
		$select = $this->koneksi->query("SELECT*FROM feedback");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function edit_profil_admin($id,$nama,$email,$password,$telp,$jenkel,$alamat){
		$this->koneksi->query("UPDATE admin SET nama='$nama', email='$email', password='$password',telepon='$telp', jenis_kelamin='$jenkel', alamat='$alamat' WHERE id='$id'");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=profil');
						},1230); 
						</script>";	
	}

	function data_profil(){
		$select = $this->koneksi->query("SELECT*FROM data_profil WHERE id=1");
		$data=$select->fetch_assoc();
		return $data;
	}

	function data_visi(){
		$select = $this->koneksi->query("SELECT*FROM data_visi WHERE id=1");
		$data=$select->fetch_assoc();
		return $data;
	}

	function data_misi(){
		$select = $this->koneksi->query("SELECT*FROM data_misi");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function kontak_utama(){
		$select = $this->koneksi->query("SELECT*FROM kontak_utama WHERE id=1");
		$data=$select->fetch_assoc();
		return $data;
	}

	function kontak_hubung(){
		$select = $this->koneksi->query("SELECT*FROM kontak_hubung WHERE id=1");
		$data=$select->fetch_assoc();
		return $data;
	}

	//kejuruan
	function tampil_kejuruan(){
		$select = $this->koneksi->query("SELECT*FROM kejuruan");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tambah_kejuruan($nama){
		$validasi=$this->koneksi->query("SELECT*FROM kejuruan WHERE nama='$nama'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Kejuruan Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=kejuruan');
						},1230); 
						</script>";	
		}
		else{

			$this->koneksi->query("INSERT INTO kejuruan(nama) VALUES('$nama')")or die(mysqli_error($this->koneksi));

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=kejuruan');
						},1230); 
						</script>";	
		}

	}


	function delete_feed($id){
			$this->koneksi->query("DELETE FROM feedback WHERE id=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=feedback');
						},1230); 
						</script>";	
	}

	function select_kejuruan($id){
		$select = $this->koneksi->query("SELECT*FROM kejuruan WHERE id=$id");
		$data=$select->fetch_assoc();
		return $data;
	}

	function delete_kejuruan($id){
		$validasi=$this->koneksi->query("SELECT*FROM sub INNER JOIN kejuruan ON sub.id_kejuruan=kejuruan.id WHERE sub.id_kejuruan='$id'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Data Masih Digunakan',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=kejuruan');
						},1230); 
						</script>";		
		}
		else
		{
			$this->koneksi->query("DELETE FROM kejuruan WHERE id=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=kejuruan');
						},1230); 
						</script>";	
		}
		
	}

	function edit_kejuruan($id,$nama){
		$this->koneksi->query("UPDATE kejuruan SET nama='$nama' WHERE id='$id'") or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Update',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=kejuruan');
						},1230); 
						</script>";
	}

	//sub
	function tampil_sub_adv($id){
		$select = $this->koneksi->query("SELECT*FROM sub WHERE id_kejuruan='$id';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_sub(){
		$select = $this->koneksi->query("SELECT*FROM sub INNER JOIN kejuruan ON sub.id_kejuruan=kejuruan.id;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_sub($id){
		$select = $this->koneksi->query("SELECT*FROM sub INNER JOIN kejuruan ON sub.id_kejuruan=kejuruan.id WHERE sub.id_sub='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}

	function edit_sub($id,$id_kejuruan,$nama_sub){
		$this->koneksi->query("UPDATE sub SET id_kejuruan='$id_kejuruan',nama_sub='$nama_sub' WHERE id_sub='$id'") or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Update',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=sub');
						},1230); 
						</script>";
	}

	function edit_prog($id,$id_sub,$prog){
		$this->koneksi->query("UPDATE program SET id_sub='$id_sub',nama_program='$prog' WHERE id_program='$id'") or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Update',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=prog');
						},1230); 
						</script>";
	}
	
	function edit_jurusan($id,$id_pendidikan,$nama_jurusan){
		$this->koneksi->query("UPDATE jurusan SET `id_pendidikan`='$id_pendidikan',`nama_jurusan`='$nama_jurusan' WHERE `id_jurusan`='$id'") or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Update',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=jurusan');
						},1230); 
						</script>";
	}

	function delete_sub($id){
		$validasi=$this->koneksi->query("SELECT*FROM program INNER JOIN sub ON sub.id_sub=program.id_sub WHERE sub.id_sub='$id'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Data Masih Digunakan',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=sub');
						},1230); 
						</script>";		
		}
		else
		{
			$this->koneksi->query("DELETE FROM sub WHERE id_sub=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=sub');
						},1230); 
						</script>";	
		}
		
	}

	function tambah_sub($id_kejuruan,$nama_sub){
		$validasi=$this->koneksi->query("SELECT*FROM sub INNER JOIN kejuruan ON sub.id_kejuruan=kejuruan.id WHERE  sub.id_kejuruan='$id_kejuruan' AND sub.nama_sub='$nama_sub'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Sub Kejuruan Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=sub');
						},1230); 
						</script>";	
		}
		else{

			$this->koneksi->query("INSERT INTO sub(id_kejuruan,nama_sub) VALUES('$id_kejuruan','$nama_sub')")or die(mysqli_error($this->koneksi));

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=sub');
						},1230); 
						</script>";	
		}

	}

	function tampil_prog(){
		$select = $this->koneksi->query("SELECT*FROM program INNER JOIN sub ON sub.id_sub=program.id_sub;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function all_berita_home(){
		$select = $this->koneksi->query("SELECT*FROM data_berita ORDER by tgl DESC LIMIT 3");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_berita(){
		$select = $this->koneksi->query("SELECT*FROM data_berita");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_berita($id){
		$select = $this->koneksi->query("SELECT*FROM data_berita WHERE id_berita='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}

	function delete_berita($id){

		$data_lama = $this->select_berita($id);
		$gambar_lama = $data_lama['gambar'];

		if(file_exists("../../berita_img/$gambar_lama")){
			unlink("../../berita_img/$gambar_lama");
		}

		$this->koneksi->query("DELETE FROM data_berita WHERE id_berita='$id'");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menghapus',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=berita');
						},1230); 
						</script>";
	}


	function edit_berita($id,$tgl,$judul,$isi,$gambar){
		$nama_gambar=$gambar['name'];
		$lokasi_gambar=$gambar['tmp_name'];
		if(!empty($lokasi_gambar)){
			$data_lama = $this->select_berita($id); 
			$gambar_lama = $data_lama['gambar'];
			if(file_exists("../../berita_img/$gambar_lama")){
				unlink("../../berita_img/$gambar_lama");
			}
			move_uploaded_file($lokasi_gambar,"../../berita_img/$nama_gambar"); 

		$this->koneksi->query("UPDATE data_berita SET judul='$judul',tgl='$tgl',isi='$isi', gambar='$nama_gambar' WHERE id_berita='$id'");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menyimpan',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=berita');
						},1230); 
						</script>";	

	}else{
		$this->koneksi->query("UPDATE data_berita SET judul='$judul',tgl='$tgl',isi='$isi' WHERE id_berita='$id'");
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menyimpan',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=berita');
						},1230); 
						</script>";
	}

}

	function tampil_peserta(){
		$select = $this->koneksi->query("SELECT*FROM data_peserta;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_peserta_lengkap(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.tanggal_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.tanggal_wawancara='';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

		function tampil_peserta_lengkap_edit_tgl(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.tanggal_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.nilai_wawancara='' AND skor.tanggal_wawancara!='';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_peserta_input_wawancara(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.tanggal_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.tanggal_wawancara!='' AND skor.nilai_wawancara='';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_peserta_edit_wawancara(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.tanggal_wawancara,skor.nilai_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.nilai_wawancara!='';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function pengumuman_wawancara(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,skor.tanggal_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.tanggal_wawancara!='';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_peserta_nilai(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.nilai_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta`;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function nilai_individu($id){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.nilai_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE data_peserta.`id_peserta`='$id';");
		$data=$select->fetch_assoc();
		return $data;
	}

	function laporan_lulus($tgl){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.nilai_wawancara FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE skor.tanggal_wawancara='$tgl' AND (skor.nilai+skor.nilai_wawancara)/2 >= 70;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function sertifikat(){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program`,`skor`.`nilai`,skor.id_skor,skor.nilai_wawancara,skor.status_cetak FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON`data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE (skor.nilai+skor.nilai_wawancara)/2 >= 70 ORDER BY skor.status_cetak ASC;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function status_cetak($id,$x){
		$this->koneksi->query("UPDATE skor SET status_cetak=$x WHERE id_skor=$id")or die(mysqli_error($this->koneksi));
		echo "<script>
				window.location.replace('index.php?halaman=sertifikat');
			</script>";	
	}

	function cek_cetak($id){
		$select = $this->koneksi->query("SELECT skor.status_cetak FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` INNER JOIN skor ON `data_peserta`.`id_peserta`=`skor`.`id_peserta` WHERE `data_peserta`.`id_peserta`=$id;");
		$data=$select->fetch_assoc();
		return $data;
	}

	function select_peserta($id){
		$select = $this->koneksi->query("SELECT*FROM data_peserta INNER JOIN pendidikan ON data_peserta.pendidikan=pendidikan.id_pendidikan INNER JOIN 
			jurusan ON data_peserta.jurusan=jurusan.id_jurusan INNER JOIN kejuruan ON data_peserta.kejuruan=kejuruan.id INNER JOIN sub ON data_peserta.sub=sub.id_sub INNER JOIN program ON data_peserta.program=program.id_program WHERE `data_peserta`.`id_peserta`='$id';");
		$data=$select->fetch_assoc();
		return $data;
	}

	function tampil_prog_adv($id){
		$select = $this->koneksi->query("SELECT*FROM program WHERE id_sub='$id';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tambah_prog($id_sub,$prog){
		$validasi=$this->koneksi->query("SELECT*FROM program INNER JOIN sub ON sub.id_sub=program.id_sub WHERE  program.id_sub='$id_sub' AND program.nama_program='$prog'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Program Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=prog');
						},1230); 
						</script>";	
		}
		else{
			$this->koneksi->query("INSERT INTO program(id_sub,nama_program) VALUES('$id_sub','$prog')")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=prog');
						},1230); 
						</script>";	
		}

	}

	function delete_prog($id){
			$this->koneksi->query("DELETE FROM program WHERE id_program=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=prog');
						},1230); 
						</script>";	
		
	}

	function select_prog($id){
		$select = $this->koneksi->query("SELECT*FROM program INNER JOIN sub ON program.id_sub=sub.id_sub WHERE program.id_program='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}
	//pendidikan
	function tampil_pendidikan(){
		$select = $this->koneksi->query("SELECT*FROM pendidikan");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_pend($id){
		$select = $this->koneksi->query("SELECT*FROM pendidikan WHERE id_pendidikan='$id';");
		$data=$select->fetch_assoc();
		return $data;
	}

	function edit_pend($id,$nama){
		$this->koneksi->query("UPDATE pendidikan SET nama_pendidikan='$nama' WHERE id_pendidikan='$id'") or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Update',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pend');
						},1230); 
						</script>";
	}

	function tambah_pend($nama){
		$validasi=$this->koneksi->query("SELECT*FROM pendidikan WHERE nama_pendidikan='$nama'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Pendidikan Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pend');
						},1230); 
						</script>";	
		}
		else{

			$this->koneksi->query("INSERT INTO pendidikan(nama_pendidikan) VALUES('$nama')")or die(mysqli_error($this->koneksi));

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pend');
						},1230); 
						</script>";	
		}

	}

	function delete_pend($id){
		$validasi=$this->koneksi->query("SELECT*FROM pendidikan INNER JOIN jurusan ON jurusan.id_pendidikan=pendidikan.id_pendidikan WHERE pendidikan.id_pendidikan='$id'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Data Masih Digunakan',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pend');
						},1230); 
						</script>";		
		}
		else
		{
			$this->koneksi->query("DELETE FROM pendidikan WHERE id_pendidikan=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pend');
						},1230); 
						</script>";	
		}
		
	}

	//jurusan
	function tampil_jurusan(){
		$select = $this->koneksi->query("SELECT*FROM jurusan INNER JOIN pendidikan ON jurusan.id_pendidikan=pendidikan.id_pendidikan;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function tampil_jurusan_adv($id){
		$select = $this->koneksi->query("SELECT*FROM jurusan WHERE id_pendidikan='$id'");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}


	function tambah_jurusan($id_pendidikan,$jurusan){
		$validasi=$this->koneksi->query("SELECT*FROM jurusan INNER JOIN pendidikan ON jurusan.id_pendidikan=pendidikan.id_pendidikan WHERE pendidikan.id_pendidikan='$id_pendidikan' AND jurusan.nama_jurusan='$jurusan'");
		if ($validasi->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Jurusan Sudah Ada',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=jurusan');
						},1230); 
						</script>";	
		}
		else{

			$this->koneksi->query("INSERT INTO jurusan(id_pendidikan, nama_jurusan) VALUES('$id_pendidikan','$jurusan')")or die(mysqli_error($this->koneksi));

			echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Menambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=jurusan');
						},1230); 
						</script>";	
		}

	}

	function select_jurusan($id){
		$select = $this->koneksi->query("SELECT*FROM jurusan  WHERE id_jurusan='$id'");
		$data=$select->fetch_assoc();
		return $data;
	}

	function delete_jurusan($id){
			$this->koneksi->query("DELETE FROM jurusan WHERE id_jurusan=$id")or die(mysqli_error($this->koneksi));
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Hapus Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=jurusan');
						},1230); 
						</script>";	
		
	}

	function formulir($ktp,$nama,$jenkel,$tempat,$tanggal,$alamat,$id_prov,$provinsi,$id_kota,$kota,$telp,$email,$agama,$pend,$jurusan,$sekolah,$kejuruan,$sub,$prog,$foto,$file,$pass,$kode)
	{
		$qry=$this->koneksi->query("SELECT no_ktp FROM data_peserta WHERE no_ktp='$ktp';");
		$qry->num_rows;

		if ($qry->num_rows>0) {
			echo "<script>setTimeout(function () { 
				swal({
					title: 'Anda Sudah Terdaftar',
					type: 'error',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pelatihan');
						},1230); 
						</script>";
		}
	else
		{
		$nama_foto=$foto['name'];
		$lokasi_foto=$foto['tmp_name'];
		if (!empty($lokasi_foto)) 
		{
			move_uploaded_file($lokasi_foto, "foto/$nama_foto"); 
		}

		$nama_file=$file['name'];
		$lokasi_file=$file['tmp_name'];
		if (!empty($lokasi_file)) 
		{
			move_uploaded_file($lokasi_file, "file/$nama_file"); 
		}

		$this->koneksi->query("INSERT INTO data_peserta(no_ktp,nama_peserta,jenkel,tempat,tanggal,alamat,id_provinsi,provinsi,id_kota,kota,telepon,email,agama,pendidikan,jurusan,asal_sekolah,kejuruan,sub,program,foto,file,password,kode) VALUES('$ktp','$nama','$jenkel','$tempat','$tanggal','$alamat','$id_prov','$provinsi','$id_kota','$kota','$telp','$email','$agama','$pend','$jurusan','$sekolah','$kejuruan','$sub','$prog','$nama_foto','$nama_file','$pass','$kode')") or die(mysqli_error($this->koneksi));

		echo "<script>setTimeout(function () { 
				swal({
					title: 'Daftar Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=pelatihan');
						},1230); 
						</script>";
		}

	}

	function tambah_berita($tgl,$judul,$isi,$gambar)
	{
		$nama_gambar=$gambar['name'];
		$lokasi_gambar=$gambar['tmp_name'];
		if (!empty($lokasi_gambar)) 
		{
			move_uploaded_file($lokasi_gambar, "../../berita_img/$nama_gambar"); 
		}

		$this->koneksi->query("INSERT INTO data_berita(tgl,judul,isi,gambar) VALUES('$tgl','$judul','$isi','$nama_gambar')") or die(mysqli_error($this->koneksi));
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil Tambah',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=berita');
						},1230); 
						</script>";

	}



	function feedback($nama,$email,$sub,$pesan){
		$this->koneksi->query("INSERT INTO feedback(nama,email,sub,pesan) VALUES('$nama','$email','$sub','$pesan')") or die(mysqli_error($this->koneksi));
		echo "<script>setTimeout(function () { 
				swal({
					title: 'Kritik Saran Terkirim',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=hubungi');
						},1230); 
						</script>";
	}

	function tanggal_wawancara(){
		if (isset($_POST['simpan'])) {
			$id_peserta = $_POST['id_peserta'];
			$count = count($id_peserta);

			for ($i=0; $i < $count ; $i++) { 
				$this->koneksi->query("UPDATE skor SET tanggal_wawancara='".$_POST['tgl'][$i]."' WHERE id_peserta='".$_POST['id_peserta'][$i]."'")or die(mysqli_error($this->koneksi));;
			}

				echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=daftarpeserta');
						},1230); 
						</script>";

		}
		$this->koneksi->close();
	}

	function tanggal_wawancara_edit(){
		if (isset($_POST['simpan'])) {
			$id_peserta = $_POST['id_peserta'];
			$count = count($id_peserta);

			for ($i=0; $i < $count ; $i++) { 
				$this->koneksi->query("UPDATE skor SET tanggal_wawancara='".$_POST['tgl'][$i]."' WHERE id_peserta='".$_POST['id_peserta'][$i]."'")or die(mysqli_error($this->koneksi));;
			}

				echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=edittanggal');
						},1230); 
						</script>";

		}
		$this->koneksi->close();
	}

	function nilai_wawancara(){
		if (isset($_POST['simpan'])) {
			$id_peserta = $_POST['id_peserta'];
			$count = count($id_peserta);

			for ($i=0; $i < $count ; $i++) { 
				$this->koneksi->query("UPDATE skor SET nilai_wawancara='".$_POST['nilai'][$i]."' WHERE id_peserta='".$_POST['id_peserta'][$i]."'")or die(mysqli_error($this->koneksi));
			}

				echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=inputnilai');
						},1230); 
						</script>";

		}
		$this->koneksi->close();
	}

	function update_tgl_all($tgl,$tgl_x){
		$this->koneksi->query(" UPDATE skor SET tanggal_wawancara='$tgl' WHERE tanggal_wawancara='$tgl_x' AND nilai_wawancara='' ")or die(mysqli_error($this->koneksi));
			echo "<script>
						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
							});

							toast({
								type: 'success',
								title: 'Perubahan Jadwal Berhasil'
								})
								</script>";
			echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=edittanggal');
						},1230); 
						</script>";

	}

	function count($tgl){
		$select=$this->koneksi->query("SELECT COUNT(email) as jml FROM data_peserta INNER JOIN skor on data_peserta.id_peserta=skor.id_peserta WHERE skor.tanggal_wawancara='$tgl' AND skor.nilai_wawancara=''");
		$dt=$select->fetch_assoc();
		return $dt;

	}

	function notif($tgl){
		$select=$this->koneksi->query("SELECT data_peserta.email,data_peserta.nama_peserta FROM data_peserta INNER JOIN skor on data_peserta.id_peserta=skor.id_peserta WHERE skor.tanggal_wawancara='$tgl' AND skor.nilai_wawancara=''");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function nilai_wawancara_edit(){
		if (isset($_POST['simpan'])) {
			$id_peserta = $_POST['id_peserta'];
			$count = count($id_peserta);

			for ($i=0; $i < $count ; $i++) { 
				$this->koneksi->query("UPDATE skor SET nilai_wawancara='".$_POST['nilai'][$i]."' WHERE id_peserta='".$_POST['id_peserta'][$i]."'")or die(mysqli_error($this->koneksi));
			}

				echo "<script>setTimeout(function () { 
				swal({
					title: 'Berhasil',
					type: 'success',
					showConfirmButton: false,
					timer: 1200,
					});  
					},10); 
					</script>";
					echo "<script>
					setTimeout(function () {
						window.location.replace('index.php?halaman=editnilai');
						},1230); 
						</script>";

		}
		$this->koneksi->close();
	}

	function forgotpass($email){
		$query1=$this->koneksi->query("SELECT email FROM admin WHERE email='$email'");
		$admin=$query1->num_rows;

		$query2=$this->koneksi->query("SELECT email FROM data_peserta WHERE email='$email'");
		$peserta=$query2->num_rows;

		$query3=$this->koneksi->query("SELECT email FROM pegawai WHERE email='$email'");
		$pegawai=$query3->num_rows;

		if($admin==1){
			$x=$this->koneksi->query("SELECT password FROM admin WHERE email='$email'");
			$pass=$x->fetch_assoc();
			return $pass;
		}
		elseif($peserta==1){
			$x=$this->koneksi->query("SELECT password FROM data_peserta WHERE email='$email'");
			$pass=$x->fetch_assoc();
			return $pass;
		}
		elseif($pegawai==1){
			$x=$this->koneksi->query("SELECT password FROM pegawai WHERE email='$email'");
			$pass=$x->fetch_assoc();
			return $pass;
		}
		else{
			
		}
	}


	function cetak($id){
		$select = $this->koneksi->query("SELECT data_peserta.`id_peserta`,`data_peserta`.`nama_peserta`,`program`.`nama_program` FROM `data_peserta` INNER JOIN program ON	`data_peserta`.`program`=`program`.`id_program` WHERE data_peserta.`id_peserta`='$id'")or die(mysqli_error($this->koneksi));
		$data=$select->fetch_assoc();
		return $data;
	}

	function tempat_tanggal(){
		$select = $this->koneksi->query("SELECT*FROM tempat WHERE id_tempat='1'")or die(mysqli_error($this->koneksi));
		$data=$select->fetch_assoc();
		return $data;
	}

	function update_tempat($temp,$jam){
		$this->koneksi->query("UPDATE tempat SET tempat='$temp', jam='$jam' WHERE id_tempat='1'")or die(mysqli_error($this->koneksi));
	}

//end of class
}

$data = new pendaftar($con);

?>