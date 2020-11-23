<?php include '../config/koneksi.php'; ?>
<div class="resume-section-content">
  <h2 class="mb-5">Info Penyakit</h2>
  <table class="table table-bordered table-striped">
    <thead class="thead-light">
      <tr align="center">
        <th scope="col" style="width: 20px">No</th>
        <th scope="col" style="width: 200px">Nama Penyakit</th>
      </tr>
    </thead>
    <tbody>
      <?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM penyakit"); ?>
      <?php foreach ($petunjuk as $key => $value): ?>
        <tr id="dt_penyakit" data-role="detail_penyakit" data-id="<?php echo $value['id_penyakit'] ?>" >
          <td align="center"><?php echo $key+=1; ?></td>
          <td>
            <a class="js-scroll-trigger" href="#detail_penyakit_x" style="color: black"><?php echo $value['nama_penyakit'] ?></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','tr[data-role=detail_penyakit]',function(){
      var id = $(this).data('id');

      $.post('page/detail_penyakit.php', { id: id },  function(data, status) {
        $('#detail_penyakit_x').html(data);
      });

    });

  })
</script>

