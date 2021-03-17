<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "DELETE FROM pengaduan WHERE id_pengaduan = $id";
        $db->runSql($sql);
        echo "
            <script>
                document.location.href='?f=pengaduan&p=index'
            </script>
        ";
    }
?>