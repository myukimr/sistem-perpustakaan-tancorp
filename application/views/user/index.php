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
        <div class="col-10">
          <h5 class="card-title fw-semibold mb-4">List Data - Petugas</h5>
        </div>
        <div class="col-2" style="text-align: right;">
          <a class="btn btn-primary m-1" href="<?php echo base_url('') . 'index.php/User/tambah'; ?>">
            <span>
              <i class="ti ti-plus"></i>
            </span>
            <!-- <span>Item</span> -->
          </a>
        </div>
      </div>
      <div class="table-responsive mt-2">
        <table id="table-format" class="cell-border hover" style="width:100%; text-align: center; color: black;">
          <thead class="text-dark fs-4">
            <tr>
              <th><h6 class="fw-semibold mb-0">Nama</h6></th>
              <th><h6 class="fw-semibold mb-0">Unit</h6></th>
              <th><h6 class="fw-semibold mb-0">Email</h6></th>
              <th><h6 class="fw-semibold mb-0">No.Telpon</h6></th>
              <th><h6 class="fw-semibold mb-0">Level</h6></th>
              <th><h6 class="fw-semibold mb-0">Status</h6></th>
              <th><h6 class="fw-semibold mb-0">Aksi</h6></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($all_data)) {
              foreach ($all_data as $row) { ?>
            <tr>
              <td class="border-bottom-0"><?php echo $row['full_name']; ?></td>
              <td class="border-bottom-0">
                <?php if (isset($all_unit)) { ?>
                  <?php foreach ($all_unit as $key) { ?>
                    <?php if ($row['unit_id'] == $key['unit_id']) { ?>
                      <?php echo $key['unit_name']; ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </td>
              <td class="border-bottom-0"><?php echo $row['email']; ?></td>
              <td class="border-bottom-0"><?php echo $row['phone']; ?></td>
              <td class="border-bottom-0"><?php echo $row['level']; ?></td>
              <td class="border-bottom-0"><?php echo $row['flag'] == 1 ? 'Aktif' : 'Non-Aktif'; ?></td>
              <td style="text-align: center;">
                <a class="btn btn-dark m-1" href="<?php echo base_url('') . 'index.php/User/edit/' . $row['auth_uuid']; ?>">
                  <span>
                    <i class="ti ti-edit"></i>
                  </span>
                </a>
                <a class="btn btn-light m-1" href="<?php echo base_url('') . 'index.php/User/delete/' . $row['auth_uuid']; ?>">
                  <span>
                    <i class="ti ti-trash"></i>
                  </span>
                </a>
              </td>
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