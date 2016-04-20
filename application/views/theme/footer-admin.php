		<?=js('jquery.min.js')?>

		<script src="<?= asset_url() ?>tinymce/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'.tiny', language: 'fr_FR' });</script>

		<?=js('upload-file.js')?>

		<?=js('sweetalert.min.js')?>

		<?=js('unslider.min.js')?>

		<script type="text/javascript">

			$("#social").click(function(){
				$("#social").addClass("active");
				$('#menu_social').slideToggle("ease");
			});

			$("#produits").click(function(){
				$("#produits").addClass("active");
				$('#menu_produits').slideToggle("ease");
			});

			jQuery(document).ready(function($) {
				$('.my-slider').unslider({
					autoplay: true,
					infinite: true,
					nav: false
				});
			});

		</script>

	</body>

</html>