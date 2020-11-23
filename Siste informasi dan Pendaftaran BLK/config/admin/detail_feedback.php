<div style="margin-left: 15px;margin-right: 15px">
	<?php $data=$data->select_feedback($_GET['id']); ?>
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Detail Feedback</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<div class="card">
			<div class="card-header">
				<tr>
					<td><label>Dari: &nbsp;<?php echo $data['nama']; ?></label></td>
				</tr>
			</div>
			<div class="card-body">
				<label>Subject :  &nbsp;<?php echo $data['sub']; ?></label><br>
				<label>Pesan : </label><br>
				<p style="text-align: justify;"><?php echo $data['pesan'] ?></p>
			</div>
		</div>
	</div>	
	<!--end of warper-->
</div>
