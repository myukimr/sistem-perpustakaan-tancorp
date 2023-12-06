<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <h5 class="card-title fw-semibold mb-4">Profil Saya</h5>
            <div class="card">
              <img src="<?php echo base_url(''); ?>assets/images/profile/user-1.jpg" class="card-img-top" alt="...">
              <div class="card-body" style="text-align: center;">
                <h5 class="card-title">Photo</h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of </p> -->
                <a href="<?php echo base_url('') . 'index.php/User/edit/' . $this->session->userdata('auth_uuid'); ?>" class="btn btn-primary" style="width: 90%; margin-top: 10px;"><i class="ti ti-edit"></i> &nbsp;Edit</a>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <h5 class="card-title fw-semibold mb-4">&nbsp;</h5>
            <div class="card">
              <!-- <div class="card-header">
                Biodata
              </div> -->
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('full_name'); ?>" readonly>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">No. Telpon</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('phone'); ?>" readonly>
                  </div>
                  <?php 
                  $unit = '';
                  if (isset($all_unit) AND count($all_unit) > 0) {
                    foreach ($all_unit as $key) {
                      if ($key['unit_id'] == $this->session->userdata('unit_id')) {
                        $unit = $key['unit_name'];
                        break;
                      }
                    } 
                  } 
                  ?>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Unit</label>
                    <input type="text" class="form-control" value="<?php echo $unit; ?>" readonly>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>