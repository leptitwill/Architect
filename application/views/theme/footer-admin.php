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

			tinymce.init({
				selector:'.tiny',
				language: 'fr_FR',
				menubar: false,
				toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify'
			});

			$("#social").click(function(){
				$("#social").toggleClass("active");
				$('#menu_social').slideToggle("ease");
			});

			$("#produits").click(function(){
				$("#produits").toggleClass("active");
				$('#menu_produits').slideToggle("ease");
			});

			$("#entreprise").click(function(){
				$("#entreprise").toggleClass("active");
				$('#menu_entreprise').slideToggle("ease");
			});

			$("#media").click(function(){
				$("#media").toggleClass("active");
				$('#menu_media').slideToggle("ease");
			});

			$(document).ready(function() {
				$('.slider_accueil').unslider({
					autoplay: false,
					infinite: true,
					nav: false,
				});

				$('.slider-avis').unslider({
					autoplay: false,
					infinite: true,
					nav: false,
				});
			});

		</script>

	</body>

</html>