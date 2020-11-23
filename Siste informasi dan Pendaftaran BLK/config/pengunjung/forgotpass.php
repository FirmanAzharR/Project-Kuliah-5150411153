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

<div class="container">
	<center><div class="card" style="margin-top: 30px;margin-bottom: 30px;width: 500px;border-radius: 0px">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8"><h4 style="float: left">Lupa Password ?</h4></div>
				<div class="col-md-4" style="border-left: 1px solid #ddd"><i style="color: #E40000" class="fa fa-lock fa-2x"></i></div>
			</div>
			<hr class="colorgraph">
			<form method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" name="email" id="email" class="form-control" placeholder="Email yang terkait" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button name="kirim" id="kirim" class="btn btn-success btn-block"><i class="fa fa-send"></i>&nbsp;Kirim</button>
						</div>
					</div>
					<div class="col-md-6">
						<a class="btn btn-primary btn-block" href="index.php?halaman=login"><i class="fa fa-sign-out"></i>&nbsp;Login</a>
					</div>
				</div>
			</form>
			<?php 
			if(isset($_POST['kirim'])){

				$to=$_POST['email'];

				$akun=$data->forgotpass($to);

				$nama= 'Admin BLK Kulonprogo';
				$pesan= 'Password Akun Anda : '.$akun['password'];

				if ($akun['password']=="") {
					echo "<div class='alert alert-danger' role='alert'>
					Email tidak ditemukan !
					</div>";
				}
				else{

					require 'PHPmailer/class.phpmailer.php';
					$mail = new PHPMailer;

					// Konfigurasi SMTP
					$mail->isSMTP(true);
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'firmanazhar14@gmail.com';
					$mail->Password = 'Far040396';
					$mail->SMTPSecure = 'tls';
					$mail->Port = 587;

					$mail->setFrom('firmanazhar14@gmail.com','Admin');
					$mail->addReplyTo('firmanazhar14@gmail.com','Admin');

					// Menambahkan penerima
					$mail->addAddress($to);

					// Menambahkan beberapa penerima
					//$mail->addAddress('penerima2@contoh.com');
					//$mail->addAddress('penerima3@contoh.com');

					// Menambahkan cc atau bcc 
					//$mail->addCC('cc@contoh.com');
					//$mail->addBCC('bcc@contoh.com');

					// Subjek email
					$mail->Subject = 'BLK Kulonprogo : Password Akun';

					// Mengatur format email ke HTML
					$mail->isHTML(true);

					// Konten/isi email
					$mailContent= "
					Dari : $nama <br/>
					Pesan: $pesan <br/><br/>
					";
					$mail->Body = $mailContent;

					// Menambahakn lampiran
					//$mail->addAttachment('lmp/file1.pdf');
					//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru
					
					// Kirim email
					if(!$mail->send()){
						echo "<div class='alert alert-danger' role='alert'>
						Gagal Mengirim , '".$mail->ErrorInfo."'
						</div>";
					}else{
						echo "<div class='alert alert-success' role='alert'>
						Berhasil, Silahkan check email anda.
						</div>";
					}
				}
			}

			?>
		</form>

	</div>
</div></center>
<div style="margin-bottom: 70px"></div>
</div>