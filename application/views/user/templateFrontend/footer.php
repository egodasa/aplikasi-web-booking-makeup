<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>


<!-- Vendor JS Files -->
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/counterup/counterup.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/venobox/venobox.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url('assets/assetsfe') ?>/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/assetsfe') ?>/js/main.js"></script>


<?php
if ($this->session->flashdata('pesan') == TRUE) {
	$pesan = $this->session->flashdata('pesan');
?>

	<script type="text/javascript">
		Swal.fire(
			'Berhasil!',
			'<?= $pesan ?>',
			'success'
		)
	</script>
<?php }
if (!empty($this->session->flashdata('error'))) {
	$error = $this->session->flashdata('error');
?>

	<script type="text/javascript">
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: '<?= $error ?>'
		})
	</script>
<?php
	$this->session->set_flashdata('error', '');
}
?>


</body>

</html>
