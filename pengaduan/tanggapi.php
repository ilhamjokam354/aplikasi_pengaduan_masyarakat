<?php
    require_once "../db_controller.php";
    $db = new DB;
    if(isset($_GET['id']))
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
        $sqlUpdateProses = "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = $id";
        $db->runSql($sqlUpdateProses);
        $row = $db->getItem($sql);
    }
?>
<div class="card shadow">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tanggapi Pengaduan</h4>
    </div>
    <div class="card-body">
    <form method="POST" >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_pengaduan">Id Pengaduan</label>
                    <input type="text" class="form-control" value="<?= $row['id_pengaduan']?>" name="id_pengaduan" autofocus id="id_pengaduan" required disabled>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                    <input type="text" class="form-control" name="tgl_pengaduan" value="<?= $row['tgl_pengaduan']?>" id="tgl_pengaduan" required disabled>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" value="<?= $row['nik']?>" id="nik" required disabled>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul_laporan">Judul Laporan</label>
                    <input type="text" class="form-control" name="judul_laporan" value="<?= $row['judul_laporan']?>"  id="judul_laporan" disabled required>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="isi_laporan">Judul Laporan</label>
                    <textarea name="isi_laporan" id="isi_laporan" cols="30" disabled required class="form-control" rows="10"><?= $row['isi_laporan']?></textarea>
                </div>
                
            </div>
            <div class="col-md-6">
                    <label for="foto">Foto</label>
                    <img src="../assets/upload/<?= $row['foto']?>"  class="img-fluid mb-3"  alt="Foto Pengaduan" id="foto">
            </div>
            

        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="tgl_tanggapan">Tanggal Tanggapan</label>
                <input type="date" class="form-control" name="tgl_tanggapan" value="<?= date('Y-m-d')?>" autofocus required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="isi_tanggapan">Isi Tanggapan</label>
                <textarea name="tanggapan" id="isi_tanggapan" cols="30" rows="10" class="form-control" required></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary" name="submit">Tanggapi</button>
            <a role="button" href="?f=pengaduan&p=index" class="btn btn-danger">Kembali</a>
        </div>
    </form>
    </div>
</div>  
<?php 
    if(isset($_POST["submit"])){
        $tgl_tanggapan = htmlspecialchars($_POST["tgl_tanggapan"]);
        $tanggapan = htmlspecialchars($_POST["tanggapan"]);
        $id_petugas = $_SESSION['id_petugas'];
        $sql = "INSERT INTO tanggapan VALUES('', $id, '$tgl_tanggapan', '$tanggapan', $id_petugas)";
        $db->runSql($sql);
            $sqlUpdate = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = $id";
            $db->runSql($sqlUpdate);
            echo "
                <script>    
                    swal({
                        icon : 'success',
                        title : 'Info !',
                        text : 'Tanggapi Pengaduan Berhasil',
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