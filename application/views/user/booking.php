<section class="mt-5 bg-light">
    <div class="text-center">
        <h1><i>Pastikan Data yang Anda Masukkan Benar !!!</i></h1>
    </div>
    <div class="container" data-aos="fade-up">
        <form action="<?php echo base_url('booking_tambah') ?>" method="POST">
            <?php
            $user = $this->session->userdata('id_pengguna');
            ?>
            <input type="hidden" name="id_pengguna" value="<?php echo $user ?>">
            <hr>
            <?php foreach ($paket as $pk) : ?>
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama Paket</td>
                                    <td>:</td>
                                    <td><?php echo $pk->nm_paket ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?php echo $pk->deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><?php echo $pk->harga_paket ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id_paket" value="<?php echo $pk->id_paket ?>">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo base_url('assets/upload/') . $pk->foto ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Make Up</label>
                            <input type="date" class="form-control" name="tgl_makeup">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Booking</label>
                            <input type="text" class="form-control" name="nama_booking">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat_booking" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <select name="id_kota" id="" class="form-control">
                                <?php foreach ($tarif as $tr) : ?>
                                    <option value="<?php echo $tr->id_kota ?>"><?php echo $tr->nm_kota ?> - <?php echo $tr->tarif ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No. Handphone</label>
                            <input type="text" class="form-control" name="nohp">
                        </div>
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </div>
        </form>
    <?php endforeach; ?>
    <hr>
    </div>
</section><!-- End Portfolio Section -->