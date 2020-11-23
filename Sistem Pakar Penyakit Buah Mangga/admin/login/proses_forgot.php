<?php 
include '../config/koneksi.php';

$to=$_POST['email'];

//cek email
$query=mysqli_query($koneksi,"SELECT*FROM akun WHERE email='$to';");
$cek=mysqli_num_rows($query);
$akun=mysqli_fetch_assoc($query);

$nama = 'Prediksi Kelulusan TI UTY';
$pesan= 'Password Akun Anda : '.$akun['password'];

if ($cek==0) {
	echo "<div class='alert alert-danger' role='alert'>
	<i class='fa fa-close'></i>&nbsp;&nbsp;Email tidak ditemukan !
	</div>";
}
else{
	require 'phpmailer/class.phpmailer.php';
	$mail = new PHPMailer;

	// Konfigurasi SMTP
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
	$mail->isSMTP(true);
	$mail->SMTPAuth = true;
	$mail->Host = 'localhost';
	//$mail->Port = 587;
	$mail->Username = 'info@prediksikelulusan.informatikauty.online';
	$mail->Password = 'JagungBakar123';
	//$mail->SMTPSecure = 'tls';


	$mail->setFrom('info@prediksikelulusan.informatikauty.online','Admin');
	$mail->addReplyTo('info@prediksikelulusan.informatikauty.online','Admin');

	// Menambahkan penerima
	$mail->addAddress($to);

	// Menambahkan beberapa penerima
	//$mail->addAddress('penerima2@contoh.com');
	//$mail->addAddress('penerima3@contoh.com');
	// Menambahkan cc atau bcc 
	//$mail->addCC('cc@contoh.com');
	//$mail->addBCC('bcc@contoh.com');
	// Subjek email
	$mail->Subject = 'UTY : Password Akun';
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
		<i class='fa fa-close'></i>&nbsp;&nbsp;Gagal Mengirim , '".$mail->ErrorInfo."'
		</div>";
	}else{
		echo "<div class='alert alert-success' role='alert'>
		<i class='fa fa-check'></i>&nbsp;&nbsp;Berhasil, Silahkan check email anda.
		</div>";
	}
}
?>