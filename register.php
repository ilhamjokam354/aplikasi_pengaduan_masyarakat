<?php
    require_once "./db_controller.php";
    $db = new DB;  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <title>Registrasi | Aplikasi Pelaporan Pengaduan Masyarakat</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body class="bg-gradient-custom">
  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image" title="Beranda" onclick="beranda()"></div>
            <div class="col-lg-7">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                </div>
                <form class="user" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" autofocus name="nik" required placeholder="Silahkan Masukan NIK">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="nama" required placeholder="Silahkan Masukan Nama">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" name="username" required placeholder="Silahkan Masukan Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="telp" required placeholder="Silahkan Masukan Nomor Telepon">
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" required placeholder="Silahkan Masukan Password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password2" required placeholder="Silahkan Konfirmasi Password">
                    </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Buat Akun
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="login.php">Sudah Punya Akun? Klik Disini!</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        </div>

    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function beranda()
        {
            document.location.href="./index.php"
        }
    </script>
  </body>
</html>
<?php 
    if(isset($_POST["submit"]))
    {
        $nik = htmlspecialchars($_POST["nik"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $username = htmlspecialchars($_POST["username"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $password = htmlspecialchars(hash("sha256",$_POST["password"]));
        $password2 = htmlspecialchars(hash("sha256",$_POST["password2"]));
        $cek = "SELECT * FROM masyarakat WHERE nik = '$nik'" ;
        $cekNik = $db->rowCount($cek);
        if($password === $password2)
        {
            if($cekNik == 1)
            {
                echo "
                <script>    
                    swal({
                        icon : 'error',
                        title : 'Info !',
                        text : 'Register Gagal, Silahkan Masukan NIK Dengan Unik',
                        button : 'Oke'
                    })
                </script>
            ";
            }else{
                $sql = "INSERT INTO masyarakat VALUES($nik, '$nama', '$username', '$password', '$telp')";
                $db->runSql($sql);
                // var_dump($db);
                echo "
                    <script>    
                        swal({
                            icon : 'success',
                            title : 'Info !',
                            text : 'Register Berhasil, Silahkan Login',
                            button : 'Oke'
                        })
                        .then(res => {
                            if(res)
                            {
                                document.location.href='login.php'
                            }
    
                        })
                    </script>
                ";

            }
        }else
        {
            echo "
                <script>    
                    swal({
                        icon : 'error',
                        title : 'Info !',
                        text : 'Register Gagal',
                        button : 'Oke'
                    })
                </script>
            ";
        }
    }
?>