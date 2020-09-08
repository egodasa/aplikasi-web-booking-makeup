   <section class="mt-3 mr-3 ml-3">
       <?php echo $this->session->flashdata('pesan') ?>
       <div class="mb-4">
           <button data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Data Paket Makeup</button>
       </div>
       <table class="table table-striped" id="dataTable">
           <thead>
               <tr>
                   <th scope="col">No</th>
                   <th scope="col">Nama Paket</th>
                   <th scope="col">Harga Paket</th>
                   <th scope="col">Deskripsi</th>
                   <th scope="col">Batas Booking /Hari</th>
                   <th scope="col">Biaya / DP</th>
                   <th scope="col">Foto</th>
                   <th scope="col">Aksi</th>
               </tr>
           </thead>
           <tbody>
               <?php foreach ($paket_makeup as $no => $pm) : ?>
                   <tr>
                       <th scope="row"><?php echo $no + 1; ?></th>
                       <td><?php echo $pm->nm_makeup."<br>".$pm->nm_paket ?></td>
                       <td>Rp. <?php echo number_format($pm->harga_paket, '0', ',', '.') ?></td>
                       <td><?php echo $pm->deskripsi ?></td>
                       <td><?php echo $pm->batas_booking_per_hari ?> Pesanan</td>
                       <td>Rp. <?php echo number_format($pm->biaya_dp, '0', ',', '.') ?></td>
                       <td><img src="<?php echo base_url() . './assets/upload/' . $pm->foto ?>" alt="" class="img-fluid" style="width: 150px;"></td>
                       <td style="width: 10%;"><a href="<?php echo base_url('admin/paket_edit/') . $pm->id_paket ?>" class="btn btn-sm btn-warning">Edit</a> | <a href="<?php echo base_url('admin/paket_hapus/') . $pm->id_paket ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                   </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
       <!-- Modal -->
       <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Paket Make Up</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <form action="<?php echo base_url('admin/paket_tambah') ?>" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="">Nama Paket</label>
                               <input type="text" name="nm_paket" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Nama Makeup</label>
                               <select name="id_makeup" id="" class="form-control">
                                   <?php
                                    foreach ($makeup as $mu) :
                                    ?>
                                       <option value="<?php echo $mu->id_makeup ?>"><?php echo $mu->nm_makeup ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="">Harga Paket</label>
                               <input type="text" name="harga_paket" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Deskripsi</label>
                               <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                               <label for="">Batas Booking /Hari</label>
                               <input type="text" name="batas_booking_per_hari" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Biaya / DP</label>
                               <input type="text" name="biaya_dp" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Foto</label>
                               <input type="file" name="foto" class="form-control">
                           </div>
                           <button class="btn btn-primary" type="submit">Simpan Data</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>