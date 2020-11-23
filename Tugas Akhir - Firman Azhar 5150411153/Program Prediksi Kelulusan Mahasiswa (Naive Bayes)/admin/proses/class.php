<?php
$con = new mysqli('localhost','root','','prediksi_kelulusan');

class metode{

	public $koneksi;

	function __construct($con){
		$this->koneksi = $con;
	}

	function cek_data_latih(){
		$query =  $this->koneksi->query("SELECT COUNT(ipk1) AS cek_data FROM data_latih");
		$cek = $query->fetch_assoc();
		return $cek;
	}

	function cek_data_uji(){
		$query =  $this->koneksi->query("SELECT COUNT(ipk1) AS cek_data FROM data_uji");
		$cek = $query->fetch_assoc();
		return $cek;
	}

	function cek_data_prediksi(){
		$query =  $this->koneksi->query("SELECT COUNT(ipk1) AS cek_data FROM data_prediksi");
		$cek = $query->fetch_assoc();
		return $cek;
	}

	function jumlah_data(){
		$dt_latih = $this->cek_data_latih();
		$dt_uji = $this->cek_data_uji();
		$jml = $dt_latih['cek_data'] + $dt_uji['cek_data'];
		return $jml;
	}

	function select_data(){
		
		$query = $this->koneksi->query("SELECT*FROM data_latih");
		while ($fetch=$query->fetch_assoc()) {
			$x[] = $fetch;
		}
		return $x;
	}

	function select_data_uji(){
		
		$query = $this->koneksi->query("SELECT*FROM data_uji");
		while ($fetch=$query->fetch_assoc()) {
			$x[] = $fetch;
		}
		return $x;
	}

	function total_data(){

		$query_total = $this->koneksi->query("SELECT*FROM data_latih");
		$jumlah_total = $query_total->num_rows;
		
		return $jumlah_total;
	}

	function total_tepat(){

		$query_tepat = $this->koneksi->query("SELECT*FROM data_latih WHERE keterangan='TEPAT'");
		$jumlah_tepat = $query_tepat->num_rows;
		
		return $jumlah_tepat;
	}

	function total_terlambat(){

		$query_terlambat = $this->koneksi->query("SELECT*FROM data_latih WHERE keterangan='TERLAMBAT'");
		$jumlah_terlambat = $query_terlambat->num_rows;
		
		return $jumlah_terlambat;
	}

	function prob_prior_tepat(){

		$total = $this->total_data();
		$jml_tepat = $this->total_tepat();
		$hasil = $jml_tepat/$total;
		return $hasil;	

	}

	function prob_prior_terlambat(){

		$total = $this->total_data(); 
		$jml_terlambat = $this->total_terlambat(); 
		$hasil = $jml_terlambat/$total;
		return $hasil;
	}

	//PROB JENIS KELAMIN
	function total_l_tepat(){

		$query = $this->koneksi->query("SELECT*FROM data_latih WHERE jenkel='L' AND keterangan='TEPAT'");
		$l_tepat = $query->num_rows;
		
		return $l_tepat;
	}

	function total_l_terlambat(){

		$query = $this->koneksi->query("SELECT*FROM data_latih WHERE jenkel='L' AND keterangan='TERLAMBAT'");
		$l_terlambat = $query->num_rows;
		
		return $l_terlambat;
	}

	function total_p_tepat(){

		$query = $this->koneksi->query("SELECT*FROM data_latih WHERE jenkel='P' AND keterangan='TEPAT'");
		$p_tepat = $query->num_rows;
		
		return $p_tepat;
	}

	function total_p_terlambat(){

		$query = $this->koneksi->query("SELECT*FROM data_latih WHERE jenkel='P' AND keterangan='TERLAMBAT'");
		$p_terlambat = $query->num_rows;
		
		return $p_terlambat;
	}

	function prob_l_tepat(){

		$total_tepat = $this->total_tepat();
		$l_tepat = $this->total_l_tepat();
		$prob_l_tepat = $l_tepat/$total_tepat;

		return $prob_l_tepat;
	}

	function prob_l_terlambat(){

		$total_terlambat = $this->total_terlambat();
		$l_terlambat = $this->total_l_terlambat();
		$prob_l_terlambat = $l_terlambat/$total_terlambat;
		
		return $prob_l_terlambat;
	}

	function prob_p_tepat(){

		$total_tepat = $this->total_tepat();
		$p_tepat = $this->total_p_tepat();
		$prob_p_tepat = $p_tepat/$total_tepat;

		return $prob_p_tepat;
	}

	function prob_p_terlambat(){

		$total_terlambat = $this->total_terlambat();
		$p_terlambat = $this->total_p_terlambat();
		$prob_p_terlambat = $p_terlambat/$total_terlambat;
		
		return $prob_p_terlambat;
	}

	function mean_sks_tepat(){

		$query=$this->koneksi->query("SELECT SUM(sks1) AS jum_sks1,SUM(sks2) AS jum_sks2,SUM(sks3) AS jum_sks3,SUM(sks4) AS jum_sks4,COUNT(keterangan) AS jml_tepat, SUM(sks1)/COUNT(keterangan) AS mean_sks1_tepat,SUM(sks2)/COUNT(keterangan) AS mean_sks2_tepat,SUM(sks3)/COUNT(keterangan) AS mean_sks3_tepat,SUM(sks4)/COUNT(keterangan) AS mean_sks4_tepat FROM data_latih WHERE keterangan = 'TEPAT'");
		$data = $query->fetch_assoc();
		return $data;
	}

	function mean_sks_terlambat(){

		$query=$this->koneksi->query("SELECT SUM(sks1) AS jum_sks1,SUM(sks2) AS jum_sks2,SUM(sks3) AS jum_sks3,SUM(sks4) AS jum_sks4,COUNT(keterangan) AS jml_tepat, SUM(sks1)/COUNT(keterangan) AS mean_sks1_terlambat,SUM(sks2)/COUNT(keterangan) AS mean_sks2_terlambat,SUM(sks3)/COUNT(keterangan) AS mean_sks3_terlambat,SUM(sks4)/COUNT(keterangan) AS mean_sks4_terlambat FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$data = $query->fetch_assoc();
		return $data;
	}

	function ex_hitung_sdev_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks1 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$mean = $this->mean_sks_tepat();
		$mean_tepat = $mean['mean_sks1_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks1'])-$mean_tepat)*(($data[$i]['sks1'])-$mean_tepat);
			$jml = $jml+$sks[$i];

		}
		return $jml;
	}

	function ex_hitung_sdev_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks1 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$mean = $this->mean_sks_terlambat();
		$mean_terlambat = $mean['mean_sks1_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks1'])-$mean_terlambat)*(($data[$i]['sks1'])-$mean_terlambat);
			$jml = $jml+$sks[$i];

		}
		return $jml;
	}

	function std_dev_sks1_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks1 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$total_tepat = $this->total_tepat();

		$mean = $this->mean_sks_tepat();
		$mean_tepat = $mean['mean_sks1_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks1'])-$mean_tepat)*(($data[$i]['sks1'])-$mean_tepat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks2_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks2 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;
		
		$total_tepat = $this->total_tepat();

		$mean = $this->mean_sks_tepat();
		$mean_tepat = $mean['mean_sks2_tepat'];

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks2'])-$mean_tepat)*(($data[$i]['sks2'])-$mean_tepat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks3_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks3 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;
		
		$total_tepat = $this->total_tepat();

		$mean = $this->mean_sks_tepat();
		$mean_tepat = $mean['mean_sks3_tepat'];

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks3'])-$mean_tepat)*(($data[$i]['sks3'])-$mean_tepat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}


	function std_dev_sks4_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks4 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;
		
		$total_tepat = $this->total_tepat();

		$mean = $this->mean_sks_tepat();
		$mean_tepat = $mean['mean_sks4_tepat'];

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks4'])-$mean_tepat)*(($data[$i]['sks4'])-$mean_tepat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks1_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks1 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_sks_terlambat();
		$mean_terlambat = $mean['mean_sks1_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks1'])-$mean_terlambat)*(($data[$i]['sks1'])-$mean_terlambat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks2_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks2 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_sks_terlambat();
		$mean_terlambat = $mean['mean_sks2_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks2'])-$mean_terlambat)*(($data[$i]['sks2'])-$mean_terlambat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks3_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks3 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_sks_terlambat();
		$mean_terlambat = $mean['mean_sks3_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks3'])-$mean_terlambat)*(($data[$i]['sks3'])-$mean_terlambat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_sks4_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT sks4 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_sks_terlambat();
		$mean_terlambat = $mean['mean_sks4_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['sks4'])-$mean_terlambat)*(($data[$i]['sks4'])-$mean_terlambat);
			$jml = $jml+$sks[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function mean_ipk_tepat(){

		$query=$this->koneksi->query("SELECT SUM(ipk1) AS jum_ipk1,SUM(ipk2) AS jum_ipk2,SUM(ipk3) AS jum_ipk3,SUM(ipk4) AS jum_ipk4,COUNT(keterangan) AS jml_tepat, SUM(ipk1)/COUNT(keterangan) AS mean_ipk1_tepat,SUM(ipk2)/COUNT(keterangan) AS mean_ipk2_tepat,SUM(ipk3)/COUNT(keterangan) AS mean_ipk3_tepat,SUM(ipk4)/COUNT(keterangan) AS mean_ipk4_tepat FROM data_latih WHERE keterangan = 'TEPAT'");
		$data = $query->fetch_assoc();
		return $data;
	}

	function mean_ipk_terlambat(){

		$query=$this->koneksi->query("SELECT SUM(ipk1) AS jum_ipk1,SUM(ipk2) AS jum_ipk2,SUM(ipk3) AS jum_ipk3,SUM(ipk4) AS jum_ipk4,COUNT(keterangan) AS jml_tepat, SUM(ipk1)/COUNT(keterangan) AS mean_ipk1_terlambat,SUM(ipk2)/COUNT(keterangan) AS mean_ipk2_terlambat,SUM(ipk3)/COUNT(keterangan) AS mean_ipk3_terlambat,SUM(ipk4)/COUNT(keterangan) AS mean_ipk4_terlambat FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$data = $query->fetch_assoc();
		return $data;
	}

	function std_dev_ipk1_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk1 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$total_tepat = $this->total_tepat();

		$mean = $this->mean_ipk_tepat();
		$mean_tepat = $mean['mean_ipk1_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk1'])-$mean_tepat)*(($data[$i]['ipk1'])-$mean_tepat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk2_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk2 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$total_tepat = $this->total_tepat();

		$mean = $this->mean_ipk_tepat();
		$mean_tepat = $mean['mean_ipk2_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk2'])-$mean_tepat)*(($data[$i]['ipk2'])-$mean_tepat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk3_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk3 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$total_tepat = $this->total_tepat();

		$mean = $this->mean_ipk_tepat();
		$mean_tepat = $mean['mean_ipk3_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk3'])-$mean_tepat)*(($data[$i]['ipk3'])-$mean_tepat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk4_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk4 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$total_tepat = $this->total_tepat();

		$mean = $this->mean_ipk_tepat();
		$mean_tepat = $mean['mean_ipk4_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk4'])-$mean_tepat)*(($data[$i]['ipk4'])-$mean_tepat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_tepat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk1_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk1 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_ipk_terlambat();
		$mean_terlambat = $mean['mean_ipk1_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk1'])-$mean_terlambat)*(($data[$i]['ipk1'])-$mean_terlambat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk2_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk2 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_ipk_terlambat();
		$mean_terlambat = $mean['mean_ipk2_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk2'])-$mean_terlambat)*(($data[$i]['ipk2'])-$mean_terlambat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk3_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk3 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_ipk_terlambat();
		$mean_terlambat = $mean['mean_ipk3_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk3'])-$mean_terlambat)*(($data[$i]['ipk3'])-$mean_terlambat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function std_dev_ipk4_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk4 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$total_terlambat = $this->total_terlambat();

		$mean = $this->mean_ipk_terlambat();
		$mean_terlambat = $mean['mean_ipk4_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$ipk[$i] = (($data[$i]['ipk4'])-$mean_terlambat)*(($data[$i]['ipk4'])-$mean_terlambat);
			$jml = $jml+$ipk[$i];
			$hasil = $jml/($total_terlambat-$kons);
			$std = sqrt($hasil);

		}
		return $std;
	}

	function ex_hitung_sdev_ipk_tepat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk1 FROM data_latih WHERE keterangan = 'TEPAT'");
		$count = $query->num_rows;

		$mean = $this->mean_ipk_tepat();
		$mean_tepat = $mean['mean_ipk1_tepat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['ipk1'])-$mean_tepat)*(($data[$i]['ipk1'])-$mean_tepat);
			$jml = $jml+$sks[$i];

		}
		return $jml;
	}

	function ex_hitung_sdev_ipk_terlambat(){

		$jml = 0;
		$kons = 1;

		$query=$this->koneksi->query("SELECT ipk1 FROM data_latih WHERE keterangan = 'TERLAMBAT'");
		$count = $query->num_rows;

		$mean = $this->mean_ipk_terlambat();
		$mean_terlambat = $mean['mean_ipk1_terlambat'];		

		for ($i=0; $i < $count ; $i++) { 
			$sks[$i] = 0;
			$fetch=$query->fetch_assoc();

			$data[]=$fetch;
			$sks[$i] = (($data[$i]['ipk1'])-$mean_terlambat)*(($data[$i]['ipk1'])-$mean_terlambat);
			$jml = $jml+$sks[$i];

		}
		return $jml;
	}

	function hitung_data_uji(){

		$phi = 3.14;
		$e = 2.7183;

		$std_sks1 = $this->std_dev_sks1_tepat();
		$std_sks2 = $this->std_dev_sks2_tepat();
		$std_sks3 = $this->std_dev_sks3_tepat();
		$std_sks4 = $this->std_dev_sks4_tepat();
		$std_ipk1 = $this->std_dev_ipk1_tepat();
		$std_ipk2 = $this->std_dev_ipk2_tepat();
		$std_ipk3 = $this->std_dev_ipk3_tepat();
		$std_ipk4 = $this->std_dev_ipk4_tepat();

		$std_sks1_t = $this->std_dev_sks1_terlambat();
		$std_sks2_t = $this->std_dev_sks2_terlambat();
		$std_sks3_t = $this->std_dev_sks3_terlambat();
		$std_sks4_t = $this->std_dev_sks4_terlambat();
		$std_ipk1_t = $this->std_dev_ipk1_terlambat();
		$std_ipk2_t = $this->std_dev_ipk2_terlambat();
		$std_ipk3_t = $this->std_dev_ipk3_terlambat();
		$std_ipk4_t = $this->std_dev_ipk4_terlambat();

		$mean_sks_tepat = $this->mean_sks_tepat();
		$mean_ipk_tepat = $this->mean_ipk_tepat();
		$mean_sks_terlambat = $this->mean_sks_terlambat();
		$mean_ipk_terlambat = $this->mean_ipk_terlambat();

		$mt_sks1 = $mean_sks_tepat['mean_sks1_tepat'];
		$mt_sks2 = $mean_sks_tepat['mean_sks2_tepat'];
		$mt_sks3 = $mean_sks_tepat['mean_sks3_tepat'];
		$mt_sks4 = $mean_sks_tepat['mean_sks4_tepat'];
		$mt_ipk1 = $mean_ipk_tepat['mean_ipk1_tepat'];
		$mt_ipk2 = $mean_ipk_tepat['mean_ipk2_tepat'];
		$mt_ipk3 = $mean_ipk_tepat['mean_ipk3_tepat'];
		$mt_ipk4 = $mean_ipk_tepat['mean_ipk4_tepat'];

		$mt_sks1_t = $mean_sks_terlambat['mean_sks1_terlambat'];
		$mt_sks2_t = $mean_sks_terlambat['mean_sks2_terlambat'];
		$mt_sks3_t = $mean_sks_terlambat['mean_sks3_terlambat'];
		$mt_sks4_t = $mean_sks_terlambat['mean_sks4_terlambat'];
		$mt_ipk1_t = $mean_ipk_terlambat['mean_ipk1_terlambat'];
		$mt_ipk2_t = $mean_ipk_terlambat['mean_ipk2_terlambat'];
		$mt_ipk3_t = $mean_ipk_terlambat['mean_ipk3_terlambat'];
		$mt_ipk4_t = $mean_ipk_terlambat['mean_ipk4_terlambat'];


		$query = $this->koneksi->query("SELECT nim,jenkel,sks1,sks2,sks3,sks4,ipk1,ipk2,ipk3,ipk4,keterangan, 
			(((1)/sqrt(2*'".$phi."'*'".$std_sks1."'))*pow('".$e."',-pow(sks1-'".$mt_sks1."',2)/(2*pow('".$std_sks1."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks2."'))*pow('".$e."',-pow(sks2-'".$mt_sks2."',2)/(2*pow('".$std_sks2."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks3."'))*pow('".$e."',-pow(sks3-'".$mt_sks3."',2)/(2*pow('".$std_sks3."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks4."'))*pow('".$e."',-pow(sks4-'".$mt_sks3."',2)/(2*pow('".$std_sks4."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk1."'))*pow('".$e."',-pow(ipk1-'".$mt_ipk1."',2)/(2*pow('".$std_ipk1."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk2."'))*pow('".$e."',-pow(ipk2-'".$mt_ipk2."',2)/(2*pow('".$std_ipk2."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk3."'))*pow('".$e."',-pow(ipk3-'".$mt_ipk3."',2)/(2*pow('".$std_ipk3."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk4."'))*pow('".$e."',-pow(ipk4-'".$mt_ipk4."',2)/(2*pow('".$std_ipk4."',2)))) as prob_tepat, 
			(((1)/sqrt(2*'".$phi."'*'".$std_sks1_t."'))*pow('".$e."',-pow(sks1-'".$mt_sks1_t."',2)/(2*pow('".$std_sks1_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks2_t."'))*pow('".$e."',-pow(sks2-'".$mt_sks2_t."',2)/(2*pow('".$std_sks2_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks3_t."'))*pow('".$e."',-pow(sks3-'".$mt_sks3_t."',2)/(2*pow('".$std_sks3_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks4_t."'))*pow('".$e."',-pow(sks4-'".$mt_sks3_t."',2)/(2*pow('".$std_sks4_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk1_t."'))*pow('".$e."',-pow(ipk1-'".$mt_ipk1_t."',2)/(2*pow('".$std_ipk1_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk2_t."'))*pow('".$e."',-pow(ipk2-'".$mt_ipk2_t."',2)/(2*pow('".$std_ipk2_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk3_t."'))*pow('".$e."',-pow(ipk3-'".$mt_ipk3_t."',2)/(2*pow('".$std_ipk3_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk4_t."'))*pow('".$e."',-pow(ipk4-'".$mt_ipk4_t."',2)/(2*pow('".$std_ipk4_t."',2)))) as prob_terlambat

			FROM data_uji");
		while ($fetch=$query->fetch_assoc()) {
			$data[] = $fetch;
		}
		return $data;	
	}

	function hitung_data_prediksi(){

		$phi = 3.14;
		$e = 2.7183;

		$std_sks1 = $this->std_dev_sks1_tepat();
		$std_sks2 = $this->std_dev_sks2_tepat();
		$std_sks3 = $this->std_dev_sks3_tepat();
		$std_sks4 = $this->std_dev_sks4_tepat();
		$std_ipk1 = $this->std_dev_ipk1_tepat();
		$std_ipk2 = $this->std_dev_ipk2_tepat();
		$std_ipk3 = $this->std_dev_ipk3_tepat();
		$std_ipk4 = $this->std_dev_ipk4_tepat();

		$std_sks1_t = $this->std_dev_sks1_terlambat();
		$std_sks2_t = $this->std_dev_sks2_terlambat();
		$std_sks3_t = $this->std_dev_sks3_terlambat();
		$std_sks4_t = $this->std_dev_sks4_terlambat();
		$std_ipk1_t = $this->std_dev_ipk1_terlambat();
		$std_ipk2_t = $this->std_dev_ipk2_terlambat();
		$std_ipk3_t = $this->std_dev_ipk3_terlambat();
		$std_ipk4_t = $this->std_dev_ipk4_terlambat();

		$mean_sks_tepat = $this->mean_sks_tepat();
		$mean_ipk_tepat = $this->mean_ipk_tepat();
		$mean_sks_terlambat = $this->mean_sks_terlambat();
		$mean_ipk_terlambat = $this->mean_ipk_terlambat();

		$mt_sks1 = $mean_sks_tepat['mean_sks1_tepat'];
		$mt_sks2 = $mean_sks_tepat['mean_sks2_tepat'];
		$mt_sks3 = $mean_sks_tepat['mean_sks3_tepat'];
		$mt_sks4 = $mean_sks_tepat['mean_sks4_tepat'];
		$mt_ipk1 = $mean_ipk_tepat['mean_ipk1_tepat'];
		$mt_ipk2 = $mean_ipk_tepat['mean_ipk2_tepat'];
		$mt_ipk3 = $mean_ipk_tepat['mean_ipk3_tepat'];
		$mt_ipk4 = $mean_ipk_tepat['mean_ipk4_tepat'];

		$mt_sks1_t = $mean_sks_terlambat['mean_sks1_terlambat'];
		$mt_sks2_t = $mean_sks_terlambat['mean_sks2_terlambat'];
		$mt_sks3_t = $mean_sks_terlambat['mean_sks3_terlambat'];
		$mt_sks4_t = $mean_sks_terlambat['mean_sks4_terlambat'];
		$mt_ipk1_t = $mean_ipk_terlambat['mean_ipk1_terlambat'];
		$mt_ipk2_t = $mean_ipk_terlambat['mean_ipk2_terlambat'];
		$mt_ipk3_t = $mean_ipk_terlambat['mean_ipk3_terlambat'];
		$mt_ipk4_t = $mean_ipk_terlambat['mean_ipk4_terlambat'];


		$query = $this->koneksi->query("SELECT nim,jenkel,sks1,sks2,sks3,sks4,ipk1,ipk2,ipk3,ipk4, 
			(((1)/sqrt(2*'".$phi."'*'".$std_sks1."'))*pow('".$e."',-pow(sks1-'".$mt_sks1."',2)/(2*pow('".$std_sks1."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks2."'))*pow('".$e."',-pow(sks2-'".$mt_sks2."',2)/(2*pow('".$std_sks2."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks3."'))*pow('".$e."',-pow(sks3-'".$mt_sks3."',2)/(2*pow('".$std_sks3."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks4."'))*pow('".$e."',-pow(sks4-'".$mt_sks3."',2)/(2*pow('".$std_sks4."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk1."'))*pow('".$e."',-pow(ipk1-'".$mt_ipk1."',2)/(2*pow('".$std_ipk1."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk2."'))*pow('".$e."',-pow(ipk2-'".$mt_ipk2."',2)/(2*pow('".$std_ipk2."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk3."'))*pow('".$e."',-pow(ipk3-'".$mt_ipk3."',2)/(2*pow('".$std_ipk3."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk4."'))*pow('".$e."',-pow(ipk4-'".$mt_ipk4."',2)/(2*pow('".$std_ipk4."',2)))) as prob_tepat, 
			(((1)/sqrt(2*'".$phi."'*'".$std_sks1_t."'))*pow('".$e."',-pow(sks1-'".$mt_sks1_t."',2)/(2*pow('".$std_sks1_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks2_t."'))*pow('".$e."',-pow(sks2-'".$mt_sks2_t."',2)/(2*pow('".$std_sks2_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks3_t."'))*pow('".$e."',-pow(sks3-'".$mt_sks3_t."',2)/(2*pow('".$std_sks3_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_sks4_t."'))*pow('".$e."',-pow(sks4-'".$mt_sks3_t."',2)/(2*pow('".$std_sks4_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk1_t."'))*pow('".$e."',-pow(ipk1-'".$mt_ipk1_t."',2)/(2*pow('".$std_ipk1_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk2_t."'))*pow('".$e."',-pow(ipk2-'".$mt_ipk2_t."',2)/(2*pow('".$std_ipk2_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk3_t."'))*pow('".$e."',-pow(ipk3-'".$mt_ipk3_t."',2)/(2*pow('".$std_ipk3_t."',2)))) *
			(((1)/sqrt(2*'".$phi."'*'".$std_ipk4_t."'))*pow('".$e."',-pow(ipk4-'".$mt_ipk4_t."',2)/(2*pow('".$std_ipk4_t."',2)))) as prob_terlambat

			FROM data_prediksi");
		while ($fetch=$query->fetch_assoc()) {
			$data[] = $fetch;
		}
		return $data;	
	}
//end of class
}

$data = new metode($con);

?>