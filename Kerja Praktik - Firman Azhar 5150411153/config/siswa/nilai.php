<style type="text/css">
	tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        border-style: initial;
        text-align: center; 
    }
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var id = $(this).closest('tr').find('td.').html();
			$('.id_nilai', myModal).val(id);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Nilai</h6>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center;">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kelas</th>
					<th scope="col">Semester</th>
					<th scope="col">Mata Pelajaran</th>
					<th scope="col">Tugas 1</th>
					<th scope="col">Tugas 2</th>
					<th scope="col">Ulangan</th>
					<th scope="col">U.Semester</th>
				</tr>
			</thead>
			<tbody>
				<?php $nilai=$user->select_nilai_siswa($_SESSION['id']); ?>
				<?php foreach ($nilai as $key => $value): ?>
					<tr>
						<td width="5%" align="center"><?php echo $key+1; ?></td>
						<td align="center"><?php echo $value['nama_kelas']; ?></td>
						<td align="center"><?php echo $value['semester']; ?></td>
						<td align="center"><?php echo $value['nama_mapel']; ?></td>
						<td align="center"><?php echo $value['tugas1']; ?></td>
						<td align="center"><?php echo $value['tugas2']; ?></td>
						<td align="center"><?php echo $value['ulangan']; ?></td>
						<td align="center"><?php echo $value['ujian']; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			 <tfoot>
            <tr>
                <th>Filter</th>
                <th>( Kelas )</th>
                <th>( Semester )</th>
                <th>( Mata Pelajaran )</th>
                <th>( Tugas 1 )</th>
                <th>( Tugas 2 )</th>
                <th>( Ulangan )</th>
                <th>( U.Semester )</th>
            </tr>
        </tfoot>
		</table>
	</form>
</div>

<script type="text/javascript">
    function Redirect() {
    window.location="index.php?halaman=nilai";
    }
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