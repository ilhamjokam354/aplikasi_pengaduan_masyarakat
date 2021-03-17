<?php 
    session_start();
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
    <title>Login | Aplikasi Pelaporan Pengaduan Masyarakat</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body class="bg-gradient-custom">
  <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

          <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" title="Beranda" onclick="beranda()"></div>
              <div class="col-lg-6">
                  <div class="p-5">
                  <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                  </div>
                  <form class="user" method="post">
                      <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" required aria-describedby="emailHelp" autofocus placeholder="Silahkan Masukan Username">
                      </div>
                      <div class="form-group">
                      <input type="password" name="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Silahkan Masukan Password">
                      </div>
                      <div class="form-group">
                      <input type="password" name="password2" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Silahkan Konfirmasi Password">
                      </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                      
                  </form>
                  <hr>
                  <div class="text-center">
                      <a class="small" href="./register.php">Belum Punya Akun? Klik Disini!</a>
                  </div>
                  </div>
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
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars(hash("sha256",$_POST['password']));
        $password2 = htmlspecialchars(hash("sha256",$_POST['password2']));
        $sql = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
        $count = $db->rowCount($sql);
        $sqlTwo = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
        $countTwo = $db->rowCount($sqlTwo);
        if($password == $password2)
        {
            if($countTwo == 1)
            {
                $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
                $row = $db->getItem($sql);
                // var_dump($row);
                $_SESSION["id_petugas"] = $row["id_petugas"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["level"] = $row["level"];
                if($row['level'] == 'petugas')
                {
                    echo "
                    <script>    
                        swal({
                            icon : 'success',
                            title : 'Info !',
                            text : 'Login Berhasil',
                            button : 'Oke'
                        })
                        .then(res => {
                            if(res)
                            {
                                document.location.href='./admin/index.php?f=pengaduan&p=index'
                            }

                        })
                    </script>
                ";
                }else{
                    echo "
                        <script>    
                            swal({
                                icon : 'success',
                                title : 'Info !',
                                text : 'Login Berhasil',
                                button : 'Oke'
                            })
                            .then(res => {
                                if(res)
                                {
                                    document.location.href='./admin/index.php?f=dashboard_admin&p=index'
                                }
        
                            })
                        </script>
                    ";

                }
            }else if($count == 1)
            {
                $sql = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
                $row = $db->getItem($sql);
                // var_dump($row);
                $_SESSION["username"] = $row["username"];
                $_SESSION["nik"] = $row["nik"];
                echo "
                    <script>    
                        swal({
                            icon : 'success',
                            title : 'Info !',
                            text : 'Login Berhasil',
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
            }else {
                echo "
                    <script>    
                        swal({
                            icon : 'error',
                            title : 'Info !',
                            text : 'Login Gagal',
                            button : 'Oke'
                        })
                    </script>
                ";    
            }
        }
        else{
            echo "
                    <script>    
                        swal({
                            icon : 'error',
                            title : 'Info !',
                            text : 'Mohon Masukan Dengan Benar',
                            button : 'Oke'
                        })
                    </script>
                ";
        } 
    }
?>  