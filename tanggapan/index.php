<?php
    require_once "../db_controller.php";
    $db = new DB;
    $sql = "SELECT * FROM vtanggapan";
    $row = $db->getAll($sql);
    $no = 1;
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tanggapan</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTable Tanggapan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Nama Petugas</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                    <!-- <th class="text-center">Aksi</th> -->
                </tr>
            </thead>
            <tfoot>
                 <tr>
                 <th>No</th>
                    <th>ID Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Nama Petugas</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                    <!-- <th class="text-center">Aksi</th> -->
                </tr>
            </tfoot>
            <tbody>
                <?php if(!empty($row)){?>
                <?php foreach($row as $key):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $key["id_pengaduan"]?></td>
                    <td><?= $key["tgl_pengaduan"]?></td>
                    <td><?= $key["nik"]?></td>
                    <td><?= $key["nama"]?></td>
                    <td><?= $key["telp"]?></td>
                    <td><?= $key["judul_laporan"]?></td>
                    <td><?= $key["isi_laporan"]?></td>
                    <td><img src="../assets/upload/<?= $key["foto"]?>" width="200" height="200" alt=""></td>
                    <td><?= $key["tgl_tanggapan"]?></td>
                    <td><?= $key["tanggapan"]?></td>
                    <td><?= $key["nama_petugas"]?></td>
                    <td>
                        <?php 
                            if($key["status"] == 'selesai')
                            {
                                echo '<span class="badge badge-success">Selesai</span>';
                            }
                            else if($key["status"] == 'proses')
                            {
                                echo '<span class="badge badge-primary">Proses</span>';
                            }
                            else{
                                echo '<span class="badge badge-warning">Belum di Proses</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" role="button" href="?f=tanggapan&p=ubah&id=<?= $key["id_tanggapan"]?>">Ubah</a>
                    </td>
                    <!-- <td >
                        <button class="btn btn-sm btn-danger text-white" onclick="handleHapusTanggapan(<?= $key['id_tanggapan']?>)" >Hapus</button>
                    </td> -->
                </tr>
                <?php endforeach;?>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script>
    function handleHapusTanggapan(id)
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
                        document.location.href=`?f=tanggapan&p=hapus&id=${id}`
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
