<style>
#map {
	height: 400px; 
	width: 100%;  
}
.borderless td, .borderless th {
	border: none;
}
</style>

<script type="text/javascript">
	function clock() {// We create a new Date object and assign it to a variable called "time".
	var time = new Date(),

    // Access the "getHours" method on the Date object with the dot accessor.
    hours = time.getHours(),
    
    // Access the "getMinutes" method with the dot accessor.
    minutes = time.getMinutes(),
    
    
    seconds = time.getSeconds();

    document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

    function harold(standIn) {
    	if (standIn < 10) {
    		standIn = '0' + standIn
    	}
    	return standIn;
    }
}
setInterval(clock, 1000);
</script>
<style type="text/css">
.clock {
	font-size: 2em;
	text-align: center;
}

</style>

<style type="text/css">
.colorgraph {
	height: 5px;
	border-top: 0;
	background: #c4e17f;
	border-radius: 5px;
	background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<div class="container animated fadeIn">
	<div class="row rowmargin";>
		<div class="col-lg-12" style="padding-left: 0px;padding-right: 20px";>
			<!--VISI MISI SEJARAH-->
			<div class="card with-nav-tabs" style="border-radius: 0px">
				<div class="card-header card-heading bg-primary" style="padding-bottom: 0px">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-home"></i>&nbsp;Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-bookmark"></i>&nbsp;Visi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-shield"></i>&nbsp;Misi</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="text-align: justify;">
							<?php
							$profil=$data->data_profil();
							echo "<p>";
							echo $profil['profil'];
							echo "</p>";
							?>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<?php
							$visi=$data->data_visi();
							echo "<p>";
							echo $visi['visi'];
							echo "</p>";
							?>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<ol>
								<?php $misi=$data->data_misi(); ?>
								<?php foreach ($misi as $key => $value): ?>
									<li><?php echo $value['misi']; ?></li>
								<?php endforeach ?>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!--KONTEN 2-->
			<div class="card with-nav-tabs" style="border-radius: 0px;margin-top: 20px">
				<div class="card-header card-heading bg-primary" style="padding-bottom: 0px">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="kontak-tab" data-toggle="tab" href="#kontak" role="tab" aria-controls="kontak" aria-selected="true"><i class="fa fa-address-card"></i>&nbsp;Kontak</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false"><i class="fa fa-map"></i>&nbsp;Peta Lokasi</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="kontak" role="tabpanel" aria-labelledby="kontak-tab">
							<div class="row">
								<div class="col-lg-6">
									<div class="card" style="border-radius: 0px">
										<div class="card-header" style="background-color:  #03A9F4;font-weight: bold; font-size: 17px;color: white; border-radius: 0px">
											<div style="opacity: 0.7">Kontak Utama</div>
										</div>
										<div class="card-body">
											<table class="table-responsive borderless">
												<?php $kontak_utama=$data->kontak_utama(); ?>
												<tbody style="opacity: 0.7;">
													<tr>
														<td><label style="font-weight: bold;">Alamat  :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['alamat'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">RT / RW :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['rtrw'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Dusun :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['dusun'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Desa / Kelurahan :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['desa'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Kecamatan :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['kecamatan'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Kabupaten :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['kabupaten'] ; ?></label></td>
													</tr>	
													<tr>
														<td><label style="font-weight: bold;">Provinsi :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['provinsi'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Kode POS :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['kode_pos'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Lintang :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['lintang'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Bujur :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['bujur'] ; ?></label></td>
													</tr>				
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="card" style="border-radius: 0px">
										<div class="card-header" style="background-color: #58AD5C;font-weight: bold; font-size: 17px;color: white; border-radius: 0px">
											<div style="opacity: 0.7">Kontak Yang Bisa Dihubungi</div>
										</div>
										<div class="card-body">
											<table class="table-responsive borderless">
												<?php $kontak_utama=$data->kontak_hubung(); ?>
												<tbody style="opacity: 0.7;">
													<tr>
														<td><label style="font-weight: bold;">Telepon :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['telepon'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Fax :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['fax']; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Email :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['email'] ; ?></label></td>
													</tr>
													<tr>
														<td><label style="font-weight: bold;">Website :</label>&nbsp;&nbsp;&nbsp;<label><?php echo $kontak_utama['website'] ; ?></label></td>
													</tr>					
												</tbody>
											</table>
										</div>
									</div>
								</div>								
							</div>
						</div>
						<div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
							<!--adding map-->
							<div id="map"></div>
							<script>
								function initMap() {
									var uluru = {lat: -7.871386, lng: 110.139990};
									var map = new google.maps.Map(document.getElementById('map'), {
										zoom: 18,
										center: uluru
									});
									var marker = new google.maps.Marker({
										position: uluru,
										map: map
									});
								}
							</script>
							<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1_gITArwIVC44sFBgF-ILu9WJle5DhsQ&amp;callback&amp;callback=initMap">
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$("#myCalendar-1").ionCalendar();
</script>