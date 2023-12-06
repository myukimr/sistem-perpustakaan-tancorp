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
          <h5 class="card-title fw-semibold mb-4">List Data - Transaksi Buku</h5>
        </div>
        <div class="col-2" style="text-align: right;">
          <a class="btn btn-primary m-1" href="<?php echo base_url('') . 'index.php/Peminjaman/tambah'; ?>">
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
              <th><h6 class="fw-semibold mb-0">Nama Peminjam</h6></th>
              <th><h6 class="fw-semibold mb-0">Buku</h6></th>
              <th><h6 class="fw-semibold mb-0">Perpustakaan</h6></th>
              <th><h6 class="fw-semibold mb-0">Tanggal Peminjam</h6></th>
              <th><h6 class="fw-semibold mb-0">Tanggal Kembali</h6></th>
              <th><h6 class="fw-semibold mb-0">Status</h6></th>
              <th><h6 class="fw-semibold mb-0">Aksi</h6></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($all_data)) {
              foreach ($all_data as $row) { ?>
            <tr>
              <td class="border-bottom-0">
                <?php if (isset($all_anggota)) { ?>
                  <?php foreach ($all_anggota as $key) { ?>
                    <?php if ($row['anggota_id'] == $key['id']) { ?>
                      <?php echo $key['nama']; ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </td>
              <td class="border-bottom-0">
                <?php if (isset($all_buku)) { ?>
                  <?php foreach ($all_buku as $key) { ?>
                    <?php if ($row['buku_id'] == $key['id']) { ?>
                      <?php echo $key['judul']; ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </td>
              <td class="border-bottom-0">
                <?php if (isset($all_perpustakaan)) { ?>
                  <?php foreach ($all_perpustakaan as $key) { ?>
                    <?php if ($row['perpustakaan_id'] == $key['id']) { ?>
                      <?php echo $key['nama']; ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </td>
              <td class="border-bottom-0"><?php echo $row['tanggal_pinjam']; ?></td>
              <td class="border-bottom-0"><?php echo $row['tanggal_kembali']; ?></td>
              <td class="border-bottom-0"><?php echo $row['status'] == '' ? 'Dipinjamkan' : $row['status']; ?></td>
              <td style="text-align: center;">
                <a class="btn btn-dark m-1" href="<?php echo base_url('') . 'index.php/Peminjaman/edit/' . $row['id']; ?>">
                  <span>
                    <i class="ti ti-edit"></i>
                  </span>
                </a>
                <a class="btn btn-light m-1" href="<?php echo base_url('') . 'index.php/Peminjaman/delete/' . $row['id']; ?>">
                  <span>
                    <i class="ti ti-trash"></i>
                  </span>
                </a>
                <br>
                <?php if ($row['status'] != 'Batal') { ?>
                <a class="btn btn-danger m-1" href="<?php echo base_url('') . 'index.php/Peminjaman/flag/' . $row['id'] . '/Batal'; ?>">
                  <span>
                    &nbsp;&nbsp;Batal&nbsp;&nbsp;
                    <!-- <i class="ti ti-edit"></i> -->
                  </span>
                </a>
                <?php } ?>
                <?php if ($row['status'] != 'Selesai') { ?>
                <a class="btn btn-primary m-1" href="<?php echo base_url('') . 'index.php/Peminjaman/flag/' . $row['id'] . '/Selesai'; ?>">
                  <span>
                    Selesai
                    <!-- <i class="ti ti-edit"></i> -->
                  </span>
                </a>
                <?php } ?>
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