<?php
session_start(); 
$con = new mysqli("localhost","root","","smadrwahidin");

class user{

	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

	function login($usr,$pass)
	{
		$sql = "select username, hak_akses from user where username='$usr' and password='$pass' limit 1";
		$select = $this->koneksi->query($sql);
		if(!$select){
			die('kesalahan database'. $this->koneksi->error);
		}
		if($select->num_rows==1){
			$row=$select->fetch_assoc();
			$_SESSION['id'] = $row['username'];
			$_SESSION['hak_akses'] = $row['hak_akses'];

			if ($row['hak_akses']=='siswa') {
				return "siswa";
			}
			else if ($row['hak_akses']=='guru') {
				return "guru";
			}
			else if ($row['hak_akses']=='admin') {
				return "admin";
			}
		}
		else{
			return "gagal";
		}
	}
}


class data
{
	public $koneksi;

	function __construct($con)
	{
		$this->koneksi = $con;	
	}

	//DASHBOARD
	function count_pengumuman(){
		$select=$this->koneksi->query("SELECT COUNT(id_pengumuman) as total FROM pengumuman");
		$fetch = $select->fetch_assoc();
		echo $fetch['total'];
	}
	function count_siswa(){
		$select=$this->koneksi->query("SELECT COUNT(id_siswa) as total FROM siswa");
		$fetch = $select->fetch_assoc();
		echo $fetch['total'];
	}
	function count_guru(){
		$select=$this->koneksi->query("SELECT COUNT(id_guru) as total FROM guru");
		$fetch = $select->fetch_assoc();
		echo $fetch['total'];
	}
	function count_mapel(){
		$select=$this->koneksi->query("SELECT COUNT(kode_mapel) as total FROM mapel");
		$fetch = $select->fetch_assoc();
		echo $fetch['total'];
	}
	function count_feed(){
		$select=$this->koneksi->query("SELECT COUNT(id_feedback) as total FROM feedback");
		$fetch = $select->fetch_assoc();
		echo $fetch['total'];
	}


	//PENGUMUMAN
	function save($jenis,$judul,$isi,$date,$foto){
	$nama_foto=$foto['name'];
	$lokasi_foto=$foto['tmp_name'];
	if (!empty($lokasi_foto)) {
	move_uploaded_file($lokasi_foto, "foto/$nama_foto");}

	$this->koneksi->query("INSERT INTO pengumuman(jenis,judul,isi,tgl,img) VALUES ('$jenis','$judul','$isi','$date','$nama_foto')") or die(mysqli_error($this->koneksi));
		echo "<script>setTimeout(function () { 
			swal({
				title: 'Pengumuman Dipublikasikan',
				type: 'success',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
		echo "<script>
		    	setTimeout(function () {
				window.location.href= 'index.php?halaman=pengumuman';
				},1230); 
			</script>";
	}
	

			function view()
			{
				error_reporting(0);
				$select=$this->koneksi->query("SELECT*FROM pengumuman");
				while ($fetch=$select->fetch_assoc()) {
					$data[]=$fetch;
				}
				return $data;
			}

		function detail_pengumuman($id){
		    $select=$this->koneksi->query("SELECT*FROM pengumuman WHERE id_pengumuman=$id");
			$fetch = $select->fetch_assoc();
			return $fetch;
		} 

		function delete_pengumuman($id){
		error_reporting(0); 
		$data_lama = $this->detail_pengumuman($id);
		$foto_lama = $data_lama['img'];
		if(file_exists("foto/$foto_lama"))
			{
			unlink("foto/$foto_lama");
			}
		else{	}
		$this->koneksi->query("DELETE FROM pengumuman WHERE id_pengumuman='$id'") ;
		}

		function update_pengumuman($id,$jenis,$judul,$isi,$date,$foto){
			error_reporting(0); 
			$nama_foto=$foto['name'];
			$lokasi_foto=$foto['tmp_name'];
			if(!empty($lokasi_foto)){
			$data_lama = $this->detail_pengumuman($id);
			$foto_lama = $data_lama['img'];
			if(file_exists("foto/$foto_lama"))
			{
				unlink("foto/$foto_lama");
			}
			move_uploaded_file($lokasi_foto,"foto/$nama_foto");

			$this->koneksi->query("UPDATE pengumuman SET jenis='$jenis',judul='$judul',isi='$isi', tgl='$date',img='$nama_foto' WHERE id_pengumuman='$id'") or die(mysqli_error($this->koneksi));

				
			if (!mysqli_error($this->koneksi)) {
				echo "<script>setTimeout(function () { 
			swal({
				title: 'Update Berhasil',
				type: 'success',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
		echo "<script>
		    	setTimeout(function () {
				window.location.href= 'index.php?halaman=pengumuman';
				},1230); 
			</script>";
			}
			else{
				echo "<script>setTimeout(function () { 
			swal({
				title: 'Update Gagal',
				type: 'error',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
			}

			}
			else
			{
			    $this->koneksi->query("UPDATE pengumuman SET jenis='$jenis',judul='$judul',isi='$isi', tgl='$date' WHERE id_pengumuman='$id'");
			    if (!mysqli_error($this->koneksi)) {
				echo "<script>setTimeout(function () { 
			swal({
				title: 'Update Berhasil',
				type: 'success',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
		echo "<script>
		    	setTimeout(function () {
				window.location.href= 'index.php?halaman=pengumuman';
				},1230); 
			</script>";
			}
			else{
				echo "<script>setTimeout(function () { 
			swal({
				title: 'Update Gagal',
				type: 'error',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
			}
			}

		}

	//NILAI
			function select_jenis()
			{
				$select=$this->koneksi->query("SELECT*FROM jenis_nilai");
				while ($fetch=$select->fetch_assoc()) {
					$data[]=$fetch;
				}
				return $data;
			}

			function select_nilai()
			{
				$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`,mapel.`nama_mapel`,
					`jenis_nilai`.`jenis_nilai`, nilai.`id_nilai` ,nilai.`nilai` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
					INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`= jurusan.`id_jurusan`
					INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `jenis_nilai` ON nilai.`id_jenis`=`jenis_nilai`.`id_jenis` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel`");
				while ($fetch=$select->fetch_assoc()) {
					$data[]=$fetch;
				}
				return $data;
			}

			function one_select_nilai($id)
			{
				$select=$this->koneksi->query("SELECT*FROM nilai WHERE id_nilai=$id");
				$fetch = $select->fetch_assoc();
				return $fetch;
			}

			function edit_nilai($idnilai,$nilai)
			{
				$data_lama=$this->one_select_nilai($idnilai);
				$select=$this->koneksi->query("UPDATE nilai SET nilai=$nilai WHERE id_nilai=$idnilai") or die(mysqli_error($this->koneksi));
				echo "<script>setTimeout(function () { 
				swal({
				title: 'Update Berhasil',
				type: 'success',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
				echo "<script>
				setTimeout(function () {
				window.location.href= 'index.php?halaman=datanilai';
				},1230); 
				</script>";
			}

			function delete_nilai($id){
				$data_lama = $this->one_select_nilai($id);
 				$this->koneksi->query("DELETE FROM nilai WHERE id_nilai='$id'");
	 			echo "<script>setTimeout(function () { 
				swal({
				title: 'Delete Berhasil',
				type: 'success',
				showConfirmButton: false,
				timer: 1200,
				});  
				},10); 
				</script>";
				echo "<script>
				setTimeout(function () {
				window.location.href= 'index.php?halaman=datanilai';
				},1230); 
				</script>";
			}

			function one_select_nilai_edit($id)
			{
				$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`,mapel.`nama_mapel`,
					`jenis_nilai`.`jenis_nilai`, nilai.`id_nilai` ,nilai.`nilai` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
					INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`= jurusan.`id_jurusan`
					INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `jenis_nilai` ON nilai.`id_jenis`=`jenis_nilai`.`id_jenis` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE id_nilai=$id");
				$fetch = $select->fetch_assoc();
				return $fetch;
			}


			function select_nilai_edit($id){
				$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`,mapel.`nama_mapel`,
					`jenis_nilai`.`jenis_nilai`, nilai.`id_nilai` ,nilai.`nilai` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
					INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`= jurusan.`id_jurusan`
					INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `jenis_nilai` ON nilai.`id_jenis`=`jenis_nilai`.`id_jenis` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE id_kelas = $id");
				$fetch = $select->fetch_assoc();
				return $fetch;
			}

			function filter($kelas){
				$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`FROM siswa INNER JOIN `akademik_siswa` ON `siswa`.`id_siswa` = `akademik_siswa`.`id_siswa` 
					INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan` WHERE kelas.`id_kelas`='$kelas'");
				$queryresult = mysqli_num_rows($select);
				if ($queryresult > 0) {
					echo "<script>
					const toast = swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
						});

						toast({
							type: 'success',
							title: 'Berhasil Menampilkan Data'
							})

							$('#konten').show();				
							$('#konten2').show();
							</script>";

							$no=1;
							while ($row = mysqli_fetch_assoc($select)) {
								echo '<tr>';
								echo '<td width="5%" align="center">'.$no++.'</td>';
								echo '<td align="center">'.$row['nama_siswa'].'</td>';
								echo '<td align="center">'.$row['nama_kelas'].'</td>';
								echo '<td align="center">'.$row['nama_jurusan'].'</td>';
								echo '<td align="center" width="10%" ><input style="text-align: center;" class="form-control" type="text" name="nilai[]"><input style="text-align: center;" class="form-control" type="hidden" name="id_siswa[]" value="'.$row['id_siswa'].'"></td>';
								echo '</tr>';
							}
						}
						else
						{
							echo "<script>
							const toast = swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
								});

								toast({
									type: 'error',
									title: 'Data Kosong'
									})

									$('#konten').hide();				
									$('#konten2').hide();				
									</script>";
									echo '<tr>';
									echo '<td width="5%" align="center"></td>';
									echo '<td  align="center"></td>';
									echo '<td  align="center">Data Kosong</td>';
									echo '<td  align="center"></td>';
									echo '<td  align="center"></td>';
									echo '</tr>';
								}


							}


							function multiple_input(){
								error_reporting(0);
								if(isset($_POST['simpan'])){
									$idsiswa = $_POST['id_siswa'];
									$count = count($idsiswa);
									$sql = "INSERT INTO nilai(id_siswa, id_mapel, id_jenis,nilai) VALUES";
									for($i = 0 ; $i < $count ; $i++)
									{
										$sql .="('".$_POST['id_siswa'][$i]."','".$_POST['get_mapel']."','".$_POST['get_jenis']."','".$_POST['nilai'][$i]."'),";
									}
									$sql = rtrim($sql,",");
									if ($this->koneksi->multi_query($sql) === TRUE) {
										echo "<script>
										const toast = swal.mixin({
											toast: true,
											position: 'top-end',
											showConfirmButton: false,
											timer: 3000
											});

											toast({
												type: 'success',
												title: 'Data Nilai Tersimpan'
												})			
												</script>";
											} else {
    //echo "Penambahan data error : " . $this->koneksi->error;
												echo "<script>
												const toast = swal.mixin({
													toast: true,
													position: 'top-end',
													showConfirmButton: false,
													timer: 3000
													});

													toast({
														type: 'error',
														title: 'Gagal Menyimpan Nilai'
														})				
														</script>";
													}

													$this->koneksi->close();
												}
											}
//---------------------------------------------- GURU ---------------------------------------------//
											function select_guru()
											{
												error_reporting(0); 
												$select=$this->koneksi->query("SELECT*FROM GURU");
												while ($fetch=$select->fetch_assoc()) {
													$data[]=$fetch;
												}
												return $data;
											}

											function one_select_guru($id_guru)
											{
												$select=$this->koneksi->query("SELECT*FROM guru WHERE id_guru=$id_guru");
												$fetch = $select->fetch_assoc();
												return $fetch;

											}

											function add_guru($namaguru,$jeniskelamin,$tempatlahir,$tgllahir,$agama,$alamat,$email,$telepon,$status,$pendidikan,$foto)
											{
												$nama_foto=$foto['name'];
	//mengambil isi foto
												$lokasi_foto=$foto['tmp_name'];

	//jika lokasi tidak kosong maka upload foto
												if (!empty($lokasi_foto)) {
													move_uploaded_file($lokasi_foto, "foto/$nama_foto");
												}

												$this->koneksi->query("INSERT INTO guru(nama,jenkel,tempat_lahir,tgl_lahir,agama,alamat,email,telepon,status,pendidikan,gambar) VALUES ('$namaguru','$jeniskelamin','$tempatlahir','$tgllahir','$agama','$alamat','$email','$telepon','$status','$pendidikan','$nama_foto')") or die(mysqli_error($this->koneksi));
											}

											function update_guru($idguru,$namaguru,$jeniskelamin,$tempatlahir,$tgllahir,$agama,$alamat,$email,$telepon,$status,$pendidikan,$foto)
											{
												error_reporting(0); 
												$nama_foto=$foto['name'];
												$lokasi_foto=$foto['tmp_name'];
												if(!empty($lokasi_foto)){
													$data_lama = $this->one_select_guru($idguru);
													$foto_lama = $data_lama['foto_siswa'];
													if(file_exists("foto/$foto_lama"))
													{
														unlink("foto/$foto_lama");
													}
													move_uploaded_file($lokasi_foto,"foto/$nama_foto");
													$this->koneksi->query("UPDATE guru SET nama='$namaguru',jenkel='$jeniskelamin',tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir',agama='$agama',alamat='$alamat', email='$email',telepon='$telepon',status='$status',pendidikan='$pendidikan',gambar='$nama_foto' WHERE id_guru='$idguru'") or die(mysqli_error($this->koneksi));

												}
												else
												{
													$this->koneksi->query("UPDATE guru SET nama='$namaguru',jenkel='$jeniskelamin',tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir',agama='$agama',alamat='$alamat', email='$email',telepon='$telepon',status='$status',pendidikan='$pendidikan' WHERE id_guru='$idguru'") or die(mysqli_error($this->koneksi));
												}

											}

											function delete_guru($id_guru)
											{
												error_reporting(0); 
												$this->delete_akademik_guru($id_guru);
												$data_lama = $this->one_select_guru($id_guru);
												$foto_lama = $data_lama['gambar'];

	//cek apakah foto ada di folder
												if(file_exists("foto/$foto_lama"))
												{
		//hapusfoto
													unlink("foto/$foto_lama");
												}
												else{

												}
												$this->koneksi->query("DELETE FROM guru WHERE id_guru='$id_guru'") ;

											}

//------------------------------------- END OF GURU --------------------------------------------//


//---------------------------------------- SISWA ----------------------------------------------//
											function select_siswa()
											{
												error_reporting(0); 
												$select=$this->koneksi->query("SELECT*FROM siswa");
												while ($fetch=$select->fetch_assoc()) {
													$data[]=$fetch;
												}
												return $data;
											}

											function one_select_siswa($id_siswa)
											{
												$select=$this->koneksi->query("SELECT*FROM siswa WHERE id_siswa=$id_siswa");
												$fetch = $select->fetch_assoc();
												return $fetch;

											}

											function add_siswa($namasiswa,$jeniskelamin,$tempatlahir,$tgllahir,$agama,$alamat,$email,$telepon,$jmlsdr,$adik,$kakak,$ayah,$ibu,$pekerjaan,$alamatortu,$foto)
											{
												$nama_foto=$foto['name'];
	//mengambil isi foto
												$lokasi_foto=$foto['tmp_name'];

	//jika lokasi tidak kosong maka upload foto
												if (!empty($lokasi_foto)) {
													move_uploaded_file($lokasi_foto, "foto/$nama_foto");
												}
												$this->koneksi->query("INSERT INTO siswa(nama_siswa,jenkel,tempat_lahir,tgl_lahir,agama,alamat,email,telepon,jml_saudara,nama_adik,nama_kakak,nama_ayah,nama_ibu,pekerjaan_ortu,alamat_orangtua,gambar) VALUES ('$namasiswa','$jeniskelamin','$tempatlahir','$tgllahir','$agama','$alamat','$email','$telepon','$jmlsdr','$adik','$kakak','$ayah','$ibu','$pekerjaan','$alamatortu','$nama_foto')") or die(mysqli_error($this->koneksi));
											}

											function update_siswa($idsiswa,$namasiswa,$jeniskelamin,$tempatlahir,$tgllahir,$agama,$alamat,$email,$telepon,$jmlsdr,$adik,$kakak,$ayah,$ibu,$pekerjaan,$alamatortu,$foto)
											{
												error_reporting(0); 
												$nama_foto=$foto['name'];
												$lokasi_foto=$foto['tmp_name'];
												if(!empty($lokasi_foto)){
													$data_lama = $this->one_select_siswa($idsiswa);
													$foto_lama = $data_lama['foto_siswa'];
													if(file_exists("foto/$foto_lama"))
													{
														unlink("foto/$foto_lama");
													}
													move_uploaded_file($lokasi_foto,"foto/$nama_foto");
													$this->koneksi->query("UPDATE siswa SET nama_siswa='$namasiswa',jenkel='$jeniskelamin',tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir',agama='$agama',alamat='$alamat', email='$email',telepon='$telepon',jml_saudara='$jmlsdr',nama_adik='$adik',nama_kakak='$kakak',nama_ayah='$ayah', nama_ibu='$ibu', pekerjaan_ortu='$pekerjaan',alamat_orangtua='$alamatortu',gambar='$nama_foto' WHERE id_siswa='$idsiswa'") or die(mysqli_error($this->koneksi));

												}
												else
												{
													$this->koneksi->query("UPDATE siswa SET nama_siswa='$namasiswa',jenkel='$jeniskelamin',tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir',agama='$agama',alamat='$alamat', email='$email',telepon='$telepon',jml_saudara='$jmlsdr',nama_adik='$adik',nama_kakak='$kakak',nama_ayah='$ayah', nama_ibu='$ibu', pekerjaan_ortu='$pekerjaan',alamat_orangtua='$alamatortu' WHERE id_siswa='$idsiswa'") or die(mysqli_error($this->koneksi));
												}

											}

											function delete_siswa($id_siswa)
											{
												error_reporting(0); 
												$this->delete_akademik_siswa($id_siswa);
												$data_lama = $this->one_select_siswa($id_siswa);
												$foto_lama = $data_lama['gambar'];

	//cek apakah foto ada di folder
												if(file_exists("foto/$foto_lama"))
												{
		//hapusfoto
													unlink("foto/$foto_lama");
												}
												else{

												}
												$this->koneksi->query("DELETE FROM siswa WHERE id_siswa='$id_siswa'") ;
											}

//------------------------------------- END OF SISWA --------------------------------------------//



//--------------------------------------AKADEMIK GURU--------------------------------------------//
											function one_select_akademik_guru($id){
												$select=$this->koneksi->query("SELECT guru.nama,guru.id_guru,mapel.nama_mapel,mapel.kode_mapel,akademik_guru.kode_guru, akademik_guru.NIP, akademik_guru.NUPTK 
													FROM `akademik_guru` INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru` INNER JOIN mapel ON `akademik_guru`.`kode_guru`=mapel.`kode_guru`
													WHERE guru.`id_guru`=$id;");
												$fetch = $select->fetch_assoc();
												return $fetch;
											}

											function delete_mapel_akademik($kode){
												$this->koneksi->query("DELETE FROM mapel WHERE kode_guru='$kode'") ;
											}

											function alt_select($id){
												$select=$this->koneksi->query("select*from akademik_guru where id_guru='$id'");
												$fetch=$select->fetch_assoc();
												return $fetch;
											}

											function add_akademik_guru($id,$nip,$nuptk){
												$validasiID = $this->koneksi->query("SELECT id_guru FROM akademik_guru WHERE id_guru='$id'");
												$validasiNIP = $this->koneksi->query("SELECT NIP FROM akademik_guru WHERE NIP='$nip'");
												$validasiNUPTK = $this->koneksi->query("SELECT NUPTK FROM akademik_guru WHERE NUPTK='$nuptk'");
												$rowcountID=$validasiID->num_rows;
												$rowcountNIP=$validasiNIP->num_rows;
												$rowcountNUPTK=$validasiNUPTK->num_rows;
												if ($rowcountID>0 || $rowcountNIP>0 || $rowcountNUPTK>0 ) {
													echo "<script>setTimeout(function () { 
														swal({
															title: 'Data Guru Sudah Ada',
															icon: 'success',
															type: 'error',
															showConfirmButton: false,
															timer: 1200,
															});  
															},10); 
															</script>";
														}
														else{
															$this->koneksi->query("INSERT INTO akademik_guru(id_guru,NIP,NUPTK) VALUES ('$id','$nip','$nuptk')") or die(mysqli_error($this->koneksi));
															echo "<script>
															swal({
																title: 'Berhasil Ditambahkan',
																type: 'success',
																showConfirmButton: false,
																timer: 1200
																})
																</script>";
																echo "<script>
																setTimeout(function () {
																	window.location.href= 'index.php?halaman=guru';
																	},1230); 
																	</script>";


																}
															}

															function update_akademik_guru($nip,$nuptk,$id)
															{
																$data_lama = $this->one_select_akademik_guru($nip);
																$this->koneksi->query("UPDATE akademik_guru SET NIP='$nip', NUPTK='$nuptk' WHERE id_guru='$id'") or die(mysqli_error($this->koneksi));
															}

															function delete_akademik_guru($id)
															{
																$data_lama = $this->one_select_akademik_guru($id);
																$this->koneksi->query("DELETE FROM akademik_guru WHERE id_guru='$id'") ;

															}
//------------------------------------- END OF AKADEMIK GURU -----------------------------------------//


//-----------------------------------------AKADEMIK SISWA--------------------------------------------//
															function create_niss(){
																$carikode = $this->koneksi->query("SELECT MAX(NISS) from akademik_siswa") or die (mysql_error());
																$datakode = mysqli_fetch_array($carikode);
																$year = date("Y");
																$yearsub = substr($year, 2);
																if ($datakode) {
																	$nilaikode = substr($datakode[0], 15);
																	$kode = (int) $nilaikode;
																	$kode = $kode + 1;
																	$kode_otomatis = "1112320800201$yearsub".str_pad($kode, 4, "0", STR_PAD_LEFT);
																	return $kode_otomatis;
																} else {
																	$kode_otomatis = "";
																}
															}


															function one_select_akademik_siswa($id){
																$select=$this->koneksi->query("SELECT akademik_siswa.NISS,akademik_siswa.id_kelas,akademik_siswa.semester,akademik_siswa.tahun_ajaran FROM akademik_siswa INNER JOIN kelas ON akademik_siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan on kelas.id_jurusan=jurusan.id_jurusan WHERE id_siswa=$id;");
																$fetch = $select->fetch_assoc();
																return $fetch;
															}

															function add_akademik_siswa($NIS,$id,$kelas,$smt,$year){
																$validasiID = $this->koneksi->query("SELECT NISS FROM akademik_siswa WHERE NISS='$NIS'");
																$rowcountID=$validasiID->num_rows;
																if ($rowcountID>0) {
																	echo "<script>setTimeout(function () { 
																		swal({
																			title: 'Data Siswa Sudah Ada',
																			icon: 'error',
																			type: 'error',
																			showConfirmButton: false,
																			timer: 1200,
																			});  
																			},10); 
																			</script>";
																		}
																		else{
																			$this->koneksi->query("INSERT INTO akademik_siswa(NISS,id_siswa,id_kelas,semester,tahun_ajaran) VALUES ('$NIS','$id','$kelas','$smt','$year')") or die(mysqli_error($this->koneksi));
																			echo "<script>setTimeout(function () { 
																				swal({
																					title: 'Data Ditambahkan',
																					type: 'success',
																					showConfirmButton: false,
																					timer: 1200,
																					});  
																					},10); 
																					</script>";

																					echo "<script>
																					setTimeout(function () {
																						window.location.href= 'index.php?halaman=siswa';
																						},1230); 
																						</script>";
																					}							
																				}	

																				function select_nama($id){
																					$select=$this->koneksi->query("SELECT nama_siswa FROM siswa WHERE id_siswa=$id;");
																					$fetch = $select->fetch_assoc();
																					return $fetch;
																				}

																				function update_akademik_siswa($NIS,$id,$kelas,$smt,$year)
																				{
																					$data_lama = $this->one_select_akademik_siswa($NIS);
																					$this->koneksi->query("UPDATE akademik_siswa SET id_kelas='$kelas', semester='$smt', tahun_ajaran='$year' WHERE NISS='$NIS'") or die(mysqli_error($this->koneksi));
																				}

																				function delete_akademik_siswa($id)
																				{
																					$data_lama = $this->one_select_akademik_siswa($id);
																					$this->koneksi->query("DELETE FROM akademik_siswa WHERE id_siswa='$id'") ;

																				}
//----------------------------------- END OF AKADEMIK SISWA ----------------------------------------//


//------------------------------------------- KELAS -----------------------------------------------//
																				function select_kelas()
																				{
																					$select=$this->koneksi->query("SELECT kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan, jurusan.nama_jurusan FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan;");

																					while ($fetch = $select->fetch_assoc()) {
																						$data[] = $fetch;
																					}
																					return $data;
																				}

																				function add_kelas($namakelas,$idjurusan)
																				{
																					$this->koneksi->query("INSERT INTO kelas(nama_kelas,id_jurusan) VALUES ('$namakelas','$idjurusan')") or die(mysqli_error($this->koneksi));
																				}

																				function one_select($id_kelas)
																				{
																					$select=$this->koneksi->query("SELECT kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan , jurusan.nama_jurusan FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE id_kelas=$id_kelas;");
																					$fetch = $select->fetch_assoc();
																					return $fetch;

																				}

																				function update_kelas($idkelas,$namakelas,$idjurusan)
																				{
																					$data_lama = $this->one_select($idkelas);
																					$this->koneksi->query("UPDATE kelas SET nama_kelas='$namakelas',id_jurusan='$idjurusan' WHERE id_kelas='$idkelas'") or die(mysqli_error($this->koneksi));
																				}

																				function delete_kelas($id_kelas)
																				{
																					$data_lama = $this->one_select($id_kelas);
																					$this->koneksi->query("DELETE FROM kelas WHERE id_kelas='$id_kelas'") ;

																				}
//---------------------------------------- END OF KELAS --------------------------------------------//

//-------------------------------------------- JURUSAN --------------------------------------------//
																				function select_jurusan()
																				{
																					$select=$this->koneksi->query("SELECT * FROM jurusan");

																					while ($fetch = $select->fetch_assoc()) {
																						$data[] = $fetch;
																					}
																					return $data;
																				}

																				function one_select_jurusan($id_jurusan)
																				{
																					$select=$this->koneksi->query("SELECT*FROM jurusan WHERE id_jurusan=$id_jurusan;");
																					$fetch = $select->fetch_assoc();
																					return $fetch;

																				}

																				function add_jurusan($namajurusan){
																					$this->koneksi->query("INSERT INTO jurusan(nama_jurusan) VALUES ('$namajurusan')") or die(mysqli_error($this->koneksi));
																				}

																				function delete_jurusan($id_jurusan)
																				{
																					$data_lama = $this->one_select_jurusan($id_jurusan);
																					$this->koneksi->query("DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'") ;

																				}
//------------------------------------- END OF JURUSAN --------------------------------------------//


//--------------------------------------------- MAPEL ----------------------------------------------//
																				function select_mapel()
																				{
																					$select=$this->koneksi->query("SELECT mapel.kode_mapel,mapel.nama_mapel,mapel.kode_guru,guru.nama FROM mapel INNER JOIN akademik_guru on mapel.kode_guru=akademik_guru.kode_guru INNER JOIN guru on akademik_guru.id_guru=guru.id_guru");

																					while ($fetch = $select->fetch_assoc()) {
																						$data[] = $fetch;
																					}
																					return $data;
																				}

																				function select_mapel_guru()
																				{
																					$select=$this->koneksi->query("SELECT akademik_guru.kode_guru,guru.nama FROM guru INNER JOIN akademik_guru ON akademik_guru.id_guru=guru.id_guru;");

																					while ($fetch = $select->fetch_assoc()) {
																						$data[] = $fetch;
																					}
																					return $data;
																				}

																				function one_select_mapel()
																				{
																					$select=$this->koneksi->query("SELECT*FROM mapel");
																					$fetch=$select->fetch_assoc();
																					return $fetch;
																				}

function add_mapel($kode,$nama,$kode_guru){
$this->koneksi->query("INSERT INTO mapel(kode_mapel,nama_mapel,kode_guru) VALUES ('$kode','$nama','$kode_guru')") or die(mysqli_error($this->koneksi));
																				}
function delete_mapel($id_mapel)
{ $data_lama = $this->one_select_mapel($id_mapel);
 $this->koneksi->query("DELETE FROM mapel WHERE kode_mapel='$id_mapel'") ;
}

																				function update_mapel($kode,$nama,$guru)
																				{
																					$this->koneksi->query("UPDATE mapel SET kode_mapel='$kode',nama_mapel='$nama', kode_guru='$guru' WHERE kode_mapel='$kode'") or die(mysqli_error($this->koneksi));
																				}

//------------------------------------- END OF MAPEL --------------------------------------------//

																			}
//--------------------------------------- CREATE OBJECT ---------------------------------------------//
																			$data= new data($con);
																			$user = new user($con);
//----------------------------------------- END OBJECT ---------------------------------------------//
																			?>