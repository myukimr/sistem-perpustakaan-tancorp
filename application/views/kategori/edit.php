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
            <form method="POST" action="<?php echo base_url('') . 'index.php/Kategori/update'; ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control"  value="<?php echo $all_data['nama']; ?>" required>
              </div>
              <input type="hidden" name="id" value="<?php echo $all_data['id']; ?>">
              <br>
              <button type="submit" class="btn btn-primary"><i class="ti ti-check"></i> Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>