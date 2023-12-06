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
            <form method="POST" action="<?php echo base_url('') . 'index.php/Buku/store'; ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control select2">
                  <?php if (isset($all_kategori)) { ?>
                      <?php foreach ($all_kategori as $key) { ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['nama']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
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