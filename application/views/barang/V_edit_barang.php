 <!-- Begin Page Content -->
 <div class="container-fluid">
          <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Barang</h6>
          </div>
            <div class="card-body">
              <!-- Page Heading -->
              <form action="<?php echo base_url('C_barang/update_data_barang/')?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ID_BARANG" id="ID_BARANG" value="<?php echo $barang->ID_BARANG; ?>"/>  
									<div class="form-group">
                    <label for="NAMA_BARANG">Nama Barang</label>
                    <input type="text" class="form-control" id="NAMA_BARANG" name="NAMA_BARANG" value="<?= $barang->NAMA_BARANG; ?>" placeholder="Masukkan Nama Barang" required>
                  </div>
                  <div class="form-group">
                    <label for="KATEGORI_BARANG">Kategori Barang</label>
                    <select class="form-control" id="mySelect" name="KATEGORI_BARANG" required>
                    <option value="">- pilih kategori -</option>
										<option value="wholesale" <?php echo ($barang->KATEGORI_BARANG == "wholesale")?'selected="selected"':''?>>Wholesale</option>
										<option value="retail" <?php echo ($barang->KATEGORI_BARANG == "retail")?'selected="selected"':''?>>Retail</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="HARGA_BARANG">Harga Barang</label>
                    <input type="number" class="form-control" id="HARGA_BARANG" name="HARGA_BARANG" value="<?= $barang->HARGA_BARANG;?>" placeholder="Masukkan Harga" min="1" required>
                  </div>
                  <div class="form-group">
                    <label for="FOTO_BARANG">Foto Barang (format : png/jpg/jpeg)</label>
										<?php 
										if($barang->FOTO_BARANG!=NULL){ ?>
											<div>
													<img height="100px" width="100px" src="<?php echo base_url(); ?>upload/barang/<?= $barang->FOTO_BARANG ;?>"/>  
											</div>
										
										<?php } ?>
                    <input type="file" class="form-control" id="FOTO_BARANG" name="FOTO_BARANG" placeholder="Pilih File Foto">
										<small>*Biarkan Kosong Jika tidak diubah</small>
									</div>
                <button type="Submit" class="btn btn-primary" onClick="return confirm('Apakah data sudah benar?')">Submit</button>
                <button type="button" class="btn btn-secondary"  onClick="window.location.reload();">Reset</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      <!-- End of Main Content -->
