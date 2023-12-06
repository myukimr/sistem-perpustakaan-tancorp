<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <?php
          if (!empty($this->session->flashdata('failed'))) {
        ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('failed'); ?>
        </div>
        <?php 
          }
        ?>
        <h5 class="card-title fw-semibold mb-4">Form Edit</h5>
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?php echo base_url('') . 'index.php/User/update'; ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control"  value="<?php echo $all_data['full_name']; ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"  value="<?php echo $all_data['email']; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">No. Telpon</label>
                <input type="text" name="phone" class="form-control"  value="<?php echo $all_data['phone']; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-control select2">
                  <option value="<?php echo $all_data['gender']; ?>" selected><?php echo $all_data['gender']; ?></option>
                  <option disabled>-----------------</option>
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control"><?php echo $all_data['address']; ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Unit</label>
                <select name="unit_id" class="form-control select2">
                    <?php if (isset($all_unit)) { ?>
                      <?php foreach ($all_unit as $key) { ?>
                        <?php if ($all_data['unit_id'] == $key['unit_id']) { ?>
                    <option value="<?php echo $key['unit_id']; ?>" selected><?php echo $key['unit_name']; ?></option>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </option>
                  <option disabled>-----------------</option>
                  <?php if (isset($all_unit)) { ?>
                      <?php foreach ($all_unit as $key) { ?>
                  <option value="<?php echo $key['unit_id']; ?>"><?php echo $key['unit_name']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-control select2">
                  <option value="<?php echo $all_data['level']; ?>" selected><?php echo $all_data['level']; ?></option>
                  <option disabled>-----------------</option>
                  <option value="admin">admin</option>
                  <option value="user">user</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control"  value="<?php echo $all_data['username']; ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                <small style="color: red">*Kosongi jika tidak diubah</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="flag" class="form-control select2">
                  <option value="<?php echo $all_data['flag']; ?>" selected><?php echo $all_data['flag'] == '1' ? 'Aktif' : 'Non-Aktif'; ?></option>
                  <option disabled>-----------------</option>
                  <option value="1">Aktif</option>
                  <option value="0">Non-Aktif</option>
                </select>
              </div>
              <input type="hidden" name="auth_id" value="<?php echo $all_data['auth_id']; ?>">
              <br>
              <button type="submit" class="btn btn-primary"><i class="ti ti-check"></i> Submit</button>
              <a class="btn btn-dark m-1" href="<?php echo base_url('') . 'index.php/User/delete/' . $all_data['auth_uuid']; ?>">
                <span>
                  <i class="ti ti-trash"></i>
                </span>
                <span>Hapus</span>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>