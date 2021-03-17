<?php 
  session_start();
  require_once "./db_controller.php";
  $db = new DB;
  if(isset($_GET["logout"]))
  {
    session_destroy();
    header("location:login.php");
  }
  $sql = "SELECT * FROM vpengaduan";
  $totalPengaduan = $db->rowCount($sql);
  $jumlahData = $db->rowCount("SELECT id_pengaduan FROM vpengaduan");
  $banyak = 9;
  if(isset($_GET["page"]))
  {
    $page = $_GET["page"];
    $mulai = ($page * $banyak) - $banyak;
  }else{
    $mulai = 0;
  }
  $halaman = ceil($jumlahData / $banyak);
  $sqlPengaduan = "SELECT * FROM vpengaduan WHERE status = 'proses' OR status = 'selesai' LIMIT $mulai, $banyak";
  $rowPengaduan = $db->getAll($sqlPengaduan);
  $no = 1 + $mulai;
  // var_dump($totalPengaduan);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <title>Aplikasi Pelaporan Pengaduan Masyarakat | PPM</title>
    <script src="./assets/js/sweetalert.js"></script>
  </head>
  <body>
    
    <section class="bg-gradient-custom" id="home">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
            <a href="index.php" class="navbar-brand text-white">PPM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleButton">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="toggleButton">
              <ul class="navbar-nav ml-auto ">
                <li class="nav-item mr-3">
                  <a href="#home" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item mr-3">
                  <a href="#tentang" class="nav-link text-white">Tentang </a>
                </li>
                <li class="nav-item mr-3">
                  <a href="#suara" class="nav-link text-white">Suara </a>
                </li>
                <li class="nav-item mr-3">
                  <a href="#lapor" class="nav-link text-white">Lapor </a>
                </li>
                <li class="nav-item mr-3">
                  <a href="#kontak" class="nav-link text-white">Kontak </a>
                </li>
                <?php 
                  if(isset($_SESSION["username"]))
                  {
                    echo '
                      <li class="nav-item mr-3">
                        <a href="history.php" class="nav-link text-white">History </a>
                      </li>
                      <li class="nav-item mr-3">
                        <button type="button" onclick="handleLogoutUser()" class="btn btn-outline-info btn-sm nav-link text-white">Logout </button>
                      </li>
                    ';
                  }
                ?>
                <div id="marker"></div>
              </ul>
            </div>
        </nav>
        <div class="row">
          <div class="col-md-6 my-5">
              <div class="my-5"></div>
              <div class="my-5"></div>
              <h1 class="text-white display-4 font-weight-bold">Layanan Aspirasi dan Pengaduan Online Masyarakat</h1>
              <p class="text-white">Suarakan Aspirasi Kamu, Untuk Membangun Negeri</p>
              <a href="#lapor" role="button" class="btn btn-outline-info text-white my-3 font-weight-bold p-3 text-lg">Lapor</a>
          </div>
          <div class="col-md-6">
            <img src="./assets/img/7495.png" class="img-fluid" alt="Icon">
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mt-5"><path fill="#ffffff" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,138.7C672,96,768,64,864,85.3C960,107,1056,181,1152,197.3C1248,213,1344,171,1392,149.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    <section id="tentang" class="mb-5"> 
      <div class="container">
        <div class="col-md-12 text-center text-dark">
          <h1 class="font-weight-bold">Tentang Kami</h1>
          <p>PPM(Pelaporan Pengaduan Masyarakat) adalah aplikasi pelaporan pengaduan masyarakat secara online, yang ditujukan untuk pihak atau instansi maupun institusi terkait, pelayanan maupun pengalaman yang diterima oleh masyarakat</p>
        </div>
        <br>
        <div class="row my-5">
          <div class="col-md-3">
            <div class="bundar shadow-lg d-flex mx-auto justify-content-center align-items-center">
                <i class="fas fa-pencil-alt fa-2x"></i>
            </div>
            <div class="mt-3 text-center">
              <h5 class="text-dark">Tulis Laporan</h5>
              <p>Laporkan keluhan atau aspirasi kamu dengan jelas dan lengkap</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="bundar shadow-lg mx-auto d-flex justify-content-center align-items-center">
                <i class="fas fa-directions fa-2x"></i>
            </div>
            <div class="mt-3 text-center">
              <h5 class="text-dark">Proses Verifikasi</h5>
              <p>Selama proses verifikasi, Laporan kamu akan diproses selama kurang lebih 2x24jam</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="bundar shadow-lg mx-auto d-flex justify-content-center align-items-center">
                <i class="fas fa-comment fa-2x"></i>
            </div>
            <div class="mt-3 text-center">
              <h5 class="text-dark">Tanggapan</h5>
              <p>Setelah proses verifikasi berhasil, Admin akan menanggapi laporan kamu</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="bundar mx-auto shadow-lg d-flex justify-content-center align-items-center">
                <i class="fas fa-check fa-2x"></i>
            </div>
            <div class="mt-3 text-center">
              <h5 class="text-dark">Selesai</h5>
              <p>Laporan kamu akan ditindaklanjuti hingga terselesaikan</p>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <section id="suara" class="my-5">
      <div class="container">
        <div class="col-md-12 text-center">
          <h1 class="text-dark font-weight-bold">Suara Kamu</h1>
        </div>
        <div class="row">
          <?php if(!empty($rowPengaduan)){?>
          <?php foreach($rowPengaduan as $key):?>
          <div class="col-md-4 my-4 d-flex justify-content-center align-items-center">
            <div class="card shadow-lg">
              <div class="card-body">
              <h4 class="m-0 font-weight-bold text-dark"><?= $key["judul_laporan"]?></h4>
              <?php 
                if($key["status"] == "0")
                {
                  echo '<span class="badge badge-danger m-0">Belum di respond</span>'; 
                }else if($key["status"] == "proses")
                {
                  echo '<span class="badge badge-warning m-0">Di Proses</span>';
                }else{
                  echo '<span class="badge badge-success m-0">Selesai</span>';
                }
              ?>
              <p class="text-truncate"><?= $key["isi_laporan"]?></p>
              <small>Pada <?= $key["tgl_pengaduan"]?>. Oleh <span class="font-weight-bold mr-5"><?= $key['username']?></span></small>
              <br>
              <?php 
                if($key["status"] == '0' || $key["status"] == 'proses')
                {
                  echo '<button data-toggle="modal" data-target="#modalOne-'.$key['id_pengaduan'].'" class="btn btn-info btn-sm mt-3">Lihat Detail</button>';
                  
                }else{
                  echo '<button data-toggle="modal" data-target="#modalSecond-'.$key['id_pengaduan'].'" class="btn btn-info btn-sm mt-3">Lihat Detail</button>';
                }
              ?>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          <?php }?>
        </div>
        <div class="col-md-12 d-flex justify-content-center align-items-center my-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php 
                for($i = 1; $i <= $halaman; $i++)
                {
                  echo '<li class="page-item"><a class="page-link" href="?page='.$i.'&#suara">'.$i.'</a></li>';
                }
              ?>
              
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <section id="lapor" class="bg-gradient-custom">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,192L48,202.7C96,213,192,235,288,234.7C384,235,480,213,576,176C672,139,768,85,864,96C960,107,1056,181,1152,197.3C1248,213,1344,171,1392,149.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
      <div class="container">
        <div class="row justify-content-between">
          <?php 
            if(isset($_SESSION["username"]))
            {
              echo
              '
              <br>
              <div class="col-md-12 text-center my-4 text-white">
                <h1 class="font-weight-bold">Hi '.$_SESSION["username"].', Suarakan Aduan Mu!</h1>
              </div>
              <form method="post" enctype="multipart/form-data">
              <div class="card shadow-lg">
                <div class="card-body">
                  <div class="row text-dark">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tgl_pengaduan" class="font-weight-bold">Tanggal Pengaduan</label>
                        <input type="date" value="'.date('Y-m-d').'" class="form-control" id="tgl_pengaduan" autofocus name="tgl_pengaduan" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nik" class="font-weight-bold">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" value="'.$_SESSION["nik"].'" disabled>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Judul Laporan" class="font-weight-bold">Judul Laporan</label>
                        <input type="text" id="Judul Laporan" required name="judul_laporan" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="Isi Laporan" class="font-weight-bold">Isi Laporan</label>
                        <textarea name="isi_laporan" class="form-control" id="isi_laporan" cols="30" rows="10" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 mb-5">
                      <div class="form-group">
                        <label for="foto" class="font-weight-bold">Gambar</label>
                        <input type="file" name="foto" id="foto" required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>  
              </form>
              ';
            }
            else{
              echo '
              <div class="col-md-6 my-5">
                <h1 class="display-4 font-weight-bold text-white">Suarakan Aspirasi Kamu !</h1>
                <p class="text-white">Silahkan Masuk Atau Daftar Untuk Melanjutkan</p>
              </div>
              <div class="col-md-6 my-5 d-flex justify-content-end align-items-center">
                <a href="login.php" role="button" class="btn btn-outline-dark p-3 mx-3 text-lg">Masuk <i class="fas fa-sign-in-alt"></i></a>
                <a href="register.php" role="button" class="btn btn-outline-dark p-3 text-lg"  >Daftar <i class="fas fa-sign-out-alt"></i></a>
              </div>
              ';
            }
          ?>
          
        </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,224C384,203,480,117,576,112C672,107,768,181,864,197.3C960,213,1056,171,1152,181.3C1248,192,1344,256,1392,288L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> -->
    <br>
    <br>
    </section>
    <section class="bg-gradient-custom mt-5">
      <div class="col-md-12 text-center p-5">
        <h1 class=" font-weight-bold text-white">Jumlah Pengaduan Sekarang</h1>
        <h4 class="display-4 font-weight-bold text-white"><?= number_format($totalPengaduan, 0, ",",".")?></h4>
      </div>
    </section>
    <div class="bg-light" id="kontak">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mt-5 text-center">
              <p class="font-weight-bold">Kontak Kami</p>
              <ul class="list-unstyled">
                <li>+6281233133354</li>
                <li>admin@ilham.com</li>
              </ul>
          </div>
          <div class="col-md-6 mt-5 text-center">
              <p class="font-weight-bold">Lebih Dekat Dengan Kami</p>
              <a href="" class="text-primary mx-2"><i class="fab fa-facebook-f fa-2x"></i></a>
              <a href="" class="text-info mx-2"><i class="fab fa-twitter fa-2x"></i></a>
              <a href="" class="text-danger mx-2"><i class="fab fa-instagram fa-2x"></i></a>
              <a href="https://myportofolio-8973f.web.app/" target="_blank" class="text-dark mx-2"><i class="fas fa-globe fa-2x"></i></a>
          </div>
          <div class="col-md-12 mx-auto my-4">
            <ul class="d-flex flex-row  justify-content-center align-items-center list-unstyled">
              <li>
                <a href="#home" class="mx-2 text-dark">Home</a>
              </li>
              <li>
                <a href="#tentang" class="mx-2 text-dark">Tentang</a>
              </li>
              <li>
                <a href="#suara" class="mx-2 text-dark ">Suara</a>
              </li>
              <li>
                <a href="#lapor" class="mx-2 text-dark">Lapor</a>
              </li>
              <li>
                <a href="#kontak" class="mx-2 text-dark">Kontak</a>
              </li>
              <?php 
                  if(isset($_SESSION["username"]))
                  {
                    echo '
                      <li class="nav-item mr-3">
                        <a href="history.php" class="nav-link text-dark">History </a>
                      </li>
                    ';
                  }
                ?>
            </ul>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
          <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; PPM(Pelaporan Pengaduan Masyarakat)  <span id="tahunNow"></span></span>
          </div>
          </div>
      </footer>
    </div>
    
    <!-- Modal -->
    <?php $fetchDetail = $db->getAll("SELECT * FROM vpengaduan")?>
    <?php foreach($fetchDetail as $key):?>
    <div class="modal fade" id="modalOne-<?=$key['id_pengaduan']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Detail Pengaduan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="col-md-12">
                  <h4 class="text-dark font-weight-bold"><?= $key["judul_laporan"]?></h4>
                  <?php if($key['status'] == 'proses'){?>
                    <span class="badge badge-warning">Di Proses</span>
                  <?php }else{?>
                    <span class="badge badge-danger">Belum Di Proses</span>
                  <?php }?>
                  
                  <br>
                  <small class="mr-5">Pada <?= $key["tgl_pengaduan"]?>. Oleh <span class="font-weight-bold"><?= $key['username']?></span></small>
                  <img src="./assets/upload/<?= $key['foto']?>" alt="Gambar Pengaduan" class="img-fluid mb-2 rounded">
                  <p><?= $key['isi_laporan']?></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>

    <!-- Modal -->
    <?php $fetchTanggapan = $db->getAll("SELECT * FROM vtanggapan")?>
    <?php foreach($fetchTanggapan as $key):?>
    <div class="modal fade" id="modalSecond-<?=$key['id_pengaduan']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Detail Pengaduan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="col-md-12">
                <h4 class="text-dark font-weight-bold"><?= $key['judul_laporan']?></h4>
                <span class="badge badge-success">Selesai</span>
                  <br>
                  <small class="mr-5">Pada <?= $key["tgl_pengaduan"]?>. Oleh <span class="font-weight-bold"><?= $key['username']?></span></small>
                  <img src="./assets/upload/<?= $key['foto']?>" alt="Gambar Pengaduan" class="img-fluid rounded mb-2">
                  <p><?= $key['isi_laporan']?></p>
                  <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Tanggapan</h4>
                    <small class="mt-0">Pada <?= $key["tgl_tanggapan"]?>. Oleh <?= $key['nama_petugas']?><span class="font-weight-bold">(Admin)</span></small>
                    <hr>
                    <p class="mb-0"><?= $key['tanggapan']?></p>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script>
      function handleLogoutUser()
      {
          swal({
              icon : "warning",
              title : "Notifikasi !",
              text : "Yakin Ingin Keluar?",
              buttons : true,
              dangerMode : true
          })
          .then(res => {
              if(res)
              {
                  
                  swal({
                      icon : "success",
                      title : "Notifikasi !",
                      text : "Logout Berhasil",
                      button : "Oke"
                  })
                  .then(response => {
                      if(response)
                      {
                          document.location.href="?logout=true"
                      }
                  })
              }else {
                  swal({
                      icon : "error",
                      title : "Notifikasi !",
                      text : "Logout Gagal",
                      button : "Oke"
                  })
              }
          })
      }
    
    </script>
  </body>
</html>
<?php
  if(isset($_POST["submit"]))
  {
    $tglPengaduan = $_POST["tgl_pengaduan"];
    $nik = $_SESSION["nik"];
    $judul_laporan = $_POST["judul_laporan"];
    $isi_laporan = $_POST["isi_laporan"];
    $foto = $_FILES["foto"]["name"];
    $tempFoto = $_FILES["foto"]["tmp_name"];
    $sql = "INSERT INTO pengaduan VALUES('', '$tglPengaduan', '$nik', '$judul_laporan', '$isi_laporan', '$foto', '0')";
    move_uploaded_file($tempFoto, "./assets/upload/".$foto);
    $db->runSql($sql);
    echo "
      <script>    
          swal({
              icon : 'success',
              title : 'Notifikasi !',
              text : 'Pengaduan Berhasil, Aduan Anda Akan Diproses 2x24jam Oleh Admin',
              button : 'Oke'
          })
          .then(res => {
              if(res)
              {
                  document.location.href='index.php'
              }
          })
      </script>
  ";
  }
?>