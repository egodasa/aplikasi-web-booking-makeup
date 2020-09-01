<div class="container">
	<form action="<?php echo base_url('admin/admin_edit_aksi') ?>" method="POST">
		<?php
		foreach ($admin as $adm) : ?>
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $adm->username ?>">
				<input type="hidden" name="id" value="<?php echo $adm->id_admin ?>">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="text" name="password" class="form-control" value="<?php echo $adm->password ?>">
			</div>
			<div class="form-group">
				<label for="">Nama Admin</label>
				<input type="text" name="nama_admin" class="form-control" value="<?php echo $adm->nama_admin ?>">
			</div>
			<button class="btn btn-primary" type="submit">Simpan Data</button>
		<?php endforeach; ?>
	</form>
</div>
