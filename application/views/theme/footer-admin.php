		<?=js('jquery.min.js')?>

		<script src="<?= asset_url() ?>tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector:'.tiny-inline',
				plugins: "save",
				inline: true,
				language: 'fr_FR',
				menubar: false,
				toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | save'
			});
		</script>

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
					autoplay: false,
					infinite: true,
					nav: false,
				});
			});

			function majAccueil(id){
				var contenu = tinyMCE.get(id).getContent();

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/home_page/modifier',
					data: {
						id: id,
						contenu: contenu
					},
					success: function(data) {
						if (data == '')
						{
							swal({
								title: 'Contenu mis à jour',
								text: 'La fenêtre va se fermer dans 2 secondes',
								timer: 2000,
								animation: false,
								showConfirmButton: false
							});

							$(".sweet-alert h2").css('color', "#39D2B4");
						}
						else
						{
							swal({
								title: 'Erreur lors de la mis à jour',
								text: 'La fenêtre va se fermer dans 2 secondes',
								timer: 2000,
								animation: false,
								showConfirmButton: false
							});

							$(".sweet-alert h2").css('color', "#f35f47");
						}
			        },
				});
			};

			function desassocierProduitAvantage(id, idAvantage){

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/avantage/desassocierProduit',
					data: {
						id: id
					},
					success: function(data) {
						$('#produit_avantage').load("<?= base_url(); ?>admin/avantage/modifier/" + idAvantage + " #produit_avantage");
			        },
				});
			};

			function associerProduitAvantage(idAvantage){

				var select = document.getElementById("select_produit");
				var idProduit = select.options[select.selectedIndex].value;


				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/avantage/associerProduit',
					data: {
						idProduit: idProduit,
						idAvantage: idAvantage,
					},
					success: function(data) {
						$('#produit_avantage').load("<?= base_url(); ?>admin/avantage/modifier/" + idAvantage + " #produit_avantage");
			        }
				});
			};

			function desassocierProduitSolution(id, idSolution){

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/solution/desassocierProduit',
					data: {
						id: id
					},
					success: function(data) {
						$('#produit_solution').load("<?= base_url(); ?>admin/solution/modifier/" + idSolution + " #produit_solution");
			        },
				});
			};

			function associerProduitSolution(idSolution){

				var select = document.getElementById("select_produit");
				var idProduit = select.options[select.selectedIndex].value;


				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/solution/associerProduit',
					data: {
						idProduit: idProduit,
						idSolution: idSolution,
					},
					success: function(data) {
						$('#produit_solution').load("<?= base_url(); ?>admin/solution/modifier/" + idSolution + " #produit_solution");
			        }
				});
			};

		</script>

	</body>

</html>