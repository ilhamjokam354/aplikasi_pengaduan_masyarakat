<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "DELETE FROM tanggapan WHERE id_tanggapan = $id";
        $db->runSql($sql);
        echo "
            <script>
                document.location.href='?f=tanggapan&p=index'
            </script>
        ";
    }
?>