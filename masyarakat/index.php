<?php
    require_once "../db_controller.php";
    $db = new DB;
    // $jumlahData = $db->rowCount("SELECT id_masyarakat FROM petugas");
    // $banyak = 10;
    // //fetchPagination
    // if(isset($_GET["p"]))
    // {
    //     $p = $_GET["p"];
    //     $mulai = ($p * $banyak) - $banyak;
    // }else
    // {
    //     $mulai = 0;
    // }
    // $halaman = ceil($jumlahData / $banyak);
    $sql = "SELECT * FROM masyarakat";
    $row = $db->getAll($sql);
    $no = 1;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Masyarakat</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTable Masyarakat</h6>
    </div>
    <div class="card-body">
    
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telp</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tfoot>
            <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telp</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php if(!empty($row)){?>
                <?php foreach($row as $key):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $key["nik"]?></td>
                    <td><?= $key["nama"]?></td>
                    <td><?= $key["username"]?></td>
                    <td><?= $key["password"]?></td>
                    <td><?= $key["telp"]?></td>
                    <td >
                        <button class="btn btn-sm btn-danger text-white" onclick="handleHapusMasyarakat(<?= $key['nik']?>)" >Hapus</button>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" role="button" href="?f=masyarakat&p=ubah&nik=<?= $key["nik"]?>">Ubah</a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php }?>
            </tbody>
        </table>
        </div>
        
  
    </div>
</div>
<script>
    function handleHapusMasyarakat(id)
    {
        swal({
            icon : "warning",
            title : "Notifikasi !",
            text : "Yakin Ingin Menghapus?",
            buttons : true,
            dangerMode : true
        })
        .then(res => {
            if(res)
            {
                
                swal({
                    icon : "success",
                    title : "Notifikasi !",
                    text : "Menghapus Berhasil",
                    button : "Oke"
                })
                .then(response => {
                    if(response)
                    {
                        document.location.href=`?f=masyarakat&p=hapus&nik=${id}`
                    }
                })
            }else {
                swal({
                    icon : "error",
                    title : "Notifikasi !",
                    text : "Menghapus Gagal",
                    button : "Oke"
                })
            }
        })
    }
</script>
