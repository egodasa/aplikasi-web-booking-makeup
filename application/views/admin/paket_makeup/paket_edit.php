<div class="container">
    <?php foreach ($paket_makeup as $pm) : ?>
        <form action="<?php echo base_url('admin/paket_edit_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Paket</label>
                <input type="hidden" name="id" value="<?php echo $pm->id_paket ?>">
                <input type="text" name="nm_paket" class="form-control" value="<?php echo $pm->nm_paket ?>">
            </div>
            <div class="form-group">
                <label for="">Nama Makeup</label>
                <select name="id_makeup" id="id_makeup" class="form-control">
                    <?php foreach ($makeup as $mu) : ?>
                        <option value="<?php echo $mu->id_makeup ?>"><?php echo $mu->nm_makeup ?></option>
                    <?php endforeach; ?>
                    <script>
                        document.getElementsByName('id_makeup')[0].value = "<?php echo $pm->id_makeup ?>";
                    </script>
                </select>
            </div>
            <div class="form-group">
                <label for="">Harga Paket</label>
                <input type="text" name="harga_paket" class="form-control" value="<?php echo $pm->harga_paket ?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $pm->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Batas Booking /Hari</label>
                <input type="text" name="batas_booking_per_hari" class="form-control" value="<?php echo $pm->batas_booking_per_hari ?>">
            </div>
            <div class="form-group">
                <label for="">Biaya / DP</label>
                <input type="text" name="biaya_dp" class="form-control" value="<?php echo $pm->biaya_dp ?>">
            </div>
            <div class="form-group">
                <label for="">
                    Foto <br>
                    <small>*Upload foto baru untuk mengganti foto</small>
                </label>
                <br>
                <img src="<?php echo base_url() . './assets/upload/' . $pm->foto ?>" width="100" />
                <input type="file" name="foto" class="form-control">
                <input type="hidden" name="foto_lama" value="<?php echo $pm->foto ?>">

            </div>
            <button class="btn btn-primary" type="submit">Simpan Data</button>
        </form>
    <?php endforeach; ?>
</div>