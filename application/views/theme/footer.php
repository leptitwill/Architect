		<footer>
			Copyright - Conceptcub - Tous droits réservés - <a href="<?= base_url("faq"); ?>">FAQ</a> - <a href="<?= base_url("membre"); ?>">membre</a>
		</footer>
		
		<?=js('jquery.min.js')?>

		<script src="<?= asset_url() ?>tinymce/tinymce.min.js"></script>
  		<script>
  			tinymce.init({
  				selector:'textarea',
  				language: 'fr_FR'
  			});
  		</script>

		<?=js('upload-file.js')?>

		<?=js('unslider.min.js')?>
		<script>
			jQuery(document).ready(function($) {
				$('.my-slider').unslider({
					autoplay: false,
					infinite: true,
					nav: false,
				});
			});
		</script>

	</body>

</html>