<?php
if ($this->session->flashdata('pesan') == TRUE) {
    $pesan = $this->session->flashdata('pesan');
?>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        Swal.fire(
            'Berhasil!',
            '<?= $pesan ?>',
            'success'
        )
    </script>
<?php }
if ($this->session->flashdata('error') == TRUE) {
    $error = $this->session->flashdata('error');
?>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $error ?>'
        })
    </script>
<?php
}
?>
<section class="mt-5">
    <div class="text-center">
        <h1><i>Silahkan Isikan Data Anda !!!</i></h1>
    </div>
    <div class="container" data-aos="fade-up">
        <hr>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row">
            <div class="col-md-8 offset-2">
                <form action="<?php echo base_url('register_tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">No. Handphone</label>
                        <input type="text" class="form-control" name="nohp">
                    </div>
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </form>
            </div>
        </div>
        <hr>
    </div>
</section><!-- End Portfolio Section -->