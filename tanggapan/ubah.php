<?php
    require_once "../db_controller.php";
    $db = new DB;
    if(isset($_GET['id']))
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM vtanggapan WHERE id_tanggapan = $id";
        $row = $db->getItem($sql);
    }
?>
<div class="card shadow">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Update Tanggapan</h4>
    </div>
    <div class="card-body">
    <form method="POST" >
        <div class="col-md-6">
            <div class="form-group">
                <label for="tgl_tanggapan">Tanggal Tanggapan</label>
                <input type="date" class="form-control" name="tgl_tanggapan" value="<?= $row['tgl_tanggapan']?>" id="tgl_tanggapan" required>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggapan">Tanggapan</label>
                <textarea name="tanggapan"  id="tanggapan" class="form-control" cols="30" rows="10" required><?= $row['tanggapan']?></textarea>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_petugas">ID Petugas</label>
                <input type="text" class="form-control" name="id_petugas" disabled value="<?= $row['id_petugas']?>"  id="id_petugas" required>
            </div>
            
        </div>
    
        
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
            <a role="button" href="?f=tanggapan&p=index" class="btn btn-danger">Kembali</a>
        </div>
    </form>
    </div>
</div>  

<?php 
    if(isset($_POST["submit"])){
        
        $tgl_tanggapan = htmlspecialchars($_POST["tgl_tanggapan"]);
        $tanggapan = htmlspecialchars($_POST["tanggapan"]);
        $id_petugas = $_SESSION['id_petugas'];
        $sql = "UPDATE vtanggapan SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan', id_petugas = $id_petugas WHERE id_tanggapan = $id";
        $db->runSql($sql);
        // var_dump($db);
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
                        document.location.href='?f=tanggapan&p=index'
                    }

                })
            </script>
        ";
    }
?>