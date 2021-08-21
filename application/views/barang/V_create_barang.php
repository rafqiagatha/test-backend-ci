 <!-- Begin Page Content -->
 <div class="container-fluid">
          <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Barang</h6>
          </div>
            <div class="card-body">
              <!-- Page Heading -->
              <form action="<?php echo base_url('C_barang/input_data_barang')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="NAMA_BARANG">Nama Barang</label>
                    <input type="text" class="form-control" id="NAMA_BARANG" name="NAMA_BARANG" placeholder="Masukkan Nama Barang" required>
                  </div>
                  <div class="form-group">
                    <label for="KATEGORI_BARANG">Kategori Barang</label>
                    <select class="form-control" id="mySelect" name="KATEGORI_BARANG" required>
                    <option value="">- pilih kategori -</option>
										<option value="wholesale">Wholesale</option>
										<option value="retail">Retail</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="HARGA_BARANG">Harga Barang</label>
                    <input type="number" class="form-control" id="HARGA_BARANG" name="HARGA_BARANG" placeholder="Masukkan Harga" min="1"  required>
                  </div>
                  <div class="form-group">
                    <label for="FOTO_BARANG">Foto Barang (format : png/jpg/jpeg)</label>
                    <input type="file" class="form-control" id="FOTO_BARANG" name="FOTO_BARANG" placeholder="Pilih File Foto" required>
                  </div>
                <button type="Submit" class="btn btn-primary" onClick="return confirm('Apakah data sudah benar?')">Submit</button>
                <button type="button" class="btn btn-secondary"  onClick="window.location.reload();">Reset</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      <!-- End of Main Content -->
