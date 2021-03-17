<?php 
    require_once "../db_controller.php";
    $db = new DB();
    $sql = "SELECT * FROM vcetaklaporan";
    $row = $db->getAll($sql);
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/sb-admin-2.min.css">
    <title>Cetak Laporan</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-12 mx-auto ">
            <h3 class="text-center text-dark font-weight-bold my-5">Cetak Laporan Pengaduan Masyarakat</h3>
            <table class="table table-bordered">
                <thead class="text-dark">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Masyarakat</th>
                        <th>Username Masyarakat</th>
                        <th>Telepon Masyarakat</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Judul Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Tanggal Tanggapan</th>
                        <th>Tanggapan</th>
                        <th>Nama Petugas</th>
                        <th>Level Petugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row as $key):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $key['nik']?></td>
                        <td><?= $key['nama']?></td>
                        <td><?= $key['username']?></td>
                        <td><?= $key['telp']?></td>
                        <td><?= $key['tgl_pengaduan']?></td>
                        <td><?= $key['judul_laporan']?></td>
                        <td><?= $key['isi_laporan']?></td>
                        <td><img src="../assets/upload/<?= $key['foto']?>" width="100" height="100" alt="Gambar"></td>
                        <td><?= $key['tgl_tanggapan']?></td>
                        <td><?= $key['tanggapan']?></td>
                        <td><?= $key['nama_petugas']?></td>
                        <td><?= $key['level']?></td>
                        <td>
                            <?php 
                                if($key['status'] == 'selesai')
                                {
                                    echo '<span class="badge badge-success">Selesai</span>';
                                }else{
                                    echo '<span class="badge badge-warning">Proses</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <script>window.print()</script>
</body>
</html>