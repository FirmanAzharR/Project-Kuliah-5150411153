<?php 

class apiongkir
{
	function update_provinsi(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL=>"http://api.rajaongkir.com/starter/province?id=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key:71692b2f5c22513703ad26d3d45b6bb3"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if($err){
			echo "cURL Error #:".$err;
		} else {
			$dataprovinsi = json_decode($response,TRUE);
			$dataprovinsi = $dataprovinsi['rajaongkir']['results'];

			return $dataprovinsi;
		}
	}

	function update_kota($id_provinsi){

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL=>"http://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key:71692b2f5c22513703ad26d3d45b6bb3"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if($err){
			echo "cURL Error #:".$err;
		} else {
			$datakota = json_decode($response,TRUE);
			$datakota = $datakota['rajaongkir']['results'];

			return $datakota;
		}
	}	
}

$apiongkir = new apiongkir();
?>