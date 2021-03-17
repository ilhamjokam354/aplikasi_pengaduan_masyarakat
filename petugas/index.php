<?php
    require_once "../db_controller.php";
    $db = new DB;
    $sql = "SELECT * FROM petugas";
    $row = $db->getAll($sql);
    $no = 1;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Petugas</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTable Petugas</h6>
    </div>
    <div class="card-body">
    
        <a href="?f=petugas&p=tambah" role="button" class="btn btn-outline-success mb-3">Tambah</a>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telepon</th>
                    <th>Level</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telepon</th>
                    <th>Level</th>
                    <th  class="text-center">Aksi</th>
                    <th  class="text-center">Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php if(!empty($row)){?>
                <?php foreach($row as $key):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $key["nama_petugas"]?></td>
                    <td><?= $key["username"]?></td>
                    <td><?= $key["password"]?></td>
                    <td><?= $key["telp"]?></td>
                    <td>
                        <button class="btn btn-sm btn-primary"><?= $key["level"]?></button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger text-white" onclick="handleHapusPetugas(<?= $key['id_petugas']?>)" >Hapus</button>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" role="button" href="?f=petugas&p=ubah&id=<?= $key["id_petugas"]?>">Ubah</a>
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
    function handleHapusPetugas(id)
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
                        document.location.href=`?f=petugas&p=hapus&id=${id}`
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
