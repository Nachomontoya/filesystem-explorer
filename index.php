<?php
require './functions/showRootCont.php';

function getRootPath()
{
    getcwd();
    chdir("./root");
    return getcwd();
}

$rootPath = getRootPath();
// header('Location: ./functions/showRootCont.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>FileSystem Explorer</title>

  <!-- Custom fonts for this template-->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- UserName -->
      <li class="nav-item dropdown no-arrow w-100">
        <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline">File System Manager</span>
          <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
        </a>
      </li>
      <!-- End of username -->

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Nav Items - Folders -->
      <?php
      $rootFiles = getPathContent($rootPath);
      renderOnlyFolders($rootFiles);
      ?>
      <!-- End of Nav Items - Folders -->
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="
              navbar navbar-expand navbar-light
              bg-white
              topbar
              mb-4
              static-top
              shadow
              w-100
              d-flex
              justify-content-between
            ">
          <!-- Topbar Search -->
          <form class="
                d-none d-sm-inline-block
                form-inline
                mr-auto
                ml-md-3
                my-2 my-md-0
                mw-100
                navbar-search
                
              ">
            <div class="input-group w-40">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <form action="./functions/upload.php" method="POST" enctype="multipart/form-data">
          <input class="btn btn-primary mr-2" type="file" name='file' />
          <button class="btn btn-primary" type="submit">Upload File</button>
          </form>
          
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="
                      card-header
                      py-3
                      d-flex
                      flex-row
                      align-items-center
                      justify-content-between
                    ">
                  <h6 class="m-0 font-weight-bold text-primary">
                    File Name
                  </h6>
                  <h6 class="m-0 font-weight-bold text-primary">
                    Creation date
                  </h6>
                  <h6 class="m-0 font-weight-bold text-primary">
                    Last Modified
                  </h6>
                  <h6 class="m-0 font-weight-bold text-primary">
                    Size
                  </h6>
                  <h6 class="m-0 font-weight-bold text-primary">
                    Extension
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body main-content">
                  <div class="chart-area">
                    <?php
                    if (isset($_SESSION['path'])) {
                      $endPoint = $_SESSION['path'];
                      // getcwd(); 
                      // chdir($endPoint);
                      // $actualPath = getcwd();
                      $currentPathFiles = getPathContent($rootPath . "/" .  $endPoint);
                      // $_SESSION['path'] = "";
                    } else {
                      $currentPathFiles = getPathContent($rootPath);
                    }
                    renderAllContent($currentPathFiles);
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->
            <div class="row">
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancel
            </button>
            <a class="btn btn-primary" href="./modules/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>