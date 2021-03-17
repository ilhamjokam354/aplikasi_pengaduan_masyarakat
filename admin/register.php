<?php
    require_once "../db_controller.php";
    $db = new DB;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Register Admin</title>
  </head>
  <body class="bg-light">
    <div class="container">
        
        <div class="col-md-12 text-center my-5">
            <h3>Register Admin</h3>
        </div>  
        <form method="POST">
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="nama_petugas">Nama</label>
                    <input type="text" class="form-control" name="nama_petugas" autofocus id="nama_petugas" required>
                </div>
                
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"  id="username" required>
                </div>
                
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" name="telp"  id="telp" required>
                </div>
                
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" required>
                </div>
            </div>
            <div class="col-md-6 mx-auto text-right">
                <a href="./login.php">Sudah Punya Akun? Klik Disini</a>
            </div>
            <div class="col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php 
    if(isset($_POST["submit"]))
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
        // $nama_petugas = htmlspecialchars($_POST["nama_petugas"]);
        // $username = htmlspecialchars($_POST["username"]);
        // $telp = htmlspecialchars($_POST["telp"]);
        // $password = htmlspecialchars(hash("sha256",$_POST["password"]));
        // $password2 = htmlspecialchars(hash("sha256",$_POST["password2"]));
        // if($password === $password2)
        // {
        //     $sql = "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password', '$telp', 'admin')";
        //     $db->runSql($sql);
        //     echo "
        //         <script>    
        //             swal({
        //                 icon : 'success',
        //                 title : 'Info !',
        //                 text : 'Register Berhasil, Silahkan Login',
        //                 button : 'Oke'
        //             })
        //             .then(res => {
        //                 if(res)
        //                 {
        //                     document.location.href='login.php'
        //                 }

        //             })
        //         </script>
        //     ";
        // }else
        // {
        //     echo "
        //         <script>    
        //             swal({
        //                 icon : 'error',
        //                 title : 'Info !',
        //                 text : 'Register Gagal',
        //                 button : 'Oke'
        //             })
        //         </script>
        //     ";
        // }
    }
?>