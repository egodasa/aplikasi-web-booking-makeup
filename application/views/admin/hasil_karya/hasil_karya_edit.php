<div class="container">
    <?php foreach ($hasil_karya as $hk) : ?>
        <form action="<?php echo base_url('admin/karya_edit_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <select name="id_makeup" id="" class="form-control">
                    <?php foreach ($makeup as $mu) : ?>
                        <option value="<?php echo $mu->id_makeup ?>"><?php echo $mu->nm_makeup ?></option>
                    <?php endforeach; ?>
                    <script>
                        document.getElementsByName('id_makeup')[0].value = "<?php echo $hk->id_makeup ?>";
                    </script>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Hasil Karya</label>
                <input type="hidden" name="id" value="<?php echo $hk->id_karya ?>">
                <input type="text" name="nm_karya" class="form-control" value="<?php echo $hk->nm_karya ?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $hk->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                <input type="hidden" name="foto_lama" value="<?php echo $hk->foto ?>">
                <?php echo $hk->foto ?>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Data</button>
        </form>
    <?php endforeach; ?>
</div>