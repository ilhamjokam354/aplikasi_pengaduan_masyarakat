<?php
    require_once "../db_controller.php";
    $db = new DB;
    if(isset($_GET['nik']))
    {
        $nik = $_GET["nik"];
        $sql = "SELECT * FROM masyarakat WHERE nik = $nik";
        $row = $db->getItem($sql);
    }
?>
<div class="card shadow">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Update Masyarakat</h4>
    </div>
    <div class="card-body">
    <form method="POST" >
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" value="<?= $row['nik']?>" name="nik" autofocus id="nik" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $row['nama']?>" id="nama" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $row['username']?>" id="username" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" class="form-control" name="telp" value="<?= $row['telp']?>"  id="telp" required>
            </div>
            
        </div>
    
        
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
            <a role="button" href="?f=masyarakat&p=index" class="btn btn-danger">Kembali</a>
        </div>
    </form>
    </div>
</div>  

<?php 
    if(isset($_POST["submit"])){
        $nikInput = htmlspecialchars($_POST["nik"]);
        $username = htmlspecialchars($_POST["username"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $telp = htmlspecialchars($_POST["telp"]);
        $sql = "UPDATE masyarakat SET nik = '$nikInput', nama = '$nama', username = '$username',telp = '$telp' WHERE nik = $nik";
        $db->runSql($sql);
        echo "
            <script>    
                swal({
                    icon : 'success',
                    title : 'Info !',
                    text : 'Ubah Data Berhasil',
                    button : 'Oke'
                })
                .then(res => {
                    if(res)
                    {
                        document.location.href='?f=masyarakat&p=index'
                    }

                })
            </script>
        ";
    }
?>