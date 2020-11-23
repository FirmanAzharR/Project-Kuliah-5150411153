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
		$u=$this->koneksi->real_escape_string($usr);
		$p=$this->koneksi->real_escape_string($pass);
		//$ps = sha1($p);
		$sql = "select username, hak_akses from user where username='$u' and password='$p' limit 1";

		$select_s=$this->koneksi->query("SELECT status FROM akademik_siswa WHERE NISS='$u'");
		$s = $select_s->fetch_assoc();

		$select_g=$this->koneksi->query("SELECT status FROM akademik_guru WHERE NIP='$u'");
		$g = $select_g->fetch_assoc();

		$select_a=$this->koneksi->query("SELECT status FROM admin WHERE kode_admin='$u'");
		$a = $select_a->fetch_assoc();

		$select_k=$this->koneksi->query("SELECT status FROM kepala_sekolah WHERE kode='$u'");
		$k = $select_k->fetch_assoc();

		$select = $this->koneksi->query($sql);
		if(!$select){
			die('kesalahan database'. $this->koneksi->error);
		}
		if($select->num_rows==1&$s['status']==1 || $select->num_rows==1&$g['status']==1 || $select->num_rows==1&$a['status']==1 || $select->num_rows==1&$k['status']==1){
			$row=$select->fetch_assoc();
			$_SESSION['id'] = $row['username'];
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
			else if ($row['hak_akses']=='kepala') {
				return "kepala";
			}
		}
		else{
			return "gagal";
		}
	}

	function add_menu($nip){
		$select=$this->koneksi->query("SELECT kelas.wali_kelas FROM kelas INNER JOIN akademik_guru on kelas.wali_kelas=akademik_guru.kode_guru WHERE akademik_guru.NIP='$nip'");
		if(!$select){
			die('kesalahan database'. $this->koneksi->error);
		}
		if ($select->num_rows>0) {
			echo "	<li>
			<a href='#homeSubmenu1' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-users'></i>&nbsp;&nbsp;Wali Kelas</a>
			<ul class='collapse list-unstyled' id='homeSubmenu1'>
			<li>
			<a href='index.php?halaman=walikelas'><i class='fa fa-user'></i>&nbsp;&nbsp;Data Siswa</a>
			</li>
			<li>
			<a href='index.php?halaman=naikkelas'><i class='fa fa-tasks'></i>&nbsp;&nbsp;Naik Kelas</a>
			</li>
			</ul>
			</li>";
		}
	}

	function judul_data_wali($nip){
		$select=$this->koneksi->query("SELECT kelas.`nama_kelas`,jurusan.`nama_jurusan` FROM kelas INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan` INNER JOIN `akademik_guru`
			ON kelas.`wali_kelas`=`akademik_guru`.`kode_guru` WHERE `akademik_guru`.`NIP`='$nip';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;

	}

	function siswa_base_on_wali($nip){
		$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`id_kelas`,kelas.`nama_kelas`, jurusan.id_jurusan,jurusan.`nama_jurusan`, `akademik_siswa`.`semester` FROM siswa INNER JOIN `akademik_siswa`
			ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa` INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON
			kelas.`id_jurusan`=jurusan.`id_jurusan` INNER JOIN `akademik_guru` ON `kelas`.`wali_kelas`=`akademik_guru`.`kode_guru`
			INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru` WHERE `akademik_guru`.`NIP`='$nip' ORDER BY kelas.nama_kelas;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_nilai_persiswa($id){
		error_reporting(0);
		$select=$this->koneksi->query("SELECT siswa.`nama_siswa`, mapel.`nama_mapel`,`guru`.`nama`,`jenis_nilai`.`jenis_nilai`,nilai.`nilai` FROM siswa INNER JOIN `akademik_siswa` ON
			siswa.`id_siswa`=`akademik_siswa`.`id_siswa` INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `jenis_nilai` ON 
			nilai.`id_jenis`=`jenis_nilai`.`id_jenis` INNER JOIN `mapel` ON nilai.`id_mapel`=mapel.`kode_mapel` INNER JOIN `akademik_guru` ON
			mapel.`kode_guru`=`akademik_guru`.`kode_guru` INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru` WHERE siswa.`id_siswa`='$id'");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_siswa($NISS){
		$select=$this->koneksi->query("SELECT siswa.nama_siswa,siswa.id_siswa,siswa.jenkel,siswa.tgl_lahir,siswa.tempat_lahir,siswa.agama,siswa.alamat,siswa.email,siswa.telepon,siswa.jml_saudara,siswa.nama_adik,siswa.nama_kakak,siswa.nama_ayah,siswa.nama_ibu,siswa.pekerjaan_ortu,siswa.alamat_orangtua,siswa.gambar,akademik_siswa.NISS,akademik_siswa.semester,kelas.nama_kelas,kelas.id_kelas,kelas.id_jurusan,jurusan.nama_jurusan FROM siswa INNER JOIN akademik_siswa ON 
			siswa.id_siswa=akademik_siswa.id_siswa INNER JOIN kelas ON akademik_siswa.id_kelas=kelas.id_kelas INNER JOIN 
			jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE `akademik_siswa`.`NISS`='$NISS'");
		$fetch = $select->fetch_assoc();
		return $fetch;
	}

	function view_siswa()
	{
		error_reporting(0);
		$select=$this->koneksi->query("SELECT id_pengumuman,judul,isi,tgl FROM pengumuman WHERE jenis='siswa' ORDER BY tgl DESC");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function view_guru()
	{
		error_reporting(0);
		$select=$this->koneksi->query("SELECT id_pengumuman,judul,isi,tgl FROM pengumuman WHERE jenis='guru' ORDER BY tgl DESC");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_siswa_permapel($NIP){
		error_reporting(0);
		$select=$this->koneksi->query("SELECT siswa.id_siswa,akademik_siswa.semester,akademik_siswa.tahun_ajaran,siswa.`nama_siswa`,kelas.`nama_kelas`,kelas.`id_kelas`,jurusan.`nama_jurusan`, mapel.`nama_mapel` FROM siswa INNER JOIN akademik_siswa ON
			siswa.`id_siswa`=`akademik_siswa`.`id_siswa` INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN
			jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan` INNER JOIN `mapel_kelas` ON kelas.`id_kelas`=`mapel_kelas`.`id_kelas` INNER JOIN
			`mapel` ON `mapel_kelas`.`kode_mapel`=mapel.`kode_mapel` INNER JOIN `akademik_guru` ON mapel.`kode_guru`=`akademik_guru`.`kode_guru`
			INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru` WHERE `akademik_guru`.`NIP`='$NIP' GROUP BY siswa.id_siswa;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_nilai_siswa($NISS){
		$select=$this->koneksi->query("SELECT `siswa`.`id_siswa`,kelas.nama_kelas,mapel.`nama_mapel`,nilai.semester,nilai.tugas1,nilai.tugas2,nilai.ulangan,nilai.ujian FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa` INNER JOIN kelas ON akademik_siswa.id_kelas=kelas.id_kelas INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `mapel` ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE `akademik_siswa`.`NISS`='$NISS'");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function nilai_tugas1($NISS){
		$select=$this->koneksi->query("SELECT `siswa`.`id_siswa`,mapel.`nama_mapel`,`nilai`.`nilai` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
			INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN `mapel` ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE `nilai`.`id_jenis`='1' AND `akademik_siswa`.`NISS`='$NISS'");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_guru($NIP){
		$select=$this->koneksi->query("SELECT guru.`id_guru`,guru.`agama`,guru.`alamat`,guru.`email`,guru.`jenkel`,guru.`pendidikan`,guru.`status`,guru.`telepon`,guru.`tempat_lahir`,guru.`tgl_lahir`,`akademik_guru`.`NIP`, guru.`nama`, guru.`gambar` FROM guru INNER JOIN `akademik_guru` ON guru.`id_guru`=`akademik_guru`.`id_guru`
			WHERE `akademik_guru`.`NIP`='$NIP';");
		$fetch = $select->fetch_assoc();
		return $fetch;
	}

	function guru_mapel($NIP){
		$select=$this->koneksi->query("SELECT mapel.`nama_mapel` FROM guru INNER JOIN `akademik_guru` ON guru.`id_guru`=`akademik_guru`.`id_guru` INNER JOIN
			mapel ON `akademik_guru`.`kode_guru`=mapel.`kode_guru` WHERE `akademik_guru`.`NIP`='$NIP';");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function guru_daftar_nilai($NIP){
		$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`,nilai.`semester`,nilai.`tugas1`,nilai.`tugas2`,nilai.`ulangan`,nilai.`ujian`,nilai.`id_nilai` FROM
			siswa INNER JOIN akademik_siswa ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa` INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=
			kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan` INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel`
			INNER JOIN `akademik_guru` ON `akademik_guru`.`kode_guru`=mapel.`kode_guru` WHERE `akademik_guru`.`NIP`='$NIP' ORDER BY nilai.id_nilai DESC;");
		while ($fetch=$select->fetch_assoc()) {
			$data[]=$fetch;
		}
		return $data;
	}

	function select_mapel_perguru($NIP)
	{
		$select=$this->koneksi->query("SELECT mapel.kode_mapel,mapel.nama_mapel,mapel.kode_guru,guru.nama FROM mapel INNER JOIN akademik_guru ON 
			mapel.kode_guru=akademik_guru.kode_guru INNER JOIN guru ON akademik_guru.id_guru=guru.id_guru WHERE akademik_guru.NIP='$NIP';");
		while ($fetch = $select->fetch_assoc()) {
			$data[] = $fetch; }
			return $data;
		}

		function multiple_input_guru(){
			error_reporting(0);
			if(isset($_POST['simpan'])){
				$idsiswa = $_POST['id_siswa'];
				$count = count($idsiswa);
				$sql = "INSERT INTO nilai(id_siswa, semester, id_mapel, id_jenis, nilai) VALUES";
				for($i = 0 ; $i < $count ; $i++)
				{
					$x=0;
					$cek=$this->koneksi->query("SELECT id_siswa FROM nilai WHERE id_siswa='".$_POST['id_siswa'][$i]."' AND semester='".$_POST['semester'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_jenis='".$_POST['get_jenis']."'");
					if($cek->num_rows>0){
						echo "<script>
						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
							});

							toast({
								type: 'error',
								title: 'Data Nilai Sudah Ada'
								})			
								</script>";
							}
							else{
								$sql .="('".$_POST['id_siswa'][$i]."','".$_POST['semester'][$i]."','".$_POST['get_mapel']."','".$_POST['get_jenis']."','".$_POST['nilai'][$i]."'),";
								$hasil=$x+1;
							}
						}

						if ($hasil==1) {
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
								}

							}


							class data
							{
								public $koneksi;

								function __construct($con)
								{
									$this->koneksi = $con;	
								}

								function profil_admin($sesion){
									$select=$this->koneksi->query("SELECT*FROM admin WHERE kode_admin='$sesion'");
									$fetch = $select->fetch_assoc();
									return $fetch;
								}
								function profil_kepala($sesion){
									$select=$this->koneksi->query("SELECT*FROM kepala_sekolah WHERE kode='$sesion'");
									$fetch = $select->fetch_assoc();
									return $fetch;
								}
								function profil_update($sesion,$nama,$jenkel,$tl,$tp,$a,$e,$t){
									$data_lama=$this->profil_admin($sesion);
									$select=$this->koneksi->query("UPDATE admin SET nama='$nama',jenkel='$jenkel',tempat_lahir='$tl',tanggal_lahir='$tp',alamat='$a',email='$e',telepon='$t' WHERE kode_admin='$sesion'");
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
												window.location.href= 'index.php?halaman=profil';
												},1230); 
												</script>";
											}

											function profil_kepala_update($sesion,$nama,$jenkel,$tl,$tp,$a,$e,$t){
												$data_lama=$this->profil_admin($sesion);
												$select=$this->koneksi->query("UPDATE kepala_sekolah SET nama='$nama',jenkel='$jenkel',tmpt_lhr='$tl',tgl_lhr='$tp',alamat='$a',email='$e',telepon='$t' WHERE kode='$sesion'");
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
															window.location.href= 'index.php?halaman=profil';
															},1230); 
															</script>";
														}

														function profil_akun($sesion){
															$select=$this->koneksi->query("SELECT*FROM user WHERE username='$sesion'");
															$fetch = $select->fetch_assoc();
															return $fetch;
														}
														function profil_akun_update($sesion,$p){
															$data_lama=$this->profil_admin($sesion);
															$select=$this->koneksi->query("UPDATE user SET password='$p' WHERE username='$sesion'");
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
																		window.location.href= 'index.php?halaman=profil';
																		},1230); 
																		</script>";
																	}

																	function akun_update($sesion,$p){
																		$data_lama=$this->profil_admin($sesion);
																		$select=$this->koneksi->query("UPDATE user SET password='$p' WHERE username='$sesion'");
																		echo "<script>
																		const toast = swal.mixin({
																			toast: true,
																			position: 'top-end',
																			showConfirmButton: false,
																			timer: 1000
																			});
																			toast({
																				type: 'success',
																				title: 'Berhasil Diubah'
																				});
																				setTimeout(function () {
																					window.location.href= 'index.php?halaman=akun';
																					},1000); 
																					</script>";
																				}
	//DASHBOARD
																				function count_pengumuman(){
																					$select=$this->koneksi->query("SELECT COUNT(id_pengumuman) as total FROM pengumuman");
																					$fetch = $select->fetch_assoc();
																					echo $fetch['total'];
																				}
																				function count_pengumuman_spesifik($a){
																					$select=$this->koneksi->query("SELECT COUNT(id_pengumuman) as total FROM pengumuman WHERE jenis='$a'");
																					$fetch = $select->fetch_assoc();
																					echo $fetch['total'];
																				}
																				function count_siswa(){
																					$select=$this->koneksi->query("SELECT COUNT(id_siswa) as total FROM siswa");
																					$fetch = $select->fetch_assoc();
																					echo $fetch['total'];
																				}
																				function count_siswa_kelas($a,$b){
																					$select=$this->koneksi->query("SELECT COUNT(siswa.id_siswa) AS total FROM siswa INNER JOIN akademik_siswa ON siswa.id_siswa=akademik_siswa.id_siswa 
																						INNER JOIN kelas ON akademik_siswa.id_kelas=kelas.id_kelas WHERE akademik_siswa.id_kelas='$a' AND kelas.id_jurusan='$b'");
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

																				function count_berita(){
																					$select=$this->koneksi->query("SELECT COUNT(id_berita) as total FROM berita");
																					$fetch = $select->fetch_assoc();
																					echo $fetch['total'];
																				}
																				function select_wali($a){
																					$select=$this->koneksi->query("SELECT guru.nama FROM guru INNER JOIN `akademik_guru` ON guru.`id_guru`=`akademik_guru`.`id_guru` INNER JOIN kelas ON `akademik_guru`.`kode_guru`
																						=kelas.`wali_kelas` WHERE kelas.`id_kelas`='$a'");
																					$fetch = $select->fetch_assoc();
																					return $fetch;
																				}
	//FEED USER
																				function feedback_user($nama,$email,$sub,$msg){
																					$this->koneksi->query("INSERT INTO feedback(nama_pengirim,email_pengirim,subject,pesan) VALUES ('$nama','$email','$sub','$msg')") or die(mysqli_error($this->koneksi));
																					echo "<script>setTimeout(function () { 
																						swal({
																							title: 'Pesan Terkirim',
																							type: 'success',
																							showConfirmButton: false,
																							timer: 1200,
																							});  
																							},10); 
																							</script>";
																						}

																						function view_feed()
																						{
																							error_reporting(0);
																							$select=$this->koneksi->query("SELECT*FROM feedback ORDER BY id_feedback desc");
																							while ($fetch=$select->fetch_assoc()) {
																								$data[]=$fetch;
																							}
																							return $data;
																						}

																						function detail_feed($id){
																							$select=$this->koneksi->query("SELECT*FROM feedback WHERE id_feedback=$id");
																							$fetch = $select->fetch_assoc();
																							return $fetch;
																						} 

																						function delete_feed($id){
																							error_reporting(0); 
																							$data_lama = $this->detail_feed($id);
																							$foto_lama = $data_lama['img'];
																							$this->koneksi->query("DELETE FROM feedback WHERE id_feedback='$id'") ;
																						}

	//BERITA
																						function save_berita($jenis,$judul,$isi,$date,$foto){
																							$nama_foto=$foto['name'];
																							$lokasi_foto=$foto['tmp_name'];
																							if (!empty($lokasi_foto)) {
																								move_uploaded_file($lokasi_foto, "foto/$nama_foto");}

																								$this->koneksi->query("INSERT INTO berita(jenis,judul,isi,tgl,img) VALUES ('$jenis','$judul','$isi','$date','$nama_foto')") or die(mysqli_error($this->koneksi));
																								echo "<script>setTimeout(function () { 
																									swal({
																										title: 'Berita Dipublikasikan',
																										type: 'success',
																										showConfirmButton: false,
																										timer: 1200,
																										});  
																										},10); 
																										</script>";
																										echo "<script>
																										setTimeout(function () {
																											window.location.href= 'index.php?halaman=berita';
																											},1230); 
																											</script>";
																										}


																										function view_berita()
																										{
																											error_reporting(0);
																											$select=$this->koneksi->query("SELECT*FROM berita ORDER BY tgl desc");
																											while ($fetch=$select->fetch_assoc()) {
																												$data[]=$fetch;
																											}
																											return $data;
																										}



																										function detail_berita($id){
																											$select=$this->koneksi->query("SELECT*FROM berita WHERE id_berita=$id");
																											$fetch = $select->fetch_assoc();
																											return $fetch;
																										} 

																										function delete_berita($id){
																											error_reporting(0); 
																											$data_lama = $this->detail_berita($id);
																											$foto_lama = $data_lama['img'];
																											if(file_exists("foto/$foto_lama"))
																											{
																												unlink("foto/$foto_lama");
																											}
																											else{	}
																												$this->koneksi->query("DELETE FROM berita WHERE id_berita='$id'") ;
																										}

																										function update_berita($id,$jenis,$judul,$isi,$date,$foto){
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

																												$this->koneksi->query("UPDATE berita SET jenis='$jenis',judul='$judul',isi='$isi', tgl='$date',img='$nama_foto' WHERE id_berita='$id'") or die(mysqli_error($this->koneksi));


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
																																window.location.href= 'index.php?halaman=berita';
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
																																	$this->koneksi->query("UPDATE berita SET jenis='$jenis', judul='$judul',isi='$isi', tgl='$date' WHERE id_berita='$id'");
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
																																					window.location.href= 'index.php?halaman=berita';
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

																																				function berita_home()
																																				{
																																					error_reporting(0);
																																					$select=$this->koneksi->query("SELECT*FROM berita ORDER BY tgl desc LIMIT 3");
																																					while ($fetch=$select->fetch_assoc()) {
																																						$data[]=$fetch;
																																					}
																																					return $data;
																																				}

																																				function berita_spesifik_sidebar()
																																				{
																																					error_reporting(0);
																																					$select=$this->koneksi->query("SELECT*FROM berita WHERE jenis='Olahraga' ORDER BY tgl desc LIMIT 1");
																																					while ($fetch=$select->fetch_assoc()) {
																																						$data[]=$fetch;
																																					}
																																					return $data;
																																				}

																																				function kategori($jenis)
																																				{
																																					error_reporting(0);
																																					$select=$this->koneksi->query("SELECT*FROM berita WHERE jenis='$jenis' ORDER BY tgl desc LIMIT 4");
																																					while ($fetch=$select->fetch_assoc()) {
																																						$data[]=$fetch;
																																					}
																																					return $data;
																																				}


																																				function berita_footer($jenis,$limit)
																																				{
																																					error_reporting(0);
																																					$select=$this->koneksi->query("SELECT*FROM berita WHERE jenis='$jenis' ORDER BY tgl desc LIMIT $limit");
																																					while ($fetch=$select->fetch_assoc()) {
																																						$data[]=$fetch;
																																					}
																																					return $data;
																																				}

																																				function berita_lama($jenis,$limit)
																																				{
																																					error_reporting(0);
																																					$select=$this->koneksi->query("SELECT*FROM berita WHERE jenis='$jenis' ORDER BY tgl asc LIMIT $limit");
																																					while ($fetch=$select->fetch_assoc()) {
																																						$data[]=$fetch;
																																					}
																																					return $data;
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
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`id_kelas`,kelas.`nama_kelas`,jurusan.`id_jurusan`,jurusan.`nama_jurusan`,`akademik_siswa`.`semester`,
																																																				`akademik_siswa`.`tahun_ajaran` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				ORDER BY `akademik_siswa`.`semester` ASC");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}

																																																		function select_nilai_transkrip($id)
																																																		{
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,kelas.`nama_kelas`,akademik_siswa.semester,mapel.`nama_mapel`,nilai.id_nilai,nilai.`tugas1`,nilai.`tugas2`,nilai.`ulangan`,nilai.`ujian` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE siswa.`id_siswa`='$id' AND nilai.semester='1'");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}

																																																		function select_nilai_transkrip2($id)
																																																		{
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,kelas.`id_kelas`,akademik_siswa.semester,mapel.`nama_mapel`,nilai.id_nilai,nilai.`tugas1`,nilai.`tugas2`,nilai.`ulangan`,nilai.`ujian` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE siswa.`id_siswa`='$id' AND nilai.semester='2'");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}

																																																		function select_nilai_raport($id)
																																																		{
																																																			$select=$this->koneksi->query("SELECT*FROM nilai WHERE id_siswa=$id");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}

																																																		function hitung_nilai_raport($id,$kls,$smt,$thn){
																																																			$select=$this->koneksi->query("SELECT nilai.id_nilai,siswa.`id_siswa`,kelas.`nama_kelas`,akademik_siswa.semester,mapel.`nama_mapel`,mapel.kkm
																																																				,ROUND((nilai.`tugas1`*50/100)+(nilai.`tugas2`*50/100)) AS harian, nilai.`ulangan` ,nilai.`ujian`,
																																																				ROUND((((nilai.`tugas2`*50/100)+(nilai.`tugas1`*50/100))*35/100)+(nilai.`ulangan`*25/100)+(nilai.`ujian`*40/100)) AS total_nilai FROM siswa 
																																																				INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN 
																																																				jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` 
																																																				INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE `nilai`.`id_kelas`='$kls' AND siswa.`id_siswa`='$id' AND nilai.semester='$smt' AND nilai.tahun='$thn'");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}

																																																		function ranking($kls,$smt,$thn){
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.nama_siswa,kelas.`nama_kelas`,akademik_siswa.semester,nilai.id_nilai,AVG((((nilai.`tugas2`*50/100)+(nilai.`tugas1`*50/100))*30/100)+(nilai.`ulangan`*30/100)+(nilai.`ujian`*40/100)) AS total_rata FROM siswa 
																																																				INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN 
																																																				jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` 
																																																				INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE `nilai`.`id_kelas`='$kls' AND nilai.semester='$smt' AND nilai.tahun='$thn'  GROUP BY id_siswa ORDER BY total_rata DESC");
																																																			while ($fetch=$select->fetch_assoc()) {
																																																				$data[]=$fetch;
																																																			}
																																																			return $data;
																																																		}


																																																		function rata_rata($id,$kls,$smt){
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,kelas.`nama_kelas`,akademik_siswa.semester,mapel.`nama_mapel`,
																																																				nilai.id_nilai,ROUND((nilai.`tugas1`*50/100)+(nilai.`tugas2`*50/100)) AS harian, nilai.`ulangan` ,nilai.`ujian`,
																																																				AVG((((nilai.`tugas2`*50/100)+(nilai.`tugas1`*50/100))*30/100)+(nilai.`ulangan`*30/100)+(nilai.`ujian`*40/100)) AS total_rata FROM siswa 
																																																				INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN 
																																																				jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` 
																																																				INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE siswa.`id_siswa`='$id' AND nilai.id_kelas='$kls' AND nilai.semester='$smt'");
																																																			$fetch = $select->fetch_assoc();
																																																			return $fetch;
																																																		}


																																																		function rata_rata_kelas($id_kelas,$smt,$tahun){
																																																			$select=$this->koneksi->query("SELECT siswa.`id_siswa`,kelas.`nama_kelas`,akademik_siswa.semester,mapel.`nama_mapel`,
																																																				nilai.id_nilai,ROUND((nilai.`tugas1`*50/100)+(nilai.`tugas2`*50/100)) AS harian, nilai.`ulangan` ,nilai.`ujian`,
																																																				AVG((((nilai.`tugas2`*50/100)+(nilai.`tugas1`*50/100))*30/100)+(nilai.`ulangan`*30/100)+(nilai.`ujian`*40/100)) AS rata_kelas FROM siswa 
																																																				INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																				INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN 
																																																				jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan`
																																																				INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` 
																																																				INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE nilai.id_kelas='$id_kelas' AND nilai.semester='$smt' AND nilai.tahun='$tahun'");
																																																			$fetch = $select->fetch_assoc();
																																																			return $fetch;
																																																		}

																																																		function one_select_nilai($id)
																																																		{
																																																			$select=$this->koneksi->query("SELECT*FROM nilai WHERE id_nilai=$id");
																																																			$fetch = $select->fetch_assoc();
																																																			return $fetch;
																																																		}

																																																		function select_tahun($id,$kls,$smt){
																																																			$select=$this->koneksi->query("SELECT nilai.tahun FROM siswa INNER JOIN nilai on siswa.id_siswa=nilai.id_siswa WHERE nilai.id_siswa=$id AND nilai.id_kelas=$kls AND nilai.semester=$smt");
																																																			$fetch = $select->fetch_assoc();
																																																			return $fetch;
																																																		}

																																																		function edit_nilai($idnilai,$t1,$t2,$ul,$uj)
																																																		{
																																																			$data_lama=$this->one_select_nilai($idnilai);
																																																			$select=$this->koneksi->query("UPDATE nilai SET tugas1=$t1,tugas2=$t2,ulangan=$ul,ujian=$uj WHERE id_nilai=$idnilai") or die(mysqli_error($this->koneksi));
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
																																																						window.location.href= 'index.php?halaman=detailnilai&idn=".$_GET['idn']."';
																																																						},1230); 
																																																						</script>";
																																																					}

																																																					function edit_nilai_guru($idnilai,$t1,$t2,$ul,$uj)
																																																					{
																																																						$data_lama=$this->one_select_nilai($idnilai);
																																																						$select=$this->koneksi->query("UPDATE nilai SET tugas1=$t1,tugas2=$t2,ulangan=$ul,ujian=$uj WHERE id_nilai=$idnilai") or die(mysqli_error($this->koneksi));
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

																																																								function delete_nilai($id,$id_back){
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
																																																												window.location.href= 'index.php?halaman=detailnilai&idn=$id_back';
																																																												},1230); 
																																																												</script>";
																																																											}

																																																											function delete_nilai2($id){
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
																																																															$select=$this->koneksi->query("SELECT siswa.`id_siswa`,siswa.`nama_siswa`,kelas.`nama_kelas`,jurusan.`nama_jurusan`,mapel.`nama_mapel`,nilai.`id_nilai` ,nilai.`tugas1`,nilai.`tugas2`,nilai.`ulangan`,nilai.`ujian` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa`
																																																																INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas` INNER JOIN jurusan ON kelas.`id_jurusan`= jurusan.`id_jurusan`
																																																																INNER JOIN nilai ON siswa.`id_siswa`=nilai.`id_siswa` INNER JOIN mapel ON nilai.`id_mapel`=mapel.`kode_mapel` WHERE id_nilai=$id");
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
																																																															$select=$this->koneksi->query("SELECT siswa.`id_siswa`,`akademik_siswa`.`semester`,siswa.`nama_siswa`,akademik_siswa.`tahun_ajaran`,kelas.`id_kelas`,kelas.`nama_kelas`,jurusan.`nama_jurusan`FROM siswa INNER JOIN `akademik_siswa` ON `siswa`.`id_siswa` = `akademik_siswa`.`id_siswa` 
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
																																																																		</script>";

																																																																		$no=1;
																																																																		while ($row = mysqli_fetch_assoc($select)) {
																																																																			echo '<tr>';
																																																																			echo '<td width="5%" align="center">'.$no++.'</td>';
																																																																			echo '<td align="center">'.$row['nama_siswa'].'</td>';
																																																																			echo '<td align="center">'.$row['nama_kelas'].' <input type="hidden" name="id_kelas[]" value="'.$row['id_kelas'].'"></td>';
																																																																			echo '<td align="center">'.$row['nama_jurusan'].' <input type="hidden" name="semester[]" value="'.$row['semester'].'"> <input type="hidden" name="tahun[]" value="'.$row['tahun_ajaran'].'"> </td>';
																																																																			echo '<td align="center">'.$row['semester'].'</td>';
																																																																			echo '<td align="center" width="10%" ><input style="text-align: center;" class="form-control" type="number" min="0" max="100" name="nilai[]" ><input style="text-align: center;" class="form-control" type="hidden" name="id_siswa[]" value="'.$row['id_siswa'].'"></td>';
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


																																																																		function multiple_input($jenis_nilai){
																																																																			error_reporting(0);
																																																																			if(isset($_POST['simpan'])){
																																																																				$idsiswa = $_POST['id_siswa'];
																																																																				$count = count($idsiswa);
																																																																				if ($jenis_nilai=='1') {
																																																																					$sql = "INSERT INTO nilai(id_siswa,id_kelas,semester, id_mapel, tugas1,tahun) VALUES";
																																																																					$hasil=$x+1;
																																																																				}
																																																																				elseif($jenis_nilai=='2'){
																																																																					$sql = "INSERT INTO nilai(id_siswa,id_kelas,semester, id_mapel, tugas2, tahun) VALUES";
																																																																					$hasil=$x+1;
																																																																				}
																																																																				elseif($jenis_nilai=='3'){
																																																																					$sql = "INSERT INTO nilai(id_siswa,id_kelas,semester, id_mapel, ulangan, tahun) VALUES";
																																																																					$hasil=$x+1;
																																																																				}
																																																																				elseif($jenis_nilai=='4'){
																																																																					$sql = "INSERT INTO nilai(id_siswa,id_kelas,semester, id_mapel, ujian, tahun) VALUES";
																																																																					$hasil=$x+1;
																																																																				}
																																																																				elseif($jenis_nilai=='5'){
																																																																					$sql = "INSERT INTO nilai(id_siswa,id_kelas,semester, id_mapel, ujian, tahun) VALUES";
																																																																					$hasil=$x+1;
																																																																				}
																																																																				for($i = 0 ; $i < $count ; $i++)
																																																																				{
																																																																					$cek=$this->koneksi->query("SELECT*FROM nilai WHERE id_siswa='".$_POST['id_siswa'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																					if($cek->num_rows>0){
																																																																						if ($jenis_nilai=='1') {
																																																																							$to=1;
																																																																							$this->koneksi->query("UPDATE nilai SET tugas1='".$_POST['nilai'][$i]."' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."'	AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																						}
																																																																						elseif($jenis_nilai=='2'){
																																																																							$to=1;
																																																																							$this->koneksi->query("UPDATE nilai SET tugas2='".$_POST['nilai'][$i]."' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																						}
																																																																						elseif($jenis_nilai=='3'){
																																																																							$to=1;
																																																																							$this->koneksi->query("UPDATE nilai SET ulangan='".$_POST['nilai'][$i]."' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																						}
																																																																						elseif($jenis_nilai=='4'){
																																																																							$to=1;
																																																																							$this->koneksi->query("UPDATE nilai SET ujian='".$_POST['nilai'][$i]."' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																						}
																																																																						elseif($jenis_nilai=='5'){
																																																																							$to=1;
																																																																							$this->koneksi->query("UPDATE nilai SET ujian='".$_POST['nilai'][$i]."' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."' AND id_mapel='".$_POST['get_mapel']."' AND id_kelas='".$_POST['id_kelas'][$i]."' AND semester='".$_POST['semester'][$i]."' AND tahun='".$_POST['tahun'][$i]."'");
																																																																						}
																																																																					}
																																																																					else{
																																																																						$to=0;
																																																																						$sql .="('".$_POST['id_siswa'][$i]."','".$_POST['id_kelas'][$i]."','".$_POST['semester'][$i]."','".$_POST['get_mapel']."','".$_POST['nilai'][$i]."','".$_POST['tahun'][$i]."'),";
																																																																					}
																																																																				}
																																																																				if($to==1){
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
																																																																						}
																																																																						if($hasil==1 && $to==0){
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
																																																																									} 

																																																																									$this->koneksi->close();
																																																																								}


																																																																							}
																																																																						}

																																																																						function multiple_naik_kelas(){
	//error_reporting(0);
																																																																							if(isset($_POST['simpan'])){
																																																																								$idsiswa = $_POST['id_siswa'];
																																																																								$count = count($idsiswa);

																																																																								for($i = 0 ; $i < $count ; $i++)
																																																																								{
																																																																									$this->koneksi->query("UPDATE akademik_siswa SET id_kelas='".$_POST['kls'][$i]."',semester='1' WHERE `id_siswa`='".$_POST['id_siswa'][$i]."'");
																																																																								}
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
																																					window.location.href= 'index.php?halaman=naikkelas';
																																					},1230);
																																					</script>";

																																																																									}

																																																																									$this->koneksi->close();
																																																																								}
//---------------------------------------------- GURU ---------------------------------------------//
																																																																								function select_guru()
																																																																								{
																																																																									error_reporting(0); 
																																																																									$select=$this->koneksi->query("SELECT*FROM GURU ORDER BY id_guru DESC");
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


																																																																								function select_nip($id)
																																																																								{ 
																																																																									$select=$this->koneksi->query("SELECT NIP FROM akademik_guru WHERE id_guru='$id'") ;
																																																																									$fetch = $select->fetch_assoc();
																																																																									return $fetch;
																																																																								}


																																																																								function delete_guru($id_guru)
																																																																								{
																																																																									$cek=$this->koneksi->query("SELECT kelas.wali_kelas FROM guru INNER JOIN akademik_guru ON guru.id_guru=akademik_guru.id_guru INNER JOIN kelas ON akademik_guru.kode_guru=kelas.wali_kelas WHERE guru.id_guru='$id_guru'");
																																																																									$cek1=$this->koneksi->query("SELECT mapel.kode_guru FROM guru INNER JOIN akademik_guru ON guru.id_guru=akademik_guru.id_guru INNER JOIN mapel ON akademik_guru.kode_guru=mapel.kode_guru WHERE guru.id_guru='$id_guru'");
																																																																									if ($cek->num_rows>0||$cek1->num_rows>0) {
																																																																										echo "<script>setTimeout(function () { 
																																																																											swal({
																																																																												title: 'Data Masih Digunakan',
																																																																												type: 'warning',
																																																																												showConfirmButton: false,
																																																																												timer: 900,
																																																																												});  
																																																																												},10);
																																																																												window.setTimeout(function(){ 
																																																																													window.location.replace('index.php?halaman=guru');
																																																																												} ,900); </script>";
																																																																											}
																																																																											else{
																																																																												error_reporting(0); 
																																																																												$user=$this->select_nip($id_guru);
																																																																												$nip=$user['NIP'];
																																																																												$this->delete_user($nip);
																																																																												$this->delete_akademik_guru($id_guru);
																																																																												$data_lama = $this->one_select_guru($id_guru);
																																																																												$foto_lama = $data_lama['gambar'];
	//cek apakah foto ada di folder
																																																																												if(file_exists("foto/$foto_lama"))
																																																																												{
		//hapusfoto
																																																																													unlink("foto/$foto_lama");
																																																																												}
																																																																												else{}
																																																																													$this->koneksi->query("DELETE FROM guru WHERE id_guru='$id_guru'");
																																																																												echo "<script>setTimeout(function () { 
																																																																													swal({
																																																																														title: 'Delete Berhasil',
																																																																														type: 'success',
																																																																														showConfirmButton: false,
																																																																														timer: 900,
																																																																														});  
																																																																														},10); 
																																																																														window.setTimeout(function(){ 
																																																																															window.location.replace('index.php?halaman=guru');
																																																																														} ,900); </script>";
																																																																													}
																																																																												}

//------------------------------------- END OF GURU --------------------------------------------//


//---------------------------------------- SISWA ----------------------------------------------//


																																																																												function select_all_siswa()
																																																																												{
	//error_reporting(0); 
																																																																													$select=$this->koneksi->query("SELECT*FROM siswa");
																																																																													while ($fetch=$select->fetch_assoc()) {
																																																																														$data[]=$fetch; }
																																																																														return $data;
																																																																													}



																																																																													function one_select_siswa($id_siswa)
																																																																													{
																																																																														$select=$this->koneksi->query("SELECT*FROM siswa WHERE id_siswa=$id_siswa");
																																																																														$fetch = $select->fetch_assoc();
																																																																														return $fetch;
																																																																													}

																																																																													function one_select_siswa_akademik($id_siswa)
																																																																													{
																																																																														$select=$this->koneksi->query("SELECT*FROM siswa INNER JOIN akademik_siswa ON siswa.id_siswa=akademik_siswa.id_siswa INNER JOIN kelas ON akademik_siswa.id_kelas = kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE siswa.id_siswa='$id_siswa'");
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


																																																																													function select_niss($id)
																																																																													{ 
																																																																														$select=$this->koneksi->query("SELECT NISS FROM akademik_siswa WHERE id_siswa='$id'") ;
																																																																														$fetch = $select->fetch_assoc();
																																																																														return $fetch;
																																																																													}

																																																																													function delete_siswa($id_siswa)
																																																																													{
																																																																														$cek=$this->koneksi->query("SELECT id_siswa FROM nilai WHERE id_siswa='$id_siswa'");
																																																																														if ($cek->num_rows>0) {
																																																																															$this->delete_user($id_siswa);
																																																																															echo "<script>setTimeout(function () { 
																																																																																swal({
																																																																																	title: 'Data Masih Digunakan',
																																																																																	type: 'warning',
																																																																																	showConfirmButton: false,
																																																																																	timer: 900,
																																																																																	});  
																																																																																	},10);
																																																																																	window.setTimeout(function(){ 
																																																																																		window.location.replace('index.php?halaman=siswa');
																																																																																	} ,900); </script>";
																																																																																}
																																																																																else{
																																																																																	$user=$this->select_niss($id_siswa);
																																																																																	$niss=$user['NISS'];
																																																																																	$this->delete_user($niss);
																																																																																	$this->delete_akademik_siswa($id_siswa);
																																																																																	$data_lama = $this->one_select_siswa($id_siswa);
																																																																																	$foto_lama = $data_lama['gambar'];
	//cek apakah foto ada di folder
																																																																																	error_reporting(0);
																																																																																	if(file_exists("foto/$foto_lama"))
																																																																																	{
		//hapusfoto
																																																																																		unlink("foto/$foto_lama");
																																																																																	}
																																																																																	else{
																																																																																	}
																																																																																	$this->koneksi->query("DELETE FROM siswa WHERE id_siswa='$id_siswa'") ;
																																																																																	echo "<script>setTimeout(function () { 
																																																																																		swal({
																																																																																			title: 'Data Terhapus',
																																																																																			type: 'success',
																																																																																			showConfirmButton: false,
																																																																																			timer: 1000,
																																																																																			});  
																																																																																			},10); 
																																																																																			window.setTimeout(function(){ 
																																																																																				window.location.replace('index.php?halaman=siswa');
																																																																																			} ,1000); </script>";
																																																																																		}
																																																																																	}

//------------------------------------- END OF SISWA --------------------------------------------//

																																																																																	function select_identitas()
																																																																																	{
																																																																																		$select=$this->koneksi->query("SELECT*FROM identitas_sekolah LIMIT 1");
																																																																																		$fetch = $select->fetch_assoc();
																																																																																		return $fetch;
																																																																																	}

//--------------------------------------AKADEMIK GURU--------------------------------------------//
																																																																																	function one_select_akademik_guru($id){
																																																																																		$select=$this->koneksi->query("SELECT guru.nama,guru.id_guru,mapel.nama_mapel,mapel.kode_mapel,akademik_guru.kode_guru, akademik_guru.NIP, akademik_guru.NUPTK, akademik_guru.status FROM `akademik_guru` INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru` INNER JOIN mapel ON `akademik_guru`.`kode_guru`=mapel.`kode_guru`
																																																																																			WHERE guru.`id_guru`=$id;");
																																																																																		$fetch = $select->fetch_assoc();
																																																																																		return $fetch;
																																																																																	}

																																																																																	function status_akademik_guru($id){
																																																																																		$select=$this->koneksi->query("SELECT akademik_guru.status FROM `akademik_guru` INNER JOIN guru ON `akademik_guru`.`id_guru`=guru.`id_guru`	WHERE guru.`id_guru`=$id;");
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

																																																																																	function add_akademik_guru($id,$nip,$nuptk,$status){
																																																																																		$cek0=$this->koneksi->query("SELECT*FROM akademik_guru WHERE NIP='$nip'");
																																																																																		$cek1=$this->koneksi->query("SELECT*FROM akademik_guru WHERE NUPTK='$nuptk'");
																																																																																		$cek=$this->koneksi->query("SELECT*FROM akademik_guru WHERE NIP='$nip' AND NUPTK='$nuptk");
																																																																																		if ($cek0->num_rows>0 || $cek1->num_rows>0) {
																																																																																			echo "<script>setTimeout(function () { 
																																																																																				swal({
																																																																																					title: 'Data Sudah Ada',
																																																																																					type: 'warning',
																																																																																					showConfirmButton: false,
																																																																																					timer: 900,
																																																																																					});  
																																																																																					},10);
																																																																																					</script>";
																																																																																				}
																																																																																				elseif ($cek->num_rows>0) {
																																																																																					echo "<script>setTimeout(function () { 
																																																																																						swal({
																																																																																							title: 'Data Sudah Ada',
																																																																																							type: 'warning',
																																																																																							showConfirmButton: false,
																																																																																							timer: 900,
																																																																																							});  
																																																																																							},10);
																																																																																							</script>";
																																																																																						}
																																																																																						elseif($cek0->num_rows<=0 || $cek1->num_rows<=0 || $cek->num_rows<=0 ){
																																																																																							$this->koneksi->query("INSERT INTO akademik_guru(id_guru,NIP,NUPTK,status) VALUES ('$id','$nip','$nuptk','$status')");
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

																																																																																							function update_akademik_guru($nip,$nuptk,$id,$status)
																																																																																							{
																																																																																								$data_lama = $this->one_select_akademik_guru($nip);
																																																																																								$this->koneksi->query("UPDATE akademik_guru SET NIP='$nip', NUPTK='$nuptk', status='$status' WHERE id_guru='$id'") or die(mysqli_error($this->koneksi));
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
																																																																																								$select=$this->koneksi->query("SELECT akademik_siswa.NISS,akademik_siswa.id_kelas,akademik_siswa.semester,akademik_siswa.tahun_ajaran,akademik_siswa.status,kelas.nama_kelas,jurusan.nama_jurusan FROM akademik_siswa INNER JOIN kelas ON akademik_siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan on kelas.id_jurusan=jurusan.id_jurusan WHERE id_siswa=$id;");
																																																																																								$fetch = $select->fetch_assoc();
																																																																																								return $fetch;
																																																																																							}

																																																																																							function add_akademik_siswa($NIS,$id,$kelas,$smt,$year,$status){
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
																																																																																											$this->koneksi->query("INSERT INTO akademik_siswa(NISS,id_siswa,id_kelas,semester,tahun_ajaran,status) VALUES ('$NIS','$id','$kelas','$smt','$year','$status')") or die(mysqli_error($this->koneksi));
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

																																																																																												function update_akademik_siswa($NIS,$id,$kelas,$smt,$year,$status)
																																																																																												{
																																																																																													$data_lama = $this->one_select_akademik_siswa($NIS);
																																																																																													$this->koneksi->query("UPDATE akademik_siswa SET id_kelas='$kelas', semester='$smt', tahun_ajaran='$year',status='$status' WHERE NISS='$NIS'") or die(mysqli_error($this->koneksi)); }
function update_semester($nip){
if (isset($_POST['update'])){
$this->koneksi->query("UPDATE `akademik_siswa` INNER JOIN kelas ON `akademik_siswa`.`id_kelas`=kelas.`id_kelas`  INNER JOIN
`akademik_guru` ON kelas.`wali_kelas`=`akademik_guru`.`kode_guru` SET `akademik_siswa`.`semester`='2' WHERE `akademik_guru`.`NIP`='$nip'") or die(mysqli_error($this->koneksi));

echo "<script>
swal({
title: 'Berhasil Ubah ke semester 2',
type: 'success',
showConfirmButton: false,
timer: 1300
})
</script>";

 }
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
																																																																																													$select=$this->koneksi->query("SELECT kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan , jurusan.nama_jurusan, guru.nama FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan INNER JOIN akademik_guru ON kelas.wali_kelas=akademik_guru.kode_guru INNER JOIN guru ON akademik_guru.id_guru=guru.id_guru;");
																																																																																													while ($fetch = $select->fetch_assoc()) {
																																																																																														$data[] = $fetch; }
																																																																																														return $data;
																																																																																													}

																																																																																													function one_select_kelas($id)
																																																																																													{
																																																																																														$select=$this->koneksi->query("SELECT*FROM kelas WHERE id_kelas='$id'");
																																																																																														$fetch = $select->fetch_assoc();
																																																																																														return $fetch;
																																																																																													}


																																																																																													function select_kelas1($kode)
																																																																																													{
																																																																																														$select=$this->koneksi->query("SELECT kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan , jurusan.nama_jurusan FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE kelas.id_jurusan=$kode;");
																																																																																														while ($fetch = $select->fetch_assoc()) {
																																																																																															$data[] = $fetch; }
																																																																																															return $data;
																																																																																														}

																																																																																														function add_kelas($namakelas,$idjurusan,$wali)
																																																																																														{
																																																																																															$cek=$this->koneksi->query("SELECT nama_kelas,id_jurusan FROM kelas WHERE nama_kelas='$namakelas' AND id_jurusan='$id_jurusan'");
																																																																																															if ($cek->num_rows>0) {
																																																																																																echo "<script>setTimeout(function () { 
																																																																																																	swal({
																																																																																																		title: 'Data Sudah Ada',
																																																																																																		type: 'warning',
																																																																																																		showConfirmButton: false,
																																																																																																		timer: 900,
																																																																																																		});  
																																																																																																		},10);
																																																																																																		window.setTimeout(function(){ 
																																																																																																			window.location.replace('index.php?halaman=kelas');
																																																																																																		} ,900); </script>";
																																																																																																	}
																																																																																																	else{
																																																																																																		$this->koneksi->query("INSERT INTO kelas(nama_kelas,id_jurusan,wali_kelas) VALUES ('$namakelas','$idjurusan','$wali')") or die(mysqli_error($this->koneksi));
																																																																																																		echo "<script>setTimeout(function () { 
																																																																																																			swal({
																																																																																																				title: 'Data Tersimpan',
																																																																																																				icon: 'success',
																																																																																																				type: 'success',
																																																																																																				showConfirmButton: false,
																																																																																																				timer: 1000,
																																																																																																				});  
																																																																																																				},10); 
																																																																																																				window.setTimeout(function(){ 
																																																																																																					window.location.replace('index.php?halaman=kelas');
																																																																																																				} ,1000); </script>";
																																																																																																			}
																																																																																																		}

																																																																																																		function one_select($id_kelas)
																																																																																																		{
																																																																																																			$select=$this->koneksi->query("SELECT kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan , jurusan.nama_jurusan, guru.nama FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan INNER JOIN akademik_guru ON kelas.wali_kelas=akademik_guru.kode_guru INNER JOIN guru ON akademik_guru.id_guru=guru.id_guru WHERE id_kelas=$id_kelas;");
																																																																																																			$fetch = $select->fetch_assoc();
																																																																																																			return $fetch;
																																																																																																		}

																																																																																																		function select_walikelas()
																																																																																																		{
																																																																																																			$select=$this->koneksi->query("SELECT akademik_guru.kode_guru,guru.nama FROM guru INNER JOIN akademik_guru ON akademik_guru.id_guru=guru.id_guru;");
																																																																																																			while ($fetch = $select->fetch_assoc()) {
																																																																																																				$data[] = $fetch; }
																																																																																																				return $data;
																																																																																																			}

																																																																																																			function update_kelas($idkelas,$namakelas,$idjurusan,$wali)
																																																																																																			{
																																																																																																				$data_lama = $this->one_select($idkelas);
																																																																																																				$this->koneksi->query("UPDATE kelas SET nama_kelas='$namakelas',id_jurusan='$idjurusan',wali_kelas='$wali' WHERE id_kelas='$idkelas'") or die(mysqli_error($this->koneksi));
																																																																																																			}

																																																																																																			function delete_kelas($id_kelas)
																																																																																																			{
																																																																																																				$cek=$this->koneksi->query("SELECT id_kelas FROM akademik_siswa WHERE id_kelas='$id_kelas'");
																																																																																																				if ($cek->num_rows>0) {
																																																																																																					echo "<script>setTimeout(function () { 
																																																																																																						swal({
																																																																																																							title: 'Data Masih Digunakan',
																																																																																																							type: 'warning',
																																																																																																							showConfirmButton: false,
																																																																																																							timer: 900,
																																																																																																							});  
																																																																																																							},10);
																																																																																																							window.setTimeout(function(){ 
																																																																																																								window.location.replace('index.php?halaman=kelas');
																																																																																																							} ,900); </script>";
																																																																																																						}
																																																																																																						else{
																																																																																																							$data_lama = $this->one_select($id_kelas);
																																																																																																							$this->koneksi->query("DELETE FROM kelas WHERE id_kelas='$id_kelas'");
																																																																																																							echo "<script>setTimeout(function () { 
																																																																																																								swal({
																																																																																																									title: 'Delete Berhasil',
																																																																																																									type: 'success',
																																																																																																									showConfirmButton: false,
																																																																																																									timer: 900,
																																																																																																									});  
																																																																																																									},10);
																																																																																																									window.setTimeout(function(){ 
																																																																																																										window.location.replace('index.php?halaman=kelas');
																																																																																																									} ,900); </script>";
																																																																																																								}
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
																																																																																																								$cek=$this->koneksi->query("SELECT nama_jurusan FROM jurusan WHERE nama_jurusan='$namajurusan'");
																																																																																																								if ($cek->num_rows>0) {
																																																																																																									echo "<script>setTimeout(function () { 
																																																																																																										swal({
																																																																																																											title: 'Data Sudah Ada',
																																																																																																											type: 'warning',
																																																																																																											showConfirmButton: false,
																																																																																																											timer: 1200,
																																																																																																											});  
																																																																																																											},10);
																																																																																																											window.setTimeout(function(){ 
																																																																																																												window.location.replace('index.php?halaman=kelas');
																																																																																																											} ,800); </script>";

																																																																																																										}
																																																																																																										else{
																																																																																																											$this->koneksi->query("INSERT INTO jurusan(nama_jurusan) VALUES ('$namajurusan')") or die(mysqli_error($this->koneksi));
																																																																																																											echo "<script>setTimeout(function () { 
																																																																																																												swal({
																																																																																																													title: 'Data Tersimpan',
																																																																																																													type: 'success',
																																																																																																													showConfirmButton: false,
																																																																																																													timer: 1000,
																																																																																																													});  
																																																																																																													},10); 
																																																																																																													window.setTimeout(function(){ 
																																																																																																														window.location.replace('index.php?halaman=kelas');
																																																																																																													} ,1000); </script>";
																																																																																																												}	
																																																																																																											}

																																																																																																											function delete_jurusan($id_jurusan)
																																																																																																											{	
																																																																																																												$cek=$this->koneksi->query("SELECT id_jurusan FROM kelas WHERE id_jurusan='$id_jurusan'");
																																																																																																												if ($cek->num_rows>0) {
																																																																																																													echo "<script>setTimeout(function () { 
																																																																																																														swal({
																																																																																																															title: 'Data Masih Digunakan',
																																																																																																															type: 'warning',
																																																																																																															showConfirmButton: false,
																																																																																																															timer: 1200,
																																																																																																															});  
																																																																																																															},10);
																																																																																																															window.setTimeout(function(){ 
																																																																																																																window.location.replace('index.php?halaman=kelas');
																																																																																																															} ,800); </script>";

																																																																																																														}
																																																																																																														else
																																																																																																														{
																																																																																																															$data_lama = $this->one_select_jurusan($id_jurusan);
																																																																																																															$this->koneksi->query("DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'") ;
																																																																																																															echo "<script>setTimeout(function () { 
																																																																																																																swal({
																																																																																																																	title: 'Data Terhapus',
																																																																																																																	type: 'success',
																																																																																																																	showConfirmButton: false,
																																																																																																																	timer: 800,
																																																																																																																	});  
																																																																																																																	},10); 
																																																																																																																	window.setTimeout(function(){ 
																																																																																																																		window.location.replace('index.php?halaman=kelas');
																																																																																																																	} ,800); </script>";
																																																																																																																}
																																																																																																															}
//------------------------------------- END OF JURUSAN --------------------------------------------//


//--------------------------------------------- MAPEL ----------------------------------------------//
																																																																																																															function select_mapel()
																																																																																																															{
																																																																																																																$select=$this->koneksi->query("SELECT mapel.kode_mapel,mapel.nama_mapel,mapel.kkm,mapel.kode_guru,guru.nama FROM mapel INNER JOIN akademik_guru on mapel.kode_guru=akademik_guru.kode_guru INNER JOIN guru on akademik_guru.id_guru=guru.id_guru");
																																																																																																																while ($fetch = $select->fetch_assoc()) {
																																																																																																																	$data[] = $fetch; }
																																																																																																																	return $data;
																																																																																																																}

																																																																																																																function select_detail_mapel()
																																																																																																																{
																																																																																																																	$select=$this->koneksi->query("SELECT `mapel_kelas`.`id_detail`,`mapel_kelas`.`id_kelas`, `mapel_kelas`.`kode_mapel` ,mapel.`nama_mapel`,kelas.`nama_kelas`,jurusan.`nama_jurusan` FROM
																																																																																																																		mapel_kelas INNER JOIN mapel ON mapel_kelas.`kode_mapel`=mapel.`kode_mapel` INNER JOIN kelas ON mapel_kelas.`id_kelas`=kelas.`id_kelas`
																																																																																																																		INNER JOIN jurusan ON kelas.`id_jurusan`=jurusan.`id_jurusan` ORDER BY `kelas`.`nama_kelas` DESC");
																																																																																																																	while ($fetch = $select->fetch_assoc()) {
																																																																																																																		$data[] = $fetch; }
																																																																																																																		return $data;
																																																																																																																	}

																																																																																																																	function select_mapel_guru()
																																																																																																																	{
																																																																																																																		$select=$this->koneksi->query("SELECT akademik_guru.kode_guru,guru.nama FROM guru INNER JOIN akademik_guru ON akademik_guru.id_guru=guru.id_guru;");
																																																																																																																		while ($fetch = $select->fetch_assoc()) {
																																																																																																																			$data[] = $fetch; }
																																																																																																																			return $data;
																																																																																																																	}

																																																																																																																		function one_select_mapel($id)
																																																																																																																		{
																																																																																																																			$select=$this->koneksi->query("SELECT*FROM mapel WHERE kode_mapel='$id'");
																																																																																																																			$fetch=$select->fetch_assoc();
																																																																																																																			return $fetch;
																																																																																																																		}

																																																																																																																		function one_select_mapel_kelas($id)
																																																																																																																		{
																																																																																																																			$select=$this->koneksi->query("SELECT*FROM mapel_kelas WHERE id_detail='$id'");
																																																																																																																			$fetch=$select->fetch_assoc();
																																																																																																																			return $fetch;
																																																																																																																		}

																																																																																																																		function update_mapel_kelas($id,$idk){
																																																																																																																			$data_lama = $this->one_select_mapel_kelas($id);
																																																																																																																			$this->koneksi->query("UPDATE mapel_kelas SET id_kelas='$idk' WHERE id_detail='$id'") ;
																																																																																																																		}


																																																																																																																		function delete_mapel_kelas($id){
																																																																																																																			$data_lama = $this->one_select_mapel_kelas($id);
																																																																																																																			$this->koneksi->query("DELETE FROM mapel_kelas WHERE id_detail='$id'") ;
																																																																																																																			echo "<script>setTimeout(function () { 
																																																																																																																				swal({
																																																																																																																					title: 'Data Terhapus',
																																																																																																																					type: 'success',
																																																																																																																					showConfirmButton: false,
																																																																																																																					timer: 1000,
																																																																																																																					});  
																																																																																																																					},10); 
																																																																																																																					window.setTimeout(function(){ 
																																																																																																																						window.location.replace('index.php?halaman=mapel');
																																																																																																																					} ,1000); </script>";
																																																																																																																				}

																																																																																																																				function add_mapel_kelas($idkelas,$kode_mapel){
																																																																																																																					$cek=$this->koneksi->query("SELECT*FROM mapel_kelas WHERE id_kelas='$idkelas' AND kode_mapel='$kode_mapel'");
		//echo "<pre>";
		//print_r($cek);
		//echo "</pre>";
																																																																																																																					if ($cek->num_rows==0) {
																																																																																																																						$this->koneksi->query("INSERT INTO `mapel_kelas` (`id_kelas`,`kode_mapel`) VALUES ('$idkelas','$kode_mapel')") or die(mysqli_error($this->koneksi));
																																																																																																																						echo "<script>setTimeout(function () { 
																																																																																																																							swal({
																																																																																																																								title: 'Data Tersimpan',
																																																																																																																								type: 'success',
																																																																																																																								showConfirmButton: false,
																																																																																																																								timer: 1000,
																																																																																																																								});  
																																																																																																																								},10); 
																																																																																																																								window.setTimeout(function(){ 
																																																																																																																									window.location.replace('index.php?halaman=mapel');
																																																																																																																								} ,1000); </script>";

																																																																																																																							}
																																																																																																																							else{
																																																																																																																								echo "<script>setTimeout(function () { 
																																																																																																																									swal({
																																																																																																																										title: 'Data Sudah Ada',
																																																																																																																										type: 'warning',
																																																																																																																										showConfirmButton: false,
																																																																																																																										timer: 1000,
																																																																																																																										});  
																																																																																																																										},10); 
																																																																																																																										</script>";	
																																																																																																																									}

																																																																																																																								}

																																																																																																																								function add_mapel($kode,$nama,$kkm,$kode_guru){
																																																																																																																									$cek0=$this->koneksi->query("SELECT*FROM mapel WHERE kode_mapel='$kode' AND nama_mapel='$nama'");
																																																																																																																									$cek1=$this->koneksi->query("SELECT*FROM mapel WHERE kode_mapel='$kode'");
																																																																																																																									//$cek2=$this->koneksi->query("SELECT*FROM mapel WHERE nama_mapel='$nama'");
																																																																																																																									$cek4=$this->koneksi->query("SELECT*FROM mapel_kelas WHERE kode_mapel='$kode'");
																																																																																																																									if ($cek0->num_rows>0||$cek1->num_rows>0||$cek4->num_rows>0) {
																																																																																																																										echo "<script>setTimeout(function () { 
																																																																																																																											swal({
																																																																																																																												title: 'Data Sudah Ada',
																																																																																																																												type: 'warning',
																																																																																																																												showConfirmButton: false,
																																																																																																																												timer: 900,
																																																																																																																												});  
																																																																																																																												},10);
																																																																																																																												</script>";
																																																																																																																											}
																																																																																																																											else{
																																																																																																																												$this->koneksi->query("INSERT INTO mapel(kode_mapel,nama_mapel,kkm,kode_guru) VALUES ('$kode','$nama', '$kkm','$kode_guru')") or die(mysqli_error($this->koneksi));

																																																																																																																												echo "<script>setTimeout(function () {
																																																																																																																													swal({
																																																																																																																														title: 'Data Tersimpan',
																																																																																																																														type: 'success',
																																																																																																																														showConfirmButton: false,
																																																																																																																														timer: 1000,
																																																																																																																														});
																																																																																																																														},10);
																																																																																																																														window.setTimeout(function(){
																																																																																																																															window.location.replace('index.php?halaman=mapel');
																																																																																																																														} ,1000); </script>";
																																																																																																																													}
																																																																																																																												}

																																																																																																																												function delete_mapel($id_mapel)
																																																																																																																												{
																																																																																																																													$cek=$this->koneksi->query("SELECT id_mapel FROM nilai WHERE id_mapel='$id_mapel'");
																																																																																																																													$cek1=$this->koneksi->query("SELECT kode_mapel FROM mapel_kelas WHERE kode_mapel='$id_mapel'");
																																																																																																																													if ($cek->num_rows>0||$cek1->num_rows>0) {
																																																																																																																														echo "<script>setTimeout(function () {
																																																																																																																															swal({
																																																																																																																																title: 'Data Masih Diguakan',
																																																																																																																																text:'Harap Hapus Detail Mata Pelajaran dan Nilai Terlebih Dahulu',
																																																																																																																																type: 'warning',
																																																																																																																																showConfirmButton: false,
																																																																																																																																timer: 2000,
																																																																																																																																});  
																																																																																																																																},10);
																																																																																																																																window.setTimeout(function(){ 
																																																																																																																																	window.location.replace('index.php?halaman=mapel');
																																																																																																																																} ,2000); </script>";
																																																																																																																															}
																																																																																																																															else
																																																																																																																															{
																																																																																																																																$data_lama = $this->one_select_mapel($id_mapel);
																																																																																																																																$this->koneksi->query("DELETE FROM mapel WHERE kode_mapel='$id_mapel'") ;
																																																																																																																																echo "<script>setTimeout(function () { 
																																																																																																																																	swal({
																																																																																																																																		title: 'Data Terhapus',
																																																																																																																																		type: 'success',
																																																																																																																																		showConfirmButton: false,
																																																																																																																																		timer: 800,
																																																																																																																																		});  
																																																																																																																																		},10); 
																																																																																																																																		window.setTimeout(function(){ 
																																																																																																																																			window.location.replace('index.php?halaman=mapel');
																																																																																																																																		} ,800); </script>";
																																																																																																																																	}
																																																																																																																																}

																																																																																																																																function update_mapel($kode,$nama,$kkm,$guru)
																																																																																																																																{
																																																																																																																																	$this->koneksi->query("UPDATE mapel SET nama_mapel='$nama',kkm='$kkm',kode_guru='$guru' WHERE kode_mapel='$kode'") or die(mysqli_error($this->koneksi));
																																																																																																																																}

																																																																																																																																function select_user(){
																																																																																																																																	$select=$this->koneksi->query("SELECT*FROM user");
																																																																																																																																	while ($fetch = $select->fetch_assoc()) {
																																																																																																																																		$data[] = $fetch;
																																																																																																																																	}
																																																																																																																																	return $data;
																																																																																																																																}

																																																																																																																																function one_select_user($id)
																																																																																																																																{
																																																																																																																																	$select=$this->koneksi->query("SELECT*FROM user WHERE username='$id'");
																																																																																																																																	$fetch=$select->fetch_assoc();
																																																																																																																																	return $fetch;
																																																																																																																																}

																																																																																																																																function select_siswa_user($id)
																																																																																																																																{
																																																																																																																																	$select=$this->koneksi->query("SELECT siswa.`nama_siswa` FROM siswa INNER JOIN `akademik_siswa` ON siswa.`id_siswa`=`akademik_siswa`.`id_siswa` WHERE `akademik_siswa`.`NISS`='$id';");
																																																																																																																																	$fetch=$select->fetch_assoc();
																																																																																																																																	return $fetch;
																																																																																																																																}
																																																																																																																																function select_guru_user($id)
																																																																																																																																{
																																																																																																																																	$select=$this->koneksi->query("SELECT guru.`nama` FROM guru INNER JOIN `akademik_guru` ON guru.`id_guru`=`akademik_guru`.`id_guru` WHERE `akademik_guru`.`NIP`='$id';");
																																																																																																																																	$fetch=$select->fetch_assoc();
																																																																																																																																	return $fetch;
																																																																																																																																}

																																																																																																																																function select_admin_user($id)
																																																																																																																																{
																																																																																																																																	$select=$this->koneksi->query("SELECT nama FROM admin WHERE `kode_admin`='$id';");
																																																																																																																																	$fetch=$select->fetch_assoc();
																																																																																																																																	return $fetch;
																																																																																																																																}

																																																																																																																																function select_kepala_user($id)
																																																																																																																																{
																																																																																																																																	$select=$this->koneksi->query("SELECT nama FROM kepala_sekolah WHERE `kode`='$id';");
																																																																																																																																	$fetch=$select->fetch_assoc();
																																																																																																																																	return $fetch;
																																																																																																																																}

																																																																																																																																function update_kepala($id,$nip,$nama,$jenkel,$tmpt_lhr,$tgl_lhr,$alamat,$email,$telepon,$foto)
																																																																																																																																{
	//error_reporting(0); 
																																																																																																																																	$nama_foto=$foto['name'];
																																																																																																																																	$lokasi_foto=$foto['tmp_name'];
																																																																																																																																	if(!empty($lokasi_foto)){
																																																																																																																																		$data_lama = $this->one_select_kepala($id);
																																																																																																																																		$foto_lama = $data_lama['gambar'];
																																																																																																																																		if(file_exists("foto/$foto_lama"))
																																																																																																																																		{
																																																																																																																																			unlink("foto/$foto_lama");
																																																																																																																																		}
																																																																																																																																		move_uploaded_file($lokasi_foto,"foto/$nama_foto");
																																																																																																																																		$this->koneksi->query("UPDATE kepala_sekolah SET nip='$nip', nama='$nama',jenkel='$jenkel',tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr',alamat='$alamat', email='$email',telepon='$telepon',gambar='$nama_foto' WHERE id='$id'") or die(mysqli_error($this->koneksi));
																																																																																																																																	}
																																																																																																																																	else
																																																																																																																																	{
																																																																																																																																		$this->koneksi->query("UPDATE kepala_sekolah SET nip='$nip', nama='$nama',jenkel='$jenkel',tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr',alamat='$alamat', email='$email',telepon='$telepon' WHERE id='$id'") or die(mysqli_error($this->koneksi));
																																																																																																																																	}
																																																																																																																																	echo "<script>setTimeout(function () { 
																																																																																																																																		swal({
																																																																																																																																			title: 'Tersimpan',
																																																																																																																																			type: 'success',
																																																																																																																																			showConfirmButton: false,
																																																																																																																																			timer: 1100,
																																																																																																																																			});  
																																																																																																																																			},10); 
																																																																																																																																			</script>";
																																																																																																																																			echo "<script>
																																																																																																																																			setTimeout(function () {
																																																																																																																																				window.location.href= 'index.php?halaman=kepala';
																																																																																																																																				},1100); 
																																																																																																																																				</script>";
																																																																																																																																			}

																																																																																																																																			function select_kepala()
																																																																																																																																			{
																																																																																																																																				$select=$this->koneksi->query("SELECT*FROM kepala_sekolah");
																																																																																																																																				while ($fetch = $select->fetch_assoc()) {
																																																																																																																																					$data[] = $fetch; }
																																																																																																																																					return $data;
																																																																																																																																				}

																																																																																																																																				function one_select_kepala($id)
																																																																																																																																				{
																																																																																																																																					$select=$this->koneksi->query("SELECT*FROM kepala_sekolah WHERE id='$id'");
																																																																																																																																					$fetch=$select->fetch_assoc();
																																																																																																																																					return $fetch;
																																																																																																																																				}

																																																																																																																																				function add_user($user,$pass,$hak){
																																																																																																																																					error_reporting(0);
																																																																																																																																					$cek=$this->koneksi->query("SELECT*FROM user WHERE username='$user'");
																																																																																																																																					if ($cek->num_rows>0) {
																																																																																																																																						echo "<script>setTimeout(function () { 
																																																																																																																																							swal({
																																																																																																																																								title: 'Data Sudah Ada',
																																																																																																																																								type: 'warning',
																																																																																																																																								showConfirmButton: false,
																																																																																																																																								timer: 900,
																																																																																																																																								});  
																																																																																																																																								},10);
																																																																																																																																								</script>";
																																																																																																																																							}
																																																																																																																																							else{
																																																																																																																																								$this->koneksi->query("INSERT INTO user(username,password,hak_akses) VALUES ('$user','$pass','$hak')") or die(mysqli_error($this->koneksi));

																																																																																																																																							}
																																																																																																																																						}
																																																																																																																																						function update_user($user,$pass,$hak)
																																																																																																																																						{
																																																																																																																																							$this->koneksi->query("UPDATE user SET password='$pass',hak_akses='$hak' WHERE username='$user'") or die(mysqli_error($this->koneksi));
																																																																																																																																						}

																																																																																																																																						function delete_user($id)																																																																																																																												{ $data_lama = $this->one_select_user($id);
																																																																																																																																							$this->koneksi->query("DELETE FROM user WHERE username='$id'") ;
																																																																																																																																						}

																																																																																																																																						function delete_user_akademik($id)
																																																																																																																																						{ $data_lama = $this->one_select_user($id);
																																																																																																																																							$this->koneksi->query("DELETE FROM user WHERE username='$id'") ;
																																																																																																																																						}


//------------------------------------- END OF MAPEL --------------------------------------------//

																																																																																																																																					}
//--------------------------------------- CREATE OBJECT ---------------------------------------------//
																																																																																																																																					$data= new data($con);
																																																																																																																																					$user = new user($con);
//----------------------------------------- END OBJECT ---------------------------------------------//
																																																																																																																																					?>