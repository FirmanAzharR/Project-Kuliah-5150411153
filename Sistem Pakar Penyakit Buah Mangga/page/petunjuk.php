<?php include '../config/koneksi.php'; ?>
<div class="resume-section-content">
    <h2 class="mb-5">Petunjuk</h2>
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr align="center">
          <th scope="col" style="width: 200px">Nama Menu</th>
          <th scope="col">Kegunaan</th>
      </tr>
  </thead>
  <tbody>
    <?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM petunjuk"); ?>
    <?php foreach ($petunjuk as $key => $value): ?>
        <tr>
          <td><?php echo $value['nama_petunjuk'] ?></td>
          <td><?php echo $value['keterangan'] ?></td>
      </tr>
  <?php endforeach ?>
</tbody>
</table>
</div>

