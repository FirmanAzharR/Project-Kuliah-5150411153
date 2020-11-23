<?php include '../config/koneksi.php'; ?>


<div class="resume-section-content">
	<h2 class="mb-5">Diagnosa</h2>
	<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-light">
			<tr align="center">
				<th scope="col" >No</th>
				<th scope="col" colspan="2">Pilih Gejala</th>
				<th scope="col" style="width: 130px">Opsi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM gejala"); ?>
			<?php foreach ($petunjuk as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td>
						<div>
							<input 
								type="checkbox" 
								name="gejala[]"
								id="<?php echo $value['id_gejala'] ?>"
								value="<?php echo $value['id_gejala'] ?>"
								onchange="handlerChangeGejala('<?php echo $value['id_gejala'] ?>')"
								class="gejala"
							>
						</div>
					</td>
					<td><?php echo $value['nama_gejala'] ?></td>
					<td>
						<select disabled="true" class="form-control cfuser" id="cfuser-<?php echo $value['id_gejala'] ?>"  name="cfuser[]">
							<option value="">- Pilih -</option>
							<option value="1"> Pasti </option>
							<option value="0.9"> Hampir Pasti </option>
							<option value="0.8"> Kemungkinan Besar </option>
							<option value="0.7"> Mungkin </option>
							<option value="0.6"> Tidak Yakin </option>
							<option value="0.5"> Mungkin Tidak </option>
							<option value="0.4">Kemungkinan Besar Tidak </option>
							<option value="0.3">Hampir Pasti Tidak </option>
							<option value="0.2">Pasti Tidak </option>
						</select>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<hr>
	<button id="proses" type="button" onclick="handlerProsesDiagnosa()" name="diagnosa" class="btn btn-success">Proses</button>
	<button id="reset" class="btn btn-warning">Reset</button>

	<div id="hasil-diagnosa" style="margin-top: 10px;">

	</div>
</div>

<script type="text/javascript">

	const handlerChangeGejala = (idGejala) => {
		const cfuser = document.getElementById(`cfuser-${idGejala}`);
		const gejala = document.getElementById(idGejala);

		if(gejala.checked) {
			cfuser.disabled = false;
		}else {
			cfuser.value = "";
			cfuser.disabled = true;
		}
	}

	const handlerProsesDiagnosa = () => {
		let dataDiagnosa = [];
		const gejala = document.getElementsByClassName('gejala');
		const cfuser = document.getElementsByClassName('cfuser');

		for(let i = 0; i < gejala.length; i++) {
			if(gejala[i].checked) {
				if(cfuser[i].value === "") {
					alert("Semua gejala yang dipilih harus memiliki opsi");
					return;
				}
				dataDiagnosa.push({
					gejala: gejala[i].value,
					cfuser: cfuser[i].value
				})
			}
		}

		if(!dataDiagnosa.length) {
			alert("Tidak ada gejala yang dipilih");
		}

		$.post('page/proses_diagnosa.php', { 
			data_diagnosa: dataDiagnosa 
		}, ((data, status) => {
			$('#hasil-diagnosa').html(data);

		}));

	}


</script>