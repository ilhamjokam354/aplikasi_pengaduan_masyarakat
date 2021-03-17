<?php
    require_once "../db_controller.php";
    $db = new DB;
    if(isset($_GET['id']))
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM petugas WHERE id_petugas = $id";
        $row = $db->getItem($sql);
    }
?>
<div class="card shadow">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Update Petugas</h4>
    </div>
    <div class="card-body">
    <form method="POST" >
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" class="form-control" value="<?= $row['nama_petugas']?>" name="nama_petugas" autofocus id="nama_petugas" required>
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
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" value="<?= $row['password']?>" name="password" id="password" required>
            </div>
        </div> -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" value="<?= $row['level']?>" class="form-control" required>
                    <?php
                        if($row["level"] == "petugas")
                        {
                            echo '
                                <option value="petugas" selected>Petugas</option>
                                <option value="admin">Admin</option>
                            ';
                        }else{
                            echo '
                                <option value="admin" selected>Admin</option>
                                <option value="petugas">Petugas</option>
                            ';
                        }
                    ?>
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
        $sql = "UPDATE petugas SET nama_petugas = '$nama_petugas', username = '$username', telp = '$telp', level = '$level' WHERE id_petugas = $id";
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
                        document.location.href='?f=petugas&p=index'
                    }

                })
            </script>
        ";
    }
?>