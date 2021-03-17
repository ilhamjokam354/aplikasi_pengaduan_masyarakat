<?php
    require_once "../db_controller.php";
    $db = new DB;
?>
<div class="card shadow">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Petugas</h4>
    </div>
    <div class="card-body">
    <form method="POST" >
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" class="form-control" name="nama_petugas" autofocus id="nama_petugas" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username"  id="username" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" class="form-control" name="telp"  id="telp" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="">Pilih Level</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
            <a role="button" href="?f=petugas&p=index" class="btn btn-danger">Kembali</a>
        </div>
    </form>
    </div>
</div>  

<?php 
    if(isset($_POST["submit"])){
        $username = htmlspecialchars($_POST["username"]);
        $nama_petugas = htmlspecialchars($_POST["nama_petugas"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $level = htmlspecialchars($_POST["level"]);
        $password = htmlspecialchars(hash("sha256", $_POST["password"]));
        $sql = "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password', '$telp', '$level')";
        $db->runSql($sql);
        echo "
            <script>    
                swal({
                    icon : 'success',
                    title : 'Info !',
                    text : 'Tambah Data Berhasil',
                    button : 'Oke'
                })
                .then(res => {
                    if(res)
                    {
                        document.location.href='?f=petugas&p=index'
                    }

                })
            </script>
        ";
    }
?>