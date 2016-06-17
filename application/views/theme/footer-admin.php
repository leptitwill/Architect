		<script src="<?= asset_url() ?>tinymce/tinymce.min.js"></script>
		<?=js('sweetalert.min.js')?>
		<?=js('unslider.min.js')?>

		<script type="text/javascript">

			tinymce.init({
				selector:'.tiny-inline',
				plugins: "save",
				inline: true,
				language: 'fr_FR',
				menubar: false,
				toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | save'
			});

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
					autoplay: false,
					infinite: true,
					nav: false,
				});
			});

		</script>

	</body>

</html>