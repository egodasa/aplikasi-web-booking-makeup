<div class="container">
	<form action="<?php echo base_url('admin/makeup_edit_aksi') ?>" method="POST">
		<?php
		foreach ($makeup as $mu) : ?>
			<div class="form-group">
				<label for="">Nama MakeUp</label>
				<input type="text" name="nm_makeup" class="form-control" value="<?php echo $mu->nm_makeup ?>">
				<input type="hidden" name="id" value="<?php echo $mu->id_makeup ?>">
			</div>
			<div class="form-group">
				<label for="">Deskripsi MakeUp</label>
				<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $mu->deskripsi ?></textarea>
			</div>
			<div class="form-group">
				<label for="">Lokasi MakeUp</label>
				<select name="lokasi_makeup" id="" class="form-control">
					<option value="Langsung">Langsung</option>
					<option value="Studio">Studio</option>
				</select>
			</div>
			<button class="btn btn-primary" type="submit">Simpan Data</button>
		<?php endforeach; ?>
	</form>
</div>
