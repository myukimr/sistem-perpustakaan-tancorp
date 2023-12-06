<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Perpustakaan</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(''); ?>assets/images/logos/logo.png" />
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/styles.min.css" />
  <link href="<?php echo base_url(''); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet">

  <!-- Sweetalert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>

  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?php echo base_url('') . 'index.php/Dashboard/'; ?>" class="text-nowrap logo-img">
            <img src="<?php echo base_url(''); ?>assets/images/logos/logo2.png" width="180" alt="" style="width: 50%; text-align: center; margin-left: 20%;margin-top: 20px;" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Dashboard/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Peminjaman/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Peminjaman</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Peminjaman/selesai/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Pengembalian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Peminjaman/Laporan/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MASTER</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/User/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Petugas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Anggota/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Anggota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Pengunjung/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Pengunjung</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Perpustakaan/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Perpustakaan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Kategori/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Kategori</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Buku/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-menu"></i>
                </span>
                <span class="hide-menu">Data Buku</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Auth/logout/'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <p class="mb-0 fs-3" style="font-weight: bold;"><?php echo $this->session->userdata('full_name'); ?>
              <!-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> -->
              <li class="nav-item dropdown">
                <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop-notif" data-bs-toggle="dropdown"
                    aria-expanded="false">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a> -->
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop-notif">
                    <div class="message-body">
                      <div class="d-flex align-items-center gap-2 dropdown-item">
                        <p class="mb-0 fs-3" style="font-weight: bold;">Notifikasi</p>
                      </div>
                      <!-- <a href="<?php echo base_url('') . 'index.php/profile/'; ?>" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-user fs-6"></i>
                        <p class="mb-0 fs-3">Profil Saya</p>
                      </a>
                      <a href="<?php echo base_url('') . 'index.php/Logout/'; ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                    </div> -->
                  </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?php echo base_url(''); ?>assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <div class="d-flex align-items-center gap-2 dropdown-item">
                      Hai,<p class="mb-0 fs-3" style="font-weight: bold;"><?php echo $this->session->userdata('full_name'); ?></p>
                    </div>
                    <a href="<?php echo base_url('') . 'index.php/User/profil'; ?>" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profil Saya</p>
                    </a>
                    <a href="<?php echo base_url('') . 'index.php/Auth/logout'; ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->