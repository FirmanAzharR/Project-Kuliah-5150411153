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
	<div class="row animated fadeIn">
		<div class="col-md-6">
			<div class="card border-success" style="border-radius: 0px;margin-top: 30px;margin-bottom: 30px;width: 500px">
				<div class="card-header bg-success" style="border-radius: 0px;font-size: 20px;color: white">
					<i class="fa fa-info"></i>&nbsp;&nbsp;&nbsp;Kritik & Saran atau Pertanyaan?
				</div>
				<div class="card-body">
					<p class="card-text" style="text-align: justify;">
						Bagi Anda, atau siapa saja yang ingin bertanya akan suatu hal, berkaitan erat dengan Sekolah SMA Dr. Wahidin, Akademik, atau memberi kritik dan saran tentang website kami atau sekolah kami serta menawarkan sebuah kerja sama, apapun yang Anda ajukan, kami akan melayaninya dengan sepenuh hati. <br><br>
						Terimakasih untuk tanggapan dan kerjasama anda.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card border-primary" style="border-radius: 0px;margin-top: 30px;margin-bottom: 30px;width: 500px">
				<div class="card-header bg-primary" style="border-radius: 0px;font-size: 20px;color: white">
					<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Pesan
				</div>
				<div class="card-body">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-user fa-lg"></i></span>
							</div>
							<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" aria-label="Username" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-reply"></i></span>
							</div>
							<input type="text" class="form-control" name="sub" placeholder="Masukkan Subject" aria-label="Subject" aria-describedby="basic-addon1" required="">
						</div>
						<div class="form-group">
							<textarea required="" rows="4" type="text" name="pesan" id="pesan" class="form-control" placeholder="Masukkan Pesan"></textarea>
						</div>
						<hr class="colorgraph">
						<div class="form-group">
							<button name="kirim" class="btn btn-success"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
							<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Bersihkan</button>
						</div>
						<?php if (isset($_POST['kirim'])){
							$data->feedback_user($_POST['nama'],$_POST['email'],$_POST['sub'],$_POST['pesan']);
						}?>
					</form>
				</div>
				<div class="card-footer">

				</div>
			</div>
		</div>
	</div>
</div>