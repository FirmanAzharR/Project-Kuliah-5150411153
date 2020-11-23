<style type="text/css">
	tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        border-style: initial;
        text-align: center; 
    }
</style>

<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Input Nilai</h6>
		</div>
		<div class="col-md-6">
			<button onclick="Redirect()" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-eye"></i>&nbsp;&nbsp;Data Nilai</button>
		</div>
	</div>
	<hr>
	<form method="post">
		<div class="row">
			<div class="col-md-3">
				<div id="konten">
					<label>Pilih Jenis Nilai</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input type="hidden" id="jenis" name="get_jenis" class="form-control" value="">
						<select required class="form-control" id="j_nilai" name="jenis_nilai" class="form-group" onchange="getjenis(event)">
							<option value="" disabled selected>Jenis Nilai</option>
							<?php $mapel=$data->select_jenis()?>
							<?php foreach ($mapel as $key => $value): ?>
								<?php echo "<option value='".$value['id_jenis']."'>";?><?php echo $value['jenis_nilai']; ?>
							<?php endforeach ?>
						</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div id="konten2">
				<label>Pilih Mata Pelajaran</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
					</div>
					<input type="hidden" id="mapel" name="get_mapel" class="form-control" value="">
					<select required class="form-control"  name="mapel" class="form-group" onchange="getmapel(event)">
						<option value="" disabled selected>Mata Pelajaran</option>
						<?php $mapel=$user->select_mapel_perguru($_SESSION['id']);?>
						<?php foreach ($mapel as $key => $value): ?>
							<?php echo "<option value='".$value['kode_mapel']."'>";?><?php echo $value['nama_mapel']; ?> 
						<?php endforeach ?>
					</option>
				</select>
			</div>
		</div>
	</div>
</div>
<hr>
<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
	<thead class="thead-light" style="text-align: center;">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">Kelas</th>
			<th scope="col">Jurusan</th>
			<th scope="col">Semester</th>
			<th scope="col">Nilai</th>
		</tr>
	</thead>
	<tbody>
		<?php $nilai=$user->select_siswa_permapel($_SESSION['id']); ?>
		<?php foreach ($nilai as $key => $value): ?>
			<tr>
				<td width="5%" align="center"><?php echo $key+1; ?></td>
				<td align="center"><?php echo $value['nama_siswa']; ?></td>
				<td align="center"><?php echo $value['nama_kelas']; ?><input type="hidden" name="id_kelas[]" value="<?php echo $value['id_kelas']; ?>"></td>
				<td align="center"><?php echo $value['nama_jurusan']; ?></td>
				<td align="center"><?php echo $value['semester']; ?><input type="hidden" name="semester[]" value="<?php echo $value['semester']; ?>"><input type="hidden" name="tahun[]" value="<?php echo $value['tahun_ajaran']; ?>"></td>
				<td align="center" width="10%" ><input style="text-align: center;" class="form-control" type="number" min="0" max="100" name="nilai[]" required=""><input style="text-align: center;" class="form-control" type="hidden" name="id_siswa[]" value="<?php echo $value['id_siswa'] ?>"></td>
			</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
           <tr>
                <th>Filter</th>
                <th>( Nama )</th>
                <th>( Kelas )</th>
                <th>( Jurusan )</th>
                <th>( Semester )</th>
                <th> </th>
            </tr>
        </tfoot>
</table>
<div style="margin-top:20px;" align="center">
	<button  data-toggle="confirmation"
        data-btn-ok-label="Simpan" data-btn-ok-class="btn-success"
        data-btn-cancel-label="Batal!" data-btn-cancel-class="btn-danger"
        data-title="Apakah Data Sudah Benar ?" data-content="Harap periksa kembali sebelum menyimpan."  data-singleton="true"  type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
	<?php $data->multiple_input($_POST['get_jenis']); ?>
</div>
</form>

</div>



<script type="text/javascript">
	function getid(e) {
		document.getElementById("myText").value = e.target.value
	}
	function getmapel(e) {
		document.getElementById("mapel").value = e.target.value
	}
	function getjenis(e) {
		document.getElementById("jenis").value = e.target.value
	}
</script>

<script type="text/javascript">
	function Redirect() {
		window.location="index.php?halaman=datanilai";
	}
</script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

<script type="text/javascript">
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',});
	</script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

	$(document).ready(function() {
    $('#myTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    var table = $('#myTable').DataTable();
 
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
