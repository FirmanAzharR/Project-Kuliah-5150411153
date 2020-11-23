<div style="margin-left: 15px;margin-right: 15px">
	<?php $soal=$data->select_soal($_GET['id']); ?>
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Detail Soal</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label>Kejuruan</label>
					<select class="form-control" id="kejuruan" name="kejuruan" class="form-group" required disabled>
						<option value="">Kejuruan</option>
						<?php $kejuruan=$data->tampil_kejuruan()?>
						<?php foreach ($kejuruan as $key => $value): ?>
							<?php echo "<option value='".$value['id']."'"?> 
							<?php 
							if ($value['id']==$soal['id_kejuruan']) {
								echo "selected";
							}?> <?php echo ">"; ?><?php echo $value['nama']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<label style="font-weight: bold">Soal:</label>
				<p style="text-align: justify; color: black"><?php echo $soal['soal'] ?></p>
				<hr>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="a" <?php if ($soal['jawab']=="a") {
							echo "checked";
						} ?>>&nbsp;a</label></span>
					</div>
					<input autocomplete="off" type="text" name="a" class="form-control" placeholder="Opsi Jawaban A" aria-label="a" aria-describedby="basic-addon1" readonly="" value="<?php echo $soal['a'] ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="b" <?php if ($soal['jawab']=="b") {
							echo "checked";
						} ?>>&nbsp;b</label></span>
					</div>
					<input autocomplete="off" type="text" name="b" class="form-control" placeholder="Opsi Jawaban B" aria-label="a" aria-describedby="basic-addon1" readonly="" value="<?php echo $soal['b'] ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="c" <?php if ($soal['jawab']=="c") {
							echo "checked";
						} ?>>&nbsp;c</label></span>
					</div>
					<input autocomplete="off" type="text" name="c" class="form-control" placeholder="Opsi Jawaban C" aria-label="a" aria-describedby="basic-addon1" readonly="" value="<?php echo $soal['c'] ?>">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="d" <?php if ($soal['jawab']=="d") {
							echo "checked";
						} ?>>&nbsp;d</label></span>
					</div>
					<input autocomplete="off" type="text" name="d" class="form-control" placeholder="Opsi Jawaban B" aria-label="a" aria-describedby="basic-addon1" readonly="" value="<?php echo $soal['d'] ?>">
				</div>
				<hr>
			</div>
		</div>
	</div>	
	<!--end of warper-->
</div>
