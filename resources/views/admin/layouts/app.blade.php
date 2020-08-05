<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Backend.Inc</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/css/custom.css') }}" rel="stylesheet">
  <script src="{{asset('js/app.js')}}" defer></script>
  <link href="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <meta name="api-base-url" content="{{ route('index') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Backend.Inc</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Content
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'page') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.page')}}" >
          <i class="fas fa-fw fa-columns"></i>
          <span>Pages</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'blog') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.blog')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Blog</span>
        </a>
      </li>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'service') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.service')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Service</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'project') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.project')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Project</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'project_category') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.project_category')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Project Category</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'project_type') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.project_type')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Project Type</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'project_fit_out') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.project_fit_out')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Project Fit Out</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'project_fit_out_image') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.project_fit_out_image')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Project Fit Out Image</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'career') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.career')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Career</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'product') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.product')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Product</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'product_portofolio') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.product_portofolio')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Product Portofolio</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'homepage_project') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.homepage_project')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Homepage Project</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'homepage_product') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.homepage_product')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Homepage Product</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'file') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.file')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>File</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Content
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'client') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.client')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Client</span>
        </a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'content') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.content')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Website Content</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Structure
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'menu') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.menu')}}">
          <i class="fas fa-fw fa-bars"></i>
          <span>Menus</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Contact
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'contact_subject') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.contact_subject')}}">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Subject</span>
        </a>
      </li>
      <li class="nav-item {{ (request()->segment(2) == 'contact') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('admin.contact')}}">
          <i class="fas fa-fw fa-comment"></i>
          <span>Contact</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Markt.inc User</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin_assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('admin_assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('admin_assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('admin_assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>