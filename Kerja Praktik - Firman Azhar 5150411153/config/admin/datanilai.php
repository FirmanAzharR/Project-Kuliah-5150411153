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
		<div class="col-md-6">
			<button onclick="Redirect()" class="btn btn-info btn-sm" style="float: right"><i class="fa fa-book"></i>&nbsp;&nbsp;Input Nilai</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center;">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Siswa</th>
					<th scope="col">Kelas</th>
					<th scope="col">Jurusan</th>
					<th scope="col">Option</th>
				</tr>
			</thead>
			<tbody>
				<?php $nilai=$data->select_nilai(); ?>
				<?php foreach ($nilai as $key => $value): ?>
					<tr>
						<td width="5%" align="center"><?php echo $key+1; ?></td>
						<td class="nm" align="center"><?php echo $value['nama_siswa'];?></td>
						<td align="center"><?php echo $value['nama_kelas']; ?></td>
						<td align="center"><?php echo $value['nama_jurusan']; ?></td>
						<td align="center"><a href="index.php?halaman=detailnilai&idn=<?php echo $value['id_siswa'] ?>" class="btn btn-info btn-sm" style="color: white;margin-right: 5px"><i class="fa fa-tasks"></i>&nbsp;Transkrip Nilai</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			 <tfoot>
            <tr>
                <th>Filter</th>
                <th>( Nama )</th>
                <th>( Kelas )</th>
                <th>( Jurusan )</th>
                <th>Option</th>
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