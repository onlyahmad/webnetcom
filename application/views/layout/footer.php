<?php 
// site dari konfigurasi
$site_info=$this->konfigurasi_model->listing();
 ?>
<div class="clearfix"></div>

<footer class="footer">
	<div class="container">
		<p class="float-right"><a href="#top">Back to top</a></p>
		<p>&copy; <?php echo date('Y')?> <?php echo $site_info->namaweb  ?> - <?php echo $site_info->tagline ?>. &middot;
		 <a href="<?php echo base_url('berita') ?>">Berita</a>	|
		 <a href="<?php echo base_url('layanan') ?>">Layanan</a>	|
		 <a href="<?php echo base_url('profile') ?>">Profil Kami</a>	|
		 <a href="<?php echo base_url('contact') ?>">Kontak</a>	|
		</p>
	</div>
	</div>
</footer>

</body>
<!-- load javascript -->
<script src="<?php echo base_url() ?>assets/template/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/template/bootstrap/assets/js/vendor/holder.min.js" type="text/javascript"></script>

</html>