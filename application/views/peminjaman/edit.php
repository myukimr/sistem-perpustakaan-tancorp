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
            <form method="POST" action="<?php echo base_url('') . 'index.php/Peminjaman/update'; ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control"  value="<?php echo $all_data['tanggal_pinjam']; ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control"  value="<?php echo $all_data['tanggal_kembali']; ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Anggota</label>
                <select name="anggota_id" class="form-control select2">
                    <?php if (isset($all_anggota)) { ?>
                      <?php foreach ($all_anggota as $key) { ?>
                        <?php if ($all_data['anggota_id'] == $key['id']) { ?>
                    <option value="<?php echo $key['id']; ?>" selected><?php echo $key['nama']; ?></option>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </option>
                  <option disabled>-----------------</option>
                  <?php if (isset($all_anggota)) { ?>
                      <?php foreach ($all_anggota as $key) { ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['nama']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="buku_id" class="form-control select2">
                    <?php if (isset($all_buku)) { ?>
                      <?php foreach ($all_buku as $key) { ?>
                        <?php if ($all_data['buku_id'] == $key['id']) { ?>
                    <option value="<?php echo $key['id']; ?>" selected><?php echo $key['judul']; ?></option>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </option>
                  <option disabled>-----------------</option>
                  <?php if (isset($all_buku)) { ?>
                      <?php foreach ($all_buku as $key) { ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['judul']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Perpustakaan</label>
                <select name="perpustakaan_id" class="form-control select2">
                    <?php if (isset($all_perpustakaan)) { ?>
                      <?php foreach ($all_perpustakaan as $key) { ?>
                        <?php if ($all_data['perpustakaan_id'] == $key['id']) { ?>
                    <option value="<?php echo $key['id']; ?>" selected><?php echo $key['nama']; ?></option>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </option>
                  <option disabled>-----------------</option>
                  <?php if (isset($all_perpustakaan)) { ?>
                      <?php foreach ($all_perpustakaan as $key) { ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['nama']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
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