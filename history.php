<?php 
  session_start();
  require_once "./db_controller.php";
  $db = new DB;
  if(isset($_GET["logout"]))
  {
    session_destroy();
    header("location:login.php");
  }
  $nik = $_SESSION['nik'];
  $sqlPengaduan = "SELECT * FROM vpengaduan WHERE nik = '$nik' ORDER BY status DESC";
  $rowPengaduan = $db->getAll($sqlPengaduan);
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
                  <a href="index.php" class="nav-link text-white">Home</a>
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
          </div>
          <div class="col-md-6">
            <img src="./assets/img/7495.png" class="img-fluid" alt="Icon">
          </div>
        </div>
      </div>
    </section>
    <section id="suara" class="my-5">
      <div class="container">
        <div class="col-md-12 text-center">
          <h4 class="text-dark font-weight-bold">History Kamu</h4>
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
          </div>
          <div class="col-md-12 mx-auto my-4">
            <ul class="d-flex flex-row  justify-content-center align-items-center list-unstyled">
              <li>
                <a href="index.php" class="mx-2 text-dark">Home</a>
              </li>
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
              <br>
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
              <br>
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