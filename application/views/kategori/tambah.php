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
        <h5 class="card-title fw-semibold mb-4">Form Tambah</h5>
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?php echo base_url('') . 'index.php/Kategori/store'; ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">nama</label>
                <input type="text" name="nama" class="form-control" required>
              </div>
              <br>
              <button type="submit" class="btn btn-primary"><i class="ti ti-check"></i> Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>