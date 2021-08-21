        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
					<?php $this->load->view('messages'); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
							 <!-- Filter Data -->
							 <table> 
                    <tr>
                        <tr>
                        <td><h6 style="margin-left:12%" for="filter">Filter By Kategori</h6></td>
                        </tr>
                        <th class="filterhead" style="display:none"></th>
												<th class="filterhead" style="display:none"></th>
												<th class="filterhead" style="display:none"></th>
												<th class="filterhead"></th>
												<th class="filterhead" style="display:none"></th>
												<th class="filterhead" style="display:none"></th>
												<th class="filterhead" style="display:none"></th>      
                    </tr>
                </table>
                <!-- End Filter Data -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Foto Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Diskon</th>
											<?php if($this->session->userdata('jabatan') == 'JBT001'){ ?>
												<th>Aksi</th>
											<?php } else { ?>

											<?php } ?>
                    </tr>
                  </thead>
                  <tbody>
										<?php 
											foreach ($barang as $index => $row) {                  
										?>
                    <tr>
											<td><?= $index+1?></td>
											<td>
											<?php if($row->FOTO_BARANG == NULL){ ?>
												<img height="100px" width="100px" src="<?php echo base_url(); ?>upload/barang/default.jpg/"/>
												<?php } else { ?>
												<img height="100px" width="100px" src="<?php echo base_url(); ?>upload/barang/<?= $row->FOTO_BARANG;?>"/>
												<?php }?>  
											</td>
											<td><?= $row->NAMA_BARANG ;?></td>
											<td><?= $row->KATEGORI_BARANG ;?></td>
											<td><?= $row->HARGA_BARANG ;?></td>
											<td><?= $row->DISKON_BARANG ;?></td>
											<?php if($this->session->userdata('jabatan') == 'JBT001'){ ?>
												<td>
													<a href="<?php echo base_url('C_barang/edit/'.$row->ID_BARANG); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a><br><br>
													<a href="<?php echo base_url('C_barang/delete/'.$row->ID_BARANG); ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus Data ini?')"><i class="fas fa-trash"></i> Hapus</a>
												</td>
											<?php } else { ?>

											<?php } ?>
										</tr>
										<?php 
											}
										?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
