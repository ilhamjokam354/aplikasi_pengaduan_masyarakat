<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "DELETE FROM petugas WHERE id_petugas = $id";
        $db->runSql($sql);
        echo "
            <script>
                document.location.href='?f=petugas&p=index'
            </script>
        ";
    }
?>