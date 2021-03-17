<?php
    if(isset($_GET["nik"]))
    {
        $nik = $_GET["nik"];
        $sql = "DELETE FROM masyarakat WHERE nik = $nik";
        $db->runSql($sql);
        echo "
            <script>
                document.location.href='?f=masyarakat&p=index'
            </script>
        ";
    }
?>