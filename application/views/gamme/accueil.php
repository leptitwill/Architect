		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<?php foreach ($gammes as $gamme): ?>

				<?php
					$gamme_id = $gamme['idGamme'];
					$gamme_url = $gamme['url'];
				?>

				<article class="gamme">

					<div class="modifier_gamme">
						<a href="<?= base_url("admin/gamme/modifier/$gamme_id"); ?>" id="<?= $gamme_id ?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
							    <path style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;-inkscape-font-specification:Bitstream Vera Sans" d="M 23.90625 3.96875 C 22.859286 3.96875 21.813178 4.3743215 21 5.1875 L 5.40625 20.78125 L 5.1875 21 L 5.125 21.3125 L 4.03125 26.8125 L 3.71875 28.28125 L 5.1875 27.96875 L 10.6875 26.875 L 11 26.8125 L 11.21875 26.59375 L 26.8125 11 C 28.438857 9.373643 28.438857 6.813857 26.8125 5.1875 C 25.999322 4.3743215 24.953214 3.96875 23.90625 3.96875 z M 23.90625 5.875 C 24.409286 5.875 24.919428 6.1069285 25.40625 6.59375 C 26.379893 7.567393 26.379893 8.620107 25.40625 9.59375 L 24.6875 10.28125 L 21.71875 7.3125 L 22.40625 6.59375 C 22.893072 6.1069285 23.403214 5.875 23.90625 5.875 z M 20.3125 8.71875 L 23.28125 11.6875 L 11.1875 23.78125 C 10.533142 22.500659 9.4993415 21.466858 8.21875 20.8125 L 20.3125 8.71875 z M 6.9375 22.4375 C 8.1365842 22.923393 9.0766067 23.863416 9.5625 25.0625 L 6.28125 25.71875 L 6.9375 22.4375 z" color="#000" overflow="visible" font-family="Bitstream Vera Sans"></path>
							</svg>
							<br><p>Modifier</p>
						</a>
					</div>

					<div class="supprimer_gamme">
						<span id="<?= $gamme_id ?>" onclick="supprimerGamme(<?= $gamme_id ?>)">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
							    <path style="text-indent:0;text-align:start;line-height:normal;text-transform:none;block-progression:tb;-inkscape-font-specification:Bitstream Vera Sans" d="M 15 4 C 14.477778 4 13.939531 4.1854695 13.5625 4.5625 C 13.185469 4.9395305 13 5.4777778 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.645455 9.3545455 28 11 28 L 23 28 C 24.645455 28 26 26.645455 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.4777778 20.814531 4.9395305 20.4375 4.5625 C 20.060469 4.1854695 19.522222 4 19 4 L 15 4 z M 15 6 L 19 6 L 19 7 L 15 7 L 15 6 z M 10 9 L 24 9 L 24 25 C 24 25.554545 23.554545 26 23 26 L 11 26 C 10.445455 26 10 25.554545 10 25 L 10 9 z M 12 12 L 12 23 L 14 23 L 14 12 L 12 12 z M 16 12 L 16 23 L 18 23 L 18 12 L 16 12 z M 20 12 L 20 23 L 22 23 L 22 12 L 20 12 z" color="#000" overflow="visible" font-family="Bitstream Vera Sans"></path>
							</svg>
							<br><p>Supprimer</p>
						</span>
					</div>

					<div class="gamme_photo" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')"></div>
					<div class="gamme_info">
						<p class="gamme_nom"><?= $gamme['nom'] ?></p>
						<a href="<?= base_url("gamme/$gamme_url") ?>" class="gamme_lien"><?= base_url("gamme/$gamme_url") ?></a>
						<p class="gamme_description"><?= $gamme['description'] ?></p>	
					</div>

				</article>
			
			<?php endforeach; ?>

			<a href="<?= base_url("Gamme/creer"); ?>"><input type="button" class="button" value="Ajouter une gamme"></a>

		</section>

		<script type="text/javascript">

			function supprimerGamme(id){
				swal({
					title: 'Supprimer la gamme ?',
					text: "Une fois supprimé la gamme ne sera plus disponible.",
					showCancelButton: true,
					confirmButtonColor: '#6289a5',
					cancelButtonColor: '#f35f47',
					confirmButtonText: 'Supprimer',
					cancelButtonText: 'Annuler',
					animation: false
				}).then(function(isConfirm) {
					if (isConfirm) {
				    	window.location.href = '<?= base_url() ?>admin/gamme/supprimer/' + id;
					}
				})
			}

		</script>