<?php 

function terbilang($bilangan) {

  $angka = array('0','0','0','0','0','0','0','0','0','0',
    '0','0','0','0','0','0');
  $kata = array('','satu','dua','tiga','empat','lima',
    'enam','tujuh','delapan','sembilan');
  $tingkat = array('','ribu','juta','milyar','triliun');

  $panjang_bilangan = strlen($bilangan);

  /* pengujian panjang bilangan */
  if ($panjang_bilangan > 15) {
    $kalimat = "Diluar Batas";
    return $kalimat;
  }
  /* mengambil angka-angka yang ada dalam bilangan,
  dimasukkan ke dalam array */
  for ($i = 1; $i <= $panjang_bilangan; $i++) {
    $angka[$i] = substr($bilangan,-($i),1);
  }
  $i = 1;
  $j = 0;
  $kalimat = "";

  /* mulai proses iterasi terhadap array angka */
  while ($i <= $panjang_bilangan) {

    $subkalimat = "";
    $kata1 = "";
    $kata2 = "";
    $kata3 = "";

    /* untuk ratusan */
    if ($angka[$i+2] != "0") {
      if ($angka[$i+2] == "1") {
        $kata1 = "seratus";
      } else {
        $kata1 = $kata[$angka[$i+2]] . " ratus";
      }
    }

    /* untuk puluhan atau belasan */
    if ($angka[$i+1] != "0") {
      if ($angka[$i+1] == "1") {
        if ($angka[$i] == "0") {
          $kata2 = "sepuluh";
        } elseif ($angka[$i] == "1") {
          $kata2 = "sebelas";
        } else {
          $kata2 = $kata[$angka[$i]] . " belas";
        }
      } else {
        $kata2 = $kata[$angka[$i+1]] . " puluh";
      }
    }

    /* untuk satuan */
    if ($angka[$i] != "0") {
      if ($angka[$i+1] != "1") {
        $kata3 = $kata[$angka[$i]];
      }
    }

    /* pengujian angka apakah tidak nol semua,
    lalu ditambahkan tingkat */
    if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
      ($angka[$i+2] != "0")) {
      $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
  }

    /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
    ke variabel kalimat */
    $kalimat = $subkalimat . $kalimat;
    $i = $i + 3;
    $j = $j + 1;
  }

  /* mengganti satu ribu jadi seribu jika diperlukan */
  if (($angka[5] == "0") AND ($angka[6] == "0")) {
   $kalimat = str_replace("satu ribu","seribu",$kalimat);
 }
 return trim($kalimat);
}

error_reporting(0);
//panggil bp umum
if ($_GET['halaman']=='bp_umum') {
  include 'antrian_umum.php';
  $no=$x;
  if(isset($_POST['nilai'])){
    $no=$_POST['nilai'];
  }

  $display=$no;

  $kalimatTerbilang=terbilang($display);

  if(isset($_POST['sebelum'])){
    $nomor = $no-1;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();
 
    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpumum'");
      //jika ingin menambahkan tombol sebelumnya
      //$qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Belum Selesai' WHERE no_antrian = '$no' AND tujuan='bpumum' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }
  }

  if(isset($_POST['selanjut'])){
    $nomor = $no+1;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND no_antrian='$nomor' AND status='Belum Selesai' ");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpumum'");
      $qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Selesai' WHERE no_antrian = '$nomor' AND tujuan='bpumum' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }

  }

  if(isset($_POST['tunda'])){
    $nomor = $no;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpumum'");
      $qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Tunda' WHERE no_antrian = '$nomor' AND tujuan='bpumum' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
    }

  }

  if(isset($_POST['ulang'])){
    $nomor = $no;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }
  }

  // if(isset($_POST['panggil_tunda'])){
  //   $nomor = $no;
  //   $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND no_antrian='$nomor' AND status='tunda'");
  //   $hasil = $cek->fetch_assoc();

  //   if ($hasil['cek']!=0) {
  //     $display=$nomor;
  //     $kalimatTerbilang=terbilang($display);
  //   }
  //   else{
  //     $kalimatTerbilang=terbilang($display);
  //   }
  // }

}

//panggil bp gigi
if ($_GET['halaman']=='bp_gigi') {
  include 'antrian_gigi.php';
  $no1=$x1;
  if(isset($_POST['nilai'])){
    $no1=$_POST['nilai'];
  }

  $display=$no1;

  $kalimatTerbilang=terbilang($display);

  if(isset($_POST['sebelum'])){
    $nomor = $no-1;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpgigi'");
      //jika ingin menambahkan tombol sebelumnya
      //$qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Belum Selesai' WHERE no_antrian = '$no' AND tujuan='bpgigi' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }
  }
  if(isset($_POST['selanjut'])){
    $nomor = $no+1;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND no_antrian='$nomor' AND status='Belum Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpgigi'");
      $qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Selesai' WHERE no_antrian = '$nomor' AND tujuan='bpgigi' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }

  }

  if(isset($_POST['ulang'])){
    $nomor = $no;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {

      $display=$nomor;
      $kalimatTerbilang=terbilang($display);
    }
    else{
      $kalimatTerbilang=terbilang($display);
    }
  }

  //   if(isset($_POST['panggil_tunda'])){
  //   $nomor = $no;
  //   $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND no_antrian='$nomor' AND status='tunda'");
  //   $hasil = $cek->fetch_assoc();

  //   if ($hasil['cek']!=0) {
  //     $display=$nomor;
  //     $kalimatTerbilang=terbilang($display);
  //   }
  //   else{
  //     $kalimatTerbilang=terbilang($display);
  //   }
  // }

    if(isset($_POST['tunda'])){
    $nomor = $no;
    $cek = mysqli_query($koneksi,"SELECT no_antrian as cek FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND no_antrian='$nomor' AND status='Selesai'");
    $hasil = $cek->fetch_assoc();

    if ($hasil['cek']!=0) {
      //$qry = mysqli_query($koneksi,"UPDATE status_antrian SET no_antrian = '$nomor' WHERE loket_antrian='bpgigi'");
      $qry2 = mysqli_query($koneksi,"UPDATE pasien_berobat SET status ='Tunda' WHERE no_antrian = '$nomor' AND tujuan='bpgigi' AND tanggal_berobat=CURDATE()");

      $display=$nomor;
    }

  }

}


?>
