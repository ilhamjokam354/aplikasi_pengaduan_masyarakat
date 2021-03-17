<?php 
    session_start();
    require_once "../db_controller.php";
    $db = new DB;
    if(!isset($_SESSION["username"]))
    {
        header("location:../login.php");
    }
    if(isset($_GET["log"]))
    {
        session_destroy();
        header("location:../login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css">
    <title>Admin Page</title>
    <script src="../assets/js/sweetalert.js"></script>
  </head>
  <body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?f=dashboard_admin&p=index">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?= $_SESSION["level"]?><sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php
                $level = $_SESSION["level"];
                switch ($level) {
                    case 'admin':
                        echo '
                            <li class="nav-item" id="dashboardAdmin">
                            <a class="nav-link" href="?f=dashboard_admin&p=index">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                            </li>
                
                            <!-- Divider -->
                            <hr class="sidebar-divider">
                
                            <!-- Heading -->
                            <div class="sidebar-heading">
                            Data
                            </div>
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item" id="petugas">
                            <a class="nav-link" href="?f=petugas&p=index" >
                                <i class="fas fa-user-friends"></i>
                                <span>Petugas</span></a>
                            </li>
                            <!-- Nav Item - Petugas -->
                            <li class="nav-item" id="masyarakat">
                            <a class="nav-link" href="?f=masyarakat&p=index">
                                <i class="fas fa-users"></i>
                                <span>Masyarakat</span></a>
                            </li>
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item " id="pengaduan">
                            <a class="nav-link" href="?f=pengaduan&p=index">
                                <i class="fas fa-envelope"></i>
                                <span>Pengaduan</span></a>
                            </li>
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item " id="tanggapan">
                            <a class="nav-link" href="?f=tanggapan&p=index">
                                <i class="fas fa-comments"></i>
                                <span>Tanggapan</span></a>
                            </li>
                        ';
                        break;

                    case 'petugas':
                        echo '
                            
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item " id="pengaduan">
                            <a class="nav-link" href="?f=pengaduan&p=index">
                                <i class="fas fa-envelope"></i>
                                <span>Pengaduan</span></a>
                            </li>
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item " id="tanggapan">
                            <a class="nav-link" href="?f=tanggapan&p=index">
                                <i class="fas fa-comments"></i>
                                <span>Tanggapan</span></a>
                            </li>
                        ';
                        break;
                    
                    default:
                        echo '
                            <li class="nav-item ">
                            <a class="nav-link" role="button">
                                <i class="fas fa-times"></i>
                                <span>Tidak Ada</span></a>
                            </li>';
                        break;
                }
            ?>
            
           

           
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content-wrapper -->
        <div class="d-flex flex-column" id="content-wrapper">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form> -->
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </li>
                    

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucfirst($_SESSION["username"])?></span>
                        <i class="fas fa-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" onclick="handleLogout()" role="button" >
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                    </div>
                    </li>
                </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Dinamis Content -->
                <div class="container-fluid">
                    <?php
                        if(isset($_GET["f"]) && isset($_GET["p"]))
                        {
                            $f = $_GET["f"];
                            $p = $_GET["p"];
                            $file = "../".$f."/".$p.".php";
                            require_once $file; 
                            if($f == "petugas" && $p == "index")
                            {
                                echo"
                                    <script>
                                        let petugasActive = document.getElementById('petugas')
                                        petugasActive.classList.add('active')
                                    </script>
                                ";
                            }
                            else if($f == "dashboard_admin")
                            {
                                echo"
                                    <script>
                                        let dashboardAdmin = document.getElementById('dashboardAdmin')
                                        dashboardAdmin.classList.add('active')
                                    </script>
                                ";
                            }
                            else if($f == "masyarakat")
                            {
                                echo"
                                    <script>
                                        let masyarakatActive = document.getElementById('masyarakat')
                                        masyarakatActive.classList.add('active')
                                    </script>
                                ";
                            }
                            else if($f == "pengaduan")
                            {
                                echo"
                                    <script>
                                        let pengaduanActive = document.getElementById('pengaduan')
                                        pengaduanActive.classList.add('active')
                                    </script>
                                ";
                            }
                            else if($f == "tanggapan")
                            {
                                echo"
                                    <script>
                                        let tanggapanActive = document.getElementById('tanggapan')
                                        tanggapanActive.classList.add('active')
                                    </script>
                                ";
                            }
                        }
                    ?>
            

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Pengaduan Masyarakat <span id="tahunNow"></span></span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- EndContentWrapper -->
    </div>
    <!-- End of Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/script.js"></script>
  </body>
</html>
