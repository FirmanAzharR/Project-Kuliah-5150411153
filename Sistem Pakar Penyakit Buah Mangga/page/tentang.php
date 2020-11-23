<?php include '../config/koneksi.php'; ?>
<div class="resume-section-content">
    <h2 class="mb-5">Tentang</h2>
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr align="center">
          <th scope="col" style="width: 500px">Nama Aplikasi</th>
          <th scope="col">Admin</th>
          <th scope="col">Pakar</th>
      </tr>
  </thead>
  <tbody>
    <?php $petunjuk = mysqli_query($koneksi,"SELECT*FROM profil"); ?>
    <?php foreach ($petunjuk as $key => $value): ?>
        <tr align="center">
          <td><?php echo $value['aplikasi'] ?></td>
          <td><?php echo $value['admin'] ?></td>
          <td><?php echo $value['pakar'] ?></td>
      </tr>
  <?php endforeach ?>
</tbody>
</table>
</div>

