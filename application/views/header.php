<?php echo $_SESSION['user']->id_utilisateur;?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css --> 
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/feather/feather.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/ti-icons/css/themify-icons.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/css/vendor.bundle.base.css");?>>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/datatables.net-bs4/dataTables.bootstrap4.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/ti-icons/css/themify-icons.css");?>>
  <link rel="stylesheet" type="text/css" href=<?php echo base_url("css/js/select.dataTables.min.css");?>>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?php echo base_url("css/vertical-layout-light/style.css");?>>
  <!-- endinject -->
  <link rel="shortcut icon" href=<?php echo base_url("css/images/favicon.png");?> />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src=<?php echo base_url("image/health-weight.svg");?> class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src=<?php echo base_url("image/health-weight.svg");?> alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src=<?php echo base_url("image/health-weight.svg");?> alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Mon profil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Programme</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">A propos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Suivie</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Porte Monnaie</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <h1>Okay</h1> -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src=<?php echo base_url("css/vendors/js/vendor.bundle.base.js");?>></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src=<?php echo base_url("css/vendors/chart.js/Chart.min.js");?>></script>
  <script src=<?php echo base_url("css/vendors/datatables.net/jquery.dataTables.js");?>></script>
  <script src=<?php echo base_url("css/vendors/datatables.net-bs4/dataTables.bootstrap4.js");?>></script>
  <script src=<?php echo base_url("css/js/dataTables.select.min.js");?>></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=<?php echo base_url("css/js/off-canvas.js");?>></script>
  <script src=<?php echo base_url("css/js/hoverable-collapse.js");?>></script>
  <script src=<?php echo base_url("css/js/template.js");?>></script>
  <script src=<?php echo base_url("css/js/settings.js");?>></script>
  <script src=<?php echo base_url("css/js/todolist.js");?>></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src=<?php echo base_url("css/js/dashboard.js");?>></script>
  <script src=<?php echo base_url("css/js/Chart.roundedBarCharts.js");?>></script> 
  <!-- End custom js for this page-->
</body>

</html>
