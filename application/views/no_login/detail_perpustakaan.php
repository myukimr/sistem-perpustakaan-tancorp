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
            <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Auth/Perpustakaan'; ?>" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Perpustakaan</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="<?php echo base_url('') . 'index.php/Auth/Buku'; ?>" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Buku</span>
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
            <a class="btn btn-primary m-1" href="<?php echo base_url('') . 'index.php/Auth/'; ?>">
              <span>
                Login
              </span>
            </a>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Header End -->




    <div class="container-fluid">
      <div class="card w-100">
        <div class="card-body p-4">
          <?php
          if (!empty($this->session->flashdata('failed'))) {
            ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $this->session->flashdata('failed'); ?>
            </div>
            <?php 
          }
          ?>
          <?php
          if (!empty($this->session->flashdata('success'))) {
            ?>
            <div class="alert alert-primary" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php 
          }
          ?>
          <div class="row">
            <div class="col-md-10">
              <h5 class="card-title fw-semibold mb-4">Detail Profil Perpustakaan</h5>
            </div>
            <div class="col-md-2" style="text-align: right;">

            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-2">
              <span>Nama</span>
            </div>
            <div class="col-md-10">
              <span style="font-weight: bold; color: black;">: &nbsp;<?php echo $all_data['nama']; ?></span>
            </div>
            <div class="col-md-2">
              <span>Deskripsi</span>
            </div>
            <div class="col-10">
              <span style="font-weight: bold; color: black;">: &nbsp;<?php echo $all_data['deskripsi']; ?></span>
            </div>
          </div>
          <br>
          <div class="table-responsive mt-2">
            <table id="table-format" class="cell-border hover" style="width:100%; text-align: center; color: black;">
              <thead class="text-dark fs-4">
                <tr>
                  <th><h6 class="fw-semibold mb-0">Judul</h6></th>
                  <th><h6 class="fw-semibold mb-0">Kategori</h6></th>
                  <th><h6 class="fw-semibold mb-0">Penerbit</h6></th>
                  <th><h6 class="fw-semibold mb-0">Pengarang</h6></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (isset($all_buku)) {
                  foreach ($all_buku as $row) { ?>
                  <tr>
                    <td class="border-bottom-0"><?php echo $row['judul']; ?></td>
                    <td class="border-bottom-0">
                      <?php if (isset($all_kategori)) { ?>
                      <?php foreach ($all_kategori as $key) { ?>
                      <?php if ($row['kategori_id'] == $key['id']) { ?>
                      <?php echo $key['nama']; ?>
                      <?php } ?>
                      <?php } ?>
                      <?php } ?>
                    </td>
                    <td class="border-bottom-0"><?php echo $row['penerbit']; ?></td>
                    <td class="border-bottom-0"><?php echo $row['pengarang']; ?></td>
                  </tr>  
                  <?php 
                }
              } 
              ?>                     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




</div>
</div>
<script src="<?php echo base_url(''); ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/js/sidebarmenu.js"></script>
<script src="<?php echo base_url(''); ?>assets/js/app.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?php echo base_url(''); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(''); ?>assets/libs/select2/js/select2.min.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

<!-- Masukkan plugin Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script type="text/javascript">
$(".pilih-kategori").change(function(){
  if($(this).val() == "0") {
    $(".input-kategori").removeAttr("hidden");
  } else {
    $(".input-kategori").attr('hidden', true);
  }      
})

$(document).ready(function() {
  $('#select2-1').select2();
  $('#select2-2').select2();
  $('#select2-3').select2();
  $('.select2').select2();

  $('.decimal').inputmask();

  $('#table-format').DataTable( {
    dom: 'Bfrtip',
    paging: true,
    buttons: [
    'pdf', 'csv', 'excel'
    ]    
  } );
  $('#table-format-no-page').DataTable( {
    dom: 'Bfrtip',
    paging: false,
    buttons: [
    'pdf', 'csv', 'excel'
    ]    
  } );

  $('.table-format').DataTable( {
    dom: 'Bfrtip',
    order: [[ 0, "asc" ]],
    paging: true,
    buttons: [
    {
      extend: 'copyHtml5',
      exportOptions: {
        columns: [ 0, ':visible' ]
      }
    },
    {
      extend: 'excelHtml5',
      exportOptions: {
        columns: ':visible'
      }
    },
    'colvis'
    ]   
  } );
  $('.table-format-no-page').DataTable( {
    dom: 'Bfrtip',
    order: [[ 0, "asc" ]],
    paging: false,
    buttons: [
    {
      extend: 'copyHtml5',
      exportOptions: {
        columns: [ 0, ':visible' ]
      }
    },
    {
      extend: 'excelHtml5',
      exportOptions: {
        columns: ':visible'
      }
    },
    'colvis'
    ]   
  } );
});

/* Tanpa Rupiah */
var tanpa_rupiah = document.getElementById('tanpa-rupiah');
tanpa_rupiah.addEventListener('keyup', function(e)
{
  tanpa_rupiah.value = formatRupiah(this.value);
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split    = number_string.split(','),
  sisa     = split[0].length % 3,
  rupiah     = split[0].substr(0, sisa),
  ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
</body>

</html>