<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Akutansi - PT. Indopack Printing</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(''); ?>assets/images/logos/logo.png" />
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/styles.min.css" />

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>

  </head>

  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <?php
                if (!empty($this->session->flashdata('error'))) {
              ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
              </div>
              <?php 
                }
              ?>
              <a href="./Auth" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="<?php echo base_url(''); ?>assets/images/logos/logo2.png" width="180" alt="" style="width: 50%; text-align: center;" />
              </a>
              <!-- <p class="text-center">Perusahaan Umum Jasa Tirta I</p> -->
              <form method="POST" action="<?php echo base_url('') . 'index.php/Auth/doLogin'; ?>" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" maxlength="15" required>
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                      <!-- <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label> -->
                    </div>
                    <a class="text-primary fw-bold" href="#" onclick="lupa_password()">Lupa Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <br>
                  <a href="<?php echo base_url('') . 'index.php/Auth/Perpustakaan'; ?>" class="btn btn-dark w-100 py-8 fs-4 mb-4 rounded-2">Pengunjung</a>
                  <!-- <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold ms-2" href="#">Buat Akun</a>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(''); ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(''); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    function lupa_password() {
      Swal.fire({
        title: '<strong>Pemberitahuan</strong>',
        icon: 'info',
        html:
        'Hubungi administrator untuk melakukan reset password ' +
        'pada Sistem Ini',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:
        'Close',
        confirmButtonAriaLabel: 'Close'
      })
    }
  </script>
</body>

</html>